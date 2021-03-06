#!/bin/bash

 mysql -u apoena -p12345678 -e "SELECT * FROM apoena.DOC " > muchado/tabdoc
 mysql -u apoena -p12345678 -e "SELECT * FROM apoena.DOC_FORMT" > muchado/tabdocformt
 mysql -u apoena -p12345678 -e "SELECT * FROM apoena.DOC_ONT"  > muchado/tabdocont
 mysql -u apoena -p12345678 -e "SELECT * FROM apoena.CLIP " > muchado/tabclip
 mysql -u apoena -p12345678 -e "SELECT * FROM apoena.CLIP_ARQ " > muchado/tabcliparq
 mysql -u apoena -p12345678 -e "SELECT * FROM apoena.STS  " > muchado/tabsts

cd muchado

 tar cvfz tabdoc.tar.gz tabdoc 
 tar cvfz tabdocformt.tar.gz tabdocformt
 tar cvfz tabdocont.tar.gz tabdocont
 tar cvfz tabclip.tar.gz tabclip
 tar cvfz tabcliparq.tar.gz tabcliparq
 tar cvfz tabsts.tar.gz tabsts

 rm tabdoc
 rm tabdocformt 
 rm tabdocont
 rm tabclip
 rm tabcliparq
 rm tabsts

 mysql -u apoena -p12345678 -e "DELETE FROM apoena.DOC "
 mysql -u apoena -p12345678 -e "DELETE FROM apoena.DOC_FORMT "
 mysql -u apoena -p12345678 -e "DELETE FROM apoena.DOC_ONT "
 mysql -u apoena -p12345678 -e "DELETE FROM apoena.CLIP "
 mysql -u apoena -p12345678 -e "DELETE FROM apoena.CLIP_ARQ "
 mysql -u apoena -p12345678 -e "DELETE FROM apoena.STS "



