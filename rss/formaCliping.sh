
Cabecalho() {


ano=`date +%Y`
mes=`date +%m`
dia=`date +%d`

hora=`date +%H`
minuto=`date +%M`

nomefinal="$pdsconto-$dia-$mes-$ano-$hora:$minuto"

echo "$pcdonto;;$nomefinal;;<html> "  > formandoclipping
echo " <head> "  >> formandoclipping
echo " <script type='text/javascript' src='funcoes/apoena.js' language='JavaScript'></script> "  >> formandoclipping
echo " </head> "  >> formandoclipping
echo " <body> "  >> formandoclipping
echo " <form name='form1' method='post' action='{$php_self}'> "  >> formandoclipping
echo " <input type='hidden' name='nomeOntologia' value='$pdsconto'> " >> formandoclipping
echo " <table width='778' cellpadding='0' CLASS='txtCompromissoAzul' > "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#22407B' size=4 > $pdsconto </font>" >> formandoclipping 
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping

ano=`date +%Y`
mes=`date +%m`
dia=`date +%d`

hora=`date +%H`
minuto=`date +%M`

datafinal="$dia-$mes-$ano-$hora:$minuto"



			
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#22407B' size=4 > Data de Atualização : $datafinal </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
			
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
##echo " <font color='#006FA8' size=2> " +calendario.getDataAtual()+ " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
			
			
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
						
echo " </table> "  >> formandoclipping
echo " <table width='778'  cellpadding='0'  CLASS='txtCompromissoAzul' > "  >> formandoclipping
}


Internacional() {

if [ $codigoInternacional -eq 1 ]
then

## echo " <table width='778'  cellpadding='0'  CLASS='txtCompromissoAzul' > "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping			
			
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#22407B' size=4 > Agência Internacional </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
			
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping

echo " <tr bgcolor='#dedbdb'>  "  >> formandoclipping
## echo " <td align='center' > "  >> formandoclipping
echo " <td> " >> formandoclipping
echo " <font color='#006FA8' size=2>Informação </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#006FA8' size=2>Fonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoInternacional=3

else

if [ $codigoInternacional -eq 2 ]
then
echo " <tr bgcolor='#ffffff'>  "  >> formandoclipping
echo " <td align='center' width=400 > " >> formandoclipping
echo " <input type='checkbox' name='internacional[]' value='$codigodocumento' > " >> formandoclipping
echo " <font color='#006FA8' size=2>" >> formandoclipping
echo " <a href='#$codigodocumento' > " >> formandoclipping
echo " '$nomettl' " >> formandoclipping
echo "  </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
cho " </td> "  >> formandoclipping
echo " <td align='center' width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoInternacional=3

else

if [ $codigoInternacional -eq 3 ]
then
echo " <tr bgcolor='#dedbdb'>  "  >> formandoclipping
##echo " <td align=\ " center\ " > "  >> formandoclipping
echo " <td width=400 > " >> formandoclipping
echo " <input type=checkbox name=internacional[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size=2 > " >> formandoclipping
echo " <a href='#$codigodocumento' > " >> formandoclipping
echo " $nomettl " >> formandoclipping 
echo " </a> " >> formandoclipping 
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoInternacional=3
fi
fi
fi
}	

Independente() {

if [ $codigoIndependente -eq 1 ]   
then
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#22407B' size=4 > Independente </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
			
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr bgcolor='#dedbdb'> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#006FA8' size=2> Informação </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align='center' > "  >> formandoclipping
echo " <font color='#006FA8' size=2> Fonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoIndependente=3

else

if [ $codigoIndependente -eq 2 ]
then
echo " <tr bgcolor='#dedbdb'>  "  >> formandoclipping
echo " <td align=\ " center\ " width=400 > "  >> formandoclipping
echo " <input type=checkbox name=independente[] value='$codigodocumento'> " >> formandoclipping
echo " <font color=#006FA8 size=2> " >> formandoclipping
echo " <a href=#$codigodocumento > " >> formandoclipping
echo "  $nomettl " >> formandoclipping
echo "  </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td width=50 >  "  >> formandoclipping
echo " <td align=\ " center\ " > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoIndependente=3

else

if [ $codigoIndependente -eq 3 ]
then
echo " <tr bgcolor='#dedbdb'>  "  >> formandoclipping
##echo " <td align=\ " center\ " > "  >> formandoclipping
echo " <td width=400 > " >> formandoclipping
echo " <input type=checkbox name=independente[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size=2 > " >> formandoclipping
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoIndependente=3
fi
fi
fi
}		

