<?php /* Smarty version 2.6.6, created on 2009-09-14 15:32:35
         compiled from alteraEmail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'alteraEmail.tpl', 1, false),)), $this); ?>
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
			 
			    Este programa está nomeado como alteraEmail.tpl e possui 214
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
">

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	<tr>
		<td align="center" colspan="3">
			<span CLASS="txtAzul12"> Tela ALTERA e_mail do APOENA gerado pela operadora</span>
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
		<td align="center" colspan="2">
			&nbsp;&nbsp;	
		</td>
	</tr>
	<tr>
		<td align="left">
			<span CLASS="txtAzulClaro">E_mail: </span>
		</td>
	</tr>
	<tr>
		<td align="left">
			<select name="emailConfiguracao" onchange="javascript:consultaEmail(this.value);">

			<option value=""></option>
				
				<?php if (count($_from = (array)$this->_tpl_vars['codConfiguracao'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>
						<option value="<?php echo $this->_tpl_vars['codConfiguracao'][$this->_tpl_vars['k']]; ?>
"><?php echo $this->_tpl_vars['e_mail'][$this->_tpl_vars['k']]; ?>
</option>
				<?php endforeach; unset($_from); endif; ?>
			</select>
		</td>
	</tr>
	    
</table>


<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	
	<?php if ($this->_tpl_vars['alteracao'] == 1): ?>
	
		<tr>
			<td align="left">
			             
				<span CLASS="txtAlteraAzul">E-mail</span>
			</td>	
		</tr>
		<tr>
			<td align="left">
				<input type="hidden" name="cdConfig" value="<?php echo $this->_tpl_vars['cdConfiguracao'][0]; ?>
">	
				<input type="text" size="50" class="input" name="emailApoena" value='<?php echo $this->_tpl_vars['email'][0]; ?>
'>
			</td>	
		</tr>
	
	<?php endif; ?>
	
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	
	<?php if ($this->_tpl_vars['alteracao'] == 1): ?>
	
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
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    <span CLASS="txtAlteraAzul">Auth</span>
			</td>	
		</tr>
		<tr>
			<td align="left">
					
				<input type="text" size="50" class="input" name="host" value='<?php echo $this->_tpl_vars['host'][0]; ?>
'> &nbsp;&nbsp;
				<input type="text" size="5" class="input" name="porta" value='<?php echo $this->_tpl_vars['porta'][0]; ?>
'>&nbsp;&nbsp;
				
				<select name="auth">
					<option value=""> </option>
						
					 	<?php if ($this->_tpl_vars['codigoAuth'][0] == 0): ?>
						
							<option value="0" selected> True</option>
							<option value="1"> False</option>
					 	<?php else: ?>
					 		<option value="0" > True</option>
							<option value="1" selected> False</option>
					 	<?php endif; ?>
					
				</select>
			</td>
				
		</tr>
	
	<?php endif; ?>
	
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	
	<?php if ($this->_tpl_vars['alteracao'] == 1): ?>
	
		<tr>
			<td align="left">
			    <span CLASS="txtAlteraAzul">Login</span>
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    <span CLASS="txtAlteraAzul">Senha</span>
			</td>
		</tr>
		<tr>
			<td align="left">
					
				<input type="text" class="input" name="login" value='<?php echo $this->_tpl_vars['login'][0]; ?>
'>&nbsp;&nbsp;
				<input type="text" class="input" name="senha" value='<?php echo $this->_tpl_vars['senha'][0]; ?>
'>
			</td>
			<td align="left">
				&nbsp;
			</td>
		</tr>
	
	<?php endif; ?>
	
</table>

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
    
    <?php if ($this->_tpl_vars['alteracao'] == 1): ?>
    
	    <tr>
	    	<td align="right" colspan="3"> 
	        	<p>
	          		<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="alterar">
	          	</p>
	      </td>
	    </tr>
	 <?php endif; ?>   	 

		<tr>	        	
	        <?php if ($this->_tpl_vars['operacao'] == 1): ?>
	        	
	        	<td align="center" colspan="3">	
	        		<span CLASS="txtAlteraAzul">Dados Alterados com Sucesso !</span>
	      		</td>
	      
	      	<?php elseif ($this->_tpl_vars['operacao'] == 2): ?>	
	      
	      		<td align="center" colspan="3">	
	        		<span CLASS="alerta">Preencha todos os campos !</span>
	      		</td>
	      	<?php endif; ?>	
	      		
	    </tr>
    
</table>

</form>
</body>
</html>