# pegasus-voip
Pegasus VOIP platform

Kamailio 5.4.0<br/>
RTPEngine 8.0.0.0_0~mr8.0.0.0 git-master-7b60ca8<br/>
Asterisk 17.5.1<br/>
<br/>
MySQL Server 8.0<br/>
Installation instructions: https://www.digitalocean.com/community/tutorials/how-to-install-the-latest-mysql-on-debian-10<br/>
<br/>
<br/>
Bind9 - DNS Server<br/>
run: apt install bind9<br/>
Copy files to /etc/bind/<br/>
restart bind9: systemctl restart bind9<br/>
enable bind9: systemctl enable bind9<br/>
<br/>
edit resolv.conf:<br/>
/usr/bin/chattr -i /etc/resolv.conf<br/>
/bin/cat > /etc/resolv.conf <<- EOM<br/>
domain pegasus.local<br/>
search pegasus.local<br/>
nameserver 127.0.0.1<br/>
EOM<br/>
/usr/bin/chattr +i /etc/resolv.conf<br/>
