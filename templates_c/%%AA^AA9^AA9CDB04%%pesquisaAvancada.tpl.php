<?php /* Smarty version 2.6.6, created on 2009-09-17 15:47:17
         compiled from pesquisaAvancada.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'pesquisaAvancada.tpl', 1, false),array('function', 'cycle', 'pesquisaAvancada.tpl', 179, false),)), $this); ?>
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
			 
			    Este programa está nomeado como pesquisaAvancada.tpl e possui 217
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
		<td align="right" colspan="3">
			<a href="documentoControle.php?Submit=<?php echo 'voltar'; ?>
"> <span class='titulo'> Página Inicial </span></a>
		</td>	
	</tr>
	<tr>
		<td>
		    &nbsp;
		</td>	
	</tr>
	<tr>
		<td align="center" colspan="3">
		    <span CLASS="titulo">Pesquisas Avançadas</span>
		</td>	
	</tr>
	
	<tr>
		<td>
		    &nbsp;
		</td>	
	</tr>
	<tr>
		<td align="center" colspan="2">
		    <?php if ($this->_tpl_vars['validacao'] == 'branco'): ?>
		    	<span CLASS="alerta"> Preencha ao menos um campo ! </span>
		    <?php endif; ?>
		</td>	
	</tr>
	<tr>
		<td>
		    &nbsp;
		</td>	
	</tr>
	<tr> 
		<td align="left" width="200">
			<span CLASS="txtAzulClaro"> Consultar Títulos sem a Palavra</span>
		</td>
		<td align="left" colspan="2"> 
			<input type="text" size="40" name="palavra" CLASS="txtAlteraAzul">
     	</td>
	</tr>
	<tr>
		<td align="left" width="200">
			<span CLASS="txtAzulClaro"> Consultar Documentos por Fonte</span>
		</td>	
		<td align="left" colspan="2">  
			<select name="selectFonte">
	
				<option value=""></option>
					
				<?php if (count($_from = (array)$this->_tpl_vars['codFonte'])):
    foreach ($_from as $this->_tpl_vars['y'] => $this->_tpl_vars['codigo']):
?>
					<option value="<?php echo $this->_tpl_vars['codFonte'][$this->_tpl_vars['y']]; ?>
"=><?php echo $this->_tpl_vars['nomeFonte'][$this->_tpl_vars['y']]; ?>
</option>
				<?php endforeach; unset($_from); endif; ?>
			</select>
     	</td>	
	</tr>
	<tr>
		<td align="left" width="200">
			<span CLASS="txtAzulClaro"> Consultar Documentos por Tipo de Fonte</span>
		</td>
		<td align="left" colspan="2"> 
		 	<select name="selectTipoFonte">
	
				<option value=""></option>
					
				<?php if (count($_from = (array)$this->_tpl_vars['codTipoFonte'])):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['codigo']):
?>
					<option value="<?php echo $this->_tpl_vars['codTipoFonte'][$this->_tpl_vars['i']]; ?>
"=><?php echo $this->_tpl_vars['nomeTipoFonte'][$this->_tpl_vars['i']]; ?>
</option>
				<?php endforeach; unset($_from); endif; ?>
			</select>
     	</td>	
	</tr>
	<tr>
		<td align="left" width="200">
			<span CLASS="txtAzulClaro"> Consultar Documentos por Data</span>
		</td>
		<td align="left" colspan="2"> 
			<input type="text" size="10" name="data" CLASS="txtAlteraAzul" OnKeyUp="mascara_data(this.value)" maxlength="10">
     	</td>	
	</tr>
	<tr>
		<td align="left" width="200">
			<span CLASS="txtAzulClaro"> Ocorrências em Títulos</span>
		</td>
		<td align="left" colspan="2"> 
		 	<input type="text" size="40" name="palavraTitulo" CLASS="txtAlteraAzul">
     	</td>	
	</tr>
	<tr>
		<td align="left" width="200">
			<span CLASS="txtAzulClaro"> Ocorrências em Conteúdos</span>
		</td>
		<td align="left" colspan="2"> 
			<input type="text" size="40" name="palavraConteudo" CLASS="txtAlteraAzul">
     	</td>	
	</tr>
</table>

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
    <tr>
    	<td align="right">
    	   	<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="consultar">
        </td>
    </tr>
</table>

<table width="785" cellpadding="0" CLASS="txtCompromissoAzul">
				
				<tr bgcolor="#909090" >

				<?php if ($this->_tpl_vars['total'] > 0): ?>

					<tr>
						<th align="center" colspan="3">
							<a class='txtAlteraAzul'>Quantidade de Documentos encontrados <?php echo $this->_tpl_vars['total']; ?>
 &nbsp;&nbsp;  para o(s) parâmetro(s)&nbsp;<?php echo $this->_tpl_vars['palav']; ?>
&nbsp;<?php echo $this->_tpl_vars['font']; ?>
&nbsp;<?php echo $this->_tpl_vars['tfont']; ?>
&nbsp;<?php echo $this->_tpl_vars['nomerss']; ?>
&nbsp;<?php echo $this->_tpl_vars['dAtualizacao']; ?>
&nbsp;<?php echo $this->_tpl_vars['palavraTitulo']; ?>
&nbsp;<?php echo $this->_tpl_vars['palavraConteudo']; ?>
</a>
						</th>
					</tr>
					
					<?php if (count($_from = (array)$this->_tpl_vars['codDocumento'])):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['codigo']):
?>
			    	
			    	 	<tr>
							<td width="270" colspan="2" align="center"><a class='txtAlteraAzul'>Título do Documento</a></td>
							<td width="100" align="center"><a class='txtAlteraAzul'>Fonte do Documento</a></td>	
							<td width="80" align="center"><a class='txtAlteraAzul'>Data do Documento</a></td>							
						</tr>
						<tr>
							<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedbdb,#dedbdb"), $this);?>
">
							<td width="270" align="center" colspan="2"> <a href="<?php echo $this->_tpl_vars['link'][$this->_tpl_vars['i']]; ?>
" target="_blank"> <span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['titulo'][$this->_tpl_vars['i']]; ?>
</span></a></td>
							<td width="100" align="center"> <span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['nomedaFonte']; ?>
</span></td>
							<td width="80"  align="center"> <span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['dataAtualizacao'][$this->_tpl_vars['i']]; ?>
</span></td>
						</tr>
						<tr>
							<td align="center" colspan="3" > <a class='txtAlteraAzul'>Descripção do Documento</a></td>	
						</tr>
						<tr>
							<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedbdb,#dedbdb"), $this);?>
">
							<th align="left" colspan="4"><?php echo $this->_tpl_vars['conteudo'][$this->_tpl_vars['i']]; ?>
</th>
						</tr> 
						
					<?php endforeach; unset($_from); endif; ?>
					
							
							<tr>
								<td align="center" colspan="3">
								
									<?php if ($this->_tpl_vars['anterior'] > 0): ?> 
			
										<a href="pesquisaAvancadaControle.php?pagina=<?php echo ($this->_tpl_vars['anterior']); ?>
&Submit=<?php echo 'consultar'; ?>
"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
					    			<?php endif; ?>
					    			
					    				<span CLASS="txtAzulClaro"> | </a>	
									
									<?php if ($this->_tpl_vars['proximo'] < $this->_tpl_vars['totalPaginas']): ?>
					    		
					    				<a href="pesquisaAvancadaControle.php?pagina=<?php echo ($this->_tpl_vars['proximo']); ?>
&Submit=<?php echo 'consultar'; ?>
"> <span class='txtAlteraAzul'> Próxima -> </span></a>
								
									<?php endif; ?>
								</td>
							</tr>

				<?php endif; ?>
</table>
</form>
</body>
</html>