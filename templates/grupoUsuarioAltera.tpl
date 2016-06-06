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
<title>{#titulo#}</title>
<head>

<link rel=stylesheet href="funcoes/css/intranet.css" type="text/css">
<script src="funcoes/apoena.js" type="text/javascript"></script>
</head>

<body class="body">

<form name="form" method="post" action="{$php_self}" >
{if $consulta != 1} 
{if $consulta == 3}
	  		
			<center><span CLASS="txtAzulClaro"><h3>Alteração Processada com Sucesso !!! </h3></span></center>
	{ else }	

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
	
	<tr>
		<td align="center" colspan="2">
			<span CLASS="txtAzul12"> Tela ALTERA Grupos de Usuários </span>
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
			<select name="alteraGrupo" onchange="javascript:consultaGrupo(this.value);">

			<option value=""></option>
				
				{foreach from=$codGrupoUsuario key=k item=codigo}
						<option value="{$codGrupoUsuario[$k]}"=>{$nomeGrupoUsuario[$k]}</option>
						
				{/foreach}
			</select>
		</td>
	</tr>
	    
</table>
{/if}
{/if}
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">

		{if $consulta == 1}
	  		<tr>
				<td>
					&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
		        <td align="center" colspan="2">
			       <span CLASS="txtAzul12"> Tela ALTERA Grupos de Usuários </span>
				</td>
			</tr>
			<tr>
				<td>
					&nbsp;&nbsp;
				</td>
			</tr>
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
			    <input type="hidden" name="codigoGrpUsuario" value="{$codigo}">
			    <input type="text" class="input" name="nomeGrpUsuario" value="{$nomeGrpUsuario}">
			</td>
	      	<td align="left">
	      	    <input type="text" class="input" name="dscGrpUsuario" value="{$dscGrpUsuario}">
	      	</td>
	    </tr>
		<tr>
    		<td>
    			&nbsp;&nbsp;	
    		</td>
    	</tr>
		<tr>
			<td>
			</td>
	        <td>
	         <center><input type="submit" name="Submit" CLASS="txtAlteraAzul" value="alterar"></center>
	        </td>
	    </tr>
		<tr>
			<td>
	        	<span CLASS="txtAzulClaro">Marque os Membros do Grupo</span><br>
	        </td>
	    </tr>
	        
	</table>
	<table>
		{foreach from=$nomeUsuario key=k item=codigo}		    	
				
				<tr bgcolor="{cycle values="#D0D0D0,#B0B0B0"}">
				
				
				    { if $indice[$k] == 1 }
				    
						
					  <td width='3%'><input type=checkbox name=cdusual[] value='{$codUsuario[$k]}' checked></td>
					  <td width="97%" colspan="2"><span CLASS="txtAzulClaro">{$nomeUsuario[$k]}</span></td>
			    
			        { else } 
			    
			    		
			          <td width='3%'><input type=checkbox name=cdusual[] value='{$codUsuario[$k]}' ></td>
					  <td width="97%" colspan="2"><span CLASS="txtAzulClaro">{$nomeUsuario[$k]}</span></td>
		        
		             { /if }
		        </tr>
		{/foreach}
		
		{/if}
	
    <tr>
    	<td>
    		&nbsp;&nbsp;	
    	</td>
    </tr>
   
</table>    

</form>
	
</body>
</html>