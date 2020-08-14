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
&#35; THIS FILE IS AUTO-GENERATED. DO NOT EDIT MANUALLY.<br/>
domain pegasus.local<br/>
search pegasus.local<br/>
nameserver 127.0.0.1<br/>
EOM<br/>
/usr/bin/chattr +i /etc/resolv.conf<br/>
<br/>
<br/>
RTPEngine:
git clone https://github.com/sipwise/rtpengine.git<br/>
cd rtpengine<br/>
apt-get install debhelper default-libmysqlclient-dev gperf iptables-dev libavcodec-dev libavfilter-dev libavformat-dev libavutil-dev libbencode-perl libcrypt-openssl-rsa-perl libcrypt-rijndael-perl libhiredis-dev libio-multiplex-perl libio-socket-inet6-perl libjson-glib-dev libdigest-crc-perl libdigest-hmac-perl libnet-interface-perl libnet-interface-perl libssl-dev libsystemd-dev libxmlrpc-core-c3-dev libcurl4-openssl-dev libevent-dev libpcap0.8-dev markdown unzip nfs-common dkms libspandsp-dev<br/>
VER=1.0.4<br/>
curl https://codeload.github.com/BelledonneCommunications/bcg729/tar.gz/$VER >bcg729_$VER.orig.tar.gz<br/>
tar zxf bcg729_$VER.orig.tar.gz<br/>
cd bcg729-$VER<br/>
git clone https://github.com/ossobv/bcg729-deb.git debian<br/>
dpkg-buildpackage -us -uc -sa<br/>
cd ../<br/>
dpkg -i libbcg729-\*.deb<br/>
dpkg-checkbuilddeps<br/>
dpkg-buildpackage<br/>
cd ../<br/>
dpkg -i ngcp-rtpengine-daemon_*.deb ngcp-rtpengine-iptables_*.deb ngcp-rtpengine-kernel-dkms_*.deb<br/>
