Server Migration
================

on aws
------
mysqldump -u root -p --add-drop-table --databases gem jira mysql subscribers test tingri wordpress | bzip2 -v9 - > siteData.sql.bz2
tar -zcvf ~/apache.tar.gz /etc/apache2/

on digital ocean
----------------
sudo apt-get install openjdk-7-jdk
apt-get install htop
apt-get install icedtea-7-plugin
apt-get install git
apt-get install r-base
apt-get install lynx
apt-get install apache2

cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/jira.conf
a2ensite jira
a2enmod proxy
a2enmod proxy_http

cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/blog.conf
apt-get install php5
apt-get install libapache2-mod-php5
a2enmod php5
service apache2 restart

\curl -sSL https://get.rvm.io | bash -s stable --ruby=jruby --gems=rails,trinidad
source /usr/local/rvm/scripts/rvm
rvm list

R> install.packages("Rserve")
R> install.packages("sqldf")
R> library(Rserve)
R> Rserve()
R> quit()

mysql> UPDATE mysql.user SET Password=PASSWORD('*********')
    ->                   WHERE User='root';
mysql> FLUSH PRIVILEGES;
mysql> create user jira identified by '********';
mysql> GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,ALTER,INDEX on jira.* TO 'jira'@'localhost' IDENTIFIED BY '********';
mysql> flush privileges;
mysql> create user wordpressuser  identified by '********';
mysql> GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,ALTER,INDEX on wordpress.* TO 'wordpressuser'@'localhost' IDENTIFIED BY '********';
mysql> flush privileges;

nohup R CMD Rserve --no-save &

root@tingri:~/dev/prototype/tingri# pwd
/root/dev/prototype/tingri
root@tingri:~/dev/prototype/tingri# nohup bundle exec rails s trinidad -e development -p 3001 &
[1] 23669
root@tingri:~/dev/prototype/tingri# cd ../greenenergymonitor/
root@tingri:~/dev/prototype/greenenergymonitor# nohup bundle exec rails s trinidad -e development  &
[2] 23742

References
----------
http://dev.mysql.com/doc/refman/5.0/en/resetting-permissions.html
http://stackoverflow.com/questions/1580596/how-do-i-make-git-ignore-file-mode-chmod-changes
https://confluence.atlassian.com/display/JIRA060/Connecting+JIRA+to+MySQL
https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-13-10
http://php.net/manual/en/install.unix.debian.php