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
			 
			    Este programa está nomeado como thesaurosInclusao.tpl e possui 160
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
			<span CLASS="txtAzul12"> Tela INSERIR Termo </span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2">
			&nbsp;&nbsp;	
		</td>
	</tr>
	<tr>
		<td align="left" width="90">
			<span CLASS="txtAzulClaro"> Nome Ontologia</span>	
		</td>
	</tr>
	<tr>	
		<td align="left" width="688">
		
			<select name="nomeOntologia">
				<option value=""></option>
				
				{foreach from=$codOntologia key=k item=codigo}
						<option value="{$codOntologia[$k]}"=>{$nomeOntologia[$k]}</option>
				{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;&nbsp;
		</td>
	</tr>
</table>		
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">	
	<tr>
	    <td align="left">   
        	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo1"><br>
        	
       			<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo2"><br>
   		
   		    	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo3"><br>

	        	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo4"><br>

	        	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo5"><br>

	        	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo6"><br>

	        	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo7"><br>

		       	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo8"><br>

	        	<span CLASS="txtAzulClaro">Termo: </span> 
          		<input type="text" class="input" name="termo9"><br>

	        	<span CLASS="txtAzulClaro">Termo: </span> 
          		<input type="text" class="input" name="termo10"><br>
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
          		<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="inserir">
        	</p>
      </td>
    </tr>
    
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">				
	<tr>
		<td align="center"  colspan="2">
			{if $resultado == 1}
				<span CLASS="txtCompromissoAzul">Dados inseridos com sucesso</span>
			{/if}
		</td>
		
		<td align="center"  colspan="2">
			{if $validacaoOntologia == 1}
				<span CLASS="alerta">Escolha uma Ontologia</span>
			{/if}
		</td>
		<td align="center"  colspan="2">
			{if $validacaoOntologia == 2}
				<span CLASS="alerta">O termo {$termoConsultado} já foi incluído</span>
			{/if}
		</td>
		<td align="center"  colspan="2">
			{if $validacaoOntologia == 3}
				<span CLASS="alerta">Preencha o(s) campo(s) Nome Termo</span>
			{/if}
		</td>
	</tr>
</table>

</form>
</body>
</html>