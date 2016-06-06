{config_load file="index.conf"}
<html>
<body>
<table>
	<tr>
		<td>
			<!--
				Software Apoena construído para gerar clippings de notícias.>
			    Copyright (C) <2008>  <Banco do Brasil>
			   
			    Este programa é software livre; você pode redistribuí-lo e/ou
			    modificá-lo sob os termos da Licença Pública Geral GNU, conforme
			    publicada pela Free Software Foundation; tanto a versão 2 da
			    Licença como qualquer versão mais nova.
			
			    Este programa é distribuído na expectativa de ser útil, mas SEM
			    QUALQUER GARANTIA; sem mesmo a garantia implícita de
			    COMERCIALIZAÇÃO ou de ADEQUAÇÃO A QUALQUER PROPÓSITO EM
			    PARTICULAR. Consulte a Licença Pública Geral GNU para obter mais
			    detalhes.
			 
			    Este programa está nomeado como default.tpl e possui 105
				linhas de código. 
			 
				Você deve ter recebido uma cópia da Licença Pública Geral GNU
				junto com este programa; se não, escreva para a Free Software
				Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
				02111-1307, USA
			    
				Contato: accrvianna@bb.com.br (Antônio Carlos C. R. Vianna - desenvolverdor do projeto)
				 		 j.mar.rap@gmail.com (José Marcelo P. de Araujo - desenvolverdor do projeto)
			-->	
		</td>
	</tr>
</table>
</body>
</html>
<html>
<html>
<head>
	<title>{#titulo#}</title>
	<link rel="stylesheet" href="funcoes/css/intranet.css" type="text/css">
	<link rel="stylesheet" href="funcoes/css/telecentros.css" type="text/css">
	<script language=javascript src="funcoes/js/funcoes.js"></script>
	<script language=javascript src="funcoes/js/menu.js"></script>
	{if $smarty.cookies.nivel gte $niveladm}
		<script language=javascript src="funcoes/js/menuArrays.js"></script>
	{elseif $smarty.cookies.nivel eq $nivelinst}
		<script language=javascript src="funcoes/js/menuArrays3.js"></script>
	{else}

		<script language=javascript src="funcoes/js/menuArrays2.js"></script>
	{/if}
{if $smarty.cookies.nivel > 2}
<script language="javascript">
	window.open('mensagem.php',null,'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,fullscreen=no,statusbar=no,resizable=no,width=300,height=140,top=150,left=400');
</script>
{/if}


</head>
<body marginwidth="0" marginheight="0" bottommargin="0" onLoad="writeMenus();" onResize="if (isNS4) nsResizeHandler();">
	<table width="777" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="777" colspan="3">
				<table width="777" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="240" height="105"><img src="img/imgOcara.png" width="240" height="105" border="0"></td>
						<td width="273" height="105"><img src="img/imgTesteira01.png" width="273" height="105" border="0"></td>
						<td width="267" height="105"><img src="img/imgTesteira02.png" width="267" height="105" border="0"></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width="130" height="300" bgcolor="#1A5F9D" align="center" valign="top">
			<table width="130" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td height="400">&nbsp;</td> 
				</tr>
				<tr>
					<td align="center"><a href="http://www.otun.org/" title="Otun - Open Technology Users Network"><img src="img/otun.png" border="0"  width="129" height="50"></a></td>
				</tr>
			</table></td>
			<td width="10" background="img/bgFimMenu.png">&nbsp;</td>
			<td width="640" bgcolor="#FFFFFF"><iframe name="tele01" src="img/bgOCara.png" id="tele01" width="640" frameborder="0"  height="430" ></iframe></td>
		</tr>
		<tr>
			<td height="29" background="img/bgRodape.gif" colspan="3">
				<table border="0" cellpadding="0" cellspacing="0" align="center">
					<tr>
						<td width="130">&nbsp;</td>
						<td><a href="http://www.debian.org"><img src="img/lgRodDebian.png" border="0" title="Debian" width="54" height="26"></a></td>
						<td><a href="http://www.mysql.org"><img src="img/lgRodMySQL.png" border="0" title="Mysql" width="46" height="26"></a></td>
						<td><a href="http://www.php.org"><img src="img/lgRodPhp.png" border="0" title="Php" width="45" height="26"></a></td>
						<td><a href="http://www.apache.org"><img src="img/lgRodApache.png" border="0" title="Apache" width="53" height="26"></a></td>
						<td><a href="http://www.mozilla.org"><img src="img/lgRodMozilla.png" border="0" title="Mozilla" width="37" height="26"></a></td>
					</tr>
				</table>
			 </td>
		</tr>
	</table>
</body>
</html>
