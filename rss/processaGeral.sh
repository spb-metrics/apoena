#/bin/bash 




cd /var/www/apache2-default/apoena/rss/

mysql -u apoena -p12345678 -e "SELECT MAX(CD_DOC) FROM apoena.DOC " > maximo
Total=`grep -c "" maximo`
let "Total = ( Total - 1 )"
tail -n $Total maximo > maximof
cdmaior=`cat maximof`
let "um = ( cdmaior + 1000 )"
let "dois = ( cdmaior + 2000 )"
let "tres = ( cdmaior + 30000 )"
let "quatro = ( cdmaior + 4000 )"
let "cinco = ( cdmaior + 5000 )"
let "seis = ( cdmaior + 60000 )"
let "sete = ( cdmaior + 7000 )"
let "oito = ( cdmaior + 8000 )"
let "nove = ( cdmaior + 9000 )"
let "dez = ( cdmaior + 10000 )"

cp /var/www/apache2-default/apoena/rss/processaArquivo-1.sh /var/www/apache2-default/apoena/rss/arquivo
cp /var/www/apache2-default/apoena/rss/processaArquivo-2.sh /var/www/apache2-default/apoena/rss/arquivo2
cp /var/www/apache2-default/apoena/rss/processaArquivo-3.sh /var/www/apache2-default/apoena/rss/arquivo3
cp /var/www/apache2-default/apoena/rss/processaArquivo-4.sh /var/www/apache2-default/apoena/rss/arquivo4
cp /var/www/apache2-default/apoena/rss/processaArquivo-5.sh /var/www/apache2-default/apoena/rss/arquivo5
cp /var/www/apache2-default/apoena/rss/processaArquivo-6.sh /var/www/apache2-default/apoena/rss/arquivo6
cp /var/www/apache2-default/apoena/rss/processaArquivo-7.sh /var/www/apache2-default/apoena/rss/arquivo7
cp /var/www/apache2-default/apoena/rss/processaArquivo-8.sh /var/www/apache2-default/apoena/rss/arquivo8
cp /var/www/apache2-default/apoena/rss/processaArquivo-9.sh /var/www/apache2-default/apoena/rss/arquivo9
cp /var/www/apache2-default/apoena/rss/processaArquivo-10.sh /var/www/apache2-default/apoena/rss/arquivo10

./processa1.sh $um > geral1 & ./processa2.sh $dois > geral2 & ./processa3.sh $tres > geral3 & ./processa4.sh $quatro > geral4 & ./processa5.sh $cinco > geral5 & ./processa6.sh $seis > geral6 & ./processa7.sh $sete > geral7 & ./processa8.sh $oito > geral8 & ./processa9.sh $nove > geral9 & ./processa10.sh $dez > geral10  
## LIMPA

cd /var/www/apache2-default/apoena/rss/
./processaCliping.sh > saidacliping

cd /var/www/apache2-default/apoena/rss/

./processaEstatistica.sh



