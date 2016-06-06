data=`date +%Y%m%d`

LimpaBase () {

mysql -u root -p12345678 -e "DELETE FROM apoena.STS WHERE DT_ATL_STS > '$data' "

}

EstatisticaTipoFonte () {

mysql -u root -p12345678 -e "SELECT '<qtd>' , count(CD_DOC) , '</qtd>' , '<cdtipfont>' , t1.CD_TIP_FONT , '</cdtipfont>' , '<nmfont>' , t2.NM_FONT , '</nmfont>' from apoena.DOC t1 , apoena.TIP_FONT t2 WHERE t1.CD_TIP_FONT = t2.CD_TIP_FONT AND DT_ATL > '$data' GROUP BY CD_TIP_FONT" > estatisticaTipoFonte

Totlist=`grep -c "" estatisticaTipoFonte`
let "Totlist = ($Totlist - 1)"
tail -n $Totlist estatisticaTipoFonte > lista1a

for (( i=1; i<=$Totlist; i++ ))
do

  let "conta2 = ($conta2 + 1)"
  sed -n "$conta2"p lista1a >  cabecalho11

sed -i 's/<\/qtd>/<\/qtd>\n/g' cabecalho11
sed -i 's/<\/cdtipfont>/<\/cdtipfont>\n/g' cabecalho11

sed -e '/<qtd>/,/<\/qtd>/!d' cabecalho11 > quantidade
sed -i 's/<qtd>//g' quantidade
sed -i 's/<\/qtd>//g' quantidade
sed -i '/^$/d' quantidade
qtd=`cat quantidade`
rm quantidade

sed -e '/<cdtipfont>/,/<\/cdtipfont>/!d' cabecalho11 > cdtipofonte
sed -i 's/<cdtipfont>//g' cdtipofonte
sed -i 's/<\/cdtipfont>//g' cdtipofonte
sed -i '/^$/d' cdtipofonte
cdtipfont=`cat cdtipofonte`
rm cdtipofonte

sed -e '/<nmfont>/,/<\/nmfont>/!d' cabecalho11 > nomefonte
sed -i 's/<nmfont>//g' nomefonte
sed -i 's/<\/nmfont>//g' nomefonte
sed -i '/^$/d' nomefonte
nmfont=`cat nomefonte`
rm nomefonte

## Total=`cat cabecalho11`
mysql -u root -p12345678 -e  "INSERT INTO apoena.STS ( CD_TIP_STS , CD_STS , VLR_VINC , VINC ) VALUES ( 3 , 3 ,  '$qtd' , '$nmfont' ) " 

done

}

EstatisticaFont () {
mysql -u root -p12345678 -e "SELECT '<qtd>' , count(CD_DOC), '<\/qtd>'  , '<cdfont>' , t1.CD_FONT , '<\/cdfont>' , '<nmfont>' , t2.DSC_FONT , '<\/nmfont>' FROM apoena.DOC t1 , apoena.FONT t2 WHERE t1.CD_FONT = t2.CD_FONT AND DT_ATL > '$data' GROUP BY t1.CD_FONT " > estatisticaFont

Totlist=`grep -c "" estatisticaFont`
let "Totlist = ($Totlist - 1)"
tail -n $Totlist estatisticaFont > lista1a

for (( i=1; i<=$Totlist; i++ ))
do

  let "conta2 = ($conta2 + 1)"
  sed -n "$conta2"p lista1a >  cabecalho11

sed -i 's/<\/qtd>/<\/qtd>\n/g' cabecalho11
sed -i 's/<\/cdfont>/<\/cdfont>\n/g' cabecalho11

sed -e '/<qtd>/,/<\/qtd>/!d' cabecalho11 > quantidade
sed -i 's/<qtd>//g' quantidade
sed -i 's/<\/qtd>//g' quantidade
sed -i '/^$/d' quantidade
qtd=`cat quantidade`
rm quantidade

sed -e '/<cdfont>/,/<\/cdfont>/!d' cabecalho11 > cdfonte
sed -i 's/<cdfont>//g' cdfonte
sed -i 's/<\/cdfont>//g' cdfonte
sed -i '/^$/d' cdfonte
cdfont=`cat cdfonte`
rm cdfonte

sed -e '/<nmfont>/,/<\/nmfont>/!d' cabecalho11 > nomefonte
sed -i 's/<nmfont>//g' nomefonte
sed -i 's/<\/nmfont>//g' nomefonte
sed -i '/^$/d' nomefonte
nmfont=`cat nomefonte`
rm nomefonte

mysql -u root -p12345678 -e  "INSERT INTO apoena.STS ( CD_TIP_STS , CD_STS , VLR_VINC , VINC ) VALUES ( 2 , 2 ,  '$qtd' , '$nmfont' ) "

done

}

data=`date +%Y%m%d`
LimpaBase
EstatisticaTipoFonte
EstatisticaFont
