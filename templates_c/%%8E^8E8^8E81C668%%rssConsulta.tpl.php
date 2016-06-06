<?php /* Smarty version 2.6.6, created on 2010-07-13 16:50:45
         compiled from rssConsulta.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'rssConsulta.tpl', 1, false),array('function', 'cycle', 'rssConsulta.tpl', 74, false),)), $this); ?>
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
			 
			    Este programa está nomeado como rssConsulta.tpl e possui 121
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
			<span CLASS="txtAzul12"> Tela CONSULTA RSS </span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2">
			&nbsp;&nbsp;	
		</td>
	</tr>
	<tr>
		<td width='3%'></td>
		<td width='60%'><span CLASS="txtAzulClaro"> Endereço do RSS </span></td>
		<td width='20%'><span CLASS="txtAzulClaro"> Fonte </span></td>
		<td width='10%'><span CLASS="txtAzulClaro"> Tipo Fonte </span></td>
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	</tr>
		
		
		<?php if (count($_from = (array)$this->_tpl_vars['codRSS'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>
						
			<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#D0D0D0,#B0B0B0"), $this);?>
">
			
			<?php if ($this->_tpl_vars['status'][$this->_tpl_vars['k']] == '1'): ?>
			
				<td width='3%'><input type=checkbox name=itensRSS[] value='<?php echo $this->_tpl_vars['codRSS'][$this->_tpl_vars['k']]; ?>
' checked></td>
				<td width='37%'>&nbsp;<?php echo $this->_tpl_vars['endRSS'][$this->_tpl_vars['k']]; ?>
</td>
				<td width='47%'>&nbsp;<?php echo $this->_tpl_vars['nomeFonte'][$this->_tpl_vars['k']]; ?>
</td>
				<td width='27%'>&nbsp;<?php echo $this->_tpl_vars['nomeTipoFonte'][$this->_tpl_vars['k']]; ?>
</td>
			<?php else: ?>
				
				<td width='3%'><input type=checkbox name=itensRSS[] value='<?php echo $this->_tpl_vars['codRSS'][$this->_tpl_vars['k']]; ?>
'></td>
				<td width='37%'>&nbsp;<?php echo $this->_tpl_vars['endRSS'][$this->_tpl_vars['k']]; ?>
</td>
				<td width='47%'>&nbsp;<?php echo $this->_tpl_vars['nomeFonte'][$this->_tpl_vars['k']]; ?>
</td>
				<td width='27%'>&nbsp;<?php echo $this->_tpl_vars['nomeTipoFonte'][$this->_tpl_vars['k']]; ?>
</td>
		
			<?php endif; ?>
			
			
		<?php endforeach; unset($_from); endif; ?>
	</tr>
	<tr>
		<td>
			&nbsp;&nbsp;
		</td>
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
    <tr>
    	<td align="right" colspan="2"> 
        	<p>
          		<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="processar">
          	</p>
      </td>
    </tr>
    
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	<tr>
		<td align="center" colspan="2">
				<?php if ($this->_tpl_vars['resultado'] == 1): ?>
					<span CLASS="txtCompromissoAzul">Status do tipo de documento alterado com sucesso</span>
				<?php endif; ?>
		</td>	
	</tr>
</table>
</form>
</body>
</html>