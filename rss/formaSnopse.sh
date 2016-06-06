
Processo() {

echo " <table width=778 cellpadding='0'  CLASS='txtCompromissoAzul' >" >> formandosnopse  
echo " <tr bgcolor='#dedbdb'>  "  >> formandosnopse
echo " <td> "  >> formandosnopse
echo " <font color='#006FA8' size=2><a name='$codigodocumento' id='$codigodocumento' href='$enddoc' > $nomettl </a></font> "  >> formandosnopse
echo " </td> "  >> formandosnopse
echo " </tr> "  >> formandosnopse
echo " <tr bgcolor='#ffffff'>  "  >> formandosnopse
echo " <td> "  >> formandosnopse
echo " <font color='#006FA8' size=2> $nomecntd </font> "  >> formandosnopse
echo " </td> "  >> formandosnopse
echo " </tr> "  >> formandosnopse

}	

Inicio() {

Totlist=`grep -c "" clipping2`
echo $Totlist
let "Totlist = ($Totlist - 1)"
tail -n $Totlist clipping2 > guardaclipping2
Total=$Totlist
for (( i=1; i<=$Totlist; i++ ))
do

echo $i

codigodocumento=`head -n 1 guardaclipping2 |
sed 's/<\/cddoc>[^>].*>//g ;
s/<cddoc>//g' ` 

enddoc=`head -n 1 guardaclipping2 |
sed 's/<\/enddoc>[^>].*//g ;
 s/<cddoc>[^>].*>//g' `

nomettl=`head -n 1 guardaclipping2 |
sed 's/<\/ttl>[^>].*//g ;
 s/<cddoc>[^>].*>//g'  `

nomecntd=`head -n 1 guardaclipping2 |
sed 's/<\/cntd>//g ;
 s/<cddoc>[^>].*>//g' `

Processo

let "Total = ($Total - 1)"
tail -n $Total clipping2 > guardaclipping2

done

}

echo "" > formandosnopse

Inicio

echo " </body> "  >> formandosnopse
echo " </html>" >> formandosnopse
echo "\n"  >> formandosnopse
