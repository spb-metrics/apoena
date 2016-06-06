<?php /* Smarty version 2.6.6, created on 2010-09-06 08:45:17
         compiled from grupoUsuarioConsulta2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'grupoUsuarioConsulta2.tpl', 1, false),array('function', 'cycle', 'grupoUsuarioConsulta2.tpl', 117, false),)), $this); ?>
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
			 
			    Este programa está nomeado como grupoUsuarioAltera.tpl e possui 156
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
<?php if ($this->_tpl_vars['consulta'] != 1): ?>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
	
	<tr>
		<td align="center" colspan="2">
			<span CLASS="txtAzul12"> Tela CONSULTA Grupos de Usuários </span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2">
			&nbsp;&nbsp;	
		</td>
	</tr>
	<tr>
		<td align="left">
			<span CLASS="txtAzulClaro">Nome do Grupo de Usuários: </span>
		</td>
	</tr>
	<tr>
		<td align="left">
			<select name="codigoGrupoUsuario" onchange="javascript:consultaGrupoUsuario(this.value);">

			<option value=""></option>
				
				<?php if (count($_from = (array)$this->_tpl_vars['codGrupoUsuario'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>
						<option value="<?php echo $this->_tpl_vars['codGrupoUsuario'][$this->_tpl_vars['k']]; ?>
"=><?php echo $this->_tpl_vars['nomeGrupoUsuario'][$this->_tpl_vars['k']]; ?>
</option>
						
				<?php endforeach; unset($_from); endif; ?>
			</select>
		</td>
	</tr>
	    
</table>
<?php endif; ?>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">

		<?php if ($this->_tpl_vars['consulta'] == 1): ?>
	
			<tr>
				<td>
					&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td align="left" width="150">
					<span CLASS="txtAzulClaro">Nome do Grupo de Usuários: </span>
				</td>
				<td align="left" width="201">
					<span CLASS="txtAzulClaro">Descrição do Grupo de Usuários: </span>
				</td>
			</tr>
		<tr>
			<td align="left">  
				<span CLASS="txtAzulClaro"><h3><?php echo $this->_tpl_vars['nomeGrpUsuario']; ?>
</h3></span>
	        </td>
	      	<td align="left">
	      	    <span CLASS="txtAzulClaro"><h2><?php echo $this->_tpl_vars['dscGrpUsuario']; ?>
</h2></span>
	        </td>
	        
		</tr>
		<tr>
			<td>
	        	<span CLASS="txtAzulClaro">Membros do Grupo</span><br>
	        </td>
	    </tr>
	
		<?php if (count($_from = (array)$this->_tpl_vars['nmusu'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['codigo']):
?>		    	
	
				<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#D0D0D0,#B0B0B0"), $this);?>
">
					  <td width="60%" colspan="2"><span CLASS="txtAzulClaro"><?php echo $this->_tpl_vars['nmusu'][$this->_tpl_vars['k']]; ?>
</span></td>
			    </tr>
			
		<?php endforeach; unset($_from); endif; ?>
		
		<?php endif; ?>
	
    <tr>
    	<td>
    		&nbsp;&nbsp;	
    	</td>
    </tr>
</table>    

</form>
</body>
</html>