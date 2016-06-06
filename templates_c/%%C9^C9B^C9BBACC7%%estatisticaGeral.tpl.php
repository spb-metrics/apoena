<?php /* Smarty version 2.6.6, created on 2010-09-06 08:46:58
         compiled from estatisticaGeral.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'estatisticaGeral.tpl', 1, false),array('function', 'cycle', 'estatisticaGeral.tpl', 111, false),)), $this); ?>
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
			 
			    Este programa está nomeado como estatisticaConsultaGeral.tpl e possui 201
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
		<td align="center" colspan="3">
			<span CLASS="txtAzul12"> Tela CONSULTA Estatísticas Gerais</span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2" >
			&nbsp;&nbsp;	
		</td>
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
		<tr>
	    	<td align="right" colspan="3"> 
	        		&nbsp;
	        </td>
	    </tr>
		<tr>
	    	<td align="right"> 
	        	<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="Estatística Geral">
	        </td>
	    </tr>
</table>	
	
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">	
	
		<tr>
			<td>
				&nbsp;
			</td>
		</tr>
		
		<?php if ($this->_tpl_vars['consultaEstatistica'] == 'DOC'): ?>
		
			<tr>
				<td align="left" width="350">
					<span CLASS="txtAzul12"> Quantidade Total de Documentos : </span>
					<span CLASS="txtAzulClaro" width="200"><?php echo $this->_tpl_vars['valorTotal']; ?>
 </span></a></td>
			</tr>
			
			<tr>
				<td align="left" width="350">
					<span CLASS="txtAzul12"> Quantidade de Documentos de Hoje: </span>
				    <span CLASS="txtAzulClaro" width="200"><?php echo $this->_tpl_vars['valorVinculoDoc'][0]; ?>
</span></a></td>
			</tr>
		
			<tr>
			<td align="left">
				<span CLASS="txtAzul12"> Nomes dos Tipos de Fontes: </span>
			</td>
			<td align="left">
				<span CLASS="txtAzul12"> Quantidade de Documentos por Tipos de Fontes: </span>
			</td>
			</tr>


	<?php if (count($_from = (array)$this->_tpl_vars['codigoSequencialTipFont'])):
    foreach ($_from as $this->_tpl_vars['m'] => $this->_tpl_vars['codigo']):
?>	
		          
		<tr>
			<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedbdb,#dedbdb"), $this);?>
">
			<td> <span CLASS="txtAzulClaro" width="350"><?php echo $this->_tpl_vars['nomeVinculoTipFont'][$this->_tpl_vars['m']]; ?>
</span></td>
			<td> 
				<input type=hidden name="codigoEstatistica" value="<?php echo $this->_tpl_vars['codigoEstatisticaTipFont'][$this->_tpl_vars['m']]; ?>
">
				<span CLASS="txtAzulClaro" width="200"> <?php echo $this->_tpl_vars['valorValorVinculoTipFont'][$this->_tpl_vars['m']]; ?>
</span></a>
			</td>
		</tr> 
		
	<?php endforeach; unset($_from); endif; ?>
	
	<?php endif; ?>

</table>
<!--
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
		<tr>
	    	<td align="right" colspan="3"> 
	        		&nbsp;
	        </td>
	    </tr>
		<tr>
	    	<td align="right"> 
	        	<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="Consultar Documentos por RSS">
	        	<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="Consultar Documentos por Fonte">
	        </td>
	    </tr>
</table>
-->	    
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">


		<?php if ($this->_tpl_vars['consultaEstatistica'] == 'RSS'): ?>
	    
		    <tr>
				<td align="left" width="150">
					<span CLASS="txtAzul12"> Quantidade de Documentos: </span>
				</td>
				<td align="left" width="350">
					<span CLASS="txtAzul12"> Endereço RSS: </span>
				</td>
				<td align="left" width="350">
					<span CLASS="txtAzul12"> Nome Fonte: </span>
				</td>
			</tr>
			
			<?php if (count($_from = (array)$this->_tpl_vars['codigoRSS'])):
    foreach ($_from as $this->_tpl_vars['b'] => $this->_tpl_vars['codigo']):
?>
			
				<tr>
					<td> <span CLASS="txtAzulClaro" width="150"><?php echo $this->_tpl_vars['quantidadeDocRSS'][$this->_tpl_vars['b']]; ?>
</span></a></td>
					<td> <span CLASS="txtAzulClaro" width="350"><?php echo $this->_tpl_vars['enderecoRSS'][$this->_tpl_vars['b']]; ?>
</span></a></td>
					<td> <span CLASS="txtAzulClaro" width="350"><?php echo $this->_tpl_vars['nomeFonte'][$this->_tpl_vars['b']]; ?>
</span></a></td>
				</tr>
			<?php endforeach; unset($_from); endif; ?>

		<?php elseif ($this->_tpl_vars['consultaEstatistica'] == 'FONT'): ?>

			<tr>
	    		<td align="right" colspan="3"> 
	        		&nbsp;
	          	</td>
	    	</tr>
			<tr>
				<td align="left">
					<span CLASS="txtAzul12" colspan="2"> Nome da Fonte: </span>
				</td>
				<td align="left">
					<span CLASS="txtAzul12"> Quantidade de Documentos por Fonte: </span>
				</td>
			</tr>
	    	               
	    	<?php if (count($_from = (array)$this->_tpl_vars['codigoSequencialFont'])):
    foreach ($_from as $this->_tpl_vars['j'] => $this->_tpl_vars['codigo']):
?>
	
				<tr>
					<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedbdb,#dedbdb"), $this);?>
">
					<td> <span CLASS="txtAzulClaro" width="350"><?php echo $this->_tpl_vars['nomeVinculoFont'][$this->_tpl_vars['j']]; ?>
</span></td>
					<td> <span CLASS="txtAzulClaro" width="200"> <?php echo $this->_tpl_vars['valorVinculoFont'][$this->_tpl_vars['j']]; ?>
</span></a></td>
				</tr>
			<?php endforeach; unset($_from); endif; ?>

		<?php endif; ?>		
</table>

</form>
</body>
</html>