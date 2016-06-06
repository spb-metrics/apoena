#!/bin/bash

dia=$(date +%d)
mes=$(date +%m)
ano=$(date +%y)

cd /var/lib/mysql/

#faz o dump do banco de dados apoena
mysqldump -u root -p12345678 --opt apoena > /var/www/apache2-default/apoena/backup/backupBanco.sql

cd /var/www/apache2-default/apoena/backup

#compactar o arquivo para um diretorio acima
tar cvvfz  apoenaBK_$dia$mes$ano.tar.gz backupBanco.sql

#remover o que esta dentro do backup
rm -R backupBanco.sql

