#!/bin/sh

function obterRSS {

export http_proxy=http://C1109963:99161006@cache.bb.com.br:80 

Totcabec=0
mysql -u root -e "SELECT CONCAT( '<cabecalhorss> <cdrss>' , CD_RSS , '</cdrss>' , '<endrss>' , END_RSS , '</endrss>' , '<cdtipdoc>' , CD_TIP_DOC , '</cdtipdoc>' , '<dsctip>' , DSC_TIP , '</dsctip>' , '<cdfont>' ,  CD_FONT , '</cdfont>' , '<dscfont>' , DSC_FONT , '</dscfont>','<cdtipfont>', CD_TIP_FONT, '</cdtipfont>','<nmtipfont>', NM_TIP_FONT , '</nmtipfont> </cabecalhorss>' ) FROM apoena.RSS WHERE STS = 1 AND CD_RSS < 50 ORDER BY CD_RSS " > /var/www/apache2-default/apoena/rss/cabec-tmp
iconv -f iso-8859-1 -t utf-8 /var/www/apache2-default/apoena/rss/cabec-tmp > /var/www/apache2-default/apoena/rss/cabec-tmp1

Totcabec=`grep -c "" /var/www/apache2-default/apoena/rss/cabec-tmp1`
let "Totcabec=Totcabec-1"
tail -n $Totcabec /var/www/apache2-default/apoena/rss/cabec-tmp1 > /var/www/apache2-default/apoena/rss/cabec

Totlist=0
mysql -u root -e "SELECT CONCAT('http://', END_RSS) FROM apoena.RSS WHERE STS = 1 AND CD_RSS < 50 ORDER BY CD_RSS" > /var/www/apache2-default/apoena/rss/lista2

Totlist=`grep -c "" /var/www/apache2-default/apoena/rss/lista2`
let "Totlist=Totlist-1"
tail -n $Totlist /var/www/apache2-default/apoena/rss/lista2 > /var/www/apache2-default/apoena/rss/lista

cd arquivo
Sufx=0
captura=" "

for ((i=1; i<=$Totlist; i++))   
do
  
  sed -n "$i"p /var/www/apache2-default/apoena/rss/lista >  /var/www/apache2-default/apoena/rss/cabecalho2	
  wget --header='Accept-Charset: iso-8859-1' -i /var/www/apache2-default/apoena/rss/cabecalho2 -P /var/www/apache2-default/apoena/rss/arquivo/
  ls /var/www/apache2-default/apoena/rss/arquivo/ | grep -v obterArquivo.sh|  grep -v obterClipping.sh | grep -v GerarClipping.class | grep -v xxrss | grep -v lista | grep -v tempor | grep -v cabe | grep -v apoena | grep -v lib | grep -v RecebeArquivo.class | grep -v tempo > /var/www/apache2-default/apoena/rss/arquivo/tempo

  arquivo=`cat /var/www/apache2-default/apoena/rss/arquivo/tempo`


  cat /var/www/apache2-default/apoena/rss/arquivo/$arquivo > /var/www/apache2-default/apoena/rss/arquivo/tmp$i 

  let "Sufx=Sufx+1" 

  sed -n "$Sufx"p /var/www/apache2-default/apoena/rss/cabec > /var/www/apache2-default/apoena/rss/arquivo/xxcabe$i
 
  cat /var/www/apache2-default/apoena/rss/arquivo/tmp$i > /var/www/apache2-default/apoena/rss/arquivo/xtemp



  # if para conversao de padroes

  if cat /var/www/apache2-default/apoena/rss/arquivo/tmp$i | grep "US-ASCII"
    then

    iconv -f us-ascii -t utf-8 /var/www/apache2-default/apoena/rss/arquivo/tmp$1 > /var/www/apache2-default/apoena/rss/arquivo/xtemp
  fi


  if cat /var/www/apache2-default/apoena/rss/arquivo/tmp$i | grep "ISO-8859-1"
    then

    iconv -f iso-8859-1 -t utf-8 /var/www/apache2-default/apoena/rss/arquivo/tmp$i > /var/www/apache2-default/apoena/rss/arquivo/xtemp
  fi

  if cat /var/www/apache2-default/apoena/rss/arquivo/tmp$i | grep "us-ascii"
    then

    iconv -f iso-8859-1 -t utf-8 /var/www/apache2-default/apoena/rss/arquivo/tmp$i > /var/www/apache2-default/apoena/rss/arquivo/xtemp
  fi

  if cat /var/www/apache2-default/apoena/rss/arquivo/tmp$i | grep "iso-8859-1"
    then

    iconv -f iso-8859-1 -t utf-8 /var/www/apache2-default/apoena/rss/arquivo/tmp$i > /var/www/apache2-default/apoena/rss/arquivo/xtemp
  fi

  /var/www/apache2-default/apoena/rss/./busca1

  cat /var/www/apache2-default/apoena/rss/arquivo/xtemp >  /var/www/apache2-default/apoena/rss/arquivo/srss$i.xml 

  #separa as tags
  sed 's/></> </g' /var/www/apache2-default/apoena/rss/arquivo/srss$i.xml > /var/www/apache2-default/apoena/rss/arquivo/ssrs$i.xml

  #quebra linha antes da tag <item>
  sed 's/<item/ \n&/g' /var/www/apache2-default/apoena/rss/arquivo/ssrs$i.xml > /var/www/apache2-default/apoena/rss/arquivo/rs$i.xml	

  #retira apenas o que esta nas tag <item>
  sed -n '/<item/{:a;/<\/item>/!{N;ba;};p;}' /var/www/apache2-default/apoena/rss/arquivo/rs$i.xml  > /tmp/temporario$i.xml

  #concatena a tag <apoena> + cabecalho + conteudo + tag </apoena>
  cat /var/www/apache2-default/apoena/rss/apini /var/www/apache2-default/apoena/rss/arquivo/xxcabe$i /tmp/temporario$i.xml /var/www/apache2-default/apoena/rss/apfim > /var/www/apache2-default/apoena/rss/arquivo/xxxtemp


  # retirar o que esta entre a tags 
  sed '/<a href/{/<\/a>/{s/<a href.*<\/a>//;t};:a;/<\/a>/!{N;s/\n//;ta;};s/<a href.*<\/a>/\n/;}' /var/www/apache2-default/apoena/rss/arquivo/xxxtemp > /var/www/apache2-default/apoena/rss/arquivo/xxtemp1
  sed '/<guid/{/<\/guid>/{s/<guid.*<\/guid>//;t};:a;/<\/guid>/!{N;s/\n//;ta;};s/<guid.*<\/guid>/\n/;}' /var/www/apache2-default/apoena/rss/arquivo/xxtemp1 > /var/www/apache2-default/apoena/rss/arquivo/xxtemp2
  sed '/<IMG>/{/>/{s/<IMG>.*>//;t};:a;/>/!{N;s/\n//;ta;};s/<IMG>.*>/\n/;}' /var/www/apache2-default/apoena/rss/arquivo/xxtemp2 > /var/www/apache2-default/apoena/rss/arquivo/xxtemp3
  sed '/<A HREF/{/<\/A>/{s/<A HREF.*<\/A>//;t};:a;/<\/A>/!{N;s/\n//;ta;};s/<A HREF.*<\/A>/\n/;}' /var/www/apache2-default/apoena/rss/arquivo/xxtemp3 > /var/www/apache2-default/apoena/rss/arquivo/xxtemp4
  sed '/<A HREF/{/<A>/{s/<A HREF.*<A>//;t};:a;/<A>/!{N;s/\n//;ta;};s/<A HREF.*<A>/\n/;}' /var/www/apache2-default/apoena/rss/arquivo/xxtemp4 > /var/www/apache2-default/apoena/rss/arquivo/xxtemp5
  sed '/<img/{/>/{s/<img.*>//;t};:a;/>/!{N;s/\n//;ta;};s/<img.*>/\n/;}' /var/www/apache2-default/apoena/rss/arquivo/xxtemp5 > /var/www/apache2-default/apoena/rss/arquivo/xxtemp6
  sed '/<table/{/<\/table>/{s/<table.*<\/table>//;t};:a;/<\/table>/!{N;s/\n//;ta;};s/<table>.*<\/table>/\n/;}' /var/www/apache2-default/apoena/rss/arquivo/xxtemp6 > /var/www/apache2-default/apoena/rss/arquivo/xxtemp7
  sed '/<div/{/>/{s/<div.*>//;t};:a;/>/!{N;s/\n//;ta;};s/<div.*>/\n/;}' /var/www/apache2-default/apoena/rss/arquivo/xxtemp7 > /var/www/apache2-default/apoena/rss/arquivo/xxtemp8
  sed '/<author/{/<\/author>/{s/<author.*<\/author>//;t};:a;/<\/author>/!{N;s/\n//;ta;};s/<author.*<\/author>/\n/;}' /var/www/apache2-default/apoena/rss/arquivo/xxtemp8 > /var/www/apache2-default/apoena/rss/arquivo/xxtemp9
  sed '/<p/{/>/{s/<p.*>//;t};:a;/>/!{N;s/\n//;ta;};s/<p.*>/\n/;}' /var/www/apache2-default/apoena/rss/arquivo/xxtemp9 > /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  
 
  # retira tag 
  sed -i 's/<\/div>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<blockquote>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<\/blockquote>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<small>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<empr/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<empresa>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<\/empresa>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<i>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<\/i>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp 
  sed -i 's/<I>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<b>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<b>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<\/b>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<\/B>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/&amp;amp;nbsp;/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<Br>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<BR>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<br\/>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<br>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<\/p>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<br \/>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<\/rss>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<channel>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp 
  sed -i 's/<\/channel>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<content:encoded>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<\/content:encoded>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/&/&amp;/g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/&amp;quot;/&amp;/g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/&amp;quot;amp;/&amp;/g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/&amp;quot;amp;amp;/&amp;/g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/&nbsp;/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<!--/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/-->/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<!\[CDATA/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/\[/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<span/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<\/span>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp 
  sed -i 's/\]\]>/ /g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<description>     <\/description>/<description>SEM DESCRICAO<\/description>/g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<description \/>/<description>SEM DESCRICAO<\/description>/g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<description><\/description>/<description>SEM DESECRIÇÃO<\/description>/g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp 
  sed -i 's/<description> <\/description>/<description>SEM DESCRIÇÃO<\/description>/g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp 
  sed -i 's/<description xml:lang="pt-br"\/>/<description>SEM DESCRIÇÃO<\/description>/g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp
  sed -i 's/<description xml:lang="pt-br">/<description>/g' /var/www/apache2-default/apoena/rss/arquivo/xxtemp


iconv -f iso-8859-1 -t utf-8 /var/www/apache2-default/apoena/rss/arquivo/xxtemp > /var/www/apache2-default/apoena/rss/arquivo/xxxxxtemp	

  cat /var/www/apache2-default/apoena/rss/arquivo/xxxxxtemp > /var/www/apache2-default/apoena/rss/arquivo/xxrss$i.xml  	

  rm  /var/www/apache2-default/apoena/rss/arquivo/srss*  /var/www/apache2-default/apoena/rss/arquivo/tmp*  /var/www/apache2-default/apoena/rss/arquivo/xtemp  /var/www/apache2-default/apoena/rss/arquivo/xxcabe*  /var/www/apache2-default/apoena/rss/arquivo/tempo /var/www/apache2-default/apoena/rss/arquivo/xxtemp* /tmp/temporario* /var/www/apache2-default/apoena/rss/arquivo/rs* /var/www/apache2-default/apoena/rss/arquivo/ss* /var/www/apache2-default/apoena/rss/arquivo/rss* /var/www/apache2-default/apoena/rss/arquivo/xxxtemp

ls /var/www/apache2-default/apoena/rss/arquivo/  |grep -v processarArquivo.sh |grep -v xxrss | grep -v RecebeArquivo | grep -v obterClipping.sh |    grep -v GerarClipping | grep -v apoena | grep -v lib | grep -v obterArquivo.sh  > /var/www/apache2-default/apoena/rss/arquivo/tempor   

  captura=`cat /var/www/apache2-default/apoena/rss/arquivo/tempor` 
  rm /var/www/apache2-default/apoena/rss/arquivo/$captura /var/www/apache2-default/apoena/rss/arquivo/tempor  

  done


}


function inserirDados{

CLASSPATH=.:/var/www/apache2-default/apoena/rss/arquivo/lib/mysql-connector-java-5.0.6-bin.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/postgresql-8.1-410.jdbc3.jar
export CLASSPATH

cd /var/www/apache2-default/apoena/rss/arquivo/

for file in /var/www/apache2-default/apoena/rss/arquivo/*.xml
do


#***************************************
echo  $file
#***************************************

java RecebeArquivo $file 	

done


java GerarClipping

}




obterRSS
#*********************
 echo Baixou os RSS
#*********************

inserirDados

#*********************
 echo Inseriu os dados
#*********************


