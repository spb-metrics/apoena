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
			 
			    Este programa está nomeado como cadastroEmail.tpl e possui 160
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
		<td align="center" colspan="3">
			<span CLASS="txtAzul12"> Tela INSERIR e_mail do APOENA gerado pela operadora</span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2">
			&nbsp;&nbsp;	
		</td>
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	<tr>
		<td align="left">
		             
			<span CLASS="txtAlteraAzul">E-mail</span>
		</td>	
	</tr>
	<tr>
		<td align="left">
				
			<input type="text" size="50" class="input" name="emailApoena" value='{$emailApoena[0]}'>
		</td>	
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	<tr>
		<td align="left">
		    <span CLASS="txtAlteraAzul">Host</span>
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;
		    <span CLASS="txtAlteraAzul">Porta</span>
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <span CLASS="txtAlteraAzul">Auth</span>
		</td>	
	</tr>
	<tr>
		<td align="left">
				
			<input type="text" size="50" class="input" name="host" value=''> &nbsp;&nbsp;
			<input type="text" size="5" class="input" name="porta" value=''>&nbsp;&nbsp;
			<select name="auth">
				<option value=""></option>
				<option value="0">True</option>
				<option value="1">False</option>
			</select>
		</td>
			
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	<tr>
		<td align="left">
		    <span CLASS="txtAlteraAzul">Login</span>
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <span CLASS="txtAlteraAzul">Senha</span>
		</td>
	</tr>
	<tr>
		<td align="left">
				
			<input type="text" class="input" name="login" value=''>&nbsp;&nbsp;
			<input type="text" class="input" name="senha" value=''>
		</td>
		<td align="left">
			&nbsp;
		</td>
		
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
    <tr>
    	<td align="right" colspan="3"> 
        	<p>
          		<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="cadastrar">
          	</p>
      </td>
    </tr>
    <tr>
    	 
        	
        {if $operacao == 1}
        	
        	<td align="center" colspan="3">	
        		<span CLASS="txtAlteraAzul">Dados Inseridos com Sucesso !</span>
      		</td>
      
      	{elseif $operacao == 2}	
      
      		<td align="center" colspan="3">	
        		<span CLASS="alerta">Preencha todos os campos !</span>
      		</td>
      	{/if}	
      		
    </tr>
    
    
</table>

</form>
</body>
</html>