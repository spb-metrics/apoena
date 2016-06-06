<?php /* Smarty version 2.6.6, created on 2010-09-06 14:46:25
         compiled from usuarioAlteracao.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'usuarioAlteracao.tpl', 1, false),)), $this); ?>
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
			 
			    Este programa está nomeado como usuarioAlteracao.tpl e possui 210
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
" >

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
	
	<tr>
		<td align="center" colspan="2">
			<span CLASS="txtAzul12"> Tela ALTERA Usuário </span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2">
			&nbsp;&nbsp;	
		</td>
	</tr>
	<tr>
		<td align="left">
			<span CLASS="txtAzulClaro">Nome do Usuário: </span>
		</td>
	</tr>
	<tr>
		<td align="left">
			<select name="codigoUsuario" onchange="javascript:consultaUsuario(this.value);">

			<option value=""></option>
				
				<?php if (count($_from = (array)$this->_tpl_vars['codUsuario'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>
				
						<option value="<?php echo $this->_tpl_vars['codUsuario'][$this->_tpl_vars['k']]; ?>
"=><?php echo $this->_tpl_vars['nomeUsuario'][$this->_tpl_vars['k']]; ?>
</option>
				<?php endforeach; unset($_from); endif; ?>
			</select>
		</td>
	</tr>
	    
</table>

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">

		<?php if ($this->_tpl_vars['consulta'] == 1): ?>
			<tr>
				<td>
					&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td align="left" width="143">
					<span CLASS="txtAzulClaro">Nome do Usuário: </span>
				</td>
				<td align="left" width="157">
					<span CLASS="txtAzulClaro">E_mail: </span>
				</td>
			</tr>
		<?php endif; ?>
</table>	
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">

	<?php if ($this->_tpl_vars['consulta'] == 1): ?>
		<tr>
		    <td align="left">  
	        	<input type="text" size="40" class="input" name="nomeUsu" value='<?php echo $this->_tpl_vars['nomeUsu'][0]; ?>
'>
	           	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        	<input type="text" size="48" class="input" name="email" value='<?php echo $this->_tpl_vars['email'][0]; ?>
'>
	        </td>
	        <td align="left">  
	        	<input type=hidden name="codUSU" value="<?php echo $this->_tpl_vars['codUsu'][0]; ?>
">
	        </td>
		</tr>
	<?php endif; ?>
	   
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">

		<?php if ($this->_tpl_vars['consulta'] == 1): ?>
	
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
			
		<?php endif; ?>
	
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">

	<?php if ($this->_tpl_vars['consulta'] == 1): ?>
		<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">	
			<tr>
				<td align="left">  
        			<input type="text" size="13" class="input" name="telResidencial" maxlength="13" value="<?php echo $this->_tpl_vars['telefoneCasa'][0]; ?>
" onkeypress="mascaraTelefone(this);">
         			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        			<input type="text" size="13" class="input" name="telComercial"  maxlength="13" value="<?php echo $this->_tpl_vars['telefoneTrabalho'][0]; ?>
" onkeypress="mascaraTelefone(this);">
         			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        			<input type="text" size="13" class="input" name="celular" maxlength="13" value="<?php echo $this->_tpl_vars['celular'][0]; ?>
" onkeypress="mascaraTelefone(this);">
        		</td>
			</tr>
		</table>
	<?php endif; ?>
	    
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">	
	
	<?php if ($this->_tpl_vars['consulta'] == 1): ?>
	<tr>
		<td align="left">
			<span CLASS="txtAzulClaro">Tipo do Usuário: </span>
		</td>
	</tr>
	<tr>
    	<td align="left">
			<select name="codTUsuario">

			<option value=""></option>
				
				<?php if (count($_from = (array)$this->_tpl_vars['codTipUsuario'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>
						<option value="<?php echo $this->_tpl_vars['codTipUsuario'][$this->_tpl_vars['k']]; ?>
" selected><?php echo $this->_tpl_vars['nomeTipUsuario'][$this->_tpl_vars['k']]; ?>
</option>
				<?php endforeach; unset($_from); endif; ?>
			</select>
		</td>
    </tr>
    <?php endif; ?>
    
</table>  
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
    
    <?php if ($this->_tpl_vars['consulta'] == 1): ?>
    
	    <tr>
	    	<td align="right"> 
	        	<p>
	          		<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="alterar">
	          	</p>
	      </td>
	    </tr>
    <?php endif; ?>
    
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
				<?php if ($this->_tpl_vars['resultado'] == 1): ?>
					<span CLASS="txtCompromissoAzul">Dados alterados com SUCESSO !!!</span>
				<?php endif; ?>
		</td>	
	</tr>
</table>
</form>
</body>
</html>