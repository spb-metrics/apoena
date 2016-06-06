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
	<script src="funcoes/apoena2.js" type="text/javascript"></script>
</head>

<body class="body">

<form name="form" method="post" action="{$php_self}">
	
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td align="center" colspan="2">
				<span CLASS="txtAzul12"> Tela MINERAÇÃO</span>
			</td>
		</tr>	
		<tr>	
			<td align="center" colspan="2">
				&nbsp;&nbsp;	
			</td>
		</tr>
		
	</table>
	{if $campo <> "5"}
	<BR><BR>

	<table >
		<tr>
			<td width="220">
			</td>
			<td>
				<br>
				<span CLASS="txtAzulClaro">Termo a ser Pesquisado </span>
				<br>
			   	<input CLASS="txtCompromissoAzul" type="text" size="20" maxlength="20" class="input" name="termo" >
			</td>
		</tr>
	</table>

		<br>

		<table>
			<tr>
				<td width="220">
				</td>

				<td align="left" width="200">
					<span CLASS="txtAzulClaro">DD&nbsp;&nbsp;&nbsp;</span><span CLASS="txtAzulClaro">MM</span><span CLASS="txtAzulClaro">&nbsp;&nbsp;AAAA </span>
					<br>
			   		<input CLASS="txtCompromissoAzul" type="text" size="2" maxlength="2" class="input" name="dia">
			   		<input CLASS="txtCompromissoAzul" type="text" size="2" maxlength="2" class="input" name="mes">
			   		<input CLASS="txtCompromissoAzul" type="text" size="4" maxlength="4" class="input" name="ano">
			   		<br>
					<span CLASS="txtAzulClaro">Data INICIAL da pesquisa</span>
	        	</td>

	        	<td align="left" width="200">  
					<span CLASS="txtAzulClaro">DD&nbsp;&nbsp;&nbsp;</span><span CLASS="txtAzulClaro">MM</span><span CLASS="txtAzulClaro">&nbsp;&nbsp;AAAA </span>
					<br>
	         	 	<input CLASS="txtCompromissoAzul" type="text" size="2" maxlength="2" class="input" name="dia2">
	         	 	<input CLASS="txtCompromissoAzul" type="text" size="2" maxlength="2" class="input" name="mes2">
	         	 	<input CLASS="txtCompromissoAzul" type="text" size="4" maxlength="4" class="input" name="ano2">
	         	 	<br>
					<span CLASS="txtAzulClaro">Data FINAL da pesquisa</span>
	        	</td>
	   		</tr>
	   	</table>

			<center>
		        <td align="left" width="200">  
		        	<br>
	        		<input type="button" CLASS="txtAlteraAzul" onclick="javascript:processaMineracao();" value="Pesquisar">
	   			</td>
			</center>
	   </tr>
   </table>

  <br><br><br>
    
</form>
{/if}

{if $campo == 5 }

<CENTER>
<span CLASS="txtAzul12" > Termos Pesquisado :  </span> { $termo } <span CLASS="txtAzul12" >- Data inicial :</span> { $data } <span CLASS="txtAzul12" >- Data final :</span> { $dataF}  
<br><br>
     <table>
     <tr>
			<td align="left">
				<span CLASS="txtAzul12"> FONTES: </span>
			</td>
			<td align="left">
				<span CLASS="txtAzul12"> QUANTIDADE DE DOCUMENTOS </span>
			</td>
	 </tr>
	 
     {foreach from=$minerfontes key=k item=codigo }
                        <tr bgcolor="{cycle values="#dedbdb,#dedbdb"}">
    	                    <td align="left">
        		                <span CLASS="txtCompromissoAzul" > {$minerfontes[$k]}</span>
                	        </td>
                    	    <td align="center">
                        	  <span CLASS="txtCompromissoAzul" > {$minerqtdoc[$k]} </span>
                         	</td>
                        </tr> 
						
	{/foreach}
	
</table>
</CENTER>

{/if}

</body>
</html>