<?php /* Smarty version 2.6.6, created on 2010-07-13 16:26:40
         compiled from documentoVisao.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'documentoVisao.tpl', 1, false),array('function', 'cycle', 'documentoVisao.tpl', 235, false),)), $this); ?>
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
			 
			    Este programa está nomeado como documentoVisao. e possui 329
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
		<td align="left" >
		    <span CLASS="txtAzulClaro"> Consultar Documentos por Palavra</span>
		</td>	
	</tr>
	<tr> 
		<td align="left"> 
		 	<input type="text" height="10" size="60" class="input" name="palavra">
			<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="consultar">
			&nbsp;
			<a href="pesquisaAvancadaControle.php" target="_self"> <span CLASS="txtAzulClaro"><u>Pesquisa  Avançada</u></span></a>
		</td>
		
	</tr>
	<tr>
		<td>
			 &nbsp;
		</td>	
	</tr>
	<tr>
		<td>
			 &nbsp;
		</td>	
	</tr>
	
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul">			

	<tr>
		<td align="center" >
		    <span CLASS="txtAzulClaro"> Consultar Documentos por Tema</span>
		</td>	
	</tr>

	<tr>
		<td>
			 &nbsp;
		</td>	
	</tr>
			
	<tr>
		 <td align="center">

				 <input type="image"  border="0" src="imagens/executivo.gif"  			  onClick="javascript:submeterForm('documentoControle','6','consultarPorFonte')" >&nbsp;<span CLASS="txtAzulClaro">Poder Executivo</span>
				 &nbsp;&nbsp;<input type="image"  border="0" src="imagens/legislativo.gif"onClick="javascript:submeterForm('documentoControle','4','consultarPorFonte')" >&nbsp;<span CLASS="txtAzulClaro">Poder Legislativo</span>
				 &nbsp;&nbsp;<input type="image"  border="0" src="imagens/judiciario.gif" onClick="javascript:submeterForm('documentoControle','5','consultarPorFonte')" >&nbsp;<span CLASS="txtAzulClaro">Poder Judiciário</span>
				 &nbsp;&nbsp;<input type="image"  border="0" src="imagens/partidos.gif"   onClick="javascript:submeterForm('documentoControle','7','consultarPorFonte')" >&nbsp;<span CLASS="txtAzulClaro">Partidos Políticos</span>
		 </td>
	</tr>
	<tr>
		<td align="center">
		
				<input type="image"  border="0" src="imagens/dinheiro.gif"  					onClick="javascript:submeterForm('documentoControle','9','consultarPorFonte')" >&nbsp;<span CLASS="txtAzulClaro">    Bancos</span>
				&nbsp;&nbsp;<input type="image"  border="0" src="imagens/ong.jpg"     			onClick="javascript:submeterForm('documentoControle','2','consultarPorFonte')" >&nbsp;<span CLASS="txtAzulClaro">    Independente</span>
				&nbsp;&nbsp;<input type="image"  border="0" src="imagens/agenciaNoticia.png"    onClick="javascript:submeterForm('documentoControle','1','consultarPorFonte')" >&nbsp;<span CLASS="txtAzulClaro">    Agência Internacional</span> 	
				&nbsp;&nbsp;<input type="image"  border="0" src="imagens/softwareLivre.gif"     onClick="javascript:submeterForm('documentoControle','8','consultarPorFonte')" >&nbsp;<span CLASS="txtAzulClaro">    Software Livre</span> 	
				&nbsp;&nbsp;<input type="image"  border="0" src="imagens/money9.png"     		onClick="javascript:submeterForm('documentoControle','3','consultarPorFonte')" >&nbsp;<span CLASS="txtAzulClaro"> 	 Comercial</span>
		</td>
	</tr>
</table>

<table width="785" cellpadding="0" CLASS="txtCompromissoAzul" border="0">


	<tr>
		<td align="left" width="50">
			&nbsp;
		</td>
	</tr>
	<?php if ($this->_tpl_vars['validacao'] == 'branco'): ?>
		<tr>
			<td align="center">
				<span CLASS="alerta"> Selecione uma Ontologia</span>
			</td>
		</tr>
	<?php endif; ?>
	<tr>
		<td align="left" width="50">
			&nbsp;
		</td>
	</tr>
	<tr>
		<td align="left">
			<span CLASS="txtAzulClaro"> Consultar Clipping</span>
			&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<!--
			<span CLASS="txtAzulClaro"> Clipping por Data</span>	
			&nbsp; &nbsp;&nbsp; &nbsp;
			<span CLASS="txtAzulClaro"> Clipping por Hora</span>
			-->	
		</td>
	</tr>
	<tr>
		<td align="left">
			<!--
			<select name="select" onchange="javascript:consultaClipping(this.value);">
			-->
			<select name="ontologia">
			
			<option value=""></option>
				
				<?php if (count($_from = (array)$this->_tpl_vars['codOntologia'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>
				
					<option value="<?php echo $this->_tpl_vars['codOntologia'][$this->_tpl_vars['k']]; ?>
"=><?php echo $this->_tpl_vars['nomeOntologia'][$this->_tpl_vars['k']]; ?>
</option>
						
				<?php endforeach; unset($_from); endif; ?>
			</select>
			&nbsp; &nbsp;&nbsp; &nbsp;
			
			<input type="button" CLASS="txtAlteraAzul" value="consultar clipping" onclick="javascript:consultaClp();">
			&nbsp;&nbsp; &nbsp;
			<input type="button" CLASS="txtAlteraAzul" value="consultar Todos clipping" onclick="javascript:consultaTodosClp();">
			&nbsp;&nbsp; &nbsp;
			<!--
			<input type="button" CLASS="txtAlteraAzul" value="consultar clipping Geral" onclick="javascript:consultaClpGeral();">			
			-->
		</td>
	</tr>
	<tr>
		<td>
		&nbsp; &nbsp;&nbsp; &nbsp;
		</td>
	</tr>
	<tr>
		<td>
			<span CLASS="txtAzulClaro"> Clipping </span>
			&nbsp; &nbsp;
			<span CLASS="titulo"> <?php echo $this->_tpl_vars['nmOnt']; ?>
</span>
		</td>
	</tr>
	<td align="left">  
	    <input type=hidden name="cdONTOLOGIA" value="<?php echo $this->_tpl_vars['cdOnt']; ?>
">
    </td>
	<tr>
		<td>
			<select name="selectClipping" onchange="javascript:consultaHtmlClipping(this.value);">
			
			<option value=""></option>
				
				<?php if (count($_from = (array)$this->_tpl_vars['codClipping'])):
    foreach ($_from as $this->_tpl_vars['y'] => $this->_tpl_vars['codigo']):
?>
				
					<option value="<?php echo $this->_tpl_vars['codClipping'][$this->_tpl_vars['y']]; ?>
"=><?php echo $this->_tpl_vars['nomeClipping'][$this->_tpl_vars['y']]; ?>
</option>
						
				<?php endforeach; unset($_from); endif; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			&nbsp; &nbsp;
		</td>
	</tr>
</table>

<table width="785" cellpadding="0" CLASS="txtCompromissoAzul">
				
				<tr bgcolor="#909090" >

				<?php if ($this->_tpl_vars['total'] > 0): ?>
				
					<tr>
						<th align="center" colspan="3">
							<a class='txtAlteraAzul'>Quantidade de Documentos encontrados <?php echo $this->_tpl_vars['total']; ?>
 &nbsp;&nbsp;  para a(s) palavra(s) &nbsp;<?php echo $this->_tpl_vars['trmConsultado']; ?>
</a>
						</th>
					</tr>
					
					<?php if (count($_from = (array)$this->_tpl_vars['codDocumento'])):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['codigo']):
?>
			    	
			    		<?php if ($this->_tpl_vars['titulo'][$this->_tpl_vars['i']] != ''): ?>
			    		
				    		<tr>
								<td width="300" colspan="3" align="center"><a class='txtAlteraAzul'><?php echo $this->_tpl_vars['nomeTipoFonte'][$this->_tpl_vars['i']]; ?>
</a></td>
							<tr>
			    	
				    	 	<tr>
								<td width="300" colspan="2" align="center"><a class='txtAlteraAzul'>Título do Documento</a></td>
								<td width="80" align="center"><a class='txtAlteraAzul'>Fonte do Documento</a></td>
								<td width="75" align="center"><a class='txtAlteraAzul'>Data do Documento</a></td>															
							<tr>
							<tr>
								<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedbdb,#dedbdb"), $this);?>
">
								<th width="300" colspan="2"> <a href="<?php echo $this->_tpl_vars['link'][$this->_tpl_vars['i']]; ?>
" target="_blank"> <span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['titulo'][$this->_tpl_vars['i']]; ?>
</span></a></th>
								<th width="80"><span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['nomeFonte'][$this->_tpl_vars['i']]; ?>
</span></th>
								<th width="75"><span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['dataAtualizacao'][$this->_tpl_vars['i']]; ?>
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
						
						<?php endif; ?>
						
					<?php endforeach; unset($_from); endif; ?>
					
							
					
							<?php if ($this->_tpl_vars['consultaPalavra'] == 0): ?>
							
								
								<tr>
									<td align="center" colspan="3">
									
										<?php if ($this->_tpl_vars['anterior'] > 0): ?> 
				
											<a href="documentoControle.php?pagina=<?php echo ($this->_tpl_vars['anterior']); ?>
&Submit=<?php echo 'consultar'; ?>
"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
						    			<?php endif; ?>
						    			
						    				<span CLASS="txtAzulClaro"> | </a>	
										
										<?php if ($this->_tpl_vars['proximo'] < $this->_tpl_vars['totalPaginas']): ?>
						    		
						    				<a href="documentoControle.php?pagina=<?php echo ($this->_tpl_vars['proximo']); ?>
&Submit=<?php echo 'consultar'; ?>
"> <span class='txtAlteraAzul'> Próxima -> </span></a>
										<?php endif; ?>
									</td>
								</tr>
								
							<?php elseif ($this->_tpl_vars['consultaPalavra'] == 1): ?>	
								
								<tr>
									<td align="center" colspan="3">
																	
										<?php if ($this->_tpl_vars['anterior'] > 0): ?> 
				
											<a href="documentoControle.php?pagina=<?php echo ($this->_tpl_vars['anterior']); ?>
&Submit=<?php echo 'consultarPorFonte'; ?>
"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
						    			<?php endif; ?>
						    			
						    				<span CLASS="txtAzulClaro"> | </a>	
										
										<?php if ($this->_tpl_vars['proximo'] < $this->_tpl_vars['totalPaginas']): ?>
						    		
						    				<a href="documentoControle.php?pagina=<?php echo ($this->_tpl_vars['proximo']); ?>
&Submit=<?php echo 'consultarPorFonte'; ?>
"> <span class='txtAlteraAzul'> Próxima -> </span></a>
									
										<?php endif; ?>
										
									</td>
								</tr>
								
							<?php else: ?>	
								
								<tr>
									<td align="center" colspan="3">
										
								
									
										<?php if ($this->_tpl_vars['anterior'] > 0): ?> 
				
											<a href="documentoControle.php?pagina=<?php echo ($this->_tpl_vars['anterior']); ?>
&Submit=<?php echo 'consultarClipping'; ?>
"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
						    			<?php endif; ?>
						    			
						    				<span CLASS="txtAzulClaro"> | </a>	
										
										<?php if ($this->_tpl_vars['proximo'] < $this->_tpl_vars['totalPaginas']): ?>
						    		
						    				<a href="documentoControle.php?pagina=<?php echo ($this->_tpl_vars['proximo']); ?>
&Submit=<?php echo 'consultarClipping'; ?>
"> <span class='txtAlteraAzul'> Próxima -> </span></a>
									
										<?php endif; ?>
										
									</td>
								</tr>
						
							<?php endif; ?>	

				<?php else: ?>
				   
				<?php endif; ?>
				
</table>

</form>
</body>
</html>