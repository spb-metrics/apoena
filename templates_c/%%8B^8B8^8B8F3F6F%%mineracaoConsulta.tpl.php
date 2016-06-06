<?php /* Smarty version 2.6.6, created on 2009-11-04 16:42:38
         compiled from mineracaoConsulta.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'mineracaoConsulta.tpl', 1, false),array('function', 'cycle', 'mineracaoConsulta.tpl', 138, false),)), $this); ?>
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
	<script src="funcoes/apoena2.js" type="text/javascript"></script>
</head>

<body class="body">

<form name="form" method="post" action="<?php echo $this->_tpl_vars['php_self']; ?>
">
	
	<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
		<tr>
			<td align="center" colspan="2">
				<span CLASS="txtAzul12"> Tela MINERAÇÃO</span>
			</td>
		</tr>	
		<tr>	
			<td align="center" colspan="2">
				&nbsp;&nbsp;	
			</td>
		</tr>
		
	</table>
	<?php if ($this->_tpl_vars['campo'] <> '5'): ?>
	<BR><BR>

	<table >
		<tr>
			<td width="220">
			</td>
			<td>
				<br>
				<span CLASS="txtAzulClaro">Termo a ser Pesquisado </span>
				<br>
			   	<input CLASS="txtCompromissoAzul" type="text" size="20" maxlength="20" class="input" name="termo" >
			</td>
		</tr>
	</table>

		<br>

		<table>
			<tr>
				<td width="220">
				</td>

				<td align="left" width="200">
					<span CLASS="txtAzulClaro">DD&nbsp;&nbsp;&nbsp;</span><span CLASS="txtAzulClaro">MM</span><span CLASS="txtAzulClaro">&nbsp;&nbsp;AAAA </span>
					<br>
			   		<input CLASS="txtCompromissoAzul" type="text" size="2" maxlength="2" class="input" name="dia">
			   		<input CLASS="txtCompromissoAzul" type="text" size="2" maxlength="2" class="input" name="mes">
			   		<input CLASS="txtCompromissoAzul" type="text" size="4" maxlength="4" class="input" name="ano">
			   		<br>
					<span CLASS="txtAzulClaro">Data INICIAL da pesquisa</span>
	        	</td>

	        	<td align="left" width="200">  
					<span CLASS="txtAzulClaro">DD&nbsp;&nbsp;&nbsp;</span><span CLASS="txtAzulClaro">MM</span><span CLASS="txtAzulClaro">&nbsp;&nbsp;AAAA </span>
					<br>
	         	 	<input CLASS="txtCompromissoAzul" type="text" size="2" maxlength="2" class="input" name="dia2">
	         	 	<input CLASS="txtCompromissoAzul" type="text" size="2" maxlength="2" class="input" name="mes2">
	         	 	<input CLASS="txtCompromissoAzul" type="text" size="4" maxlength="4" class="input" name="ano2">
	         	 	<br>
					<span CLASS="txtAzulClaro">Data FINAL da pesquisa</span>
	        	</td>
	   		</tr>
	   	</table>

			<center>
		        <td align="left" width="200">  
		        	<br>
	        		<input type="button" CLASS="txtAlteraAzul" onclick="javascript:processaMineracao();" value="Pesquisar">
	   			</td>
			</center>
	   </tr>
   </table>

  <br><br><br>
    
</form>
<?php endif; ?>

<?php if ($this->_tpl_vars['campo'] == 5): ?>

<CENTER>
<span CLASS="txtAzul12" > Termos Pesquisado :  </span> <?php echo $this->_tpl_vars['termo']; ?>
 <span CLASS="txtAzul12" >- Data inicial :</span> <?php echo $this->_tpl_vars['data']; ?>
 <span CLASS="txtAzul12" >- Data final :</span> <?php echo $this->_tpl_vars['dataF']; ?>
  
<br><br>
     <table>
     <tr>
			<td align="left">
				<span CLASS="txtAzul12"> FONTES: </span>
			</td>
			<td align="left">
				<span CLASS="txtAzul12"> QUANTIDADE DE DOCUMENTOS </span>
			</td>
	 </tr>
	 
     <?php if (count($_from = (array)$this->_tpl_vars['minerfontes'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>
                        <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedbdb,#dedbdb"), $this);?>
">
    	                    <td align="left">
        		                <span CLASS="txtCompromissoAzul" > <?php echo $this->_tpl_vars['minerfontes'][$this->_tpl_vars['k']]; ?>
</span>
                	        </td>
                    	    <td align="center">
                        	  <span CLASS="txtCompromissoAzul" > <?php echo $this->_tpl_vars['minerqtdoc'][$this->_tpl_vars['k']]; ?>
 </span>
                         	</td>
                        </tr> 
						
	<?php endforeach; unset($_from); endif; ?>
	
</table>
</CENTER>

<?php endif; ?>

</body>
</html>