<?php /* Smarty version 2.6.6, created on 2010-07-13 17:51:03
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'login.tpl', 1, false),)), $this); ?>
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
			 
			    Este programa está nomeado como login.tpl e possui 118
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
<head>
	<link rel=stylesheet href="funcoes/css/intranet.css" type="text/css">
	<script src="funcoes/apoena.js" type="text/javascript"></script>
</head>

<body class="body">

<form name="form" method="post" action="<?php echo $this->_tpl_vars['php_self']; ?>
" >

<table width="930" cellpadding="0" CLASS="txtCompromissoAzul" border="0">				
			<tr>
				<td>
					<IMG  src="imagens/testeiraApoena.jpg"/>
				</td>
			</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0" >	
	
	<tr>
		<td width="100%" height="150">
			&nbsp;&nbsp;	
		</td>
	</tr>
	<tr>
		<td width="100%" align="center" >  
			<span CLASS="txtAzul12"> Usuário </span> &nbsp;
        	<input type="text" size="20" class="input" name="login">
        </td>
    <tr>
    </tr>    
      	<td width="100%" align="center">  
      		<span CLASS="txtAzul12"> Senha </span> &nbsp;&nbsp;
        	<input type="password" size="20" class="input" name="senha">
        </td>
	</tr>
</table>    
<table width="500" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
    <tr>
    	<td align="right"> 
        	<p>
          		<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="acessar">
          	</p>
      </td>
    </tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	<tr>
		<td align="center">
		             
				<?php if ($this->_tpl_vars['campo'] == 'branco'): ?>
					<span CLASS="alerta">Todos os campos devem ser preenchidos</span>
				<?php endif; ?>
		</td>
	<tr>
	</tr>	
		<td align="center">
		             
				<?php if ($this->_tpl_vars['acesso'] == 0): ?>
					<span CLASS="alerta">Acesso negado !</span>
				<?php endif; ?>
		</td>
			
	</tr>
	<tr>
		<td width="100%" height="150">
			&nbsp;&nbsp;	
		</td>
	</tr>
	
</table>
<table width="930" cellpadding="0" CLASS="txtCompromissoAzul" border="0">		
	<tr>
		<td>
			<IMG  src="imagens/rodape.jpg"/>
		</td>
	</tr>
</table>
</form>
</body>
</html>