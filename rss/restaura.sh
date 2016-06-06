#!/bin/bash

cd muchado
ls > teste
if cat teste | grep -i "tabdoc.tar.gz"
then  
  
 mysql -u apoena -p12345678 -e "DELETE FROM apoena.DOC "
 mysql -u apoena -p12345678 -e "DELETE FROM apoena.DOC_FORMT "
 mysql -u apoena -p12345678 -e "DELETE FROM apoena.DOC_ONT "
 mysql -u apoena -p12345678 -e "DELETE FROM apoena.CLIP "
 mysql -u apoena -p12345678 -e "DELETE FROM apoena.CLIP_ARQ "
 mysql -u apoena -p12345678 -e "DELETE FROM apoena.STS "

 tar xvfz tabdoc.tar.gz  
 tar xvfz tabdocformt.tar.gz 
 tar xvfz tabdocont.tar.gz 
 tar xvfz tabclip.tar.gz 
 tar xvfz tabcliparq.tar.gz
 tar xvfz tabsts.tar.gz 
 cp  tabdoc tabdocformt tabdocont tabclip tabcliparq tabsts /var/lib/mysql/apoena/

 mysql -u apoena -p12345678 -e "LOAD DATA INFILE 'tabdoc' INTO TABLE apoena.DOC "
 mysql -u apoena -p12345678 -e "LOAD DATA INFILE 'tabdocformt' INTO TABLE apoena.DOC_FORMT "
 mysql -u apoena -p12345678 -e "LOAD DATA INFILE 'tabdocont' INTO TABLE apoena.DOC_ONT "
 mysql -u apoena -p12345678 -e "LOAD DATA INFILE 'tabclip' INTO TABLE apoena.CLIP "
 mysql -u apoena -p12345678 -e "LOAD DATA INFILE 'tabcliparq' INTO TABLE apoena.CLIP_ARQ "
 mysql -u apoena -p12345678 -e "LOAD DATA INFILE 'tabsts' INTO TABLE apoena.STS "

 rm tabdoc tabdocformt tabdocont tabclip tabcliparq tabsts teste
 cd /var/lib/mysql/apoena/
 rm tabdoc tabdocformt tabdocont tabclip tabcliparq tabsts

fi
