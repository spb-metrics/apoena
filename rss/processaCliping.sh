data=`date +%Y%m%d`

mysql -u root -p12345678 -e "SET NAMES UTF8 ; SELECT '<cdont>' , CD_ONT , '</cdont>' , '<dscont>' , NM_ONT , '</dscont>' FROM apoena.ONT ORDER BY CD_ONT "  > listaontologia 
 
Totalontologia=`wc -l < listaontologia `
numero=30

for (( i=2; $i<=$Totalontologia; i++ ))
do

linhaontologia=`sed -n ''$i'p' listaontologia `
cdontologia=`echo $linhaontologia |
sed 's/<\/cdont>[^>].*>//g ;
s/<cdont>//g' ` 

dscontologia=`echo $linhaontologia |
sed 's/<\/dscont>//g ;
 s/<cdont>[^>].*>//g' `


mysql -u root -p12345678 -e "SET NAMES UTF8 ;  SELECT '<cddoc>' , t1.CD_DOC , '</cddoc>' , '<cdtipfont>' ,  t1.CD_TIP_FONT , '</cdtipfont>' ,  '<cdfont>' , t1.CD_FONT , '</cdfont>' , '<enddoc>' , END_DOC , '</enddoc>' , '<dscfont>' , t4.DSC_FONT , '</dscfont>' , '<cdont>' , t3.CD_ONT , '</cdont>' , '<ttl>' , t1.TTL , '</ttl>' , '<cntd>' , t1.CNTD , '</cntd>' FROM apoena.DOC t1 , apoena.DOC_FORMT t2 , apoena.TRM t3 , apoena.FONT t4  WHERE t3.CD_ONT = '$cdontologia' AND t1.CD_DOC = t2.CD_DOC AND t1.DT_ATL > '$data' AND t3.NM_TRM = t2.PLV AND t1.CD_FONT = t4.CD_FONT GROUP BY   t1.CD_DOC ,  t1.CD_TIP_FONT ,   t1.CD_FONT , t3.CD_ONT , t1.TTL , t1.CNTD , t1.END_DOC , t4.DSC_FONT ORDER BY t3.CD_ONT , t1.CD_TIP_FONT , t1.CD_FONT  " > clipping

./formaCliping.sh $cdontologia "$dscontologia"

cp formandoclipping formandoclipping$i


cp clipping clipping2

./formaSnopse.sh


cp formandosnopse formandosnopse$i
cat formandoclipping$i formandosnopse$i > clippingformado$i.html

sed -i 's/\\n//g' clippingformado$i.html
sed -i 's/\\t//g' clippingformado$i.html


ano=`date +%Y`
mes=`date +%m`
dia=`date +%d`

hora=`date +%H`
minuto=`date +%M`

##nomefinal="$dscontologia-$dia-$mes-$ano-$hora:$minuto"

##var1="17;;ator01;;"
##var1="$cdontologia;;$nomefinal;;" 

##var2="2s/^/$var1/"

##sed -e $var2 bobo$i.html > clip


cp clippingformado$i.html /var/lib/mysql/apoena/clip



mysql -u root -p12345678 -e "  SET  character_set_database=utf8  ; LOAD DATA INFILE 'clip' INTO TABLE apoena.CLIP_ARQ FIELDS TERMINATED BY ';;'  LINES TERMINATED BY '@#@#' (CD_ONT, NM_CLP, ARQ )  "

##rm clip1 clip 


done


rm formando* clippingformado*
