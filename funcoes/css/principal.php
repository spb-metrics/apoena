<html>
<head>
<script language=javascript src="funcoes/js/funcoes.js"></script>
	<link rel="stylesheet" href="funcoes/css/intranet.css" type="text/css">
	<link rel="stylesheet" href="funcoes/css/telecentros.css" type="text/css">
<script language ="javascript" >
function verdata()
 { 
   var data_hoje=new Date();
   
   var dia = data_hoje.getDate();
   var semana=data_hoje.getDay();
   var mes= data_hoje.getMonth()+1;
   var ano= data_hoje.getFullYear;
   var anoatual= data_hoje.getFullYear();
   {
     dia_semana= new Array;
     dia_semana[0]="Domingo";
	 dia_semana[1]="Segunda";
	 dia_semana[2]="terça";
     dia_semana[3]="quarta";
	 dia_semana[4]="quinta";
	 dia_semana[5]="sexta";
     dia_semana[6]="Sábado";
	 
	 document.fdata.txtdata.value="Hoje é " + dia_semana[semana]  + " dia " 
	 +  dia + "/" + mes + "/" + anoatual
   };  
 };  


function horario()
 { 
   var hora_dia=new Date();
   var hora = hora_dia.getHours();
   var minuto=hora_dia.getMinutes();
   var segundo= hora_dia.getSeconds();
   if (hora < 10)
     {
	   hora="0" + hora;
	 };
   if (minuto < 10)	 
	 {
	   minuto="0" + minuto;
	 };
   if (segundo < 10)	 
	 {
	   segundo="0" + segundo;
	 };
    
	 document.fdata.txtrelogio.value=hora + ":" + minuto  + ":" + segundo;
	 window.setTimeout("horario()",1000);  // vai chamar a cada 1 segundo e rodar o relógio
 };
--> 
 </script>	


</head>
<body onLoad="verdata(),horario();">

<table>
<td width=80%><font face=verdana size=2> 
  <b><span style="BACKGROUND-COLOR: #fffff"><font color="#5266C5" face="Tahoma, arial" size="3">
  <marquee behavior="slide" bgColor="#fffff" scrollAmount="10" style="COLOR:#5266C5">Seja
  bem vindo ao Telecentro Comunitário</marquee>
  </font></span></b><font face="Tahoma, arial" size="2">
  <p align="justify">
  <form name="fdata"  >
			 	<table width="130" border="0" cellpadding="0" cellspacing="0" >
				<tr>	    
	    				<td>
	      				<input name="txtdata" size="25" disabled  border="0" class="MenuAzulBorda" ></td><td>           
	      				<input name="txtrelogio" size="8" disabled border="0" class="MenuAzulBorda" >
	      				</td>
	      		</tr>
	      		</table>
</form><br>
<?PHP  if (($_COOKIE['login']!= "")  &&  ($_COOKIE['data'] != "") && $_COOKIE['lasierd']>=1){?>
   Olá  <b><?PHP  echo $_COOKIE['login'];?>
   </b> sua última visita em nosso site foi em
     <?PHP  echo ($_COOKIE['data']) . ".";}?> <br /><br />
  Caro usuário se você deseja ter acesso ao ao site do <b> Telecentro </b>, 
  você terá que ser cadastrado pelo Administrador ou Monitor do Telecentro. 
  Caso ainda não exista	este funcionário em seu <b>Telecentro</b> entre em contato com o 
  suporte técnico no telefone:<b>(0XX61)3310-6754</b></p>
  <p align="justify">Obrigado, e tenha um bom dia!</p>
  		
  <br />
  <br />
 </td>
 </table>
 <table colspacing="2">
 <center><font color="red" size="3">Como usar o Google</center><br>
 <b><font color="blue" size="2" Caso você queira fazer uma pesquisa especifica no google usa as aspas.</b>
 <b>Se você quiser saber a cotação do milho em planaltina DF, digite:
 cotação "milho" "planaltina" "df"</b>
 
 </table>
<!-- Search Google -->
		<left>
		<FORM method=GET action="http://www.google.com/search" target="_self">
		<TABLE bgcolor="#FFFFFF"><tr><td>
		<A HREF="http://www.google.com/">
		<IMG SRC="http://www.google.com/logos/Logo_40wht.gif" border="0" width="90" height="60" title="Google" align="absmiddle"></A>
		<INPUT TYPE=text name=q size=31 value='cotação "milho" "planaltina" "df" ' maxlength=255 value="">
		<INPUT TYPE=hidden name=hl value="pt-BR">
		<INPUT type=submit name=btnG VALUE="Procurar">
		</td></tr></TABLE>
		</FORM>
		</left>
		<!-- Search Google -->
</body>		
</html>		