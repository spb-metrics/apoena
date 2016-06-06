<?php /* Smarty version 2.6.6, created on 2010-01-27 14:04:41
         compiled from usuarioInclusao.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'usuarioInclusao.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "index.conf"), $this);?>

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
<title><?php echo $this->_config[0]['vars']['titulo']; ?>
</title>
<head>

<link rel=stylesheet href="funcoes/css/intranet.css" type="text/css">
<script src="funcoes/apoena.js" type="text/javascript"></script>
</head>

<body class="body">

<form name="form" method="post" action="<?php echo $this->_tpl_vars['php_self']; ?>
" onSubmit="return valida_e_mail(this);">

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
        	<input type="text" size="40"class="input" name="nomeUsuario" value='<?php echo $this->_tpl_vars['nomeUsuario']; ?>
'>
        	&nbsp;&nbsp;&nbsp;
        	<input type="text" size="48" class="input" name="email" value='<?php echo $this->_tpl_vars['email']; ?>
'>
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
        	<input type="text" size="13" class="input" name="telResidencial" value='<?php echo $this->_tpl_vars['telResidencial']; ?>
' maxlength="13" onkeypress="mascaraTelefone(this);">
         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	<input type="text" size="13" class="input" name="TelComercial" value='<?php echo $this->_tpl_vars['TelComercial']; ?>
' maxlength="13" onkeypress="mascaraTelefone(this);">
         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	<input type="text" size="13" class="input" name="celular" value='<?php echo $this->_tpl_vars['celular']; ?>
'maxlength="13" onkeypress="mascaraTelefone(this);">
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
				
				<?php if (count($_from = (array)$this->_tpl_vars['codTipoUsuario'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>
						<option value="<?php echo $this->_tpl_vars['codTipoUsuario'][$this->_tpl_vars['k']]; ?>
"=><?php echo $this->_tpl_vars['nomeTipoUsuario'][$this->_tpl_vars['k']]; ?>
</option>
				<?php endforeach; unset($_from); endif; ?>
			</select>
		</td>
		<td align="left">
			<input type="password" size="11" maxlength="10" class="input" name="NovaSenha" value='<?php echo $this->_tpl_vars['NovaSenha']; ?>
' >
		</td>
		<td align="left">
			<input type="input" size="40" class="input" name="descricao" value='<?php echo $this->_tpl_vars['descricao']; ?>
'>
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
		             
				<?php if ($this->_tpl_vars['campo'] == 'branco'): ?>
					<span CLASS="alerta">Todos os campos devem ser preenchidos</span>
				<?php endif; ?>
		</td>	
	</tr>
	<tr>
		<td align="center">
		             
				<?php if ($this->_tpl_vars['validacaoEmail'] == 'branco'): ?>
					<span CLASS="alerta">O Email inserido esta incorreto</span>
				<?php endif; ?>
		</td>	
	</tr>
	
	<tr>
		<td align="center">
				<?php if ($this->_tpl_vars['resultado'] == 1): ?>
					<span CLASS="txtCompromissoAzul">Dados inseridos com sucesso</span>
				<?php endif; ?>
		</td>	
	</tr>
	
	
	
	
</table>
</form>
</body>
</html>