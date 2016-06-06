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
<title>{#titulo#}</title>
<head>

<link rel=stylesheet href="funcoes/css/intranet.css" type="text/css">
<script type="text/javascript" src="funcoes/apoena.js" language="JavaScript"></script>

</head>


<body class="body">

<form id="formulario" name="form1" method="post" action="{$php_self}">

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul">			

	<tr>
		<td align="left">
			<span CLASS="txtAzulClaro"> Tipo Fonte </span>
			<span CLASS="titulo"> {$nmTipoFonte[0]}</span>
		</td>
		<td align="right">
			<a href="documentoControle.php?Submit={"voltar"}"> <span class='titulo'> Página Inicial </span></a>
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
					
					{foreach from=$codFonte key=k item=codigo}
							<option value="{$codFonte[$k]}"=>{$nmFonte[$k]}</option>
					{/foreach}
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
		             
				{if $validacao == 'branco'}
					<span CLASS="alerta">Escola uma Fonte</span>
				{/if}
		</td>		
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul">
				
				<tr bgcolor="#909090" >

				{if $total > 0}
				
					<tr>
						<th align="center" colspan="3">
							<a class='txtAlteraAzul'>Quantidade de Documentos encontrados {$total}</a>
						</th>
					</tr>
					
					{foreach from=$codDocumento key=i item=codigo}
			    	
			    	 	<tr>
							<td width="300" colspan="2" align="center"><a class='txtAlteraAzul'>Título do Documento</a></td>
							<td width="80" align="center"><a class='txtAlteraAzul'>Fonte do Documento</a></td>
							<td width="70" align="center"><a class='txtAlteraAzul'>Data do Documento</a></td>							
						<tr>
						<tr>
							<tr bgcolor="{cycle values="#dedbdb,#dedbdb"}">
							<th width="300" colspan="2"> <a href="{$link[$i]}" target="_blank"> <span CLASS="txtAzulClaro">{$titulo[$i]}</span></a></th>
							<th width="80"><span CLASS="txtAzulClaro">{$nomeFonte[$i]}</span></th>
							<th width="70"><span CLASS="txtAzulClaro">{$dataAtualizacao[$i]}</span></th>
						</tr>
						
						<tr>
							<td align="center" colspan="4" > <a class='txtAlteraAzul'>Descripção do Documento</a></td>	
						<tr>
						<tr>
							<tr bgcolor="{cycle values="#dedbdb,#dedbdb"}">
							<th align="left" colspan="4">{$conteudo[$i]}</th>
						</tr> 
						
					{/foreach}
							
					<tr>
						<td align="center" colspan="3">
						
							{if $controleDocumento == 0}
						
								{if $anterior > 0} 
		                                     
									<a href="fonteControle.php?pagina={"$anterior"}&Submit={"pesquisar"}"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
				    			{/if}
				    			
				    				<span CLASS="txtAzulClaro"> | </a>	
								
								{if $proximo < $totalPaginas }
				    		
				    				<a href="fonteControle.php?pagina={"$proximo"}&Submit={"pesquisar"}"> <span class='txtAlteraAzul'> Próxima -> </span></a>
							
								{/if}
								
							{elseif $controleDocumento == 1}
							
								{if $anterior > 0} 
		                                     
									<a href="documentoControle.php?pagina={"$anterior"}&Submit={"consultarDocumentoFonte"}"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
				    			{/if}
				    			
				    				<span CLASS="txtAzulClaro"> | </a>	
								
								{if $proximo < $totalPaginas }
				    		
				    				<a href="documentoControle.php?pagina={"$proximo"}&Submit={"consultarDocumentoFonte"}"> <span class='txtAlteraAzul'> Próxima -> </span></a>
							
								{/if}
								
							{/if}
							
						</td>
					</tr>
					

				{else}
				
				   <!--
					<tr>
						<th>
							<a class='txtAlteraAzul'>Não foram encontrados ocorrências de documentos para a Palavra $plv<a>
						</th>	
					</tr>
				    -->
				
				{/if}
</table>
	
</form>
</body>
</html>