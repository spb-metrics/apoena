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
<title>{#titulo#}</title>
<head>

<link rel=stylesheet href="funcoes/css/intranet.css" type="text/css">
<script type="text/javascript" src="funcoes/apoena.js" language="JavaScript"></script>

</head>


<body class="body">

<form id="formulario" name="form1" method="post" action="{$php_self}">

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
	{if $validacao == "branco"}
		<tr>
			<td align="center">
				<span CLASS="alerta"> Selecione uma Ontologia</span>
			</td>
		</tr>
	{/if}
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
				
				{foreach from=$codOntologia key=k item=codigo}
				
					<option value="{$codOntologia[$k]}"=>{$nomeOntologia[$k]}</option>
						
				{/foreach}
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
			<span CLASS="titulo"> {$nmOnt}</span>
		</td>
	</tr>
	<td align="left">  
	    <input type=hidden name="cdONTOLOGIA" value="{$cdOnt}">
    </td>
	<tr>
		<td>
			<select name="selectClipping" onchange="javascript:consultaHtmlClipping(this.value);">
			
			<option value=""></option>
				
				{foreach from=$codClipping key=y item=codigo}
				
					<option value="{$codClipping[$y]}"=>{$nomeClipping[$y]}</option>
						
				{/foreach}
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

				{if $total > 0}
				
					<tr>
						<th align="center" colspan="3">
							<a class='txtAlteraAzul'>Quantidade de Documentos encontrados {$total} &nbsp;&nbsp;  para a(s) palavra(s) &nbsp;{$trmConsultado}</a>
						</th>
					</tr>
					
					{foreach from=$codDocumento key=i item=codigo}
			    	
			    		{if $titulo[$i] != ''}
			    		
				    		<tr>
								<td width="300" colspan="3" align="center"><a class='txtAlteraAzul'>{$nomeTipoFonte[$i]}</a></td>
							<tr>
			    	
				    	 	<tr>
								<td width="300" colspan="2" align="center"><a class='txtAlteraAzul'>Título do Documento</a></td>
								<td width="80" align="center"><a class='txtAlteraAzul'>Fonte do Documento</a></td>
								<td width="75" align="center"><a class='txtAlteraAzul'>Data do Documento</a></td>															
							<tr>
							<tr>
								<tr bgcolor="{cycle values="#dedbdb,#dedbdb"}">
								<th width="300" colspan="2"> <a href="{$link[$i]}" target="_blank"> <span CLASS="txtAzulClaro">{$titulo[$i]}</span></a></th>
								<th width="80"><span CLASS="txtAzulClaro">{$nomeFonte[$i]}</span></th>
								<th width="75"><span CLASS="txtAzulClaro">{$dataAtualizacao[$i]}</span></th>
							</tr>
							
							<tr>
								<td align="center" colspan="4" > <a class='txtAlteraAzul'>Descripção do Documento</a></td>	
							<tr>
							<tr>
								<tr bgcolor="{cycle values="#dedbdb,#dedbdb"}">
								<th align="left" colspan="4">{$conteudo[$i]}</th>
							</tr> 
						
						{/if}
						
					{/foreach}
					
							
					
							{if $consultaPalavra == 0}
							
								
								<tr>
									<td align="center" colspan="3">
									
										{if $anterior > 0} 
				
											<a href="documentoControle.php?pagina={"$anterior"}&Submit={"consultar"}"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
						    			{/if}
						    			
						    				<span CLASS="txtAzulClaro"> | </a>	
										
										{if $proximo < $totalPaginas }
						    		
						    				<a href="documentoControle.php?pagina={"$proximo"}&Submit={"consultar"}"> <span class='txtAlteraAzul'> Próxima -> </span></a>
										{/if}
									</td>
								</tr>
								
							{elseif $consultaPalavra == 1}	
								
								<tr>
									<td align="center" colspan="3">
																	
										{if $anterior > 0} 
				
											<a href="documentoControle.php?pagina={"$anterior"}&Submit={"consultarPorFonte"}"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
						    			{/if}
						    			
						    				<span CLASS="txtAzulClaro"> | </a>	
										
										{if $proximo < $totalPaginas }
						    		
						    				<a href="documentoControle.php?pagina={"$proximo"}&Submit={"consultarPorFonte"}"> <span class='txtAlteraAzul'> Próxima -> </span></a>
									
										{/if}
										
									</td>
								</tr>
								
							{else}	
								
								<tr>
									<td align="center" colspan="3">
										
								
									
										{if $anterior > 0} 
				
											<a href="documentoControle.php?pagina={"$anterior"}&Submit={"consultarClipping"}"> <span class='txtAlteraAzul'> <- Anterior </span></a> 
						    			{/if}
						    			
						    				<span CLASS="txtAzulClaro"> | </a>	
										
										{if $proximo < $totalPaginas }
						    		
						    				<a href="documentoControle.php?pagina={"$proximo"}&Submit={"consultarClipping"}"> <span class='txtAlteraAzul'> Próxima -> </span></a>
									
										{/if}
										
									</td>
								</tr>
						
							{/if}	

				{else}
				   
				{/if}
				
</table>

</form>
</body>
</html>