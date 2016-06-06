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
			 
			    Este programa está nomeado como fonteInclusao.tpl e possui 124
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
		<td align="center" colspan="2">
			<span CLASS="txtAzul12"> Tela INSERIR Fonte </span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2">
			&nbsp;&nbsp;	
		</td>
	</tr>
	<tr>
		<td align="left" width="90">
			<span CLASS="txtAzulClaro"> Nome Tipo Fonte</span>	
		</td>
		<td align="left" width="100">
			<span CLASS="txtAzulClaro"> Fonte </span>	
		</td>
	</tr>	
			
	</tr>	
		
		<td align="left" width="90">
		
			<select name="nomeTipoFonte">
				<option value=""></option>
				
				{foreach from=$codTipoFonte key=k item=codigo}
						<option value="{$codTipoFonte[$k]}"=>{$nomeTipoFonte[$k]}</option>
				{/foreach}
			</select>
		</td>
		<td align="left" width="100">   
    	    	<input type="text" size="70" class="input" name="nomeFonte" value="">
        </td>
	</tr>
	<tr>
		<td>
			&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
    	<td align="right" colspan="2"> 
        	<p>
          		<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="incluir">
        	</p>
      </td>
    </tr>
</table>		
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">				
	<tr>
		<td align="center"  colspan="2">
			{if $campo == 'branco'}
				<span CLASS="alerta">Todos os campos devem ser preenchidos</span>
			{/if}
		</td>	
	</tr>
	<tr>
		<td align="center"  colspan="2">
			{if $resultado == 1}
				<span CLASS="txtCompromissoAzul">Dados incluidos com sucesso</span>
			{/if}
		</td>	
	</tr>
	<tr>
		<td align="center"  colspan="2">
			{if $campoNome == "existe"}
				<span CLASS="alerta">Esta Fonte já foi incluída</span>
			{/if}
		</td>	
	</tr>
</table>
</form>
</body>
</html>