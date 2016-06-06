mv /var/www/apache2-defaut/apoena/rss/arquivo/*.xml   /var/www/apache2-default/apoena/guardaprocessado/
mv /var/www/apache2-defaut/apoena/rss/arquivo2/*.xml  /var/www/apache2-default/apoena/guardaprocessado/
mv /var/www/apache2-defaut/apoena/rss/arquivo3/*.xml  /var/www/apache2-default/apoena/guardaprocessado/
mv /var/www/apache2-defaut/apoena/rss/arquivo4/*.xml  /var/www/apache2-default/apoena/guardaprocessado/
mv /var/www/apache2-defaut/apoena/rss/arquivo5/*.xml  /var/www/apache2-default/apoena/guardaprocessado/
mv /var/www/apache2-defaut/apoena/rss/arquivo6/*.xml  /var/www/apache2-default/apoena/guardaprocessado/
mv /var/www/apache2-defaut/apoena/rss/arquivo7/*.xml  /var/www/apache2-default/apoena/guardaprocessado/
mv /var/www/apache2-defaut/apoena/rss/arquivo8/*.xml  /var/www/apache2-default/apoena/guardaprocessado/
mv /var/www/apache2-defaut/apoena/rss/arquivo9/*.xml  /var/www/apache2-default/apoena/guardaprocessado/
mv /var/www/apache2-defaut/apoena/rss/arquivo10/*.xml /var/www/apache2-default/apoena/guardaprocessado/


mysql -u apoena -p12345678 -e "DELETE FROM apoena.DOC_FORMT WHERE PLV < 'a' "