Comercial() { 

if [ $codigoComercial -eq 1 ]   
then
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#22407B' size=4 > Comercial</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr bgcolor='#dedbdb'> "  >> formandoclipping
echo " <td>  "  >> formandoclipping
echo " <font color='#006FA8' size=2> Informação </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align='center'> "  >> formandoclipping
echo " <font color='#006FA8' size=2> Fonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoComercial=3

else

if [ $codigoComercial -eq 2 ]
then
echo " <tr bgcolor='#ffffff'>  "  >> formandoclipping
##echo " <td align=\ " center\ " > "  >> formandoclipping
echo " <td width=400 > " >> formandoclipping
echo " <input type=checkbox name=comercial[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size=2 >  " >> formandoclipping
echo " < a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoComercial=3

else

if [ $codigoComercial -eq 3 ]
then
echo " <tr bgcolor='#dedbdb'>  "  >> formandoclipping
##echo " <td align=\ " center\ " > "  >> formandoclipping
echo " <td width=400 > " >>  formandoclipping
echo " <input type=checkbox name=comercial[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size='2' > " >> formandoclipping
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoComercial=3
fi
fi
fi		
}

Legislativo() {

if [ $codigoLegislativo -eq 1 ]   
then
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#22407B' size=4 > Legislativo</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr bgcolor='#dedbdb'> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#006FA8' size=2> Informação </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align='center' > "  >> formandoclipping
echo " <font color='#006FA8' size=2>Fonte</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoLegislativo=3

else

if [ $codigoLegislativo -eq 2 ]
then
echo " <tr bgcolor='#ffffff'>  "  >> formandoclipping
echo " <td align=\ " center\ " width=400 > "  >> formandoclipping
echo " <input type=checkbox name=legislativo[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size=2> " >> formandoclipping
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo "</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoLegislativo=3

else

if [ $codigoLegislativo -eq 3 ]
then
echo " <tr bgcolor='#dedbdb'>  "  >> formandoclipping
##echo " <td align=\ " center\ " > "  >> formandoclipping
echo " <td width=400 > " >> formandoclipping
echo " <input type=checkbox name=legislativo[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size='2' > " >> formandoclipping
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoLegislativo=3
fi
fi
fi
}

Judiciario() {

if [ $codigoJudiciario -eq 1 ]   
then
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#22407B' size=4 > Judiciário</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr bgcolor='#dedbdb'> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#006FA8' size=2>Informação</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align='center' > "  >> formandoclipping
echo " <font color='#006FA8' size=2>Fonte</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoJudiciario=3

else

if [ $codigoJudiciario -eq 2 ]
then
echo " <tr bgcolor='#ffffff'>  "  >> formandoclipping
echo " <td width=400 > "  >> formandoclipping
echo " <input type=checkbox name=judiciario[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size=2> " >> formandoclipping
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo "</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoJudiciario=3

else

if [ $codigoJudiciario -eq 3 ]
then
echo " <tr bgcolor='#dedbdb'>  "  >> formandoclipping
##echo " <td align=\ " center\ " > "  >> formandoclipping
echo " <td width=400 > " >> formandoclipping
echo " <input type=checkbox name=judiciario[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size=2> " >> formandoclipping
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoJudiciario=3
fi
fi
fi
}

