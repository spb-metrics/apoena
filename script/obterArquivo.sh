#!/bin/bash


CLASSPATH=.:/var/www/apache2-default/apoena/rss/arquivo/lib/antlr.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/jdbc2_0-stdext.jar           
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/jdom.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/log4j-1.2.8.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/mysql-connector-java-5.0.6-bin.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/postgresql-8.1-410.jdbc3.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/struts.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/taglibraries.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/templates.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/utilitarios.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/xml.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/fontesdados.jar 
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/hob.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/hsqldb.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/commons-beanutils.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/commons-collections-3.0.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/commons-digester.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/commons-fileupload.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/commons-lang.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/commons-logging.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/commons-resources.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/commons-validator.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/customizacao.jar
CLASSPATH=$CLASSPATH:/var/www/apache2-default/apoena/rss/arquivo/lib/customizacaoRecursos.jar
export CLASSPATH


for file in /var/www/apache2-default/apoena/rss/arquivo/*.xml
do


#***************************************
echo  $file
#***************************************

java RecebeArquivo $file 	

done


java GerarClipping



