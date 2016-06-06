
{config_load file="index.conf"}

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
			<span CLASS="txtAzulClaro"> Insira os Termos</span>
		</td>	
	</tr>
	<tr>
		<td>
			&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td align="left" width="90">
			<span CLASS="txtAzulClaro"> Nome Ontologia</span>	
		</td>
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
          		<input type="text" class="input" name="termo1">
        	</p>
      	</td>
    </tr>
	<tr>
	    <td align="left"> 
        	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo2">
        	</p>
      	</td>
    </tr>
    <tr>
	    <td align="left"> 
        	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo3">
        	</p>
      	</td>
    </tr>
    <tr>
	    <td align="left"> 
        	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo4">
        	</p>
      	</td>
    </tr>
    <tr>
	    <td align="left"> 
        	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo5">
        	</p>
      	</td>
    </tr>
    <tr>
	    <td align="left"> 
        	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo6">
        	</p>
      	</td>
    </tr>
    <tr>
	    <td align="left"> 
        	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo7">
        	</p>
      	</td>
    </tr>
    <tr>
	    <td align="left"> 
	       	<span CLASS="txtAzulClaro">Termo: </span>  
          		<input type="text" class="input" name="termo8">
        	</p>
      	</td>
    </tr>
    <tr>
	    <td align="left"> 
        	<span CLASS="txtAzulClaro">Termo: </span> 
          		<input type="text" class="input" name="termo9">
        	</p>
      	</td>
    </tr>
    <tr>
	    <td align="left"> 
        	<span CLASS="txtAzulClaro">Termo: </span> 
          		<input type="text" class="input" name="termo10">
        	</p>
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
	</tr>
</table>

</form>
</body>
</html>