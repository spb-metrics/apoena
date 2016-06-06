rm /var/www/apache2-default/apoena/rss/arquivo/*.xml
rm /var/www/apache2-default/apoena/rss/apoena.xml 
cp /var/www/apache2-default/apoena/rss/apoenap.xml /var/www/apache2-default/apoena/rss/apoena.xml
echo "<item>" >> /var/www/apache2-default/apoena/rss/apoena.xml
echo "<title>" >> /var/www/apache2-default/apoena/rss/apoena.xml
echo "$1"  >> /var/www/apache2-default/apoena/rss/apoena.xml
echo "</title>" >> /var/www/apache2-default/apoena/rss/apoena.xml
echo "<description>" >> /var/www/apache2-default/apoena/rss/apoena.xml
echo "$2" >> /var/www/apache2-default/apoena/rss/apoena.xml
echo "</description>" >> /var/www/apache2-default/apoena/rss/apoena.xml
echo "<link>http://www.redetelecentro.com.br</link>" >> /var/www/apache2-default/apoena/rss/apoena.xml
echo "</item>" >> /var/www/apache2-default/apoena/rss/apoena.xml
echo "</apoena>" >> /var/www/apache2-default/apoena/rss/apoena.xml
cp /var/www/apache2-default/apoena/rss/apoena.xml /var/www/apache2-default/apoena/rss/arquivo/xxrss1.xml

