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
			 
			    Este programa está nomeado como usuarioInclusao.tpl e possui 181
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

<form name="form" method="post" action="{$php_self}" onSubmit="return valida_e_mail(this);">

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	
	<tr>
		<td align="center" colspan="2">
			<span CLASS="txtAzul12"> Tela INCLUIR Usuário </span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2">
			&nbsp;&nbsp;	
		</td>
	</tr>
	<tr>
		<td align="left" width="140">
			<span CLASS="txtAzulClaro">Nome do Usuário: * </span>
		</td>
		<td align="left" width="160">
			<span CLASS="txtAzulClaro">E_mail: *</span>
		</td>
	</tr>
</table>	
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">	
	<tr>
		<td align="left">  
        	<input type="text" size="40"class="input" name="nomeUsuario" value='{$nomeUsuario}'>
        	&nbsp;&nbsp;&nbsp;
        	<input type="text" size="48" class="input" name="email" value='{$email}'>
        </td>
        
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">	
	<tr>
		<td align="left" width="20">  
        	<span CLASS="txtAzulClaro">Telefone Residencial: </span>
        </td>
      	<td align="left" width="50">  
        	<span CLASS="txtAzulClaro">Telefone Cormercial: </span>
        </td>
        <td align="left" width="180">  
        	<span CLASS="txtAzulClaro">Celular: </span>
        </td>
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">	
	<tr>
		<td align="left">  
        	<input type="text" size="13" class="input" name="telResidencial" value='{$telResidencial}' maxlength="13" onkeypress="mascaraTelefone(this);">
         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	<input type="text" size="13" class="input" name="TelComercial" value='{$TelComercial}' maxlength="13" onkeypress="mascaraTelefone(this);">
         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	<input type="text" size="13" class="input" name="celular" value='{$celular}'maxlength="13" onkeypress="mascaraTelefone(this);">
        </td>
	</tr>
</table>

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">	
	<tr>
		<td align="left">
			<span CLASS="txtAzulClaro">Código do Tipo do Usuário: * </span>
		</td>
		<td align="left">
			<span CLASS="txtAzulClaro">Senha para Acesso: * </span>
		</td>
		<td align="left">
			<span CLASS="txtAzulClaro">Descrição Usuário: </span>
		</td>
		
	</tr>
	<tr>
    	<td align="left">
			<select name="codTipoUsuario">

			<option value=""></option>
				
				{foreach from=$codTipoUsuario key=k item=codigo}
						<option value="{$codTipoUsuario[$k]}"=>{$nomeTipoUsuario[$k]}</option>
				{/foreach}
			</select>
		</td>
		<td align="left">
			<input type="password" size="11" maxlength="10" class="input" name="NovaSenha" value='{$NovaSenha}' >
		</td>
		<td align="left">
			<input type="input" size="40" class="input" name="descricao" value='{$descricao}'>
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
    	<td align="left"> 
        	<p>
          		<span CLASS="txtAzulClaro"><h2>* Campos Obrigatórios</h2></span>
          	</p>
      </td>
    </tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	<tr>
		<td align="center">
		             
				{if $campo == 'branco'}
					<span CLASS="alerta">Todos os campos devem ser preenchidos</span>
				{/if}
		</td>	
	</tr>
	<tr>
		<td align="center">
		             
				{if $validacaoEmail == 'branco'}
					<span CLASS="alerta">O Email inserido esta incorreto</span>
				{/if}
		</td>	
	</tr>
	
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