#/bin/bash

#retorna a máquina para a configuração da rede MAN
#ADSL
ifdown eth0 

#Rede man
ifup eth1

cd /var/www/apache2-default/apoena/rss/arquivo/

#copia os arquivos .xml para a máquina 172.18.31.132
scp /var/www/apache2-default/apoena/rss/arquivo/xxrss* root@172.18.31.132:/var/www/apache2-default/apoena/rss/arquivo/

#retorna a máquina para a configuração da rede ADSL
#Rede man
ifdown eth1

#ADSL
ifup eth0





