
sed -i '/apoena/d' /var/www/apache2-default/apoena/rss/crontabbk2 
echo "00 $1    * * *   root     /var/www/apache2-default/apoena/rss/./recolhe > /tmp/saida" >> /var/www/apache2-default/apoena/rss/cronntabbk2 
echo "00 $2    * * *   root     /var/www/apache2-default/apoena/rss/./recolhe > /tmp/saida" >> /var/www/apache2-default/apoena/rss/crontabbk2
cp /var/www/apache2-default/apoena/rss/crontabbk2 /etc/crontab
rm /var/www/apache2-default/apoena/rss/crontabbk2
