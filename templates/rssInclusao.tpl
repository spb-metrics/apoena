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
				<span CLASS="txtAzul12"> Tela INSERIR RSS </span>
			</td>
		</tr>	
		<tr>	
			<td align="center" colspan="2">
				&nbsp;&nbsp;	
			</td>
		</tr>
		<tr>
			<td align="left" width="42">
				<span CLASS="txtAzulClaro"> Tipo Fonte</span>
			</td>
			<td align="left" width="98">
				<span CLASS="txtAzulClaro"> Fonte</span>
			</td>
			<!--
			<td align="left" width="20">	
				<span CLASS="txtAzulClaro"> Tipo Documento</span>	
			</td>
			-->
		</tr>
	</table>
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td align="left">

				<select name="selectTipoFonte" onchange="javascript:consultaFontePorTipoFonte(this.value);">
				<!--
				<select name="selectTipoFonte">
				-->
				<option value=""></option>
					
					{foreach from=$codTipoFonte key=k item=codigo}
					
							{if $codTipoFonte[$k] == $codTFonte}
								<option value="{$codTipoFonte[$k]} | {$nomeTipoFonte[$k]} "  selected>{$nomeTipoFonte[$k]}</option>
							{else}	
								<option value="{$codTipoFonte[$k]} | {$nomeTipoFonte[$k]} "  >{$nomeTipoFonte[$k]}</option>
							{/if }
							
					
					{/foreach}
				</select>
				<select name="selectFonte">
	
				<option value=""></option>
					
					{foreach from=$codFonte key=y item=codigo}
							<option value="{$codFonte[$y]} | {$nomeFonte[$y]} "=>{$nomeFonte[$y]}</option>
					{/foreach}
				</select>
				<!--
				<select name="selectTipoDocumento">
	
				<option value=""></option>
					
					{foreach from=$codTipoDocumento key=i item=codigo}
							<option value="{$codTipoDocumento[$i]} | {$nomeTipoDocumento[$i]} "=>{$nomeTipoDocumento[$i]}</option>
					{/foreach}
				</select>
				-->
				
			</td>
		</tr>
	</table>
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td>
				&nbsp;&nbsp;
			</td>
		</tr>
		<tr>
			<td align="left">
				<span CLASS="txtAzulClaro">Endereço RSS: </span>	
			</td>
		</tr>
		<tr>
			<td align="left">  
	          	<input type="text" size="70" class="input" name="enderecoRSS">
	        	</p>
	      	</td>
	   </tr>
   </table>
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">   
	    <tr>
	    	<td>
	    		&nbsp;&nbsp;	
	    	</td>
	    </tr>
	    <tr>
	    	<td align="right" colspan="2"> 
	        	<p>
	        		<input type="button" CLASS="txtAlteraAzul" onclick="javascript:inserirRSS();" value="inserir">
	          	</p>
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