#/bin/bash 




cd /var/www/apache2-default/apoena/rss/

mysql -u apoena -p12345678 -e "SELECT MAX(CD_DOC) FROM apoena.DOC " > maximo
Total=`grep -c "" maximo`
let "Total = ( Total - 1 )"
tail -n $Total maximo > maximof
cdmaior=`cat maximof`
let "um = ( cdmaior + 1000 )"

cp /var/www/apache2-default/apoena/rss/processaArquivo-1.sh /var/www/apache2-default/apoena/rss/arquivo


cd /var/www/apache2-default/apoena/rss/arquivo/ 
./processaArquivo-1.sh $um  > processa1 



## LIMPA

##cd /var/www/apache2-default/apoena/rss/
##./processaCliping.sh > saidacliping

##cd /var/www/apache2-default/apoena/rss/

##./processaEstatistica.sh



