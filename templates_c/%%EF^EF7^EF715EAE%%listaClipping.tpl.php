<?php /* Smarty version 2.6.6, created on 2010-08-26 17:03:35
         compiled from listaClipping.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'listaClipping.tpl', 1, false),array('function', 'cycle', 'listaClipping.tpl', 84, false),)), $this); ?>
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
			 
			    Este programa está nomeado como listaClipping.tpl e possui 141
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
		<td align="right" colspan="2">
			<span CLASS="txtAzul12"> Tela CONSULTA Clipping </span>
		</td>
		<td align="right">
			<a href="documentoControle.php?Submit=<?php echo 'voltar'; ?>
"> <span class='titulo'> Página Inicial </span></a>
		</td>
	</tr>
</table>

<?php if ($this->_tpl_vars['tipoClipping'] == 1): ?>

	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>	
			<td align="center" colspan="2">
				&nbsp;&nbsp;	
			</td>
		</tr>
		<tr>
			<td align="left" width="140">
				<span CLASS="txtAzulClaro">Nome do Clipping: </span>
			</td>
			<td align="left" width="100">
				<span CLASS="txtAzulClaro">Nome Ontologia: </span>
			</td>
		</tr>
	</table>	
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    

	
		<?php if (count($_from = (array)$this->_tpl_vars['codigoClipping'])):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['codigo']):
?>
				    	
		 	<tr>
				<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedbdb,#dedbdb"), $this);?>
">
				<td  width="205"> <span CLASS="txtAzulClaro" > <a href="documentoControle.php?cdClipping=<?php echo $this->_tpl_vars['codigoClipping'][$this->_tpl_vars['i']]; ?>
&Submit=<?php echo 'VisualizarClipping'; ?>
"> <?php echo $this->_tpl_vars['nomeClipping'][$this->_tpl_vars['i']]; ?>
</span></a></td>
				<td width="145" colspan="2"><span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['nomeOntologia'][$this->_tpl_vars['i']]; ?>
</span></td>
			</tr>
			
		<?php endforeach; unset($_from); endif; ?>
		
	</table>	
	
<?php else: ?>

	 <table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>	
			<td align="center">
				&nbsp;&nbsp;	
			</td>
		</tr>
		<tr>
			<td align="left" >
				<span CLASS="txtAzulClaro">Nome do Clipping: </span>
			</td>
		</tr>
	</table>	
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    

		<?php if (count($_from = (array)$this->_tpl_vars['codigoClipping'])):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['codigo']):
?>
				    	
		 	<tr>
				<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedbdb,#dedbdb"), $this);?>
">
				<td>  <span CLASS="txtAzulClaro" > <a href="documentoControle.php?cdClippingGeral=<?php echo $this->_tpl_vars['codigoClipping'][$this->_tpl_vars['i']]; ?>
&Submit=<?php echo 'VisualizarClippingGeral'; ?>
"> <?php echo $this->_tpl_vars['nomeClipping'][$this->_tpl_vars['i']]; ?>
</span></a></td>
			</tr>
		<?php endforeach; unset($_from); endif; ?>
		
	</table>
	    
<?php endif; ?>    

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
	
	<tr>
		<td>
		&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td>
		&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td width="145"><?php echo $this->_tpl_vars['arquivo']; ?>
</td>
	</tr>

</table>

</form>
</body>
</html>