Executivo() {

if [ $codigoExecutivo -eq 1 ]   
then
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#22407B' size=4 > Executivo</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr bgcolor='#dedbdb'> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#006FA8' size=2>Informação</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align='center' > "  >> formandoclipping
echo " <font color='#006FA8' size=2>Fonte</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoExecutivo=3

else

if [ $codigoExecutivo -eq 2 ]
then
echo " <tr bgcolor='#ffffff'>  "  >> formandoclipping
echo " <td align=\ " center\ " width=400 > "  >> formandoclipping
echo " <input type=checkbox name=executivo[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size='2' > " >> formandoclipping
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\  width=50 " > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoExecutivo=3

else

if [ $codigoExecutivo -eq 3 ]
then
echo " <tr bgcolor='#dedbdb'>  "  >> formandoclipping
##echo " <td align=\ " center\ " > "  >> formandoclipping
echo " <td width=400 > " >> formandoclipping
echo " <input type=checkbox name=executivo[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size='2' > " >> formandoclipping
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoExecutivo=3
fi
fi
fi
}

Partidaria() {

if [ $codigoPartidaria -eq 1 ]   
then
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#22407B' size=4 > Partidaria</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr bgcolor='#dedbdb'> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#006FA8' size=2>Informação</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align='center' > "  >> formandoclipping
echo " <font color='#006FA8' size=2>Fonte</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoPartidaria=3

else

if [ $codigoPartidaria -eq 2 ]
then
echo " <tr bgcolor='#ffffff'>  "  >> formandoclipping
echo " <td align=\ " center\ " width=400 > "  >> formandoclipping
echo " <input type=checkbox name=partidaria[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size='2' > " >> formandoclipping
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoPartidaria=3

else

if [ $codigoPartidaria -eq 3 ]
then
echo " <tr bgcolor='#dedbdb'>  "  >> formandoclipping
##echo " <td align=\ " center\ " > "  >> formandoclipping
echo " <td width=400 > " >> formandoclipping
echo " <input type=checkbox name=partidaria[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size='2'> " >> formandoclipping 
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoPartidaria=3
fi
fi
fi
}

Softwarelivre() {

if [ $codigoSoftwarelivre -eq 1 ]   
then
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#22407B' size=4 > Software Livre</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr bgcolor='#dedbdb'> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#006FA8' size=2>Informação</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align='center' > "  >> formandoclipping
echo " <font color='#006FA8' size=2>Fonte</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoSoftwarelivre=3

else

if [ $codigoSoftwarelivre -eq 2 ]
then
echo " <tr bgcolor='#ffffff'>  "  >> formandoclipping
echo " <td align=\ " center\ " width=400 > "  >> formandoclipping
echo " <input type=checkbox name=softwareLivre[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size='2' > " >> formandoclipping 
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping 
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoSoftwarelivre=3

else

if [ $codigoSoftwarelivre -eq 3 ]
then
echo " <tr bgcolor='#dedbdb'>  "  >> formandoclipping
##echo " <td align=\ " center\ " > "  >> formandoclipping
echo " <td width=400 > " >> formandoclipping
echo " <input type=checkbox name=softwareLivre[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size='2' > " >> formandoclipping
echo "<a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo "</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoSoftwarelivre=3
fi
fi
fi
}

Bancos() {

if [ $codigoBancos -eq 1 ]   
then
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#22407B' size=4 > Bancos</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr  bgcolor='#dedbdb'> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " <font color='#006FA8' size=2>Informação</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align='center' > "  >> formandoclipping
echo " <font color='#006FA8' size=2>Fonte</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoBancos=3

else

if [ $codigoBancos -eq 2 ]
then
echo " <tr bgcolor='#ffffff'>  "  >> formandoclipping
echo " <td align=\ " center\ " width=400 > "  >> formandoclipping
echo " <input type=checkbox name=bancos[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size='2' > " >> formandoclipping 
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo "</font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoBancos=3

else

if [ $codigoBancos -eq 3 ]
then
echo " <tr bgcolor='#dedbdb'>  "  >> formandoclipping
##echo " <td align=\ " center\ " > "  >> formandoclipping
echo " <td width=400 > " >> formandoclipping
echo " <input type=checkbox name=bancos[] value='$codigodocumento'> " >> formandoclipping
echo " <font color='#006FA8' size='2' > " >> formandoclipping 
echo " <a href='#$codigodocumento' > $nomettl </a> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " <td align=\ " center\ " width=50 > "  >> formandoclipping
echo " <font color='#006FA8' size=2> $nomefonte </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
codigoBancos=3
fi
fi
fi
}	

