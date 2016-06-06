#/bin/bash


#COPIA OS TEMPLATES DO SISTEMA

cp /home/usr01/workspace/APOENA_PROCESSADOR/apoena/php/template/*.tpl /var/www/apache2-default/apoena/templates/

#COPIA OS CONTROLES DO SISTEMA 

cp /home/usr01/workspace/APOENA_PROCESSADOR/apoena/php/controle/*.php /var/www/apache2-default/apoena/

#COPIA OS MYSQLs DO SISTEMA

cp /home/usr01/workspace/APOENA_PROCESSADOR/apoena/php/mysql/.*.php /var/www/apache2-default/apoena/

cp /home/usr01/workspace/APOENA_PROCESSADOR/apoena/php/mail/*.php /var/www/apache2-default/apoena/


#COPIA OS JAVA DO SISTEMA

rm -R /var/www/apache2-default/apoena/rss/arquivo/apoena

cp -R /home/usr01/workspace/APOENA_PROCESSADOR/apoena/ /var/www/apache2-default/apoena/rss/arquivo/










