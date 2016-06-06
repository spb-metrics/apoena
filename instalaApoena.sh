function montar_tela_menu_principal ()
{
        arquivox=dialog
	( echo "10" ; sleep 1 
         if [ ! -d /var/www/apache2-default ]
           then 
            mkdir /var/www/apache2-default
         fi
          cp apoenaAp.tar.gz /var/www/apache2-default
          cp criarsenhaBd.sh /var/lib/mysql
	  cp apoenaBd.tar.gz /var/lib/mysql
	  echo "30" ; sleep 2
	   /etc/init.d/apache2 stop
	   cd /var/www/apache2-default
	   tar xvfz apoenaAp.tar.gz
	   chmod -R 777 apoena 
           cp /etc/apache2/apache2.conf /etc/apache2/apache2bk.conf 
	   sed -i 's/ISO-8859-1/UTF-8/g' /etc/apache2/apache2.conf
           cp /etc/php5/apache2/php.ini /etc/php5/apache2/phpbk.ini
           sed -i 's/register_globals = Off/register_globals = On/g' /etc/php5/apache2/php.ini
           cat /var/www/apache2-default/apoena/php.ini >> /etc/php5/apache2/php.ini
        echo "50"; sleep 1 
	 /etc/init.d/mysql stop
	 cd /var/lib/mysql
	 tar xvfz apoenaBd.tar.gz
	echo "80" ; sleep 2
	# configurar apache como utf-8
	 /etc/init.d/apache2 start
	 /etc/init.d/mysql start
	# Permissao de escrita para crontab
	 echo "00 07   * * *   root    cd /var/www/apache2-default/apoena/rss/ ; ./recolhe" >> /etc/crontab
###	 chmod 666 /etc/crontab
###         /var/www/apache2-default/apoena/rss/./agenda.sh 7
echo "100" ; sleep 1 ) | $arquivox  --colors --backtitle '\Zb\Z3Instalação  Apoena' --gauge "             Aguarde instalação do Apoena..." 8 60 0
	 $arquivox --title "Instalação do Apoena" --backtitle "Instalação do Apoena" --msgbox "             Instalação Terminada - com Sucesso, agora 
             sera criado o usuário apoena no Mysql" 8 65

}

montar_tela_menu_principal
cd /var/lib/mysql
./criarsenhaBd.sh
$arquivox --title "Instalação do Apoena" --backtitle "Instalação do Apoena" --msgbox "             Fim - Democratize a Informação 
             acesse no seu navegador
          http://localhost/apache2-default/apoena
             usuario debian senha gnu" 8 65
exit 0    
