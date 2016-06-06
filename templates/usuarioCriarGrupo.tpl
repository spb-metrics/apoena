{config_load file="index.conf"}
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
			 
			    Você deve ter recebido uma cópia da Licença Pública Geral GNU
			    junto com este programa; se não, escreva para a Free Software
			    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
			    02111-1307, USA
			    
			    Contato: accrvianna@bb.com.br (Antônio Carlos C. R. Vianna - Análista responsável pelo projeto)
			-->	
		</td>
	</tr>
</table>
</body>
</html>
<html>
<html>
<title>{#titulo#}</title>
<head>
	<link rel=stylesheet href="funcoes/css/intranet.css" type="text/css">
	<script src="funcoes/apoena.js" type="text/javascript"></script>
</head>

<body class="body">

<form name="form" method="post" action="{$php_self}">

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	<tr>
		<td align="center" colspan="3">
			<span CLASS="txtAzul12"> Tela Criar Grupo de Usuários</span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2">
			&nbsp;&nbsp;	
		</td>
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	<tr>
		<td align="center">
		             
				{if $campo == 'branco'}
					<span CLASS="alerta">Selecione um(s) usuários para compor um grupo</span>
				{/if}
		</td>	
	</tr>
	<tr>
		<td align="center" colspan="2">
				{if $resultado == "ok"}
			
					<span CLASS="alerta">Grupo criado com sucesso</span>
				{elseif $resultado != "ok" && $resultado !=""}
			
					<span CLASS="alerta">O Grupo não criado</span>	
				{/if}
		</td>	
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">	
	<tr>
		<td width='3%'></td>
		<td width='40%'><span CLASS="txtAzulClaro"> Nome do Usuário </span></td>
		<td width='70%'><span CLASS="txtAzulClaro"> E_mail </span></td>
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	</tr>
		
		
		{foreach from=$codUsuario key=k item=codigo}
						
			<tr bgcolor="{cycle values="#D0D0D0,#B0B0B0"}">
			
			<td width='3%'><input type=checkbox name=itensUsuario[] value='{$codUsuario[$k]}'></td>
			<td width='40%'>&nbsp;{$nomeUsuario[$k]}</td>
			<td width='70%'>&nbsp;{$e_mail[$k]}</td>
			
		{/foreach}
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
          		<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="criar grupo">
          	</p>
      </td>
    </tr>
    
</table>

</form>
</body>
</html>