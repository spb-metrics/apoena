
cp /var/www/apache2-default/apoena/rss/arquivo/xxrss1.xml xxrss
sed -e '/<title>/,/<\/title>/!d' xxrss > noticiaentra	

sed -i 's/<title>//g' noticiaentra
sed -i 's/<\/title>//g' noticiaentra	 
sed -i '/^$/d' noticiaentra

titulo=`cat noticiaentra`

sed -e '/<description>/,/<\/description>/!d' xxrss > noticiaentra	

sed -i 's/<description>//g' noticiaentra
sed -i 's/<\/description>//g' noticiaentra	 
sed -i '/^$/d' noticiaentra

descricao=`cat noticiaentra`

mysql -u apoena -p12345678 -e "SELECT CD_DOC FROM apoena.DOC WHERE TTL = '$titulo' AND CNTD = '$descricao' " > valido

if cat valido | grep CD_DOC   
 then
   echo "noticia já cadastrada"
   exit 
fi

mysql -u apoena -p12345678 -e "SELECT MAX(CD_DOC) FROM apoena.DOC " > maximo

Total=`grep -c "" maximo` 
let "Total = ( Total - 1 )"
tail -n $Total maximo > maximof
cdmaior=`cat maximof`
let "cdmaior = ( cdmaior + 1 )"

echo $cdmaior


mysql -u apoena -p12345678 -e "insert into apoena.DOC ( CD_DOC , CD_FONT , CD_TIP_DOC , CD_TIP_FONT , CD_RSS , TTL , CNTD ) VALUES ( $cdmaior , 360 , 1 , 2 , 409 , '$titulo' , '$descricao'  ) "

sed -e '/<title>/,/<\/title>/!d' xxrss > noticiaentra2

sed -e '/<description>/,/<\/description>/!d' xxrss >> noticiaentra2

sed -i 's/<description>//g' noticiaentra2
sed -i 's/<\/description>//g' noticiaentra2
sed -i 's/<title>//g' noticiaentra2
sed -i 's/<\/title>//g' noticiaentra2 
sed -i 's/ /\n/g' noticiaentra2
# sed 'y/áÁàÀãÃâÂéÉêÊíÍóÓõÕôÔúÚçÇ/aAaAaAaAeEeEiIoOoOoOuUcC/' noticiaentra2 > noticiaentra3
sort -fbu noticiaentra2 > arquivof
cat arquivof | tr "[:lower:]" "[:upper:]" > arquivofinal

sed -i 's/\/n/,/g' arquivofinal

sed -i 's/,//g' arquivofinal 
sed -i 's/\.//g' arquivofinal
sed -i '/^$/d' arquivofinal

Total=`grep -c "" arquivofinal`


for (( i=1 ; i<=$Total ; i++))
do

sed -n "$i"p arquivofinal > palavra

palavra=`cat palavra`

mysql -u apoena -p12345678 -e "insert into apoena.DOC_FORMT ( CD_DOC , PLV , QUANT_PLV ) VALUES ( $cdmaior , '$palavra' , 1 )"

done

rm arquivof arquivofinal maximo maximof noticiaentra noticiaentra2 noticiaentra3 valido xxrss palavra
cd ..
cd arquivo/

./obterClipping.sh
