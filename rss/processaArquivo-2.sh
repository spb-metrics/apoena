

#!/bin/bash

Principal() {

# cd /var/www/apache2-default/apoena/rss/arquivo
 for file in *.xml
 do


 cp $file xxrss

 echo $file

sed -i 's/<cdfont>/\n<cdfont>\n/g' xxrss
sed -i 's/<\/cdfont>/\n<\/cdfont>\n/g' xxrss
sed -i 's/<cdtipfont>/\n<cdtipfont>\n/g' xxrss
sed -i 's/<\/cdtipfont>/\n<\/cdtipfont>\n/g' xxrss
sed -i 's/<cdtipdoc>/\n<cdtipdoc>\n/g' xxrss
sed -i 's/<\/cdtipdoc>/\n<\/cdtipdoc>\n/g' xxrss
sed -i 's/<cdrss>/\n<cdrss>\n/g' xxrss
sed -i 's/<\/cdrss>/\n<\/cdrss>\n/g' xxrss
sed -i 's/<endrss>/\n<endrss>\n/g' xxrss
sed -i 's/<\/endrss>/\n<\/endrss>\n/g' xxrss

sed -i 's/<item>/\n<item>\n/g' xxrss
##sed -i 's/<\/item>/\n<\/item>\n/g' xxrss
sed -i 's/<title>/\n<title>\n/g' xxrss
##sed -i 's/<\/title>/\n<\/title>\n/g' xxrss
sed -i 's/<link>/\n<link>\n/g' xxrss
##sed -i 's/<\/link>/\n<\/link>\n/g' xxrss
sed -i 's/<description>/\n<description>\n/g' xxrss
##sed -i 's/<\/description>/\n<\/desciption>\n/g' xxrss


## CABECALHO

sed -e '/<cdfont>/,/<\/cdfont>/!d' xxrss > codigofonte
sed -i 's/<cdfont>//g' codigofonte
sed -i 's/<\/cdfont>//g' codigofonte
sed -i '/^$/d' codigofonte
cdfonte=`cat codigofonte`
rm codigofonte

sed -e '/<cdtipfont>/,/<\/cdtipfont>/!d' xxrss > codigotipfonte
sed -i 's/<cdtipfont>//g' codigotipfonte
sed -i 's/<\/cdtipfont>//g' codigotipfonte
sed -i '/^$/d' codigotipfonte
cdtipfonte=`cat codigotipfonte`
rm codigotipfonte

sed -e '/<cdtipdoc>/,/<\/cdtipdoc>/!d' xxrss > codigotipdoc
sed -i 's/<cdtipdoc>//g' codigotipdoc
sed -i 's/<\/cdtipdoc>//g' codigotipdoc
sed -i '/^$/d' codigotipdoc
cdtipdoc=`cat codigotipdoc`
rm codigotipdoc

sed -e '/<cdrss>/,/<\/cdrss>/!d' xxrss > codigorss
sed -i 's/<cdrss>//g' codigorss
sed -i 's/<\/cdrss>//g' codigorss
sed -i '/^$/d' codigorss
cdrss=`cat codigorss`
rm codigorss

sed -e '/<endrss>/,/<\/endrss>/!d' xxrss > enderecorss
sed -i 's/<endrss>//g' enderecorss
sed -i 's/<\/endrss>//g' enderecorss
sed -i '/^$/d' enderecorss
endrss=`cat enderecorss`
rm enderecorss 

## PROCESSAMENTO

total=`grep -c '<title>' xxrss`  

i=1
while [ $i -le $total ];
 do
echo "$i"
i=$((i+1))

testetitulo=' '
testedescricao=' '

## TITULO

  sed -i "$(sed -n '/<title>/{=;q}' xxrss )s/<title>/<titlef>/g" xxrss
  sed -i "$(sed -n '/<\/title>/{=;q}' xxrss )s/<\/title>/<\/titlef>/g" xxrss
  sed -e '/<titlef>/,/<\/titlef>/!d' xxrss > testetitulo	
  sed -i 's/<titlef>//g' testetitulo
  sed -i 's/<\/titlef>//g' testetitulo	 
  sed -i '/^$/d' testetitulo
  cp testetitulo titulo
  titulo=`cat testetitulo`

## LINK

  sed -i "$(sed -n '/<link>/{=;q}' xxrss )s/<link>/<linkf>/g" xxrss
  sed -i "$(sed -n '/<\/link>/{=;q}' xxrss )s/<\/link>/<\/linkf>/g" xxrss
  sed -e '/<linkf>/,/<\/linkf>/!d' xxrss > testelink
  sed -i 's/<linkf>//g' testelink
  sed -i 's/<\/linkf>//g' testelink
  sed -i '/^$/d' testelink
  cp testelink link
  link=`cat link`

## DESCRICAO

  sed -i "$(sed -n '/<description>/{=;q}' xxrss )s/<description>/<descriptionf>/g" xxrss
  sed -i "$(sed -n '/<\/description>/{=;q}' xxrss )s/<\/description>/<\/descriptionf>/g" xxrss
  sed -e '/<descriptionf>/,/<\/descriptionf>/!d' xxrss > testedescricao	
  sed -i 's/<descriptionf>//g' testedescricao
  sed -i 's/<\/descriptionf>//g' testedescricao	 
  sed -i '/^$/d' testedescricao
  cp testedescricao descricao
  descricao=`cat testedescricao`



## CHECAGEM DE EXISTENCIA DE NOTICIA

valido=''

valido=`mysql -u apoena -p12345678 -e " SET NAMES UTF8 ; SELECT 'existe' FROM apoena.DOC WHERE CD_FONT = '$cdfonte' AND TTL = '$titulo' LIMIT 2 " `

let "cdmaior = ( cdmaior + 1 )" 

if [ "$valido" = '' ]   
 then
   Processamento
 else
   echo "Documento jah existe"  
   i=$((1000 + 1 ))
fi

sed -i 's/<titlef>/<titlegf>/g' xxrss
sed -i 's/<\/titlef>/<\/titlegf>/g' xxrss
sed -i 's/<descriptionf>/<descriptiongf>/g' xxrss
sed -i 's/<\/descriptionf>/<\descriptiongf>/g' xxrss
sed -i 's/<linkf>/<linkgf>/g' xxrss
sed -i 's/<\/linkf>/<\linkgf>/g' xxrss

done
done 
}

