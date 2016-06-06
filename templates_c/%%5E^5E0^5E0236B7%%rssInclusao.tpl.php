<?php /* Smarty version 2.6.6, created on 2010-07-13 16:49:39
         compiled from rssInclusao.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'rssInclusao.tpl', 1, false),)), $this); ?>
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
			 
			    Este programa está nomeado como rssInclusao.tpl e possui 183
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
			<td align="center" colspan="2">
				<span CLASS="txtAzul12"> Tela INSERIR RSS </span>
			</td>
		</tr>	
		<tr>	
			<td align="center" colspan="2">
				&nbsp;&nbsp;	
			</td>
		</tr>
		<tr>
			<td align="left" width="42">
				<span CLASS="txtAzulClaro"> Tipo Fonte</span>
			</td>
			<td align="left" width="98">
				<span CLASS="txtAzulClaro"> Fonte</span>
			</td>
			<!--
			<td align="left" width="20">	
				<span CLASS="txtAzulClaro"> Tipo Documento</span>	
			</td>
			-->
		</tr>
	</table>
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td align="left">

				<select name="selectTipoFonte" onchange="javascript:consultaFontePorTipoFonte(this.value);">
				<!--
				<select name="selectTipoFonte">
				-->
				<option value=""></option>
					
					<?php if (count($_from = (array)$this->_tpl_vars['codTipoFonte'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>
					
							<?php if ($this->_tpl_vars['codTipoFonte'][$this->_tpl_vars['k']] == $this->_tpl_vars['codTFonte']): ?>
								<option value="<?php echo $this->_tpl_vars['codTipoFonte'][$this->_tpl_vars['k']]; ?>
 | <?php echo $this->_tpl_vars['nomeTipoFonte'][$this->_tpl_vars['k']]; ?>
 "  selected><?php echo $this->_tpl_vars['nomeTipoFonte'][$this->_tpl_vars['k']]; ?>
</option>
							<?php else: ?>	
								<option value="<?php echo $this->_tpl_vars['codTipoFonte'][$this->_tpl_vars['k']]; ?>
 | <?php echo $this->_tpl_vars['nomeTipoFonte'][$this->_tpl_vars['k']]; ?>
 "  ><?php echo $this->_tpl_vars['nomeTipoFonte'][$this->_tpl_vars['k']]; ?>
</option>
							<?php endif; ?>
							
					
					<?php endforeach; unset($_from); endif; ?>
				</select>
				<select name="selectFonte">
	
				<option value=""></option>
					
					<?php if (count($_from = (array)$this->_tpl_vars['codFonte'])):
    foreach ($_from as $this->_tpl_vars['y'] => $this->_tpl_vars['codigo']):
?>
							<option value="<?php echo $this->_tpl_vars['codFonte'][$this->_tpl_vars['y']]; ?>
 | <?php echo $this->_tpl_vars['nomeFonte'][$this->_tpl_vars['y']]; ?>
 "=><?php echo $this->_tpl_vars['nomeFonte'][$this->_tpl_vars['y']]; ?>
</option>
					<?php endforeach; unset($_from); endif; ?>
				</select>
				<!--
				<select name="selectTipoDocumento">
	
				<option value=""></option>
					
					<?php if (count($_from = (array)$this->_tpl_vars['codTipoDocumento'])):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['codigo']):
?>
							<option value="<?php echo $this->_tpl_vars['codTipoDocumento'][$this->_tpl_vars['i']]; ?>
 | <?php echo $this->_tpl_vars['nomeTipoDocumento'][$this->_tpl_vars['i']]; ?>
 "=><?php echo $this->_tpl_vars['nomeTipoDocumento'][$this->_tpl_vars['i']]; ?>
</option>
					<?php endforeach; unset($_from); endif; ?>
				</select>
				-->
				
			</td>
		</tr>
	</table>
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td>
				&nbsp;&nbsp;
			</td>
		</tr>
		<tr>
			<td align="left">
				<span CLASS="txtAzulClaro">Endereço RSS: </span>	
			</td>
		</tr>
		<tr>
			<td align="left">  
	          	<input type="text" size="70" class="input" name="enderecoRSS">
	        	</p>
	      	</td>
	   </tr>
   </table>
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">   
	    <tr>
	    	<td>
	    		&nbsp;&nbsp;	
	    	</td>
	    </tr>
	    <tr>
	    	<td align="right" colspan="2"> 
	        	<p>
	        		<input type="button" CLASS="txtAlteraAzul" onclick="javascript:inserirRSS();" value="inserir">
	          	</p>
	      </td>
	    </tr>
    </table>
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td align="center" colspan="2">
					<?php if ($this->_tpl_vars['campo'] == 'branco'): ?>
						<span CLASS="alerta"> Todos os campos devem ser preenchidos</span>
					<?php endif; ?>
			</td>	
		</tr>
		<tr>
			<td align="center" colspan="2">
					<?php if ($this->_tpl_vars['validador'] == 'contem'): ?>
						<span CLASS="alerta"> Endereço RSS já existe na base de dados</span>
					<?php endif; ?>
			</td>	
		</tr>
		<tr>
			<td align="center" colspan="2">
					<?php if ($this->_tpl_vars['campoRSS'] == 'http'): ?>
						<span CLASS="alerta"> Insira o endereço RSS sem o http://</span>
					<?php endif; ?>
			</td>	
		</tr>
		
		<tr>
			<td align="center" colspan="2">
					<?php if ($this->_tpl_vars['resultado'] == 1): ?>
						<span CLASS="txtCompromissoAzul">Dados inseridos com sucesso</span>
					<?php endif; ?>
			</td>	
		</tr>
	</table>
</form>
</body>
</html>