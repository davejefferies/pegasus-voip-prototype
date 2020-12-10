<?php

namespace Pegasus\Gateway\Agi;

class Wrapper {
    private $colorizer;
    
    public function __construct(\AGI $fastagi, Colorizer $colorizer) {
      $this->fastagi = $fastagi;
      $this->colorizer = $colorizer;
    }

    public function channelStatus() {
        return $this->fastagi->channel_status();
    }

    public function checkVoicemail($mailbox, $context, $options = "")
    {
        return $this->fastagi->exec('VoiceMailMain', "$mailbox@$context,$options");
    }

    public function voicemail($mailbox, $context, $opts = "")
    {
        return $this->fastagi->exec('VoiceMail', "$mailbox@$context,$opts");
    }

    public function getAgiType()
    {
        return $this->getRequestData('agi_type');
    }

    public function getCallerIdNum()
    {
        return $this->getVariable("CALLERID(num)");
    }

    public function getCallId()
    {
        if ($callid = $this->getVariable("CALL_ID")) {
            return $callid;
        }

        if ($this->getAgiType() == "Local") {
            return "";
        }

        return $this->getVariable("CHANNEL(pjsip,call-id)");
    }

    public function getCompanyId()
    {
        return $this->getVariable("COMPANYID");
    }

    public function getConferenceInfo($num, $type)
    {
        return $this->getVariable("CONFBRIDGE_INFO($type,$num)");
    }

    public function getConferenceSetting($setting)
    {
        return $this->getVariable("CONFBRIDGE($setting)");
    }

    public function getData($filename, $timeout = null, $max_digits = null)
    {
        return $this->fastagi->get_data($filename, $timeout, $max_digits);
    }

    public function getDialEndpoint()
    {
        return $this->getVariable("DIAL_ENDPOINT");
    }

    public function getEndpoint()
    {
        return $this->getVariable("CHANNEL(endpoint)");
    }

    public function getExtension()
    {
        return $this->getRequestData('agi_extension');
    }

    public function getRedirecting($type)
    {
        return $this->getVariable("REDIRECTING($type)");
    }

    public function getReferredByHdr() {
        return $this->getVariable("SIPREFERREDBYHDR");
    }

    public function getSipTransfer() {
        return $this->getVariable("SIPTRANSFER");
    }

    public function getUniqueId()
    {
        return $this->getRequestData('agi_uniqueid');
    }

    public function getVariable($variable)
    {
        return (string) $this->fastagi->get_variable($variable, true);
    }

    public function setCallId($id)
    {
        return $this->setVariable("__CALL_ID", $id);
    }

    public function setCallType($type)
    {
        return $this->setVariable("__CALL_TYPE", $type);
    }

    public function setChannelCaller($caller)
    {
        return $this->setVariable("_CALLER", $caller);
    }

    public function setChannelLanguage($code)
    {
        return $this->setVariable("CHANNEL(language)", $code);
    }

    public function setChannelMusic($val)
    {
        return $this->setVariable("CHANNEL(musicclass)", $val);
    }

    public function setChannelOrigin($val) {
        return $this->setVariable("_ORIGIN", $val);
    }

    public function setCompanyId($id)
    {
        return $this->setVariable("__COMPANYID", $id);
    }

    public function setConferenceSetting($setting, $value)
    {
        return $this->setVariable("CONFBRIDGE($setting)", $value);
    }

    public function setConnectedLine($type, $value)
    {
        return $this->setVariable("CONNECTEDLINE($type)", $value);
    }

    public function setDialDst($dst) {
        return $this->setVariable("DIAL_DST", "PJSIP/$dst");
    }

    public function setDialEndpoint($dst) {
        return $this->setVariable("__DIAL_ENDPOINT", $dst);
    }

    public function setDialExt($ext) {
        return $this->setVariable("DIAL_EXT", $ext);
    }

    public function setDialOpts($opts) {
        return $this->setVariable("DIAL_OPTS", $opts);
    }

    public function setDialTimeout($timeout) {
        return $this->setVariable("DIAL_TIMEOUT", $timeout);
    }

    public function setExtensionId($id)
    {
        return $this->setVariable("__EXTENSIONID", $id);
    }

    public function setQueueId($id)
    {
        return $this->setVariable("QUEUE_ID", $id);
    }

    public function setQueueName($name)
    {
        return $this->setVariable("QUEUE", $name);
    }

    public function setRedirecting($type, $value)
    {
        return $this->setVariable("REDIRECTING($type)", $value);
    }

    public function setReferredByHdr($uri)
    {
        return $this->setVariable("__SIPREFERREDBYHDR", $uri);
    }

    public function setSIPHeader($header, $value)
    {
        return $this->setVariable("PJSIP_HEADER(add,$header)", $value);
    }

    public function hangup($reason = "")
    {
        if (empty($reason)) {
            return $this->fastagi->hangup();
        } else {
            return $this->fastagi->Exec("Hangup", $reason);
        }
    }

    public function setVariable($variable, $value)
    {
        if (is_null($value)) {
            $value = "";
        }
        return $this->fastagi->set_variable($variable, $value);
    }

    public function redirect($context, $exten = null, $priority = '1') {
        if (!$exten) {
            $exten = $this->getExtension();
        }

        return $this->fastagi->Exec('Goto', "$context,$exten,$priority");
    }

    private function getRequestData($name)
    {
        return $this->fastagi->request[$name];
    }

    public function verbose($fmt, ...$args) 
    {
        $msg = $this->colorizer->parse('<blue>' . vsprintf($fmt, $args) . '</blue>');
        return $this->fastagi->verbose($msg);
    }
      
    public function notice($fmt, ...$args) 
    {
        $msg = $this->colorizer->parse('<yellow>' . vsprintf($fmt, $args) . '</yellow>');
        return $this->fastagi->notice($msg);
    }
      
    public function error($fmt, ...$args) 
    {
        $msg = $this->colorizer->parse('<red>' . vsprintf($fmt, $args) . '</red>');
        return $this->fastagi->error($msg);
    }

    public function answer()
    {
        return $this->fastagi->answer();
    }

    public function sayDigits($keys)
    {
        return $this->fastagi->say_digits($keys);
    }

    public function readText($text)
    {
        return $this->fastagi->text2wav($text);
    }

    public function extractURI($uri, $variable)
    {
        if (preg_match("/([^<]*)(sip:([^@>;]+)@?([^>;:]+)?)/", $uri, $matches)) {
            switch ($variable) {
                case 'name':
                    return $matches[1];
                case 'uri':
                    return $matches[2];
                case 'num':
                    return $matches[3];
                case 'domain':
                    return $matches[4];
            }
        }
        return "";
    }
}