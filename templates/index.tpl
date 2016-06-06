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
			 
			    Este programa está nomeado como index.tpl e possui 219
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
		<script type="text/javascript" language="JavaScript" src="funcoes/menunovo.js"></script>
	</head>
<body>
	<table width="930" cellpadding="0" CLASS="txtCompromissoAzul" border="0">				
			<tr>
				<td>
					<IMG  src="imagens/testeiraApoena.jpg"/>
				</td>
			</tr>
	</table>
	
	{if $indexMenu == "1"}
		
		<table width="930" cellpadding="0" CLASS="txtCompromissoAzul" border="0">
				<tr>
					<td width="70" align="left" height="420" valign="top" bgcolor="#000066">
					
						<script type="text/javascript" language="JavaScript">
							stm_bm(["menu005d",400,"","imagens/branco.gif",0,"","",0,0,250,0,100,1,0,0]);
							stm_bp("p0",[1,4,0,0,0,3,3, 3 ,100,"",-2,"",-2,50,0,0,"#fffff7","#fffff7","",3,0,0,"#000000"]);
	
							stm_ai("p0i0",[0,"Manutenção:","","",-1,-1,0,"","_self","","","imagens/indicador.gif","imagens/indicador.gif",3,3,0,"","",-1,-1,0,0,1,"#000066",0,"#000066",0,"","",3,3,1,1,"#000066","#000066","#ffffff","#ccffff","8pt Helvetica","8pt Helvetica",0,0]);
	
							stm_aix("p0i1","p0i0",[0,"Ontologia","","",-1,-1,0,"","","","","","",-1,-1,0,"imagens/seta.gif","imagens/seta.gif", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							
								stm_bpx("p1","p0",[1,2,0,0,0,3,0,0,100,"",-2,""]);
								stm_aix("p1i0","p0i0",[0,"Alterar","","",-1,-1,0,"ontologiaControle.php?acaoOnt=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i1","p0i0",[0,"Consultar","","",-1,-1,0,"ontologiaControle.php?acaoOnt=2","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i2","p0i0",[0,"Excluir","","",-1,-1,0,"ontologiaControle.php?acaoOnt=3","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i3","p0i0",[0,"Incluir","","",-1,-1,0,"ontologiaControle.php?acaoOnt=4","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_ep();
							
							stm_aix("p0i2","p0i0",[0,"Termos","","",-1,-1,0,"","","","","","",-1,-1,0,"imagens/seta.gif","imagens/seta.gif", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							
								stm_bpx("p2","p0",[1,2,0,0,0,3,0,0,100,"",-2,""]);
								stm_aix("p1i0","p0i0",[0,"Alterar","","",-1,-1,0,"thesaurosControle.php?acaoTermo=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i1","p0i0",[0,"Consultar","","",-1,-1,0,"thesaurosControle.php?acaoTermo=2","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i2","p0i0",[0,"Excluir","","",-1,-1,0,"thesaurosControle.php?acaoTermo=3","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i3","p0i0",[0,"Incluir","","",-1,-1,0,"thesaurosControle.php?acaoTermo=4","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_ep();
							
							stm_aix("p0i3","p0i0",[0,"Fonte","","",-1,-1,0,"","","","","","",-1,-1,0,"imagens/seta.gif","imagens/seta.gif", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							
								stm_bpx("p3","p0",[1,2,0,0,0,3,0,0,100,"",-2,""]);
								stm_aix("p1i0","p0i0",[0,"Alterar","","",-1,-1,0,"fonteControle.php?acaoFonte=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i1","p0i0",[0,"Consultar","","",-1,-1,0,"fonteControle.php?acaoFonte=2","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i2","p0i0",[0,"Excluir","","",-1,-1,0,"fonteControle.php?acaoFonte=3","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i3","p0i0",[0,"Incluir","","",-1,-1,0,"fonteControle.php?acaoFonte=4","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_ep();
							
							
							stm_aix("p0i4","p0i0",[0,"Rss","","",-1,-1,0,"","","","","","",-1,-1,0,"imagens/seta.gif","imagens/seta.gif", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							
								stm_bpx("p4","p0",[1,2,0,0,0,3,0,0,100,"",-2,""]);
								stm_aix("p1i0","p0i0",[0,"Alterar","","",-1,-1,0,"rssControle.php?acaoRss=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i1","p0i0",[0,"Consultar","","",-1,-1,0,"rssControle.php?acaoRss=2","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i2","p0i0",[0,"Excluir","","",-1,-1,0,"rssControle.php?acaoRss=3","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i3","p0i0",[0,"Incluir","","",-1,-1,0,"rssControle.php?acaoRss=4","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_ep();
							
											
							stm_aix("p0i5","p0i0",[0,"Tipo Usuário","","",-1,-1,0,"","","","","","",-1,-1,0,"imagens/seta.gif","imagens/seta.gif", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							
								stm_bpx("p5","p0",[1,2,0,0,0,3,0,0,100,"",-2,""]);
								stm_aix("p1i0","p0i0",[0,"Alterar","","",-1,-1,0,"tipoUsuarioControle.php?acaoTipoUsu=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i1","p0i0",[0,"Consultar","","",-1,-1,0,"tipoUsuarioControle.php?acaoTipoUsu=2","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i2","p0i0",[0,"Excluir","","",-1,-1,0,"tipoUsuarioControle.php?acaoTipoUsu=3","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i3","p0i0",[0,"Incluir","","",-1,-1,0,"tipoUsuarioControle.php?acaoTipoUsu=4","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_ep();
			
							
							
							stm_aix("p0i6","p0i0",[0,"Usuário","","",-1,-1,0,"","","","","","",-1,-1,0,"imagens/seta.gif","imagens/seta.gif", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							
								stm_bpx("p6","p0",[1,2,0,0,0,3,0,0,100,"",-2,""]);
								stm_aix("p1i0","p0i0",[0,"Alterar","","",-1,-1,0,"usuarioControle.php?acaoUsu=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i1","p0i0",[0,"Consultar","","",-1,-1,0,"usuarioControle.php?acaoUsu=2","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i2","p0i0",[0,"Excluir","","",-1,-1,0,"usuarioControle.php?acaoUsu=3","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i3","p0i0",[0,"Incluir","","",-1,-1,0,"usuarioControle.php?acaoUsu=4","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_ep();	
	
							stm_aix("p0i7","p0i0",[0,"Grupo Usuário","","",-1,-1,0,"","","","","","",-1,-1,0,"imagens/seta.gif","imagens/seta.gif", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							
								stm_bpx("p7","p0",[1,2,0,0,0,3,0,0,100,"",-2,""]);
								stm_aix("p1i0","p0i0",[0,"Alterar","","",-1,-1,0,"grupoUsuarioControle.php?acaoGrupoUsu=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i1","p0i0",[0,"Consultar","","",-1,-1,0,"grupoUsuarioControle.php?acaoGrupoUsu=2","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i2","p0i0",[0,"Excluir","","",-1,-1,0,"grupoUsuarioControle.php?acaoGrupoUsu=3","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i3","p0i0",[0,"Incluir","","",-1,-1,0,"grupoUsuarioControle.php?acaoGrupoUsu=4","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_ep();
								
								
						   stm_aix("p0i8","p0i0",[0,"Caixa Postal","","",-1,-1,0,"","frame","","","","",-1,-1,0,"imagens/seta.gif","imagens/seta.gif", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							    
							    stm_bpx("p8","p0",[1,2,0,0,0,3,0,0,100,"",-2,""]);
								stm_aix("p1i0","p0i0",[0,"Alterar","","",-1,-1,0,"mensagemControle.php?acaoClipping=2","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i1","p0i0",[0,"Consultar","","",-1,-1,0,"mensagemControle.php?acaoClipping=3","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i2","p0i0",[0,"Excluir","","",-1,-1,0,"mensagemControle.php?acaoClipping=4","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i3","p0i0",[0,"Inserir","","",-1,-1,0,"mensagemControle.php?acaoClipping=5","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_ep();		
								
									
						
							stm_aix("p0i9","p0i0",[0,"Consultas:"]);
							stm_aix("p0i10","p0i0",[0,"Notícias","","",-1,-1,0,"documentoControle.php","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
						
							stm_aix("p0i11","p0i0",[0,"Clipping:"]);
							stm_aix("p1i12","p0i0",[0,"Enviar","","",-1,-1,0,"mensagemControle.php?acaoClipping=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								
							stm_aix("p0i13","p0i0",[0,"Clipping","","",-1,-1,0,"","frame","","","","",-1,-1,0,"imagens/seta.gif","imagens/seta.gif", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
				                stm_bpx("p13","p0",[1,2,0,0,0,3,0,0,100,"",-2,""]);
				                stm_aix("p1i0","p0i0",[0,"Juntar","","",-1,-1,0,"mensagemControle.php?acaoClipping=6","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
						        stm_aix("p1i1","p0i0",[0,"Excluir","","",-1,-1,0,"mensagemControle.php?acaoClipping=7","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
						        stm_ep();
						
						
							stm_aix("p0i14","p0i0",[0,"Processamento:"]);
							stm_aix("p0i15","p0i0",[0,"Criar Notíca","","",-1,-1,0,"processamentoControle.php?acaoProcessamento=9","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							stm_aix("p0i16","p0i0",[0,"Baixar Documentos","","",-1,-1,0,"processamentoControle.php?acaoProcessamento=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							stm_aix("p0i17","p0i0",[0,"Gerar Clipping","","",-1,-1,0,"processamentoControle.php?acaoProcessamento=2","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							stm_aix("p0i18","p0i0",[0,"Agenda/Cópia","","",-1,-1,0,"","frame","","","","",-1,-1,0,"imagens/seta.gif","imagens/seta.gif", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
						     stm_bpx("p18","p0",[1,2,0,0,0,3,0,0,100,"",-2,""]);
								stm_aix("p1i0","p0i0",[0,"Agendar","","",-1,-1,0,"processamentoControle.php?acaoProcessamento=6","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i1","p0i0",[0,"Murchar","","",-1,-1,0,"processamentoControle.php?acaoProcessamento=7","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i1","p0i0",[0,"Restaurar","","",-1,-1,0,"processamentoControle.php?acaoProcessamento=8","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_ep();		
								
							stm_aix("p0i19","p0i0",[0,"Mineração:"]);	
							stm_aix("p0i20","p0i0",[0,"Geral","","",-1,-1,0,"","frame","","","","",-1,-1,0,"imagens/seta.gif","imagens/seta.gif", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
						     stm_bpx("p20","p0",[1,2,0,0,0,3,0,0,100,"",-2,""]);
								stm_aix("p1i0","p0i0",[0,"Estatísticas","","",-1,-1,0,"estatisticaControle.php?acaoEstatistica=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_aix("p1i1","p0i0",[0,"Mineração","","",-1,-1,0,"estatisticaControle.php?acaoEstatistica=2","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								stm_ep();					
							
							stm_aix("p0i21","p0i0",[0,"Ajuda:"]);
							stm_aix("p0i22","p0i0",[0,"Apresentação","","",-1,-1,0,"ajuda/introducao.html","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							
							stm_em();
						</script>	
					<td>
					<td width="930" align="center" height="420">  				
						<iframe name="frame" align="center" id="frame" src="" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" vspace="0" hspace="0" width="100%" height="420">
						</iframe>
				    </td>
				</tr>
		</table>
	
	{elseif $indexMenu == "2"}
	
		<table width="930" cellpadding="0" CLASS="txtCompromissoAzul" border="0">		
				<tr>
					<td width="70" align="left" height="420" valign="top" bgcolor="#000066">
					
						<script type="text/javascript" language="JavaScript">
							stm_bm(["menu005d",400,"","imagens/branco.gif",0,"","",0,0,250,0,100,1,0,0]);
							stm_bp("p0",[1,4,0,0,0,3,3, 3 ,100,"",-2,"",-2,50,0,0,"#fffff7","#fffff7","",3,0,0,"#000000"]);
	
							stm_ai("p0i0",[0,"Consulta:","","",-1,-1,0,"","_self","","","imagens/indicador.gif","imagens/indicador.gif",3,3,0,"","",-1,-1,0,0,1,"#000066",0,"#000066",0,"","",3,3,1,1,"#000066","#000066","#ffffff","#ccffff","8pt Helvetica","8pt Helvetica",0,0]);
							stm_aix("p0i11","p0i0",[0,"Notícias","","",-1,-1,0,"documentoControle.php","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
						
							stm_aix("p0i12","p0i0",[0,"Clipping:"]);
							stm_aix("p1i13","p0i0",[0,"Enviar","","",-1,-1,0,"mensagemControle.php?acaoClipping=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
								
							stm_aix("p0i18","p0i0",[0,"Estatísticas:"]);
							stm_aix("p0i19","p0i0",[0,"Geral","","",-1,-1,0,"estatisticaControle.php?acaoEstatistica=1","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							
							stm_aix("p0i20","p0i0",[0,"Ajuda:"]);
							stm_aix("p0i21","p0i0",[0,"Apresentação","","",-1,-1,0,"ajuda/introducao.html","frame","","","","",-1,-1,0,"","", -1, -1, 0, 0, 1,"#dedbdb",0,"#65b7ef",0,"","",3,3,1,1,"#b0e7ff #316589 #316589 #b0e7ff","#b0e7ff #316589 #316589 #b0e7ff","#000000","#000000"]);
							
							stm_em();
						</script>	
					<td>
					<td width="930" align="center" height="420">  				
						<iframe name="frame" align="center" id="frame" src="" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" vspace="0" hspace="0" width="100%" height="420">
						</iframe>
				    </td>
				</tr>
			
		</table>		
	
	{/if}
	
	
	<table width="930" cellpadding="0" CLASS="txtCompromissoAzul" border="0">		
			<tr>
				<td>
					<IMG  src="imagens/rodape.jpg"/>
				</td>
			</tr>
	</table>
</body>
</html>