Processamento() {

## BUSCA DE CODIGO PARA INCLUSAO

####mysql -u apoena -p12345678 -e "SELECT MAX(CD_DOC) FROM apoena.DOC " > maximo

####  Total=`grep -c "" maximo`
####  let "Total = ( Total - 1 )"
####  tail -n $Total maximo > maximof
####  cdmaior=`cat maximof`
####  let "cdmaior = ( cdmaior + 1 )"

## INCLUSÃO DE NOTICIA


mysql -u apoena -p12345678 -e "SET NAMES UTF8 ;  insert into apoena.DOC ( CD_DOC , CD_FONT , CD_TIP_DOC , CD_TIP_FONT , CD_RSS , END_DOC , END_RSS , TTL , CNTD ) VALUES ( $cdmaior , '$cdfonte' , '$cdtipdoc' , '$cdtipfonte' , '$cdrss' , '$link' , '$endrss' ,  '$titulo' , '$descricao'  ) "           

## TRATAMENTO PARA INCLUSAO DE TERMOS

  cat titulo > arquivo
  cat descricao >> arquivo
  sed -i 's/ /\n/g' arquivo
  sed 'y/áÁàÀãÃâÂéÉêÊíÍóÓõÕôÔúÚçÇ/aAaAaAaAeEeEiIoOoOoOuUcC/' arquivo > arquivo1
  sed -i 's/(//' arquivo1
  sed -i 's/)//' arquivo1
  sed -i 's/\.//' arquivo1
  sed -i 's/;//' arquivo1
  sed -i 's/,//' arquivo1
#  sed -i 's/\///' arquivo1
#  sed -i 's/[//' arquivo1
#  sed -i 's/]//' arquivo1
  sed -i 's/{//' arquivo1
  sed -i 's/}//' arquivo1
  sed -i 's/://' arquivo1
  sed -i 's/?//' arquivo1
  sed -i 's/!//' arquivo1
  sort -fbu arquivo1 > arquivof
  cat arquivof | tr "[:lower:]" "[:upper:]" > arquivofinal
  sed -i 's/\/n/,/g' arquivofinal
  sed -i 's/,//g' arquivofinal
  sed -i 's/\.//g' arquivofinal
  sed -i '/^$/d' arquivofinal

## INCLUSAO DE PALAVRAS

  Palavra

##sed -i 's/<titlef>/<titlegf>/g' xxrss
##sed -i 's/<\/titlef>/<\/titlegf>/g' xxrss
##sed -i 's/<descriptionf>/<descriptiongf>/g' xxrss
##sed -i 's/<\/descriptionf>/<\descriptiongf>/g' xxrss

}

Palavra() {

  Total=`grep -c "" arquivofinal`
  for (( j=1 ; j<=$Total ; j++)) ; { 

  sed -n "$j"p arquivofinal > palavra

  palavra=`cat palavra`

  mysql -u apoena -p12345678 -e "insert into apoena.DOC_FORMT ( CD_DOC , PLV , QUANT_PLV ) VALUES ( $cdmaior , '$palavra' , 1 ) "
 }
}

Limpa() {
  
  rm arquivo arquivo1 arquivof arquivofinal xxrss palavra testedescricao testetitulo titulo descricao link testelink

}

##echo $1
cdmaior=$1
Principal
Limpa
