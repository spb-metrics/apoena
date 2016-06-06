<?php /* Smarty version 2.6.6, created on 2009-08-31 09:53:21
         compiled from tipoUsuarioConsulta.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'tipoUsuarioConsulta.tpl', 1, false),array('function', 'cycle', 'tipoUsuarioConsulta.tpl', 78, false),)), $this); ?>
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
			 
			    Este programa está nomeado como tipoUsuarioConsulta.tpl e possui 88
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
			<span CLASS="txtAzul12"> Tela CONSULTA Tipo Usuário </span>
		</td>
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	<tr>	
		<td >
			&nbsp;&nbsp;	
		</td>
	</tr>
	<tr>
		<td align="left" width="135">
			<span CLASS="txtAzulClaro">Nome do Tipo Usuário: </span>
		</td>
		<td align="left" width="205">
			<span CLASS="txtAzulClaro">Descrição do Tipo de Usuário: </span>
		</td>
	</tr>
</table>	
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
	
	<?php if (count($_from = (array)$this->_tpl_vars['codTipoUsuario'])):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['codigo']):
?>
			    	
	 	<tr>
			<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedbdb,#dedbdb"), $this);?>
">
			<td width="120"> <span CLASS="txtAzulClaro"> <?php echo $this->_tpl_vars['nomeTipoUsuario'][$this->_tpl_vars['i']]; ?>
</span></a></td>
			<td width="185"> <span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['dscTipoUsuario'][$this->_tpl_vars['i']]; ?>
</span></td>
		</tr>
		
	<?php endforeach; unset($_from); endif; ?>
	    
</table>
</form>
</body>
</html>