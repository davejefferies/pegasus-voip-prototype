<?php
 /**
  * phpagi-asmanager.php : PHP Asterisk Manager functions
  * @see https://github.com/welltime/phpagi
  * @filesource http://phpagi.sourceforge.net/
  *
  * $Id: phpagi-asmanager.php,v 1.10 2005/05/25 18:43:48 pinhole Exp $
  *
  * Copyright (c) 2004 - 2010 Matthew Asham <matthew@ochrelabs.com>, David Eder <david@eder.us> and others
  * All Rights Reserved.
  *
  * This software is released under the terms of the GNU Lesser General Public License v2.1
  *  A copy of which is available from http://www.gnu.org/copyleft/lesser.html
  *
  * We would be happy to list your phpagi based application on the phpagi
  * website.  Drop me an Email if you'd like us to list your program.
  *
  * @package phpAGI
  * @version 2.0
  */
 /**
  * Written for PHP 4.3.4, should work with older PHP 4.x versions.
  * Please submit bug reports, patches, etc to https://github.com/welltime/phpagi
  *
  */
  if(!class_exists('AGI'))
  {
    require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpagi.php');
  }
 /**
  * Asterisk Manager class
  *
  * @link http://www.voip-info.org/wiki-Asterisk+config+manager.conf
  * @link http://www.voip-info.org/wiki-Asterisk+manager+API
  * @example examples/sip_show_peer.php Get information about a sip peer
  * @package phpAGI
  */
  class AGI_AsteriskManager
  {
   /**
    * Config variables
    *
    * @var array
    * @access public
    */
    public $config;
   /**
    * Socket
    *
    * @access public
    */
    public $socket = null;
   /**
    * Server we are connected to
    *
    * @access public
    * @var string
    */
    public $server;
   /**
    * Port on the server we are connected to
    *
    * @access public
    * @var integer
    */
    public $port;
   /**
    * Parent AGI
    *
    * @access private
    * @var AGI
    */
    public $pagi = false;
   /**
    * Event Handlers
    *
    * @access private
    * @var array
    */
    private $event_handlers;
    private $_buffer = null;
    /**
     * Whether we're successfully logged in
     *
     * @access private
     * @var boolean
     */
    private $_logged_in = false;
   
    public function setPagi(&$agi)
    {
      $this->pagi = $agi;
    }
   /**
    * Constructor
    *
    * @param string $config is the name of the config file to parse or a parent agi from which to read the config
    * @param array $optconfig is an array of configuration vars and vals, stuffed into $this->config['asmanager']
    */
    function __construct($config=null, $optconfig=array())
    {
      // load config
      if(!is_null($config) && file_exists($config))
        $this->config = parse_ini_file($config, true);
      elseif(file_exists(DEFAULT_PHPAGI_CONFIG))
        $this->config = parse_ini_file(DEFAULT_PHPAGI_CONFIG, true);
      // If optconfig is specified, stuff vals and vars into 'asmanager' config array.
      foreach($optconfig as $var=>$val)
        $this->config['asmanager'][$var] = $val;
      // add default values to config for uninitialized values
      if(!isset($this->config['asmanager']['server'])) $this->config['asmanager']['server'] = 'localhost';
      if(!isset($this->config['asmanager']['port'])) $this->config['asmanager']['port'] = 5038;
      if(!isset($this->config['asmanager']['username'])) $this->config['asmanager']['username'] = 'phpagi';
      if(!isset($this->config['asmanager']['secret'])) $this->config['asmanager']['secret'] = 'phpagi';
      if(!isset($this->config['asmanager']['write_log'])) $this->config['asmanager']['write_log'] = false;
    }
   /**
    * Send a request
    *
    * @param string $action
    * @param array $parameters
    * @return array of parameters
    */
    function send_request($action, $parameters=array())
    {
      $req = "Action: $action\r\n";
      $actionid = null;
      foreach ($parameters as $var=>$val) {
        if (is_array($val)) {
          foreach ($val as $line) {
            $req .= "$var: $line\r\n";
          }
        } else {
          $req .= "$var: $val\r\n";
          if (strtolower($var) == "actionid") {
            $actionid = $val;
          }
        }
      }
      if (!$actionid) {
        $actionid = $this->ActionID();
        $req .= "ActionID: $actionid\r\n";
      }
      $req .= "\r\n";
      fwrite($this->socket, $req);
      return $this->wait_response(false, $actionid);
    }
    function read_one_msg($allow_timeout = false)
    {
      $type = null;
      do {
        $buf = fgets($this->socket, 4096);
        if (false === $buf) {
          throw new Exception("Error reading from AMI socket");
        }
        $this->_buffer .= $buf;
        $pos = strpos($this->_buffer, "\r\n\r\n");
        if (false !== $pos) {
          // there's a full message in the buffer
          break;
        }
      } while (!feof($this->socket));
      $msg = substr($this->_buffer, 0, $pos);
      $this->_buffer = substr($this->_buffer, $pos+4);
      $msgarr = explode("\r\n", $msg);
      $parameters = array();
      $r = explode(': ', $msgarr[0]);
      $type = strtolower($r[0]);
      if ($r[1] == 'Follows') {
        $str = array_pop($msgarr);
        $lastline = strpos($str, '--END COMMAND--');
        if (false !== $lastline) {
          $parameters['data'] = substr($str, 0, $lastline-1); // cut '\n' too
        }
      }
      foreach ($msgarr as $num=>$str) {
        $kv = explode(':', $str, 2);
        if (!isset($kv[1])) {
          $kv[1] = "";
        }
        $key = trim($kv[0]);
        $val = trim($kv[1]);
        $parameters[$key] = $val;
      }
      // process response
      switch($type)
      {
        case '': // timeout occured
          $timeout = $allow_timeout;
          break;
        case 'event':
          $this->process_event($parameters);
          break;
        case 'response':
          break;
        default:
          $this->log('Unhandled response packet from Manager: ' . print_r($parameters, true));
          break;
      }
      return $parameters;
    }
   /**
    * Wait for a response
    *
    * If a request was just sent, this will return the response.
    * Otherwise, it will loop forever, handling events.
    *
    * XXX this code is slightly better then the original one
    * however it's still totally screwed up and needs to be rewritten,
    * for two reasons at least:
    * 1. it does not handle socket errors in any way
    * 2. it is terribly synchronous, esp. with eventlists,
    *    i.e. your code is blocked on waiting until full responce is received
    *
    * @param boolean $allow_timeout if the socket times out, return an empty array
    * @return array of parameters, empty on timeout
    */
    function wait_response($allow_timeout = false, $actionid = null)
    {
      $res = array();
      if ($actionid) {
        do {
          $res = $this->read_one_msg($allow_timeout);
        } while (!( isset($res['ActionID']) && $res['ActionID']==$actionid ));
      } else {
        $res = $this->read_one_msg($allow_timeout);
        return $res;
      }
      if (isset($res['EventList']) && $res['EventList']=='start') {
        $evlist = array();
        do {
          $res = $this->wait_response(false, $actionid);
          if (isset($res['EventList']) && $res['EventList']=='Complete')
            break;
          else
            $evlist[] = $res;
        } while(true);
        $res['events'] = $evlist;
      }
      return $res;
    }
   /**
    * Connect to Asterisk
    *
    * @example examples/sip_show_peer.php Get information about a sip peer
    *
    * @param string $server
    * @param string $username
    * @param string $secret
    * @return boolean true on success
    */
    function connect($server=null, $username=null, $secret=null)
    {
      // use config if not specified
      if(is_null($server)) $server = $this->config['asmanager']['server'];
      if(is_null($username)) $username = $this->config['asmanager']['username'];
      if(is_null($secret)) $secret = $this->config['asmanager']['secret'];
      // get port from server if specified
      if(strpos($server, ':') !== false)
      {
        $c = explode(':', $server);
        $this->server = $c[0];
        $this->port = $c[1];
      }
      else
      {
        $this->server = $server;
        $this->port = $this->config['asmanager']['port'];
      }
      // connect the socket
      $errno = $errstr = null;
      $this->socket = @fsockopen($this->server, $this->port, $errno, $errstr);
      if($this->socket == false)
      {
        $this->log("Unable to connect to manager {$this->server}:{$this->port} ($errno): $errstr");
        return false;
      }
      // read the header
      $str = fgets($this->socket);
      if($str == false)
      {
        // a problem.
        $this->log("Asterisk Manager header not received.");
        return false;
      }
      else
      {
        // note: don't $this->log($str) until someone looks to see why it mangles the logging
      }
      // login
      $res = $this->send_request('login', array('Username'=>$username, 'Secret'=>$secret));
      if($res['Response'] != 'Success')
      {
        $this->_logged_in = false;
        $this->log("Failed to login.");
        $this->disconnect();
        return false;
      }
      $this->_logged_in = true;
      return true;
    }
   /**
    * Disconnect
    *
    * @example examples/sip_show_peer.php Get information about a sip peer
    */
    function disconnect()
    {
      if($this->_logged_in==true)
        $this->logoff();
      fclose($this->socket);
    }
   // *********************************************************************************************************
   // **                       COMMANDS                                                                      **
   // *********************************************************************************************************
   /**
    * Set Absolute Timeout
    *
    * Hangup a channel after a certain time.
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+AbsoluteTimeout
    * @param string $channel Channel name to hangup
    * @param integer $timeout Maximum duration of the call (sec)
    */
    function AbsoluteTimeout($channel, $timeout)
    {
      return $this->send_request('AbsoluteTimeout', array('Channel'=>$channel, 'Timeout'=>$timeout));
    }
   /**
    * Change monitoring filename of a channel
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+ChangeMonitor
    * @param string $channel the channel to record.
    * @param string $file the new name of the file created in the monitor spool directory.
    */
    function ChangeMonitor($channel, $file)
    {
      return $this->send_request('ChangeMontior', array('Channel'=>$channel, 'File'=>$file));
    }
   /**
    * Execute Command
    *
    * @example examples/sip_show_peer.php Get information about a sip peer
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+Command
    * @link http://www.voip-info.org/wiki-Asterisk+CLI
    * @param string $command
    * @param string $actionid message matching variable
    */
    function Command($command, $actionid=null)
    {
      $parameters = array('Command'=>$command);
      if($actionid) $parameters['ActionID'] = $actionid;
      return $this->send_request('Command', $parameters);
    }
   /**
    * Enable/Disable sending of events to this manager
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+Events
    * @param string $eventmask is either 'on', 'off', or 'system,call,log'
    */
    function Events($eventmask)
    {
      return $this->send_request('Events', array('EventMask'=>$eventmask));
    }
    /**
    *  Generate random ActionID
    **/
    function ActionID()
    {
      return "A".sprintf(rand(),"%6d");
    }
    /**
    *
    *  DBGet
    *  http://www.voip-info.org/wiki/index.php?page=Asterisk+Manager+API+Action+DBGet
    *  @param string $family key family
    *  @param string $key key name
    **/
    function DBGet($family, $key, $actionid = null)
    {
      $parameters = array('Family'=>$family, 'Key'=>$key);
      if($actionid == null)
        $actionid = $this->ActionID();
      $parameters['ActionID'] = $actionid;
      $response = $this->send_request("DBGet", $parameters);
      if($response['Response'] == "Success")
      {
        $response = $this->wait_response(false, $actionid);
        return $response['Val'];
      }
      return "";
    }
   /**
    * Check Extension Status
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+ExtensionState
    * @param string $exten Extension to check state on
    * @param string $context Context for extension
    * @param string $actionid message matching variable
    */
    function ExtensionState($exten, $context, $actionid=null)
    {
      $parameters = array('Exten'=>$exten, 'Context'=>$context);
      if($actionid) $parameters['ActionID'] = $actionid;
      return $this->send_request('ExtensionState', $parameters);
    }
   /**
    * Gets a Channel Variable
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+GetVar
    * @link http://www.voip-info.org/wiki-Asterisk+variables
    * @param string $channel Channel to read variable from
    * @param string $variable
    * @param string $actionid message matching variable
    */
    function GetVar($channel, $variable, $actionid=null)
    {
      $parameters = array('Channel'=>$channel, 'Variable'=>$variable);
      if($actionid) $parameters['ActionID'] = $actionid;
      return $this->send_request('GetVar', $parameters);
    }
   /**
    * Hangup Channel
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+Hangup
    * @param string $channel The channel name to be hungup
    */
    function Hangup($channel)
    {
      return $this->send_request('Hangup', array('Channel'=>$channel));
    }
   /**
    * List IAX Peers
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+IAXpeers
    */
    function IAXPeers()
    {
      return $this->send_request('IAXPeers');
    }
   /**
    * List available manager commands
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+ListCommands
    * @param string $actionid message matching variable
    */
    function ListCommands($actionid=null)
    {
      if($actionid)
        return $this->send_request('ListCommands', array('ActionID'=>$actionid));
      else
        return $this->send_request('ListCommands');
    }
   /**
    * Logoff Manager
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+Logoff
    */
    function Logoff()
    {
      return $this->send_request('Logoff');
    }
   /**
    * Check Mailbox Message Count
    *
    * Returns number of new and old messages.
    *   Message: Mailbox Message Count
    *   Mailbox: <mailboxid>
    *   NewMessages: <count>
    *   OldMessages: <count>
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+MailboxCount
    * @param string $mailbox Full mailbox ID <mailbox>@<vm-context>
    * @param string $actionid message matching variable
    */
    function MailboxCount($mailbox, $actionid=null)
    {
      $parameters = array('Mailbox'=>$mailbox);
      if($actionid) $parameters['ActionID'] = $actionid;
      return $this->send_request('MailboxCount', $parameters);
    }
   /**
    * Check Mailbox
    *
    * Returns number of messages.
    *   Message: Mailbox Status
    *   Mailbox: <mailboxid>
    *   Waiting: <count>
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+MailboxStatus
    * @param string $mailbox Full mailbox ID <mailbox>@<vm-context>
    * @param string $actionid message matching variable
    */
    function MailboxStatus($mailbox, $actionid=null)
    {
      $parameters = array('Mailbox'=>$mailbox);
      if($actionid) $parameters['ActionID'] = $actionid;
      return $this->send_request('MailboxStatus', $parameters);
    }
   /**
    * Monitor a channel
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+Monitor
    * @param string $channel
    * @param string $file
    * @param string $format
    * @param boolean $mix
    */
    function Monitor($channel, $file=null, $format=null, $mix=null)
    {
      $parameters = array('Channel'=>$channel);
      if($file) $parameters['File'] = $file;
      if($format) $parameters['Format'] = $format;
      if(!is_null($file)) $parameters['Mix'] = ($mix) ? 'true' : 'false';
      return $this->send_request('Monitor', $parameters);
    }
   /**
    * Originate Call
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+Originate
    * @param string $channel Channel name to call
    * @param string $exten Extension to use (requires 'Context' and 'Priority')
    * @param string $context Context to use (requires 'Exten' and 'Priority')
    * @param string $priority Priority to use (requires 'Exten' and 'Context')
    * @param string $application Application to use
    * @param string $data Data to use (requires 'Application')
    * @param integer $timeout How long to wait for call to be answered (in ms)
    * @param string $callerid Caller ID to be set on the outgoing channel
    * @param string $variable Channel variable to set (VAR1=value1|VAR2=value2)
    * @param string $account Account code
    * @param boolean $async true fast origination
    * @param string $actionid message matching variable
    */
    function Originate($channel,
                       $exten=null, $context=null, $priority=null,
                       $application=null, $data=null,
                       $timeout=null, $callerid=null, $variable=null, $account=null, $async=null, $actionid=null)
    {
      $parameters = array('Channel'=>$channel);
      if($exten) $parameters['Exten'] = $exten;
      if($context) $parameters['Context'] = $context;
      if($priority) $parameters['Priority'] = $priority;
      if($application) $parameters['Application'] = $application;
      if($data) $parameters['Data'] = $data;
      if($timeout) $parameters['Timeout'] = $timeout;
      if($callerid) $parameters['CallerID'] = $callerid;
      if($variable) $parameters['Variable'] = $variable;
      if($account) $parameters['Account'] = $account;
      if(!is_null($async)) $parameters['Async'] = ($async) ? 'true' : 'false';
      if($actionid) $parameters['ActionID'] = $actionid;
      return $this->send_request('Originate', $parameters);
    }
   /**
    * List parked calls
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+ParkedCalls
    * @param string $actionid message matching variable
    */
    function ParkedCalls($actionid=null)
    {
      if($actionid)
        return $this->send_request('ParkedCalls', array('ActionID'=>$actionid));
      else
        return $this->send_request('ParkedCalls');
    }
   /**
    * Ping
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+Ping
    */
    function Ping()
    {
      return $this->send_request('Ping');
    }
   /**
    * Queue Add
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+QueueAdd
    * @param string $queue
    * @param string $interface
    * @param integer $penalty
    * @param string $memberName
    */
    function QueueAdd($queue, $interface, $penalty=0, $memberName = false)
    {
      $parameters = array('Queue'=>$queue, 'Interface'=>$interface);
      if($penalty) $parameters['Penalty'] = $penalty;
      if($memberName) $parameters["MemberName"] = $memberName;
      return $this->send_request('QueueAdd', $parameters);
    }
   /**
    * Queue Remove
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+QueueRemove
    * @param string $queue
    * @param string $interface
    */
    function QueueRemove($queue, $interface)
    {
      return $this->send_request('QueueRemove', array('Queue'=>$queue, 'Interface'=>$interface));
    }
    function QueueReload()
    {
      return $this->send_request('QueueReload');
    }
   /**
    * Queues
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+Queues
    */
    function Queues()
    {
      return $this->send_request('Queues');
    }
   /**
    * Queue Status
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+QueueStatus
    * @param string $actionid message matching variable
    */
    function QueueStatus($actionid=null)
    {
      if($actionid)
        return $this->send_request('QueueStatus', array('ActionID'=>$actionid));
      else
        return $this->send_request('QueueStatus');
    }
   /**
    * Redirect
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+Redirect
    * @param string $channel
    * @param string $extrachannel
    * @param string $exten
    * @param string $context
    * @param string $priority
    */
    function Redirect($channel, $extrachannel, $exten, $context, $priority)
    {
      return $this->send_request('Redirect', array('Channel'=>$channel, 'ExtraChannel'=>$extrachannel, 'Exten'=>$exten,
                                                   'Context'=>$context, 'Priority'=>$priority));
    }
   /**
    * Set the CDR UserField
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+SetCDRUserField
    * @param string $userfield
    * @param string $channel
    * @param string $append
    */
    function SetCDRUserField($userfield, $channel, $append=null)
    {
      $parameters = array('UserField'=>$userfield, 'Channel'=>$channel);
      if($append) $parameters['Append'] = $append;
      return $this->send_request('SetCDRUserField', $parameters);
    }
   /**
    * Set Channel Variable
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+SetVar
    * @param string $channel Channel to set variable for
    * @param string $variable name
    * @param string $value
    */
    function SetVar($channel, $variable, $value)
    {
      return $this->send_request('SetVar', array('Channel'=>$channel, 'Variable'=>$variable, 'Value'=>$value));
    }
   /**
    * Channel Status
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+Status
    * @param string $channel
    * @param string $actionid message matching variable
    */
    function Status($channel, $actionid=null)
    {
      $parameters = array('Channel'=>$channel);
      if($actionid) $parameters['ActionID'] = $actionid;
      return $this->send_request('Status', $parameters);
    }
   /**
    * Stop monitoring a channel
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+StopMonitor
    * @param string $channel
    */
    function StopMonitor($channel)
    {
      return $this->send_request('StopMonitor', array('Channel'=>$channel));
    }
   /**
    * Dial over Zap channel while offhook
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+ZapDialOffhook
    * @param string $zapchannel
    * @param string $number
    */
    function ZapDialOffhook($zapchannel, $number)
    {
      return $this->send_request('ZapDialOffhook', array('ZapChannel'=>$zapchannel, 'Number'=>$number));
    }
   /**
    * Toggle Zap channel Do Not Disturb status OFF
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+ZapDNDoff
    * @param string $zapchannel
    */
    function ZapDNDoff($zapchannel)
    {
      return $this->send_request('ZapDNDoff', array('ZapChannel'=>$zapchannel));
    }
   /**
    * Toggle Zap channel Do Not Disturb status ON
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+ZapDNDon
    * @param string $zapchannel
    */
    function ZapDNDon($zapchannel)
    {
      return $this->send_request('ZapDNDon', array('ZapChannel'=>$zapchannel));
    }
   /**
    * Hangup Zap Channel
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+ZapHangup
    * @param string $zapchannel
    */
    function ZapHangup($zapchannel)
    {
      return $this->send_request('ZapHangup', array('ZapChannel'=>$zapchannel));
    }
   /**
    * Transfer Zap Channel
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+ZapTransfer
    * @param string $zapchannel
    */
    function ZapTransfer($zapchannel)
    {
      return $this->send_request('ZapTransfer', array('ZapChannel'=>$zapchannel));
    }
   /**
    * Zap Show Channels
    *
    * @link http://www.voip-info.org/wiki-Asterisk+Manager+API+Action+ZapShowChannels
    * @param string $actionid message matching variable
    */
    function ZapShowChannels($actionid=null)
    {
      if($actionid)
        return $this->send_request('ZapShowChannels', array('ActionID'=>$actionid));
      else
        return $this->send_request('ZapShowChannels');
    }
   // *********************************************************************************************************
   // **                       MISC                                                                          **
   // *********************************************************************************************************
   /*
    * Log a message
    *
    * @param string $message
    * @param integer $level from 1 to 4
    */
    function log($message, $level=1)
    {
      if($this->pagi != false)
        $this->pagi->conlog($message, $level);
      elseif($this->config['asmanager']['write_log'])
        error_log(date('r') . ' - ' . $message);
    }
   /**
    * Add event handler
    *
    * Known Events include ( http://www.voip-info.org/wiki-asterisk+manager+events )
    *   Link - Fired when two voice channels are linked together and voice data exchange commences.
    *   Unlink - Fired when a link between two voice channels is discontinued, for example, just before call completion.
    *   Newexten -
    *   Hangup -
    *   Newchannel -
    *   Newstate -
    *   Reload - Fired when the "RELOAD" console command is executed.
    *   Shutdown -
    *   ExtensionStatus -
    *   Rename -
    *   Newcallerid -
    *   Alarm -
    *   AlarmClear -
    *   Agentcallbacklogoff -
    *   Agentcallbacklogin -
    *   Agentlogoff -
    *   MeetmeJoin -
    *   MessageWaiting -
    *   join -
    *   leave -
    *   AgentCalled -
    *   ParkedCall - Fired after ParkedCalls
    *   Cdr -
    *   ParkedCallsComplete -
    *   QueueParams -
    *   QueueMember -
    *   QueueStatusEnd -
    *   Status -
    *   StatusComplete -
    *   ZapShowChannels - Fired after ZapShowChannels
    *   ZapShowChannelsComplete -
    *
    * @param string $event type or * for default handler
    * @param string $callback function
    * @return boolean sucess
    */
    function add_event_handler($event, $callback)
    {
      $event = strtolower($event);
      if(isset($this->event_handlers[$event]))
      {
        $this->log("$event handler is already defined, not over-writing.");
        return false;
      }
      $this->event_handlers[$event] = $callback;
      return true;
    }
    /**
    *
    *   Remove event handler
    *
    *   @param string $event type or * for default handler
    *   @return boolean sucess
    **/
    function remove_event_handler($event)
    {
      $event = strtolower($event);
      if(isset($this->event_handlers[$event]))
      {
        unset($this->event_handlers[$event]);
        return true;
      }
      $this->log("$event handler is not defined.");
      return false;
    }
   /**
    * Process event
    *
    * @access private
    * @param array $parameters
    * @return mixed result of event handler or false if no handler was found
    */
    function process_event($parameters)
    {
      $ret = false;
      $e = strtolower($parameters['Event']);
      $this->log("Got event.. $e");
      $handler = '';
      if(isset($this->event_handlers[$e])) $handler = $this->event_handlers[$e];
      elseif(isset($this->event_handlers['*'])) $handler = $this->event_handlers['*'];
      if(function_exists($handler))
      {
        $this->log("Execute handler $handler");
        $ret = $handler($e, $parameters, $this->server, $this->port);
      } elseif (is_array($handler)) {
        $ret = call_user_func($handler, $e, $parameters, $this->server, $this->port);
      }
      else
        $this->log("No event handler for event '$e'");
      return $ret;
    }
  }
?>
