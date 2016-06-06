<?php /* Smarty version 2.6.6, created on 2010-07-13 17:57:49
         compiled from clipping.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'clipping.tpl', 1, false),)), $this); ?>
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
			 
			    Este programa está nomeado como clipping.tpl e possui 97
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
	<body>	
	<head>	
		<link rel=stylesheet href="funcoes/css/intranet.css" type="text/css">
		<script type="text/javascript" src="funcoes/apoena.js" language="JavaScript"></script>	
	</head>
	<table width="785" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td align="right">
				<a href="documentoControle.php?Submit=<?php echo 'voltar'; ?>
"> <span class='titulo'> Página Inicial </span></a>
			</td>	
		</tr>
	</table>
	<?php if ($this->_tpl_vars['resultado'] == 1): ?>
		<table width="785" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
			<tr>
				<td align="center">
					<span CLASS="alerta"> Clipping gerado com sucesso ! </span> 		
				</td>
			</tr>
		</table>
	<?php endif; ?>
	</body>
</html>

<?php echo $this->_tpl_vars['arquivo']; ?>
 
<?php echo $this->_tpl_vars['resumoClipping']; ?>

					
					
<?php if ($this->_tpl_vars['itens'] != 'branco'): ?>					
					
	<?php if ($this->_tpl_vars['totalResumo'] > 0): ?>					
		
		<?php if (count($_from = (array)$this->_tpl_vars['codigoResumo'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>
			<font color=#22407B size=4>Nome Resumo Clipping</font>&nbsp;&nbsp;<?php echo $this->_tpl_vars['nomeResumoClipping'][$this->_tpl_vars['k']]; ?>
				
			<?php echo $this->_tpl_vars['arquivoResumoClipping'][$this->_tpl_vars['k']]; ?>
			
		<?php endforeach; unset($_from); endif; ?>
						
	<?php endif; ?>					

<?php else: ?>					
<html>
	<body>	
	<head>	
		<link rel=stylesheet href="funcoes/css/intranet.css" type="text/css">
		<script type="text/javascript" src="funcoes/apoena.js" language="JavaScript"></script>	
	</head>
	<table width="785" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td align="center">
				<span CLASS="alerta"> Nenhuma notícia foi Selecionada </span> 		
			</td>
		</tr>
	</table>
	</body>
</html>


<?php endif; ?>			    			