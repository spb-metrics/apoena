
#/bin/sh

 cp /etc/crontab /var/www/apache2-default/apoena/rss/crontabbk
 sed -i '/apoena/d' /var/www/apache2-default/apoena/rss/crontabbk 
 echo "00 $1    * * *   root     /var/www/apache2-default/apoena/rss/./recolhe > /tmp/saida" >> /var/www/apache2-default/apoena/rss/crontabbk
 cp /var/www/apache2-default/apoena/rss/crontabbk /etc/crontab 
