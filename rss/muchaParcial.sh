#!/bin/bash

 echo $1 > bobo
# mysql -u apoena -p12345678 -e "SELECT * FROM apoena.DOC WHERE DT_ATL < $1 " > muchado/tabdoc
# mysql -u apoena -p12345678 -e "SELECT * FROM apoena.DOC_FORMT WHERE DT_ATL < $1 " > muchado/tabdocformt
# mysql -u apoena -p12345678 -e "SELECT * FROM apoena.DOC_ONT WHERE DT_ATL < $1 "  > muchado/tabdocont
# mysql -u apoena -p12345678 -e "SELECT * FROM apoena.CLIP WHERE DT_ATL < $1 " > muchado/tabclip
# mysql -u apoena -p12345678 -e "SELECT * FROM apoena.CLIP_ARQ WHERE DT_ATL < $1 " > muchado/tabcliparq
# mysql -u apoena -p12345678 -e "SELECT * FROM apoena.STS WHERE DT_ATL_STS < $1 " > muchado/tabsts

# cd muchado

# tar cvfz tabdoc.tar.gz tabdoc 
# tar cvfz tabdocformt.tar.gz tabdocformt
# tar cvfz tabdocont.tar.gz tabdocont
# tar cvfz tabclip.tar.gz tabclip
# tar cvfz tabcliparq.tar.gz tabcliparq
# tar cvfz tabsts.tar.gz tabsts

# rm tabdoc
# rm tabdocformt 
# rm tabdocont
# rm tabclip
# rm tabcliparq
# rm tabsts

# mysql -u apoena -p12345678 -e "DELETE FROM apoena.DOC WHERE DT_ATL < $1 "
# mysql -u apoena -p12345678 -e "DELETE FROM apoena.DOC_FORMT WHERE DT_ATL < $1 "
# mysql -u apoena -p12345678 -e "DELETE FROM apoena.DOC_ONT WHERE DT_ATL < $1 "
# mysql -u apoena -p12345678 -e "DELETE FROM apoena.CLIP WHERE DT_ATL < $1"
# mysql -u apoena -p12345678 -e "DELETE FROM apoena.CLIP_ARQ WHERE DT_ATL < $1 "
# mysql -u apoena -p12345678 -e "DELETE FROM apoena.STS WHERE DT_ATL_STS < $1 "



