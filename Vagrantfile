Vagrant.configure("2") do |config|

  config.vm.box = "CentOS67"
  config.vm.box_url = "https://github.com/CommanderK5/packer-centos-template/releases/download/0.6.7/vagrant-centos-6.7.box"

  config.vm.network :private_network, ip: "192.168.33.20"
  config.vm.network :forwarded_port, host: 10090, guest: 80

  config.vm.synced_folder "jupiter", "/jupiter", :nfs => true
  config.vm.synced_folder "httpd", "/vagrant/httpd", :nfs => true

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "1024"
  end

  $script = <<SCRIPT
yum -y update
yum -y install git
yum -y install zip unzip

yum install -y httpd

#### install php
rpm -ivh http://dl.fedoraproject.org/pub/epel/6/i386/epel-release-6-8.noarch.rpm
rpm -ivh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
yum install --enablerepo=epel,remi-php70,remi -y \
php \
php-cli \
php-gd \
php-mbstring \
php-mcrypt \
php-mysqlnd \
php-pdo \
php-xml \
php-xdebug \
php-memcached
sed -i -e "s|;mbstring.language = Japanese|mbstring.language = Japanese|" /etc/php.ini
sed -i -e "s|;date.timezone =|date.timezone = Asia/Tokyo|" /etc/php.ini
curl -s https://getcomposer.org/installer | php
mv ./composer.phar /usr/local/bin/composer

##### install Mysql
rpm -Uvh http://dev.mysql.com/get/mysql57-community-release-el6-7.noarch.rpm
yum -y install mysql-community-server
echo "skip-grant-tables" >> /etc/my.cnf
service mysqld start
chkconfig mysqld on

## DB setup
echo "DROP DATABASE IF EXISTS jupiter;" | mysql -u root
echo "CREATE DATABASE jupiter;" | mysql -u root

service iptables stop
chkconfig iptables off

chkconfig httpd on
service httpd start
SCRIPT
  config.vm.provision :shell, :inline => $script

end
