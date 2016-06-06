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
		<td>
			&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td align="left" width="89">
			<span CLASS="txtAzulClaro">Nome do Clipping: </span>
		</td>
		<td align="left" width="201">
			<span CLASS="txtAzulClaro">Descrição do Clipping: </span>
		</td>
	</tr>
</table>	
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">	
	<tr>
		<td align="left">  
        	<input type="text" class="input" name="nomeOntologia">
        </td>
      	<td align="left">  
        	<input type="text" size="48" class="input" name="descricao">
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
    	<td align="right"> 
        	<p>
          		<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="inserir">
          	</p>
      </td>
    </tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	<tr>
		<td align="center">
				{if $resultado == 1}
					<span CLASS="txtCompromissoAzul">Dados inseridos com sucesso</span>
				{/if}
		</td>	
	</tr>
</table>
</form>
</body>
</html>