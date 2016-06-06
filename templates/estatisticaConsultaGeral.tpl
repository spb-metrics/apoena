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
			 
			    Este programa está nomeado como estatisticaConsultaGeral.tpl e possui 201
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

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
	
	<tr>
		<td align="center" colspan="3">
			<span CLASS="txtAzul12"> Tela CONSULTA Estatísticas Gerais</span>
		</td>
	</tr>	
	<tr>	
		<td align="center" colspan="2" >
			&nbsp;&nbsp;	
		</td>
	</tr>
</table>
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
		<tr>
	    	<td align="right" colspan="3"> 
	        		&nbsp;
	        </td>
	    </tr>
		<tr>
	    	<td align="right"> 
	        	<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="Estatística Geral">
	        </td>
	    </tr>
</table>	
	
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">	
	
	<tr>
		<td>
			&nbsp;
		</td>
	</tr>
	
	{if $consultaEstatistica == "DOC"}
	
		<tr>
			<td align="left" width="350">
				<span CLASS="txtAzul12"> Quantidade Total de Documentos : </span>
			</td>
			<td> <span CLASS="txtAzulClaro" width="200">{$valorTotal} </span></a></td>
		</tr>
	
	
	
		<tr>
			<td align="left" width="350">
				<span CLASS="txtAzul12"> Quantidade de Documentos de Hoje: </span>
			</td>
			<td> <span CLASS="txtAzulClaro" width="200">{$valorVinculoDoc[0]}</span></a></td>
		</tr>
	
	
	
		<tr>
			<td align="left">
				<span CLASS="txtAzul12"> Nome dos Tipos de Fontes: </span>
			</td>
			<td align="left">
				<span CLASS="txtAzul12"> Quantidade de Documentos por Tipos de Fontes: </span>
			</td>
		</tr>

	{foreach from=$codigoSequencialTipFont key=m item=codigo}	
		          
		<tr>
			<tr bgcolor="{cycle values="#dedbdb,#dedbdb"}">
			<td> <span CLASS="txtAzulClaro" width="350">{$nomeVinculoTipFont[$m]}</span></td>
			<td> 
				<input type=hidden name="codigoEstatistica" value="{$codigoEstatisticaTipFont[$m]}">
				<span CLASS="txtAzulClaro" width="200"> {$valorValorVinculoTipFont[$m]}</span></a>
			</td>
		</tr> 
		
	{/foreach}
	
	{/if}
	

</table>

<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">    
		<tr>
	    	<td align="right" colspan="3"> 
	        		&nbsp;
	        </td>
	    </tr>
		<tr>
	    	<td align="right"> 
	        	<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="Consultar Documentos por RSS">
	        	<input type="submit" name="Submit" CLASS="txtAlteraAzul" value="Consultar Documentos por Fonte">
	        </td>
	    </tr>
</table>	    
<table width="778" cellpadding="0" CLASS="txtCompromissoAzul" border="0">


		{if $consultaEstatistica == "RSS"}
	    
		    <tr>
				<td align="left" width="150">
					<span CLASS="txtAzul12"> Quantidade de Documentos: </span>
				</td>
				<td align="left" width="350">
					<span CLASS="txtAzul12"> Endereço RSS: </span>
				</td>
				<td align="left" width="350">
					<span CLASS="txtAzul12"> Nome Fonte: </span>
				</td>
			</tr>
			
			{foreach from=$codigoRSS key=b item=codigo}
			
				<tr>
					<td> <span CLASS="txtAzulClaro" width="150">{$quantidadeDocRSS[$b]}</span></a></td>
					<td> <span CLASS="txtAzulClaro" width="350">{$enderecoRSS[$b]}</span></a></td>
					<td> <span CLASS="txtAzulClaro" width="350">{$nomeFonte[$b]}</span></a></td>
				</tr>
			{/foreach}

		{elseif $consultaEstatistica == "FONT"}

			<tr>
	    		<td align="right" colspan="3"> 
	        		&nbsp;
	          	</td>
	    	</tr>
			<tr>
				<td align="left">
					<span CLASS="txtAzul12" colspan="2"> Nome da Fonte: </span>
				</td>
				<td align="left">
					<span CLASS="txtAzul12"> Quantidade de Documentos por Fonte: </span>
				</td>
			</tr>
	    	               
	    	{foreach from=$codigoSequencialFont key=j item=codigo}
	
				<tr>
					<tr bgcolor="{cycle values="#dedbdb,#dedbdb"}">
					<td> <span CLASS="txtAzulClaro" width="350">{$nomeVinculoFont[$j]}</span></td>
					<td> <span CLASS="txtAzulClaro" width="200"> {$valorVinculoFont[$j]}</span></a></td>
				</tr>
			{/foreach}

		{/if}		
</table>

</form>
</body>
</html>