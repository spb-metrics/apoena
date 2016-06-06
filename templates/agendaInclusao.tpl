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
			 
			    Este programa está nomeado como rssInclusao.tpl e possui 183
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

<form name="form" method="post" action="{$php_self}">
	
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td align="center" colspan="2">
				<span CLASS="txtAzul12"> Tela AGENDAMENTO</span>
			</td>
		</tr>	
		<tr>	
			<td align="center" colspan="2">
				&nbsp;&nbsp;	
			</td>
		</tr>
		
	</table>

	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
    <br><br><br><br>
		<tr>
			<td width="180">
	        </td>
			<td>
				<span CLASS="txtCompromissoAzul">Uma vez por dia</span><br>
				<span CLASS="txtAzulClaro">Hora</span><br>
			   	<input CLASS="txtCompromissoAzul" type="text" size="2" maxlength="2" class="input" name="hora" onkeypress="mascaraAgendamento(this);">
				<span CLASS="txtCompromissoAzul">: 00</span>
	           	<br>
	           	<input type="button" CLASS="txtAlteraAzul" onclick="javascript:processaRodada();" value="Inserir">
	        </td>
<!--	   </tr>
   </table>
  
  <br><br><br>
    
   <table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr> 
-->			<td>
				<span CLASS="txtCompromissoAzul">Duas vezes por dia</span><br>
				<span CLASS="txtAzulClaro">Horas</span><br>
			   	<input CLASS="txtCompromissoAzul" type="text" size="2" maxlength="2" class="input" name="hora1">
				<span CLASS="txtCompromissoAzul">: 00 </span> &nbsp;&nbsp;&nbsp;&nbsp;
			   	<input CLASS="txtCompromissoAzul" type="text" size="2" maxlength="2" class="input" name="hora2">
				<span CLASS="txtCompromissoAzul">: 00</span>
				<br>
<!--        </td>
	   </tr>
	   <tr>
			<td align="left">  
-->	          	<input type="button" CLASS="txtAlteraAzul" onclick="javascript:processaRodada2();" value="Inserir">
	        </td>
	        
	   </tr>
   </table>
  	
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td align="center" colspan="2">
					{if $campo == "branco"}
						<span CLASS="alerta"> Todos os campos devem ser preenchidos</span>
					{/if}
			</td>	
		</tr>
		<tr>
			<td align="center" colspan="2">
					{if $validador == "contem"}
						<span CLASS="alerta"> Endereço RSS já existe na base de dados</span>
					{/if}
			</td>	
		</tr>
		<tr>
			<td align="center" colspan="2">
					{if $campoRSS == "http"}
						<span CLASS="alerta"> Insira o endereço RSS sem o http://</span>
					{/if}
			</td>	
		</tr>
		
		<tr>
			<td align="center" colspan="2">
					{if $resultado == 1}
						<span CLASS="txtCompromissoAzul">Dados inseridos com sucesso</span>
					{/if}
			</td>	
		</tr>
	</table>
</form>
</body>
</html>