#/bin/bash


#COPIA OS TEMPLATES DO SISTEMA

cp /var/www/apache2-default/apoena/templates/*.tpl  /home/usr01/workspace/APOENA_PROCESSADOR/apoena/php/template/ 


#COPIA OS CONTROLES DO SISTEMA

cp /var/www/apache2-default/apoena/*.php  /home/usr01/workspace/APOENA_PROCESSADOR/apoena/php/controle/ 

#COPIA OS MYSQLs DO SISTEMA

cp /var/www/apache2-default/apoena/.*.php /home/usr01/workspace/APOENA_PROCESSADOR/apoena/php/mysql/ 

cp /var/www/apache2-default/apoena/*.php /home/usr01/workspace/APOENA_PROCESSADOR/apoena/php/mail/ 


