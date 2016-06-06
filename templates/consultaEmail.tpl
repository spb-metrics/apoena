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
			 
			    Este programa está nomeado como consultaEmail.tpl e possui 91
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
<title>{#titulo#}</title>
<head>

<link rel=stylesheet href="funcoes/css/intranet.css" type="text/css">
<script src="funcoes/apoena.js" type="text/javascript"></script>
</head>

<body class="body">

<form name="form" method="post" action="{$php_self}" >

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	
	<tr>
		<td align="center" colspan="3">
			<span CLASS="txtAzul12"> Tela CONSULTA Email do Sistema Apoena </span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2">
			&nbsp;&nbsp;	
		</td>
	</tr>
	<tr>
		<td align="left" width="300">
			<span CLASS="txtAzulClaro">E-mail: </span>
		</td>
		<td align="left" width="300">
			<span CLASS="txtAzulClaro">Host: </span>
		</td>
		<td align="left" width="100">
			<span CLASS="txtAzulClaro">Porta: </span>
		</td>
	</tr>
</table>	
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
	
	{foreach from=$codConfig key=i item=codigo}
			    	
	 	<tr>
			<tr bgcolor="{cycle values="#dedbdb,#dedbdb"}">
			<td width="300"> <span CLASS="txtAzulClaro"> {$email[$i]}</span></a></td>
			<td width="300" colspan="2"><span CLASS="txtAzulClaro">{$host[$i]}</span></td>
			<td width="100	" colspan="2"><span CLASS="txtAzulClaro">{$porta[$i]}</span></td>
		</tr>
		
	{/foreach}
	    
</table>
</form>
</body>
</html>