<?php


//	Software Apoena construído para gerar clippings de notícias.>
//    Copyright (C) <2008>  <Banco do Brasil>
   
//    Este programa é software livre; você pode redistribuí-lo e/ou
//    modificá-lo sob os termos da Licença Pública Geral GNU, conforme
//    publicada pela Free Software Foundation; tanto a versão 2 da
//    Licença como qualquer versão mais nova.

//    Este programa é distribuído na expectativa de ser útil, mas SEM
//    QUALQUER GARANTIA; sem mesmo a garantia implícita de
//    COMERCIALIZAÇÃO ou de ADEQUAÇÃO A QUALQUER PROPÓSITO EM
//    PARTICULAR. Consulte a Licença Pública Geral GNU para obter mais
//    detalhes.
 
//    Este programa está nomeado como documentoControle.php e possui 1907
//	linhas de código. 
			 
//	Você deve ter recebido uma cópia da Licença Pública Geral GNU
//	junto com este programa; se não, escreva para a Free Software
//	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
//	02111-1307, USA
			    
//	Contato: accrvianna@bb.com.br (Antônio Carlos C. R. Vianna - desenvolverdor do projeto)
//			 j.mar.rap@gmail.com (José Marcelo P. de Araujo - desenvolverdor do projeto)
 

session_start();

require_once 'includes/config.php';
require_once 'configs/.connect.php';

