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
			 
			    Este programa está nomeado como rssAlteracao.tpl e possui 195
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
			<span CLASS="txtAzul12"> Tela ALTERA RSS </span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2">
			&nbsp;&nbsp;	
		</td>
	</tr>
		<tr>
			<td align="left" width="42">
				<span CLASS="txtAzulClaro"> RSS</span>
			</td>
		</tr>
	</table>
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td align="left">
				<select name="selectRSS" onchange="javascript:consultaRSS(this.value);">
	
				<option value=""></option>
					
					{foreach from=$codRSS key=k item=codigo}
							<option value="{$codRSS[$k]}"=>{$endRSS[$k]}</option>
					{/foreach}
				</select>
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
	          	<input type="hidden" name="cdgRSS" value="{$codigoRSS}">
	          	<input type="text" size="70" class="input" name="enderecoRSS" value={$enderecoRSS}>
	        	</p>
	      	</td>
	     </tr>
	 </table>
	 <table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
	    <tr>
			<td align="left">
				<span CLASS="txtAzulClaro">Tipo de Fonte</span>	
			</td>
			<td align="left">
				<span CLASS="txtAzulClaro">Fonte</span>	
			</td>
			<td align="left">
				<span CLASS="txtAzulClaro">Tipo de Documento</span>	
			</td>
		</tr>
		<tr>
		
			<td align="left">
				<select name="selectTipoFonte">
	
				<option value=""></option>
					
					{foreach from=$codTipoFonte key=k item=codigo}
					 
					 	{if $codTipoFonte[$k] ==  $cdTipFont}
					
					 		<option value="{$codTipoFonte[$k]} | {$nomeTipoFonte[$k]}" selected>{$nomeTipoFonte[$k]}</option>
						{else}
							<option value="{$codTipoFonte[$k]} | {$nomeTipoFonte[$k]}">{$nomeTipoFonte[$k]}</option>
						{/if}
						
						
					{/foreach}
				</select>
			</td>
			<td align="left">	
				<select name="selectFonte">
	
				<option value=""></option>
					
					{foreach from=$codFonte key=y item=codigo}
						{if $codFonte[$y] ==  $cdFont}
							<option value="{$codFonte[$y]} | {$nomeFonte[$y]}" selected>{$nomeFonte[$y]}</option>
						{else}
							<option value="{$codFonte[$y]} | {$nomeFonte[$y]}">{$nomeFonte[$y]}</option>
						{/if}	
					{/foreach}
				</select>
			</td>
			<td align="left">	
				<select name="selectTipoDocumento">
	
				<option value=""></option>
					
					{foreach from=$codTipoDocumento key=j item=codigo}
						{if $codTipoDocumento[$j] ==  $cdTipDoc}	
							<option value="{$codTipoDocumento[$j]} | {$nomeTipoDocumento[$j]}" selected>{$nomeTipoDocumento[$j]}</option>
						{else}
							<option value="{$codTipoDocumento[$j]} | {$nomeTipoDocumento[$j]}">{$nomeTipoDocumento[$j]}</option>
						{/if}	
					{/foreach}
				</select>
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
	          		<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="alterar">
	          	</p>
	      </td>
	    </tr>
    </table>
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td align="center" colspan="2">
					{if $campo == 'branco'}
						<span CLASS="alerta">Todos os campos devem ser preenchidos</span>
					{/if}
			</td>	
		</tr>
		<tr>
			<td align="center" colspan="2">
					{if $resultado == 1}
						<span CLASS="txtCompromissoAzul">Dados alterados com sucesso</span>
					{/if}
			</td>	
		</tr>
	</table>
</form>
</body>
</html>