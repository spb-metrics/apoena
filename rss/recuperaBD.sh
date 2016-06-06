#!/bin/bash


#copia do cdrom os arquivos para instalação do sistema apoena
cp /var/www/apache2-default/apoena/backup/apoenaBK.tar.gz /var/lib/mysql/

erro=$?

#verifica se existiu erro durante a cópia dos arquivos
if [ $erro -ne 0 ]; then
  zenity --error --text="Erro durante a cópia dos arquivos!";
  exit 0;
fi

#----- descompacta, recupera o DUMP do banco de dados e seta as permissões para o diretório apoena ----

cd /var/lib/mysql

tar xvfz apoenaBk.tar.gz

#deleta a base de dados apoena
mysql -u root -p12345678 -e "DROP DATABASE IF EXISTS apoena"

#cria a base de dados apoena
mysql -u root -p12345678 -e "CREATE DATABASE apoena"

#reinicia o servidor mysql
/etc/init.d/mysql restart

#recupera o dump do banco de dados apoena
mysql -u root -p12345678 apoena < apoenaBanco.sql

#reinicia o servidor mysql
/etc/init.d/mysql restart

#seta a permisões para o diretório apoena
chmod -R 777 apoena
chown -R mysql: apoena

#remove arquivo compactado do servidor web
rm apoenaBanco.sql