if(!isset ($smarty)){
	require('Smarty.class.php');
}

	$res = new TCon;
	$res->abreconexao;
	
	
	/*
	 * Método responsável por controlar
	 * as ações referentes ao objeto Documento.  
	 */
	
	function form(){
		
		require_once '.documentoDao.php';
		
   		$smarty = new Smarty;
	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);
	  	
	  	$documento = new Documento();
		
		$documento->consultaNomeOntologia();	      
	
    	$smarty->assign('codOntologia',$documento->codOntologia);
	    $smarty->assign('nomeOntologia',$documento->nomeOntologia);
	    $smarty->assign('descricaoOntologia',$documento->descricaoOntologia);
	    
	  	$smarty->display('documentoVisao.tpl');
	}

	
	
	/*
	 * Método responsável por receber e formatar
	 * os parâmetros de consulta a tabela DOC
	 * 
	 * Usa os parãmetro  palavra, pagina oriundos do templete documentoVisao.tpl
	 * 
	 * Retorno o objeto Documento
	 */
	
	function montarConsulta(){
		
		
		$palavra1 = ".|||.";
		$palavra2 = ".|||.";
		$palavra3 = ".|||.";
		$palavra4 = ".|||.";
		$palavra5 = ".|||.";
		$palavra6 = ".|||.";
		$palavra7 = ".|||.";
		$palavra8 = ".|||.";
		$palavra9 = ".|||.";
		$palavra10 = ".|||.";
		
		$palavraNova  ="";
		$palavraVelha ="";
		
		require_once '.documentoDao.php';
		
		
		$pagina = $_GET['pagina'];
		
		$plv = addslashes($_POST['palavra']);
		
		if($plv != ""){
		
			$_SESSION['plvr']=$plv;
		}
		
		$palavraNova=isset ($_SESSION["plvr"])?$_SESSION["plvr"]:"";
		
		
		$arr = explode(' ',$palavraNova);
		
		if($arr[0] !== null && $arr[0] !== ""){
			$palavra1 = $arr[0];
		}
		
		if($arr[1] !== null && $arr[1] !== ""){
			$palavra2 = $arr[1];
		}
		
		if($arr[2] !== null && $arr[2] !== ""){
			$palavra3 = $arr[2];
		}
		
		if($arr[3] !== null && $arr[3] !== ""){
			$palavra4 = $arr[3];
		}
		
		if($arr[4] !== null && $arr[4] !== ""){
			$palavra5 = $arr[4];
		}
		
		if($arr[5] !== null && $arr[5] !== ""){
			$palavra6 = $arr[5];
		}
		
		if($arr[6] !== null && $arr[6] !== ""){
			$palavra7 = $arr[6];
		}
		
		if($arr[7] !== null && $arr[7] !== ""){
			$palavra8 = $arr[7];
		}
		
		if($arr[8] !== null && $arr[8] !== ""){
			$palavra9 = $arr[8];
		}
	
		if($arr[9] !== null && $arr[9] !== ""){
			$palavra10 = $arr[9];
		}
		
		$palavra1 = retirarAcentuacao($palavra1);
		$palavra2 = retirarAcentuacao($palavra2);
		$palavra3 = retirarAcentuacao($palavra3);
		$palavra4 = retirarAcentuacao($palavra4);
		$palavra5 = retirarAcentuacao($palavra5);
		$palavra6 = retirarAcentuacao($palavra6);
		$palavra7 = retirarAcentuacao($palavra7);
		$palavra8 = retirarAcentuacao($palavra8);
		$palavra9 = retirarAcentuacao($palavra9);
		$palavra10 = retirarAcentuacao($palavra10);

				
		consultarDocumentoPalavra($palavra1, $palavra2, $palavra3, $palavra4, $palavra5, $palavra6, $palavra7, $palavra8, $palavra9, $palavra10, $pagina);		
	}


	
	/*
	 * Método responsável por consultar a tabela DOC
	 * de acordo com a palavra e numero da pagina recebidos como parâmetros 
	 * 
	 * Usa como para palavra e numero da pagina  
	 * 
	 * Retorna a palavra que serviu como parãmetro além do 
	 * objeto Documento
	 */

	function consultarDocumentoPalavra($plv1, $plv2, $plv3, $plv4, $plv5, $plv6, $plv7, $plv8, $plv9, $plv10, $pag){
		
		require_once '.documentoDao.php';
		

	    $documento= new Documento();

		$documento->consultarDocumentoPalavra($plv1, $plv2, $plv3, $plv4, $plv5, $plv6, $plv7, $plv8, $plv9, $plv10, $pag);

		if(isset ($smarty)){
		   require('Smarty.class.php');
	    }

		$smarty = new smarty;
	    
	    $smarty->assign('codDocumento',$documento->codDocumento);
	    $smarty->assign('titulo', $documento->titulo);
	    $smarty->assign('conteudo', $documento->conteudo);
	    $smarty->assign('total',$documento->total);
	    $smarty->assign('link',$documento->endereco);
	    $smarty->assign('nomeFonte',$documento->nomeFonte);
	    $smarty->assign('dataAtualizacao',$documento->dataAtualizacao);
	    $smarty->assign('totalPaginas',$documento->totalPaginas);
	    $smarty->assign('anterior',$documento->anterior);
	    $smarty->assign('proximo',$documento->proximo);
	    
	    
	    //limpa as variáveis  
	    
	    if($plv1 == ".|||."){
	       $plv1 = "";
	    }
		if($plv2 == ".|||."){
		   $plv2 = "";
		}
		if($plv3 == ".|||."){
		   $plv3 = "";
		}
		if($plv4 == ".|||."){
		   $plv4 = "";
		}
		if($plv5 == ".|||."){
		   $plv5 = "";
		}
		if($plv6 == ".|||."){
		   $plv6 = "";
		}
		if($plv7 == ".|||."){
		   $plv7 = "";
		}
		if($plv8 == ".|||."){
	       $plv8 = "";
	    }
		if($plv9 == ".|||."){
	       $plv9 = "";
	    }
		if($plv10 == ".|||."){
	       $plv10 = "";
	    }
	    
	    //seta a variáveis consultadas
	    $smarty->assign('trmConsultado', $plv1 . " ". $plv2 ." ". $plv3 ." ". $plv4 ." ". $plv5 ." ". $plv6 ." ". $plv7 ." ". $plv8 ." ".$plv9 ." ". $plv10);
	    
	    $smarty->assign('consultaPalavra', 0);
	    
	    
	    $documento->consultaNomeOntologia();	      
	
    	$smarty->assign('codOntologia',$documento->codOntologia);
	    $smarty->assign('nomeOntologia',$documento->nomeOntologia);
	    $smarty->assign('descricaoOntologia',$documento->descricaoOntologia);
	    
	    	    
	    $smarty->display('documentoVisao.tpl');
	}

	
	
	/*
	 * Método responsável por receber e formatar
	 * os parâmetros de consulta a tabela DOC
	 * 
	 * Usa os parãmetro  palavra, pagina oriundos do templete documentoVisao.tpl
	 * 
	 * Retorno o objeto Documento
	 */
	
	function montarConsultaPorTermo(){
		
		require_once '.documentoDao.php';
		
		$express = ".|||.";
		
		$termoNovo  ="";
		
		
		$pagina = $_GET['pagina'];
		
		$plv = addslashes($_POST['palavra']);
		
		if($plv != ""){
		
			$_SESSION['plvr']=$plv;
		}
		
		$termoNovo=isset ($_SESSION["plvr"])?$_SESSION["plvr"]:"";
		
		$trm = explode('\"',$termoNovo);
		
			for($i=0; $i<sizeof($trm); $i++){
			
				$expressao .= " ".$trm[$i];
			}
		
		$express = retirarAcentuacao($expressao);

		consultarDocumentoPorTermo($express, $pagina);		
	}
	
	
	
	/*
	 * Método responsável por consultar a tabela DOC
	 * de acordo com a palavra e numero da pagina recebidos como parâmetros 
	 * 
	 * Usa como para palavra e numero da pagina  
	 * 
	 * Retorna a palavra que serviu como parãmetro além do 
	 * objeto Documento
	 */

	function consultarDocumentoPorTermo($expressao,  $pag){
		
		require_once '.documentoDao.php';
		
		if(isset ($smarty)){
		   require('Smarty.class.php');
	    }

		$smarty = new smarty;

	    $documento= new Documento();

		$documento->consultarDocPorTermo($expressao,  $pag);
		
	    
	    $smarty->assign('codDocumento',$documento->codDocumento);
	    $smarty->assign('titulo', $documento->titulo);
	    $smarty->assign('conteudo', $documento->conteudo);
	    $smarty->assign('total',$documento->total);
	    $smarty->assign('link',$documento->endereco);
	    $smarty->assign('nomeFonte',$documento->nomeFonte);
	    $smarty->assign('dataAtualizacao',$documento->dataAtualizacao);
	    $smarty->assign('totalPaginas',$documento->totalPaginas);
	    $smarty->assign('anterior',$documento->anterior);
	    $smarty->assign('proximo',$documento->proximo);
	    
	    
	    //limpa as variáveis  
	    
	    if($expressao == ".|||."){
	       $expressao = "";
	    }
		
	    
	    //seta a variáveis consultadas
	    $smarty->assign('trmConsultado', $expressao);
	    
	    $smarty->assign('consultaPalavra', 0);
	    
	    
	    $documento->consultaNomeOntologia();	      
	
    	$smarty->assign('codOntologia',$documento->codOntologia);
	    $smarty->assign('nomeOntologia',$documento->nomeOntologia);
	    $smarty->assign('descricaoOntologia',$documento->descricaoOntologia);
	    
	    	    
	    $smarty->display('documentoVisao.tpl');
	}
	
	
	
	/*
	 * Método responsável por consultar a tabela DOC
	 * de acordo com o codigo do tipo da Fonte 
	 * 
	 * Usa como parâmetro o codigo do tipo da fonte  
	 * 
	 * Retorna a palavra que serviu como parãmetro além do 
	 * objeto Documento
	 */
	
	function consutarDocFonteTema(){

        require_once '.fonteDao.php';
	    require_once '.tipoFonteDao.php';
	    require_once '.documentoDao.php';
	    
	    $smarty = new smarty;   	

        $fonte 		= new Fonte();
        $tipoFonte 	= new TipoFonte();
        $documento  = new Documento();
	    	

		$codTipoFonte = $_GET['codTipFonte'];
		
		if($codTipoFonte != ""){
		
			$_SESSION['codigoTipFont']=$codTipoFonte;
		}
	
		$pagina = $_GET['pagina'];
	
	
		$codTipFonteSession=isset ($_SESSION["codigoTipFont"])?$_SESSION["codigoTipFont"]:"";
	
		
		$tipoFonte->consultarTipoFonte($codTipFonteSession);
		
		$documento->consultaDocumentoTipoFonte($codTipFonteSession, $pagina);
		
		$smarty->assign('codDocumento',$documento->codDocumento);
	    $smarty->assign('titulo',$documento->titulo);
	    $smarty->assign('conteudo',$documento->conteudo);
	    $smarty->assign('total',$documento->total);
	    $smarty->assign('link',$documento->endereco);
	    $smarty->assign('nomeFonte',$documento->nomeFonte);
	    $smarty->assign('dataAtualizacao',$documento->dataAtualizacao);
	    
	    $smarty->assign('totalPaginas',$documento->totalPaginas);
	    $smarty->assign('anterior',$documento->anterior);
	    $smarty->assign('proximo',$documento->proximo);
	    
	    $fonte->consultarFonte($codTipoFonte);

        $smarty->assign('codFonte',$fonte->codFonte);
        $smarty->assign('codTipoFonte',$fonte->codTipoFonte);
        $smarty->assign('nmFonte',$fonte->nomeFonte);
        $smarty->assign('nmTipoFonte',$tipoFonte->nomeTipoFonte);

        $smarty->display('consultaTema.tpl');

    }
	
    
	/*
	 * Método responsável por consultar a tabela CLP
	 * de acordo com o codigo do ontologia, data e hora 
	 * 
	 * Usa os parâmetros numero da pagina, codigo da Ontologia, data, hora
	 * 
	 * Retorna os objetos Documento e Ontologia
	 * 
	 */
    
	function consultarClipping(){
		
		require_once '.documentoDao.php';
		require_once '.clippingDao.php';
		
		$documento	= new Documento();
		$clipping 	= new Clipping();

		$smarty = new Smarty;

		$pagina = $_GET['pagina'];
		
		$codigoOntologia =$_POST['ontologia'];
		
		$data =addslashes($_POST['data']);
		
		$hora =addslashes($_POST['hora']);
		
		
		if($codigoOntologia != ""){
			$_SESSION['codigoOntologia']=$codigoOntologia;
		}
		
		$cdOntologia=isset ($_SESSION["codigoOntologia"])?$_SESSION["codigoOntologia"]:"";

		
		if($cdOntologia != "" && $cdOntologia != "7"){
		
		
			$documento->consultaClippingArquivo($cdOntologia, $data, $hora);
			
			$smarty->assign('codClipping',$documento->cdClippingArquivo);
			$smarty->assign('nomeClipping',$documento->nomeClipping);
			$smarty->assign('cdOnt',$documento->codigoOntologia);
			
			$cdOnt = $documento->codigoOntologia[0];
			
			$documento->consultaNomeOnt($cdOnt);
			
	    	$smarty->assign('nmOnt',$documento->nomeOnt);
	    
	    	$documento->consultaNomeOntologia();
	
    		$smarty->assign('codOntologia',$documento->codOntologia);
	    	$smarty->assign('nomeOntologia',$documento->nomeOntologia);
	    	$smarty->assign('descricaoOntologia',$documento->descricaoOntologia);
	    
			$smarty->display('documentoVisao.tpl');
		
		
		}else if($cdOntologia == "7"){
			
			$clipping->consultaClippingGeral();
			
			$smarty->assign('codClipping',$clipping->codClipping);
			$smarty->assign('nomeClipping',$clipping->nomeClipping);
			$smarty->assign('cdOnt', 7);
			
			$documento->consultaNomeOntologia();
	
    		$smarty->assign('codOntologia',$documento->codOntologia);
	    	$smarty->assign('nomeOntologia',$documento->nomeOntologia);
	    	$smarty->assign('descricaoOntologia',$documento->descricaoOntologia);
	    	
			$smarty->display('documentoVisao.tpl');
		
		}else{
		
			$documento->consultaNomeOntologia();
	
    		$smarty->assign('codOntologia',$documento->codOntologia);
	    	$smarty->assign('nomeOntologia',$documento->nomeOntologia);
	    	$smarty->assign('descricaoOntologia',$documento->descricaoOntologia);
			
			$smarty->assign('validacao','branco');
	    
			$smarty->display('documentoVisao.tpl');
		}
		
	}
	
	
	/*
	 * Método responsável por consulta a tabela DOC
	 * 
	 * Retorna o objeto Documento
	 */
	
	function consultar(){
  	
  		require_once '.documentoDao.php';

	    $documento= new Documento();

	    $documento->consultarDocumento();
	    
	    $smarty = new Smarty;
	    $smarty->assign('codDocumento',array($documento->codDocumento));
	    $smarty->assign('codFonte',$documento->codFonte);
	    $smarty->assign('codTipoDocumento',$documento->codTipoDocumento);
	    $smarty->assign('titulo',$documento->titulo);
	    $smarty->assign('conteudo',$documento->conteudo);
	    $smarty->assign('dataAtualizacao',$documento->dataAtualizacao);
	    $smarty->assign('horaAtualizacao',$documento->horaAtualizacao);
		$smarty->assign('dataAtSistema',$documento->dataAtSistema);
		$smarty->assign('horaAtSistema',$documento->horaAtSistema);
		 
		$smarty->display('documentoVisao.tpl');

	}
	
	
	
	/*
	 * Método responsável por salvar o Clipping na tabela CLIP 
	 * 
	 * Usa como parâmetros o código da ontologia
	 * 
	 * Retorno o objeto Ontologia 
	 */
	
	function salvarClipping(){
	
		require_once '.documentoDao.php';

	    $documento= new Documento();

	    $cdOntologia=isset ($_SESSION["codigoOntologia"])?$_SESSION["codigoOntologia"]:"";
	
	    $documento->consultarTabelaClip($cdOntologia);
	    
		$count = count($documento->codDocumento);
		
	
		$flag = fopen("/tmp/teste".date("H:i").".html","x");
		
		$conteudo = "<html>";
		$conteudo .= "<body>";
		$conteudo .= "<table>";
		
		
		for ($i = 0; $i < $count; $i++) {
		
			$conteudo .= "<tr>";
			$conteudo .= "<td>";
			$conteudo .= "&nbsp; &nbsp;";
			$conteudo .= "</td>";
			$conteudo .= "</tr>";
			$conteudo .= "<tr>";
			$conteudo .= "<td>";
			$conteudo .= "<a>Data da Notícia</a>";
			$conteudo .= "</td>";
			$conteudo .= "<td>";
			$conteudo .= $documento->dataAtualizacao[$i];
			$conteudo .= "</td>";
			$conteudo .= "</tr>";
			$conteudo .= "<tr>";
			$conteudo .= "<td>";
			$conteudo .= "<a href=".$documento->endereco[$i]." target='_blank' <span CLASS='txtAzulClaro'>". $documento->titulo[$i]."</span></a>";
			$conteudo .= "</td>";
			$conteudo .= "</tr>";
			$conteudo .= "<tr>";
			$conteudo .= "<td>";
			$conteudo .=  $documento->conteudo[$i];
			$conteudo .= "</td>";
			$conteudo .= "<td>";
			$conteudo .=  $documento->nomeFonte[$i];
			$conteudo .= "</td>";
			$conteudo .= "</tr>";
		}
		
		$conteudo .= "</table>";
		$conteudo .= "</body>";
		$conteudo .= "</html>";
		
		
		if(!file_exists($flag)){

			fwrite ($flag, $conteudo);
			fclose($flag);
		}
		
		
		$documento->consultarEnderecoDoc($cdOntologia);
		
		$count = count($documento->endereco);
		
		
		//for ($i = 0; $i < $count; $i++) {
		
			 $arquivo = "";
			 			 
			 //shell_exec("wget ". $documento->endereco[1] . "  -P /tmp/apoena");
			 shell_exec("wget http://www.fazenda.mg.gov.br/noticias/nfe.html  -P /tmp/apoena");
			 
			 shell_exec("cat /tmp/apoena/*.* > /tmp/arquivo.html");
			 
			 $handle = fopen ("/tmp/arquivo.html", "r");
			
			 	while (!feof ($handle)) {

			 		$buffer = fgets($handle, 4096);
					$arquivo .= $buffer;
					$buffer = "";
				}
				
			 	$documento->incluirArquivo($documento->codDocumento[$i], $arquivo);
				
			fclose ($handle);
		//}
		
		
		
		$documento->consultaNomeOntologia();
		
		$smarty = new Smarty;
		
		$smarty->assign('codOntologia',$documento->codOntologia);
	    $smarty->assign('nomeOntologia',$documento->nomeOntologia);
	    $smarty->assign('descricaoOntologia',$documento->descricaoOntologia);
		$smarty->assign('result', $documento->resultado);
	    
		
	    $smarty->display('documentoVisao.tpl');
		
	}
	
	/*
	 * Método responsável por executar a função de 
	 * retorno ao templete documentoVisao.tpl que é principal 
	 * forma de consulta a tabela DOC
	 */
	
	
	function retornar(){
	
		require_once '.documentoDao.php';

	    $documento= new Documento();
	
		$smarty = new Smarty;
		
		$documento->consultaNomeOntologia();
	
    	$smarty->assign('codOntologia',$documento->codOntologia);
	    $smarty->assign('nomeOntologia',$documento->nomeOntologia);
	    $smarty->assign('descricaoOntologia',$documento->descricaoOntologia);
		
		$smarty->display('documentoVisao.tpl');
	}


	/*
	 * Método responsável por consultar o arquivo HTML 
	 * segundo o codigo de um Clipping 
	 *
	 *Return o arquivo html do Clipping
	 */
	
	
	function obterClipping(){
	
		require_once '.documentoDao.php';
		require_once '.clippingDao.php';

	    $documento	= new Documento();
	    $clipping	= new Clipping();
	
		$smarty = new Smarty;
		
		$codigoClipping 	= $_GET['codClipping'];
		$codigoOntologia 	= $_POST['cdONTOLOGIA'];
		
		//desculpe mais o código indica um tipo diferente de clipping 
		if($codigoOntologia == "7"){
		
			$clipping->consultarClp($codigoClipping);
			
			$smarty->assign('arquivo',$clipping->arquivo[0]);
	    
			$smarty->display('clipping.tpl');
				
		}else{
		
			$documento->consultaArquivoClipping($codigoClipping);
			
			$smarty->assign('arquivo',$documento->arquivo);
	    
			$smarty->display('clipping.tpl');
		}
		
	}
	
	/*
	 * Método responsável por consultar todos os arquivos HTML 
	 * da tabela CLP_ARQ 
	 *
	 *Return o arquivo html do Clipping
	 */
	
	
	function consultarTodosClipping(){
		
		require_once '.clippingDao.php';
		require_once '.documentoDao.php';
		
	    $clipping 	= new Clipping();
		$documento 	= new Documento();
	    
		$smarty = new Smarty;
		
		$codigoOntologia =$_POST['ontologia'];
		
		
		if($codigoOntologia != "" && $codigoOntologia != "7"){
		
			$clipping->consultaTodosArquivoClipping($codigoOntologia);
		
			$smarty->assign('codigoClipping',$clipping->codClipping); 
			$smarty->assign('nomeClipping',$clipping->nomeClipping);
			$smarty->assign('nomeOntologia',$clipping->nomeOntologia);
			
			$smarty->assign('tipoClipping', 1);
    	
			$smarty->display('listaClipping.tpl');
		
		}else if($codigoOntologia == "7"){
		
			$clipping->consultaClippingGeral();
		
			$smarty->assign('codigoClipping',$clipping->codClipping); 
			$smarty->assign('nomeClipping',$clipping->nomeClipping);
			
			$smarty->assign('tipoClipping', 2);
			
			$smarty->display('listaClipping.tpl');
		
		}else{
		
			$smarty->assign('validacao', "branco");
			
			$documento->consultaNomeOntologia();	      
	
    		$smarty->assign('codOntologia',$documento->codOntologia);
	    	$smarty->assign('nomeOntologia',$documento->nomeOntologia);
	    	$smarty->assign('descricaoOntologia',$documento->descricaoOntologia);
			
			$smarty->display('documentoVisao.tpl');
		}
		
	}
	
	
	/**
	 * Método responsável por obter documentos
	 * de acordo com as palavras com mais índice de contagem
	 */
	
	function consultarClippingGeral(){
		
		require_once '.clippingDao.php';
		
	    $clipping 	= new Clipping();
		
		$smarty 	= new Smarty;
		
		$clipping->consultaClippingGeral();
		
		$smarty->assign('codigoClipping',$clipping->codClipping); 
		$smarty->assign('nomeClipping',$clipping->nomeClipping);
		
		$smarty->display('listaClipping.tpl');
	}
	
	
	/*
	 * Método responsável por consultar todos os arquivos HTML 
	 * da tabela CLP_ARQ segundo um codigo do clipping
	 *
	 *Return o arquivo html do Clipping
	 */
	
	function visualizarClipping(){
		
		require_once '.clippingDao.php';
		require_once '.documentoDao.php';

	    $clipping 	= new Clipping();
	    $documento 	= new Documento();
	
		$smarty = new Smarty;
		
		$codigoClipping =$_GET['cdClipping'];
		
		$clipping->consultaTodosArquivoClipping($codigoClipping);
	
	    $smarty->assign('codigoClipping',$clipping->codClipping); 
		$smarty->assign('nomeClipping',$clipping->nomeClipping);
		$smarty->assign('nomeOntologia',$clipping->nomeOntologia);
		
		$documento->consultaArquivoClipping($codigoClipping);
	
		$smarty->assign('arquivo',$documento->arquivo);
		$smarty->assign('tipoClipping', 1);
		
	    
		$smarty->display('listaClipping.tpl');
	}
	
	
	/*
	 * Método responsável por visualizar o
	 * clipping oriundo das palavras com maior
	 * índice de ocorrência
	 */
	
	function visualizarClippingCeral(){
		
		require_once '.clippingDao.php';
		
	    $clipping 	= new Clipping();
	    
		$smarty = new Smarty;
		
		$cdClippingGeral = $_GET['cdClippingGeral'];
		
		
		$clipping->consultaTodosClippingGeral($cdClippingGeral);
	
		$smarty->assign('arquivo',$clipping->textoArquivo);
		
		$smarty->display('listaClippingGeral.tpl');	
		
	}
		
	
	/*
	 * Método responsável por gerar o clipping personalizado  
	 * 
	 * Return um clipping personalizado 
	 */
	
	
	function comporClipping(){
		
		require_once '.documentoDao.php';
		require_once '.clippingDao.php';

	    $documento 	= new Documento();
	    $clipping	= new Clipping();
	
		$smarty = new Smarty;
		
		
		if(isset($_POST['internacional']) == "" && isset($_POST['independente']) == "" && isset($_POST['comercial']) == "" && isset($_POST['legislativo']) == "" && isset($_POST['judiciario']) == "" && isset($_POST['executivo']) == "" && isset($_POST['partidaria']) == "" && isset($_POST['softwareLivre']) == "" && isset($_POST['banco']) == "" ){
           
        	$smarty->assign('itens','branco');
	    
			$smarty->display('clipping.tpl');
        
        } else{ 
		
			$nomeOntologia = $_POST['nomeOntologia'];
		
			$codigosDocumentos = "";
				
        	$relatorio.= "<html>";
			$relatorio.= "<body>";
			
			$relatorio.= "<table width=778>";
			
			$relatorio.="<tr>";
			$relatorio.="<td>";
			$relatorio.="&nbsp;&nbsp;";
			$relatorio.="</td>";
			$relatorio.="</tr>";
			
			$relatorio.="<tr>";
			$relatorio.="<td>";
			$relatorio.="&nbsp;&nbsp;";
			$relatorio.="</td>";
			$relatorio.="</tr>";
				
			$relatorio.="<tr>";
			$relatorio.="<td align=center> <font color=#22407B size=4>";
			$relatorio.="RESUMO DO CLIPPING  - " . $nomeOntologia."_".date("d-m-Y")."_".date("H:i:s");
			$relatorio.="</td>";
			$relatorio.="</tr>";
			$relatorio.="</table>";
			
			$relatorio.="<tr>";
			$relatorio.="<td>";
			$relatorio.="&nbsp;&nbsp;";
			$relatorio.="</td>";
			$relatorio.="</tr>";
			        
//        	//INÍCIO PRIMEIRA PARTE DO CLIPPING SOMENTE O TÍTIULO 
        
			if(isset($_POST['internacional'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemInternacional = $_POST['internacional'];
				
				$relatorio.= "<table width=778>";	
				$relatorio.="<tr>";
				$relatorio.="<td> <font color=#22407B size=4>";
				$relatorio.="AGÊNCIA INTERNACIONAL";
				$relatorio.="</font></td>";
				$relatorio.="</tr>";
				
		    	for($i=0; $i<sizeof($itemInternacional); $i++) {
		
					$documento->consultarDocumentoPorCodigo($itemInternacional[$i]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a href=#textoInternacional" .$i.">";
					$relatorio.="<font color=#006FA8 size=2>". $documento->titulo[$i]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$i]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
				}
		    	
			   $relatorio.= "</table>";	
				
		    }
			
			if(isset($_POST['independente'])){	
				
				$documento 	= new Documento();
		    
				$itemIndependente = $_POST['independente'];
				
				$relatorio.= "<table width=778>";
				$relatorio.="<tr>";
				$relatorio.="<td> <font color=#22407B size=4>";
				$relatorio.="INDEPENDENTE";
				$relatorio.="</font></td>";
				$relatorio.="</tr>";
				
				
				for($a=0; $a<sizeof($itemIndependente); $a++) {
		
					$documento->consultarDocumentoPorCodigo($itemIndependente[$a]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a href=#textoIndependente" .$a.">";
					$relatorio.="<font color=#006FA8 size=2>". $documento->titulo[$a]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$a]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
				}
				
				$relatorio.= "</table>";
		    }
		    
		    if(isset($_POST['comercial'])){	
		    
		    	$documento 	= new Documento();
		    	
				$itemComercial = $_POST['comercial'];
				
				
				$relatorio.="<table width=778>";
				$relatorio.="<tr>";
				$relatorio.="<td> <font color=#22407B size=4>";
				$relatorio.="COMERCIAL";
				$relatorio.="</font></td>";
				$relatorio.="</tr>";
				
				for($b=0; $b<sizeof($itemComercial); $b++) {
		
					$documento->consultarDocumentoPorCodigo($itemComercial[$b]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a href=#textoComercial" .$b.">";
					$relatorio.="<font color=#006FA8 size=2>". $documento->titulo[$b]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$b]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
				}
				
				$relatorio.= "</table>";
		    }
			
			if(isset($_POST['legislativo'])){	
		    
		    	$documento 	= new Documento();
		    	
				$itemLegislativo = $_POST['legislativo'];
				
				
				$relatorio.= "<table width=778>";
				
				$relatorio.="<tr>";
				$relatorio.="<td> <font color=#22407B size=4>";
				$relatorio.="PODER LEGISLATIVO";
				$relatorio.="</font></td>";
				$relatorio.="</tr>";
				
				for($c=0; $c<sizeof($itemLegislativo); $c++) {
		
					$documento->consultarDocumentoPorCodigo($itemLegislativo[$c]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a href=#textoLegislativo" .$c.">";
					$relatorio.="<font color=#006FA8 size=2>". $documento->titulo[$c]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$c]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
				}
				
				$relatorio.= "</table>";
		    }
			
			if(isset($_POST['judiciario'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemJudiciario = $_POST['judiciario'];
				
				
				$relatorio.= "<table width=778>";
				
				$relatorio.="<tr>";
				$relatorio.="<td> <font color=#22407B size=4>";
				$relatorio.="PODER JUDICIÁRIO";
				$relatorio.="</font></td>";
				$relatorio.="</tr>";
				
		    	for($d=0; $d<sizeof($itemJudiciario); $d++) {
		
					$documento->consultarDocumentoPorCodigo($itemJudiciario[$d]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a href=#textoJudiciario" .$d.">";
					$relatorio.="<font color=#006FA8 size=2>". $documento->titulo[$d]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$d]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
				}
				
				$relatorio.= "</table>";
		    }
	    
		    if(isset($_POST['executivo'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemExecutivo = $_POST['executivo'];
				
				
				$relatorio.= "<table width=778>";
				
				$relatorio.="<tr>";
				$relatorio.="<td> <font color=#22407B size=4>";
				$relatorio.="PODER EXECUTIVO";
				$relatorio.="</font></td>";
				$relatorio.="</tr>";
				
				
		    	for($e=0; $e<sizeof($itemExecutivo); $e++) {
		
					$documento->consultarDocumentoPorCodigo($itemExecutivo[$e]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a href=#textoExecutivo" .$e.">";
					$relatorio.="<font color=#006FA8 size=2>". $documento->titulo[$e]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$e]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
				}
				
				$relatorio.= "</table>";
		    }
		    
		    if(isset($_POST['partidaria'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemPartidaria = $_POST['partidaria'];
				
				$relatorio.= "<table width=778>";
				
				$relatorio.="<tr>";
				$relatorio.="<td> <font color=#22407B size=4>";
				$relatorio.="PARTIDOS POLÍTICOS";
				$relatorio.="</font></td>";
				$relatorio.="</tr>";
				
				
		    	for($f=0; $f<sizeof($itemPartidaria); $f++) {
		
					$documento->consultarDocumentoPorCodigo($itemPartidaria[$f]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a href=#textoPartidaria" .$f.">";
					$relatorio.="<font color=#006FA8 size=2>". $documento->titulo[$f]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>".$documento->nomeFonte[$f]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
				}
				
				$relatorio.= "</table>";
		    }
		    
		    if(isset($_POST['softwareLivre'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemSoftwareLivre = $_POST['softwareLivre'];
				
				$relatorio.= "<table width=778>";
				
				$relatorio.="<tr>";
				$relatorio.="<td> <font color=#22407B size=4>";
				$relatorio.="SOFTWARE LIVRE";
				$relatorio.="</font></td>";
				$relatorio.="</tr>";
				
		    	for($g=0; $g<sizeof($itemSoftwareLivre); $g++) {
		    		
		    		$documento->consultarDocumentoPorCodigo($itemSoftwareLivre[$g]);
		    		
		    		$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a href=#textoSoftwareLivre" .$g.">";
					$relatorio.="<font color=#006FA8 size=2>". $documento->titulo[$g]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$g]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
		    		
		    	}
		    	
		    	$relatorio.= "</table>";
		    }
		    
		    if(isset($_POST['banco'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemBanco = $_POST['banco'];
				
				$relatorio.= "<table width=778>";
				
				$relatorio.="<tr>";
				$relatorio.="<td> <font color=#22407B size=4>";
				$relatorio.= "BANCOS";
				$relatorio.="</font></td>";
				$relatorio.="</tr>";
				
		    	for($h=0; $h<sizeof($itemBanco); $h++) {
		
					$documento->consultarDocumentoPorCodigo($itemBanco[$h]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a href=#textoBanco" .$h.">";
					$relatorio.="<font color=#006FA8 size=2>". $documento->titulo[$h]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$h]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
				}
				
				$relatorio.="<tr>";
				$relatorio.="<td>";
				$relatorio.="&nbsp;";
				$relatorio.="</td>";
				$relatorio.="</tr>";
				
				$relatorio.= "</table>";
		    }
	    
	    
//	    	//FIM DA PRIMEIRA PARTE DO CLIPPING
//	    	//INÍCIO DA SEGUNDA PARTE DO CLIPPING O CONTEUDO E LINK
	    	
	    	 if(isset($_POST['internacional'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemInternacional = $_POST['internacional'];
				
				$relatorio.= "<table width=778>";
				
				$relatorio.="<tr>";
				$relatorio.="<td>";
				$relatorio.="&nbsp;";
				$relatorio.="</td>";
				$relatorio.="</tr>";
				
				$relatorio.="<tr>";
				$relatorio.="<td align=center>  <font color=red> <b>";
				$relatorio.="Sinopse das notícias </b> </font>";
				$relatorio.="</td>";
				$relatorio.="</tr>";
				
				$relatorio.="<tr>";
				$relatorio.="<td>";
				$relatorio.="&nbsp;";
				$relatorio.="</td>";
				$relatorio.="</tr>";
				
				
		    	for($i=0; $i<sizeof($itemInternacional); $i++) {
		
					$documento->consultarDocumentoPorCodigo($itemInternacional[$i]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a name=textoInternacional".$i.">";
		    		$relatorio.= "<a href=".str_replace("\"", "",trim($documento->endereco[$i]))."> <font color=#006FA8 size=2>".$documento->titulo[$i]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$i]."</font>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
					$relatorio.="<tr>";
					$relatorio.="<td colspan=2> <p align=justify> <font color=#22407B size=2>";
					$relatorio.= $documento->conteudo[$i];
					$relatorio.="</p></td>";
					$relatorio.="</tr>";
				
				}
		    	
			   $relatorio.= "</table>";	
				
		    }
			
			if(isset($_POST['independente'])){	
				
				$documento 	= new Documento();
		    
				$itemIndependente = $_POST['independente'];
				
				$relatorio.= "<table width=778>";
				
				
				for($a=0; $a<sizeof($itemIndependente); $a++) {
		
					$documento->consultarDocumentoPorCodigo($itemIndependente[$a]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a name=textoIndependente".$a.">";
		    		$relatorio.= "<a href=".str_replace("\"", "",trim($documento->endereco[$a]))."> <font color=#006FA8 size=2>". $documento->titulo[$a]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$a]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
					$relatorio.="<tr>";
					$relatorio.="<td colspan=2> <p align=justify> <font color=#22407B size=2>";
					$relatorio.= $documento->conteudo[$a];
					$relatorio.="</p></td>";
					$relatorio.="</tr>";
				}
				
				$relatorio.= "</table>";
		    }


		    
		    if(isset($_POST['comercial'])){	
		    
		    	$documento 	= new Documento();
		    	
				$itemComercial = $_POST['comercial'];
				
				
				$relatorio.="<table width=778>";
				
				for($b=0; $b<sizeof($itemComercial); $b++) {
		
					$documento->consultarDocumentoPorCodigo($itemComercial[$b]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a name=textoComercial".$b.">";
		    		$relatorio.= "<a href=".str_replace("\"", "",trim($documento->endereco[$b]))."> <font color=#006FA8 size=2>". $documento->titulo[$b]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$b]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
					$relatorio.="<tr>";
					$relatorio.="<td colspan=2> <p align=justify> <font color=#22407B size=2>";
					$relatorio.= $documento->conteudo[$b];
					$relatorio.="</p></td>";
					$relatorio.="</tr>";
					
				}
				
				$relatorio.= "</table>";
		    }
			
			if(isset($_POST['legislativo'])){	
		    
		    	$documento 	= new Documento();
		    	
				$itemLegislativo = $_POST['legislativo'];
				
				
				$relatorio.= "<table width=778>";
				
				
				for($c=0; $c<sizeof($itemLegislativo); $c++) {
		
					$documento->consultarDocumentoPorCodigo($itemLegislativo[$c]);
					
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a name=textoLegislativo".$c.">";
		    		$relatorio.= "<a href=".str_replace("\"", "",trim($documento->endereco[$c]))."> <font color=#006FA8 size=2>". $documento->titulo[$c]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$c]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
					$relatorio.="<tr>";
					$relatorio.="<td colspan=2> <p align=justify> <font color=#22407B size=2>";
					$relatorio.= $documento->conteudo[$c];
					$relatorio.="</p></td>";
					$relatorio.="</tr>";
				}
				
				$relatorio.= "</table>";
		    }
			
			if(isset($_POST['judiciario'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemJudiciario = $_POST['judiciario'];
				
				
				$relatorio.= "<table width=778>";
				
				
		    	for($d=0; $d<sizeof($itemJudiciario); $d++) {
		
					$documento->consultarDocumentoPorCodigo($itemJudiciario[$d]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a name=textoJudiciario".$d.">";
		    		$relatorio.= "<a href=".str_replace("\"", "",trim($documento->endereco[$d]))."> <font color=#006FA8 size=2>". $documento->titulo[$d]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$d]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
					$relatorio.="<tr>";
					$relatorio.="<td colspan=2> <p align=justify> <font color=#22407B size=2>";
					$relatorio.= $documento->conteudo[$d];
					$relatorio.="</p></td>";
					$relatorio.="</tr>";
					
				}
				
				$relatorio.= "</table>";
		    }
		    
		    if(isset($_POST['executivo'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemExecutivo = $_POST['executivo'];
				
				
				$relatorio.= "<table width=778>";
				
				
		    	for($e=0; $e<sizeof($itemExecutivo); $e++) {
		
					$documento->consultarDocumentoPorCodigo($itemExecutivo[$e]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a name=textoExecutivo".$e.">";
		    		$relatorio.= "<a href=".str_replace("\"", "",trim($documento->endereco[$e]))."> <font color=#006FA8 size=2>". $documento->titulo[$e]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$e]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
					$relatorio.="<tr>";
					$relatorio.="<td colspan=2> <p align=justify> <font color=#22407B size=2>";
					$relatorio.= $documento->conteudo[$e];
					$relatorio.="</p></td>";
					$relatorio.="</tr>";
					
				}
				
				$relatorio.= "</table>";
		    }
		    
		    if(isset($_POST['partidaria'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemPartidaria = $_POST['partidaria'];
				
				$relatorio.= "<table width=778>";
				
				
		    	for($f=0; $f<sizeof($itemPartidaria); $f++) {
		
					$documento->consultarDocumentoPorCodigo($itemPartidaria[$f]);
					
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a name=textoPartidaria".$f.">";
		    		$relatorio.="<a href=".str_replace("\"", "",trim($documento->endereco[$f]))."> <font color=#006FA8 size=2>". $documento->titulo[$f]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$f]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
					$relatorio.="<tr>";
					$relatorio.="<td colspan=2> <p align=justify> <font color=#22407B size=2>";
					$relatorio.= $documento->conteudo[$f];
					$relatorio.="</p></td>";
					$relatorio.="</tr>";
					
				}
				
				$relatorio.= "</table>";
		    }
		    
		    if(isset($_POST['softwareLivre'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemSoftwareLivre = $_POST['softwareLivre'];
				
				$relatorio.= "<table width=778>";
				
				
		    	for($g=0; $g<sizeof($itemSoftwareLivre); $g++) {
		    		
		    		$documento->consultarDocumentoPorCodigo($itemSoftwareLivre[$g]);
		    		
		    		
		    		$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a name=textoSoftwareLivre".$g.">";
		    		$relatorio.= "<a href=".str_replace("\"", "",trim($documento->endereco[$g]))."> <font color=#006FA8 size=2>". $documento->titulo[$g]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$g]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
					$relatorio.="<tr>";
					$relatorio.="<td colspan=2> <p align=justify> <font color=#22407B size=2>";
					$relatorio.= $documento->conteudo[$g];
					$relatorio.="</p></td>";
					$relatorio.="</tr>";
		    		
		    	}
		    	
		    	$relatorio.= "</table>";
		    }
		    
		    if(isset($_POST['banco'])){	
		    
		    	$documento 	= new Documento();
		    
				$itemBanco = $_POST['banco'];
				
				$relatorio.= "<table width=778>";
				
				
		    	for($h=0; $h<sizeof($itemBanco); $h++) {
		
					$documento->consultarDocumentoPorCodigo($itemBanco[$h]);
					
					$relatorio.="<tr bgcolor=#dedbdb>";
					$relatorio.="<td whidth=200> <a name=textoBanco".$h.">";
		    		$relatorio.= "<a href=".str_replace("\"", "",trim($documento->endereco[$h]))."> <font color=#006FA8 size=2>". $documento->titulo[$h]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="<td whidth=50>";
					$relatorio.="<font color=#006FA8 size=2>". $documento->nomeFonte[$h]."</font></a>";
					$relatorio.="</td>";
					$relatorio.="</tr>";
					
					$relatorio.="<tr>";
					$relatorio.="<td colspan=2> <p align=justify> <font color=#22407B size=2>";
					$relatorio.= $documento->conteudo[$h];
					$relatorio.="</p></td>";
					$relatorio.="</tr>";
					
				}
				
				$relatorio.= "</table>";
		    }
	    	
	    	
	    	//FIM DA SEGUNDA PARTE DO CLIPPING 
	    
	    
	    	$relatorio.="</table>";
            $relatorio.="</body>";
		    $relatorio.="</html>";
	
			//retira as aspas simples e duplas do clipping, estava prejudicando a inserção de dados
			$relatorioLimpo = str_replace("\"", "", $relatorio);
			$relatorioLimpo = str_replace("'", "", $relatorioLimpo);
			
			$clipping->inserirClipping($nomeOntologia."_".date("d-m-Y")."_".date("H:i:s"), $relatorioLimpo); 
			
			$smarty->assign('resumoClipping',$relatorioLimpo);
	
			$smarty->assign('resultado',$clipping->resultado);
	
			$smarty->display('clipping.tpl');

        }
	    	   
	}
	
	
	/*
	 * Método responsável por obter todos os  
	 * documentos de acordo com o coódigo da fante
	 */

	function consultarDocFonte(){
	
		require_once '.documentoDao.php';
		require_once '.fonteDao.php';
		require_once '.tipoFonteDao.php';
		
	    $documento 	= new Documento();
		$fonte 		= new Fonte();
		$tipoFonte 	= new TipoFonte();
	    
		$smarty = new Smarty;
	
		$palavra1 = ".|||.";
		$palavra2 = ".|||.";
		$palavra3 = ".|||.";
		$palavra4 = ".|||.";
		$palavra5 = ".|||.";
		$palavra6 = ".|||.";
		$palavra7 = ".|||.";
		$palavra8 = ".|||.";
		$palavra9 = ".|||.";
		$palavra10 = ".|||.";
		
		$codigoFonte =$_GET['codigoFont'];
		$palavra 	 =$_GET['plvr'];
		$pagina  	 =$_GET['pagina']; 	
		
		
		if($palavra != ""){
		
			$_SESSION['palavraFonte']=$palavra;
		}
		
		$palavraSession=isset ($_SESSION["palavraFonte"])?$_SESSION["palavraFonte"]:"";
		
		
		if($codigoFonte != ""){
		
			$_SESSION['cdgFonte']=$codigoFonte;
		}
		
		$codigoFonteSession=isset ($_SESSION["cdgFonte"])?$_SESSION["cdgFonte"]:"";
		
		
		
		$codTipFonteSession=isset ($_SESSION["codigoTipFont"])?$_SESSION["codigoTipFont"]:"";
			
		
		
		$arr = explode(' ',$palavraSession);
		
		if($arr[0] !== null && $arr[0] !== ""){
			$palavra1 = $arr[0];
		}
		
		if($arr[1] !== null && $arr[1] !== ""){
			$palavra2 = $arr[1];
		}
		
		if($arr[2] !== null && $arr[2] !== ""){
			$palavra3 = $arr[2];
		}
		
		if($arr[3] !== null && $arr[3] !== ""){
			$palavra4 = $arr[3];
		}
		
		if($arr[4] !== null && $arr[4] !== ""){
			$palavra5 = $arr[4];
		}
		
		if($arr[5] !== null && $arr[5] !== ""){
			$palavra6 = $arr[5];
		}
		
		if($arr[6] !== null && $arr[6] !== ""){
			$palavra7 = $arr[6];
		}
		
		if($arr[7] !== null && $arr[7] !== ""){
			$palavra8 = $arr[7];
		}
		
		if($arr[8] !== null && $arr[8] !== ""){
			$palavra9 = $arr[8];
		}
	
		if($arr[9] !== null && $arr[9] !== ""){
			$palavra10 = $arr[9];
		}
		
		$palavra1 = retirarAcentuacao($palavra1);
		$palavra2 = retirarAcentuacao($palavra2);
		$palavra3 = retirarAcentuacao($palavra3);
		$palavra4 = retirarAcentuacao($palavra4);
		$palavra5 = retirarAcentuacao($palavra5);
		$palavra6 = retirarAcentuacao($palavra6);
		$palavra7 = retirarAcentuacao($palavra7);
		$palavra8 = retirarAcentuacao($palavra8);
		$palavra9 = retirarAcentuacao($palavra9);
		$palavra10 = retirarAcentuacao($palavra10);
		
		
		if($palavra1 == ".|||."){
		
			$documento->consultarDocumentoPorFonte($codigoFonteSession, $pagina);
			
			$smarty->assign('codDocumento',$documento->codDocumento);
		    $smarty->assign('titulo', $documento->titulo);
		    $smarty->assign('conteudo', $documento->conteudo);
		    $smarty->assign('total',$documento->total);
		    $smarty->assign('link',$documento->endereco);
		    $smarty->assign('nomeFonte',$documento->nomeFonte);
		    $smarty->assign('dataAtualizacao',$documento->dataAtualizacao);
		    $smarty->assign('totalPaginas',$documento->totalPaginas);
		    $smarty->assign('anterior',$documento->anterior);
		    $smarty->assign('proximo',$documento->proximo);
			
		    $fonte->consultarFonte($codTipFonteSession);

        	$smarty->assign('codFonte',$fonte->codFonte);
        	$smarty->assign('codTipoFonte',$fonte->codTipoFonte);
        	$smarty->assign('nmFonte',$fonte->nomeFonte);
        	$smarty->assign('nmTipoFonte',$tipoFonte->nomeTipoFonte);
        	
        	$smarty->assign('controleDocumento',1);
        	
			$smarty->display('consultaTema.tpl');
			
			
		}else{
		
		
			$documento->consultarDocumetFont($palavra1, $palavra2, $palavra3, $palavra4, $palavra5, $palavra6, $palavra7, $palavra8, $palavra9, $palavra10, $pagina, $codigoFonte);

			$smarty->assign('codDocumento',$documento->codDocumento);
		    $smarty->assign('titulo', $documento->titulo);
		    $smarty->assign('conteudo', $documento->conteudo);
		    $smarty->assign('total',$documento->total);
		    $smarty->assign('link',$documento->endereco);
		    $smarty->assign('nomeFonte',$documento->nomeFonte);
		    $smarty->assign('dataAtualizacao',$documento->dataAtualizacao);
		    $smarty->assign('totalPaginas',$documento->totalPaginas);
		    $smarty->assign('anterior',$documento->anterior);
		    $smarty->assign('proximo',$documento->proximo);
			
		    $fonte->consultarFonte($codTipFonteSession);

        	$smarty->assign('codFonte',$fonte->codFonte);
        	$smarty->assign('codTipoFonte',$fonte->codTipoFonte);
        	$smarty->assign('nmFonte',$fonte->nomeFonte);
        	$smarty->assign('nmTipoFonte',$tipoFonte->nomeTipoFonte);
        	
        	
        	$smarty->assign('controleDocumento',1);
        	
			$smarty->display('consultaTema.tpl');
		
		}
		
	
	}
	
	
	/*
	 * Método centralizador das chamadas de outros métodos  
	 * que executam atividades referentes ao objeto Documento
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 */
	
	switch ($Submit){
		
	  case "consultar":
	  
	  	$expressao = $_POST['palavra'];
	  
		  if (eregi("\"", $expressao)) {
		  	
		  	montarConsultaPorTermo();
		  }else{
		  	
		  	montarConsulta();
		  }

	    break;
	  case "consultarClippingGeral":
	    consultarClippingGeral();
	    break;  
	  case "consultarClipping":
	    consultarClipping();
	    break;
	  case "apresentarClipping":
	    obterClipping();
	    break;    
	  case "busca":
	    consultar();
	    break;
	  case "VisualizarClipping":
	    visualizarClipping();
	    break;
	  case "VisualizarClippingGeral":
	  	visualizarClippingCeral();
	  	break;   
	  case "consultarTodosClipping":
	  	consultarTodosClipping();  
	    break;
	  case "consultarPorFonte":
	  	consutarDocFonteTema();
	    break;
	  case "voltar":
	  	retornar();
	    break;
	  case "comporClipping";
	    comporClipping();
	    break;
	  case "consultarDocumentoFonte";
	  	consultarDocFonte();
	    break;
	  default:
	    form();
	    break;
	}

	
	/*
	 * Método utilizado para retirar
	 * a acentuação gráfica de palavras
	 * 
	 * Usa como parâmentro a palavra
	 * 
	 * Retorna a palavra sem acentuação gráfica
	 */
	

	function retirarAcentuacao( $dado ) {
		
		 // acento agudo
	     $dado = str_replace("á", "a", $dado);
	     $dado = str_replace("é", "e", $dado);
	     $dado = str_replace("í", "i", $dado);
	     $dado = str_replace("ó", "o", $dado);
	     $dado = str_replace("ú", "u", $dado);
	     $dado = str_replace("Á", "A", $dado);
	     $dado = str_replace("É", "E", $dado);
	     $dado = str_replace("Í", "I", $dado);
	     $dado = str_replace("Ó", "O", $dado);
	     $dado = str_replace("Ú", "U", $dado);
	
	     // acento circunflexo
	     $dado = str_replace("â", "a", $dado);
	     $dado = str_replace("ê", "e", $dado);
	     $dado = str_replace("î", "i", $dado);
	     $dado = str_replace("ô", "o", $dado);
	     $dado = str_replace("û", "u", $dado);
	     $dado = str_replace("Â", "A", $dado);
	     $dado = str_replace("Ê", "E", $dado);
	     $dado = str_replace("Î", "I", $dado);
	     $dado = str_replace("Ô", "O", $dado);
	     $dado = str_replace("Û", "U", $dado);
	
	     // til
	     $dado = str_replace("ã", "a", $dado);
	     $dado = str_replace("õ", "o", $dado);
	     $dado = str_replace("Ã", "A", $dado);
	     $dado = str_replace("Õ", "O", $dado);
	
	     // ce-cedilha
	     $dado = str_replace("ç", "c", $dado);
	     $dado = str_replace("Ç", "C", $dado);
	
	     // trema
	     $dado = str_replace("ü", "u", $dado);
	     $dado = str_replace("Ü", "U", $dado);
	
	     // crase
	     $dado = str_replace("à", "a", $dado);
	     $dado = str_replace("è", "e", $dado);
	     $dado = str_replace("ì", "i", $dado);
	     $dado = str_replace("ò", "o", $dado);
	     $dado = str_replace("À", "A", $dado);
	     $dado = str_replace("È", "E", $dado);
	     $dado = str_replace("Ì", "I", $dado);
	     $dado = str_replace("Ò", "O", $dado);
	     $dado = str_replace("Ù", "U", $dado);
	     $dado = str_replace("\\", " ", $dado);

     	return $dado;
	}


	/*
	 * Método utilizado para retirar
	 * a caracteres especiais de palavras
	 * 
	 * Usa como parâmentro a palavra
	 * 
	 * Retorna a palavra sem os caracteres especiais
	 */	
	
	
	function retirarCaracteresEspeciais($plvr){
		
		 $plvr = str_replace("&", "", $plvr);
	     $plvr = str_replace("/", "", $plvr);
	     $plvr = str_replace("\\","", $plvr);
	     $plvr = str_replace("#", "", $plvr);
	     $plvr = str_replace("!", "", $plvr);
	     $plvr = str_replace("(", "", $plvr);
	     $plvr = str_replace(")", "", $plvr);
	     $plvr = str_replace("'", "", $plvr);
	     $plvr = str_replace("\"","", $plvr);
	     $plvr = str_replace("º", "", $plvr);
	     $plvr = str_replace("?", "", $plvr);
	     $plvr = str_replace("]", "", $plvr);
	     $plvr = str_replace("[", "", $plvr);
	     $plvr = str_replace("ª", "", $plvr);
	     $plvr = str_replace("§", "", $plvr);
	     
	     
		return $plvr;
	}



?>