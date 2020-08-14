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
Bind9 - DNS Server
run: apt install bind9
Copy files to /etc/bind/
restart bind9: systemctl restart bind9
enable bind9: systemctl enable bind9

edit resolv.conf:
/usr/bin/chattr -i /etc/resolv.conf
/bin/cat > /etc/resolv.conf <<- EOM
# THIS FILE IS AUTO-GENERATED. DO NOT EDIT MANUALLY.
domain pegasus.local
search pegasus.local
nameserver 127.0.0.1
EOM
/usr/bin/chattr +i /etc/resolv.conf
