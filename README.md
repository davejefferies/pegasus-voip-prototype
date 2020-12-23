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
apt-get install debhelper default-libmysqlclient-dev gperf iptables-dev libavcodec-dev libavfilter-dev libavformat-dev libavutil-dev libbencode-perl libcrypt-openssl-rsa-perl libcrypt-rijndael-perl libhiredis-dev libio-multiplex-perl libio-socket-inet6-perl libjson-glib-dev libdigest-crc-perl libdigest-hmac-perl libnet-interface-perl libnet-interface-perl libssl-dev libsystemd-dev libxmlrpc-core-c3-dev libcurl4-openssl-dev libevent-dev libpcap0.8-dev markdown unzip nfs-common dkms libspandsp-dev libwebsockets-dev<br/>
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
dpkg -i ngcp-rtpengine-daemon_\*.deb ngcp-rtpengine-iptables_\*.deb ngcp-rtpengine-kernel-dkms_\*.deb<br/>
<br/>
Delete ngcp-rtpengine-daemon.system<br/>
copy default and system file<br/>
systemctl daemon-reload<br/>
systemctl start rtpengine<br/>
systemctl enable rtpengine<br/>
<br/>
<br/>
Kamailio<br/>
apt install git gcc g++ flex bison libmysqlclient-dev make autoconf pkg-config libssl-dev libcurl4-openssl-dev libxml2-dev libpcre3-dev libunistring-dev libjson-c-dev libjansson-dev<br/>
mkdir -p /usr/local/src/kamailio-5.4<br/>
cd /usr/local/src/kamailio-5.4<br/>
git clone --depth 1 --no-single-branch https://github.com/kamailio/kamailio kamailio<br/>
cd kamailio<br/>
git checkout -b 5.4 origin/5.4<br/>
make cfg<br/>
nano src/modules.lst<br/>
include_modules = db_mysql tls dialplan dmq xmlops regex websocket json jansson pua pua_dialoginfo presence presence_xml presence_dialoginfo ndb_redis<br/>
make all<br/>
make install<br/>
<br/>
<br/>
Asterisk:<br/>
apt install build-essential festival<br/>
apt install gcc wget g++ make patch libedit-dev uuid-dev  libxml2-dev libsqlite3-dev openssl libssl-dev bzip2 libedit-dev<br/>
cd /usr/src/ && wget http://downloads.asterisk.org/pub/telephony/asterisk/asterisk-17-current.tar.gz<br/>
tar -xzvf asterisk-17-current.tar.gz<br/>
cd asterisk-17.1.0/<br/>
./configure  --with-jansson-bundled<br/>
make menuselect<br/>
make && make install<br/>
contrib/scripts/get_mp3_source.sh<br/>
<br/>
Install G729 for Asterisk Translation:<br/>
wget http://asterisk.hosting.lv/bin/codec_g729-ast170-gcc4-glibc-x86_64-core2.so<br/>
cp codec_g729-ast170-gcc4-glibc-x86_64-core2.so /usr/lib/asterisk/modules/codec_g729.so<br/>
chmod  +x /usr/lib/asterisk/modules/codec_g729.so<br/>
asterisk -rx "module load codec_g729.so"<br/>
systemctl restart asterisk<br/>
<br/>
Install Opus Codec for Asterisk<br/>
wget http://downloads.digium.com/pub/telephony/codec_opus/asterisk-17.0/x86-64/codec_opus-17.0_current-x86_64.tar.gz<br/>
tar -zxvf codec_opus-17.0_current-x86_64.tar.gz<br/>
cd codec_opus-17.0_current-x86_64<br/>
cp codec_opus.so /usr/lib/asterisk/modules/<br/>
cp codec_opus_config-en_US.xml /var/lib/asterisk/documentation/thirdparty<br/>
asterisk -rvvvv<br/>
core restart now<br/>
asterisk -rvvvv<br/>
core reload<br/>