Processo() { 		
echo "<tr> " >> formandoclipping
echo " <td>&nbsp;" >> formandoclipping 
echo " </td> " >> formandoclipping
echo " </tr>" >> formandoclipping
echo " <tr> " >> formandoclipping
echo " <td align='center' colspan='2'> "  >> formandoclipping
echo "<input type='submit' name='botao' CLASS='txtAlteraAzul' value='processar' onclick='javascript:gerarClipping();'>" >> formandoclipping

echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <tr> "  >> formandoclipping
echo " <td> "  >> formandoclipping
echo " &nbsp; "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping

echo " <td> " >> formandoclipping
echo " <font color='red' size=4 > " >> formandoclipping
echo " <b> "  >> formandoclipping
echo " Sinopse das notícias </b> " >> formandoclipping
echo " </font> "  >> formandoclipping
echo " </td> "  >> formandoclipping
echo " </tr> "  >> formandoclipping
echo " </table> " >> formandoclipping 
echo " <br>" >> formandoclipping
}


Inicio() {

Totlist=`grep -c "" clipping`
echo $Totlist
let "Totlist = ($Totlist - 1)"
tail -n $Totlist clipping > guardaclipping
Total=$Totlist
for (( i=1; i<=$Totlist; i++ ))
do

echo $i

codigodocumento=`head -n 1 guardaclipping |
sed 's/<\/cddoc>[^>].*>//g ;
s/<cddoc>//g' ` 

codigotipofonte=`head -n 1 guardaclipping |
sed 's/<\/cdtipfont>[^>].*//g ;
 s/<cddoc>[^>].*>//g' `

codigofonte=`head -n 1 guardaclipping |
sed 's/<\/cdfont>[^>].*//g ;
 s/<cddoc>[^>].*>//g' `

nomefonte=`head -n 1 guardaclipping |
sed 's/<\/dscfont>[^>].*//g ;
 s/<cddoc>[^>].*>//g' `

codigoontologia=`head -n 1 guardaclipping |
sed 's/<\/cdont>[^>].*//g ;
 s/<cddoc>[^>].*>//g' `

nomettl=`head -n 1 guardaclipping |
sed 's/<\/ttl>[^>].*//g ;
 s/<cddoc>[^>].*>//g' `

if [ $codigotipofonte -eq 1 ]; 
then 
  Internacional
fi

if [ $codigotipofonte -eq 2 ]; 
then 
  Independente
fi

if [ $codigotipofonte -eq 3 ]; 
then 
  Comercial
fi

if [ $codigotipofonte -eq 4 ]; 
then 
  Legislativo
fi

if [ $codigotipofonte -eq 5 ]; 
then 
  Judiciario
fi

if [ $codigotipofonte -eq 6 ]; 
then 
  Executivo
fi

if [ $codigotipofonte -eq 7 ]; 
then 
  Partidaria
fi

if [ $codigotipofonte -eq 8 ]; 
then 
  Softwarelivre
fi

if [ $codigotipofonte -eq 9 ]; 
then 
  Bancos
fi

let "Total=($Total - 1)"
tail -n $Total clipping > guardaclipping

done

}

echo "" > formandoclipping
codigoInternacional=1
codigoIndependente=1
codigoComercial=1
codigoLegislativo=1
codigoExecutivo=1
codigoPartidaria=1
codigoSoftwarelivre=1
codigoBancos=1
codigoJudiciario=1


pcdonto=$1
pdsconto=$2
echo $pdsconto
Cabecalho
Inicio
Processo

##echo " </body> "  >> formandoclipping
##echo " </html> "  >> formandoclipping
