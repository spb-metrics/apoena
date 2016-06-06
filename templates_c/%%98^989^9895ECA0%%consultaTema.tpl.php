<?php /* Smarty version 2.6.6, created on 2010-07-13 16:27:15
         compiled from consultaTema.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'consultaTema.tpl', 1, false),array('function', 'cycle', 'consultaTema.tpl', 128, false),)), $this); ?>
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
			 
			    Este programa está nomeado como consultaTema.tpl e possui 198
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
<script type="text/javascript" src="funcoes/apoena.js" language="JavaScript"></script>

</head>


<body class="body">

<form id="formulario" name="form1" method="post" action="<?php echo $this->_tpl_vars['php_self']; ?>
">

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul">			

	<tr>
		<td align="left">
			<span CLASS="txtAzulClaro"> Tipo Fonte </span>
			<span CLASS="titulo"> <?php echo $this->_tpl_vars['nmTipoFonte'][0]; ?>
</span>
		</td>
		<td align="right">
			<a href="documentoControle.php?Submit=<?php echo 'voltar'; ?>
"> <span class='titulo'> Página Inicial </span></a>
		</td>
	</tr>
	<tr>
		<td align="left">
			<span CLASS="txtAzulClaro"> Consulta por Palavra</span>
		</td>
	</tr>
	<tr>
		<td align="left">
			<input type="text" size="40" class="input" name="palavra">
			<input type="button" value="pesquisar" onclick="javascript:submeterFormConsulta();">
	    </td>	
	</tr>
	<tr>	
		<td align="left">
		    <span CLASS="txtAzulClaro"> Fonte </span>
		</td>
	</tr>
	<tr>
		<td align="left" width="90">
			<select name="fonte" onchange="javascript:consultaDocumentoFonte(this.value);">
	
				<option value=""></option>
					
					<?php if (count($_from = (array)$this->_tpl_vars['codFonte'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>
							<option value="<?php echo $this->_tpl_vars['codFonte'][$this->_tpl_vars['k']]; ?>
"=><?php echo $this->_tpl_vars['nmFonte'][$this->_tpl_vars['k']]; ?>
</option>
					<?php endforeach; unset($_from); endif; ?>
			</select>	
		</td> 
	</tr>	
	<tr>
		<td>
			&nbsp;&nbsp;
		</td>	
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul">
	<tr>
		<td align="center">
		             
				<?php if ($this->_tpl_vars['validacao'] == 'branco'): ?>
					<span CLASS="alerta">Escola uma Fonte</span>
				<?php endif; ?>
		</td>		
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul">
				
				<tr bgcolor="#909090" >

				<?php if ($this->_tpl_vars['total'] > 0): ?>
				
					<tr>
						<th align="center" colspan="3">
							<a class='txtAlteraAzul'>Quantidade de Documentos encontrados <?php echo $this->_tpl_vars['total']; ?>
</a>
						</th>
					</tr>
					
					<?php if (count($_from = (array)$this->_tpl_vars['codDocumento'])):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['codigo']):
?>
			    	
			    	 	<tr>
							<td width="300" colspan="2" align="center"><a class='txtAlteraAzul'>Título do Documento</a></td>
							<td width="80" align="center"><a class='txtAlteraAzul'>Fonte do Documento</a></td>
							<td width="70" align="center"><a class='txtAlteraAzul'>Data do Documento</a></td>							
						<tr>
						<tr>
							<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedbdb,#dedbdb"), $this);?>
">
							<th width="300" colspan="2"> <a href="<?php echo $this->_tpl_vars['link'][$this->_tpl_vars['i']]; ?>
" target="_blank"> <span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['titulo'][$this->_tpl_vars['i']]; ?>
</span></a></th>
							<th width="80"><span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['nomeFonte'][$this->_tpl_vars['i']]; ?>
</span></th>
							<th width="70"><span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['dataAtualizacao'][$this->_tpl_vars['i']]; ?>
</span></th>
						</tr>
						
						<tr>
							<td align="center" colspan="4" > <a class='txtAlteraAzul'>Descripção do Documento</a></td>	
						<tr>
						<tr>
							<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedbdb,#dedbdb"), $this);?>
">
							<th align="left" colspan="4"><?php echo $this->_tpl_vars['conteudo'][$this->_tpl_vars['i']]; ?>
</th>
						</tr> 
						
					<?php endforeach; unset($_from); endif; ?>
							
					<tr>
						<td align="center" colspan="3">
						
							<?php if ($this->_tpl_vars['controleDocumento'] == 0): ?>
						
								<?php if ($this->_tpl_vars['anterior'] > 0): ?> 
		                                     
									<a href="fonteControle.php?pagina=<?php echo ($this->_tpl_vars['anterior']); ?>
&Submit=<?php echo 'pesquisar'; ?>
"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
				    			<?php endif; ?>
				    			
				    				<span CLASS="txtAzulClaro"> | </a>	
								
								<?php if ($this->_tpl_vars['proximo'] < $this->_tpl_vars['totalPaginas']): ?>
				    		
				    				<a href="fonteControle.php?pagina=<?php echo ($this->_tpl_vars['proximo']); ?>
&Submit=<?php echo 'pesquisar'; ?>
"> <span class='txtAlteraAzul'> Próxima -> </span></a>
							
								<?php endif; ?>
								
							<?php elseif ($this->_tpl_vars['controleDocumento'] == 1): ?>
							
								<?php if ($this->_tpl_vars['anterior'] > 0): ?> 
		                                     
									<a href="documentoControle.php?pagina=<?php echo ($this->_tpl_vars['anterior']); ?>
&Submit=<?php echo 'consultarDocumentoFonte'; ?>
"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
				    			<?php endif; ?>
				    			
				    				<span CLASS="txtAzulClaro"> | </a>	
								
								<?php if ($this->_tpl_vars['proximo'] < $this->_tpl_vars['totalPaginas']): ?>
				    		
				    				<a href="documentoControle.php?pagina=<?php echo ($this->_tpl_vars['proximo']); ?>
&Submit=<?php echo 'consultarDocumentoFonte'; ?>
"> <span class='txtAlteraAzul'> Próxima -> </span></a>
							
								<?php endif; ?>
								
							<?php endif; ?>
							
						</td>
					</tr>
					

				<?php else: ?>
				
				   <!--
					<tr>
						<th>
							<a class='txtAlteraAzul'>Não foram encontrados ocorrências de documentos para a Palavra $plv<a>
						</th>	
					</tr>
				    -->
				
				<?php endif; ?>
</table>
	
</form>
</body>
</html>