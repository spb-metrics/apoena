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
<title>{#titulo#}</title>
<head>

<link rel=stylesheet href="funcoes/css/intranet.css" type="text/css">
<script type="text/javascript" src="funcoes/apoena.js" language="JavaScript"></script>

</head>


<body class="body">

<form id="formulario" name="form1" method="post" action="{$php_self}">

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul">
	<tr>
		<td align="right" colspan="3">
			<a href="documentoControle.php?Submit={"voltar"}"> <span class='titulo'> Página Inicial </span></a>
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
		    {if $validacao == "branco"}
		    	<span CLASS="alerta"> Preencha ao menos um campo ! </span>
		    {/if}
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
					
				{foreach from=$codFonte key=y item=codigo}
					<option value="{$codFonte[$y]}"=>{$nomeFonte[$y]}</option>
				{/foreach}
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
					
				{foreach from=$codTipoFonte key=i item=codigo}
					<option value="{$codTipoFonte[$i]}"=>{$nomeTipoFonte[$i]}</option>
				{/foreach}
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

				{if $total > 0}

					<tr>
						<th align="center" colspan="3">
							<a class='txtAlteraAzul'>Quantidade de Documentos encontrados {$total} &nbsp;&nbsp;  para o(s) parâmetro(s)&nbsp;{$palav}&nbsp;{$font}&nbsp;{$tfont}&nbsp;{$nomerss}&nbsp;{$dAtualizacao}&nbsp;{$palavraTitulo}&nbsp;{$palavraConteudo}</a>
						</th>
					</tr>
					
					{foreach from=$codDocumento key=i item=codigo}
			    	
			    	 	<tr>
							<td width="270" colspan="2" align="center"><a class='txtAlteraAzul'>Título do Documento</a></td>
							<td width="100" align="center"><a class='txtAlteraAzul'>Fonte do Documento</a></td>	
							<td width="80" align="center"><a class='txtAlteraAzul'>Data do Documento</a></td>							
						</tr>
						<tr>
							<tr bgcolor="{cycle values="#dedbdb,#dedbdb"}">
							<td width="270" align="center" colspan="2"> <a href="{$link[$i]}" target="_blank"> <span CLASS="txtAzulClaro">{$titulo[$i]}</span></a></td>
							<td width="100" align="center"> <span CLASS="txtAzulClaro">{$nomedaFonte}</span></td>
							<td width="80"  align="center"> <span CLASS="txtAzulClaro">{$dataAtualizacao[$i]}</span></td>
						</tr>
						<tr>
							<td align="center" colspan="3" > <a class='txtAlteraAzul'>Descripção do Documento</a></td>	
						</tr>
						<tr>
							<tr bgcolor="{cycle values="#dedbdb,#dedbdb"}">
							<th align="left" colspan="4">{$conteudo[$i]}</th>
						</tr> 
						
					{/foreach}
					
							
							<tr>
								<td align="center" colspan="3">
								
									{if $anterior > 0} 
			
										<a href="pesquisaAvancadaControle.php?pagina={"$anterior"}&Submit={"consultar"}"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
					    			{/if}
					    			
					    				<span CLASS="txtAzulClaro"> | </a>	
									
									{if $proximo < $totalPaginas }
					    		
					    				<a href="pesquisaAvancadaControle.php?pagina={"$proximo"}&Submit={"consultar"}"> <span class='txtAlteraAzul'> Próxima -> </span></a>
								
									{/if}
								</td>
							</tr>

				{/if}
</table>
</form>
</body>
</html>