<?php
/**
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
 
    Este programa está nomeado como pesquisaAvancadaControle.php e possui 481
	linhas de código. 
			 
	Você deve ter recebido uma cópia da Licença Pública Geral GNU
	junto com este programa; se não, escreva para a Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
	02111-1307, USA
			    
	Contato: accrvianna@bb.com.br (Antônio Carlos C. R. Vianna - desenvolverdor do projeto)
			 j.mar.rap@gmail.com (José Marcelo P. de Araujo - desenvolverdor do projeto)
 */
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
	 * as ações iniciais do objeto Pesquisa Avançada.  
	 * Utiliza o parâmetro acaoTermo para indicar
	 * a atividade referente ao Objeto Termo 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
		
		require_once '.pesquisaAvancadaDao.php';
 	  
		require_once '.rssDao.php';	
		
   		$smarty = new Smarty;
	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);

		$pesquisa = new PesquisaAvancada ();
		
		$rss = new RSS();
		
		$rss->consultarFonte();
		$rss->consultarTipoFonte();
		
		$smarty->assign('codFonte',$rss->codFonte);
		$smarty->assign('nomeFonte',$rss->nomeFonte);
		$smarty->assign('codTipoFonte',$rss->codTipoFonte);
		$smarty->assign('nomeTipoFonte',$rss->nomeTipoFonte);
		    
		$smarty->display('pesquisaAvancada.tpl');
	}

	/*
	 * Método responsável por limpar os   
	 * parâmentro colocados na SESSION
	 */
	
	function resetSession(){
	
		require_once '.rssDao.php';	
	
		$_SESSION['plvr']="";
		$_SESSION['slcFonte']="";
		$_SESSION['slcTipFonte']="";
		$_SESSION['rssNome']="";
		$_SESSION['dat']="";
		$_SESSION['palTTL']="";
		$_SESSION['palCNTD']="";
		
	}
	
	
	
	/*
	 * Método responsável por realizar consultar mais detalhadas 
	 * a tabela DOC
	 * 
	 * Recebe os parâmetros palavra, codigo da fonte, nome da fonte,
	 * codigo do tipo da fonte, nome do tipo da fonte, endereço RSS
	 * data
	 * 
	 * Retorna os objetos Documento, fonte e tipo da fonte 
	 */
	
	function consultaAvancada(){
  	  
  	  require_once '.pesquisaAvancadaDao.php';
  	  
  	  require_once '.rssDao.php';	
    
      $pesquisa = new PesquisaAvancada();
	  
      $smarty = new Smarty;
      
      $pagina = $_GET['pagina'];
	  
	  $plv 			= addslashes($_POST['palavra']);
      $selFonte 	= addslashes($_POST['selectFonte']);		
	  $selTipFonte 	= addslashes($_POST['selectTipoFonte']);  	
	  $rss 			= addslashes($_POST['rss']);
	  $dt 			= addslashes($_POST['data']);
	  $plvTtl 		= addslashes($_POST['palavraTitulo']);
	  $plvCNTD 		= addslashes($_POST['palavraConteudo']); 	
		

	    // este if é para limpar os termos de pesquisa da sessão e assim realizar um nova consulta
		if($plv != "" || $selFonte != ""  || $selTipFonte != "" || $rss != ""  || $dt != ""  || $plvTtl != "" || $plvCNTD != "" ){
	  
			resetSession();
			$pagina = 0;
		}
		
		if($plv != ""){
		
			$_SESSION['plvr']=$plv;
		}
		
	  	if($selFonte != ""){
	  
	  	 	$_SESSION['slcFonte']=$selFonte; 
	  	}
	  
	  	if($selTipFonte != ""){
	  
	  	 	$_SESSION['slcTipFonte']=$selTipFonte; 
	  	}
	  
	  	if($rss != ""){
	  
	  	 	$_SESSION['rssNome']=$rss; 
	  	}
	  
	  	if($dt != ""){
	  
	 		$arr = explode('-',$dt);
		
	 		//código para retirar o zero a esquerda
	    	//$arr[0] +=0;
	    	
	    	$dt = substr($arr[2], 2, 4) ."-". $arr[1] ."-". $arr[0];
	         
	         $_SESSION['dat']=$dt; 
	  	}
	   
	  	if($plvTtl != ""){
	  
	  	 	$_SESSION['palTTL']=$plvTtl; 
	  	}
	  
	  	if($plvCNTD != ""){
	  
	  	 	$_SESSION['palCNTD']=$plvCNTD; 
	  	}
	  
	  		
	  	$data			=isset ($_SESSION["dat"])?$_SESSION["dat"]:"";	
	  	$sTipFonte		=isset ($_SESSION["slcTipFonte"])?$_SESSION["slcTipFonte"]:"";	
	  	$sFonte			=isset ($_SESSION["slcFonte"])?$_SESSION["slcFonte"]:"";	
	  	$p				=isset ($_SESSION["plvr"])?$_SESSION["plvr"]:"";
	  	$rssNm			=isset ($_SESSION["rssNome"])?$_SESSION["rssNome"]:"";
	  	$palavraTTL		=isset ($_SESSION["palTTL"])?$_SESSION["palTTL"]:"";	
	  	$palavraCNTD	=isset ($_SESSION["palCNTD"])?$_SESSION["palCNTD"]:""; 
		   
	
		if($data == "" && $sTipFonte == ""  && $sFonte == "" && $p == "" && $rssNm == "" && $palavraTTL == "" && $palavraCNTD == "" ) {
	  
		  		//busca o nome da fonte 
			    $codigoFonte = $pesquisa->codFonte;
			    
			    $pesquisa->consultarNomeFonte($codigoFonte);
			    
			    $smarty->assign('nomedaFonte',$pesquisa->nomedaFonte);
			    
			    
			    //preenche os combos fonte e tipo da fonte no final da consulta
			    $rss = new RSS();
			    
			    $rss->consultarFonte();
				$rss->consultarTipoFonte();
				
				$smarty->assign('codFonte',$rss->codFonte);
				$smarty->assign('nomeFonte',$rss->nomeFonte);
				$smarty->assign('codTipoFonte',$rss->codTipoFonte);
				$smarty->assign('nomeTipoFonte',$rss->nomeTipoFonte);
		  		$smarty->assign('validacao',"branco");
			    
			    $smarty->display('pesquisaAvancada.tpl');
	  
	 	}else{
		  	
		  	
		  	  	$expressao 			= strtoupper($p);
			  	$expressaoTitulo 	= strtoupper($palavraTTL);
			  	$expressaoConteudo 	= strtoupper($palavraCNTD);
			  	
			  	$arrform 	   		= array(0 => $sFonte,1 => $sTipFonte,2 => $rssNm,3 => $data, 4=> $expressao, 5=>$expressaoTitulo, 6=>$expressaoConteudo);
			  
			  	
			  	//consulta os documentos segunda os parâmetros da pesquisa
			  	$pesquisa->consultarAvancado($arrform, $pagina);	
			  
			  	
			    
			  	$smarty->assign('codDocumento',$pesquisa->codDocumento);
			    $smarty->assign('codFonte',$pesquisa->codFonte);
			    $smarty->assign('codTipoDocumento',$pesquisa->codTipoDocumento);
			    $smarty->assign('titulo',$pesquisa->titulo);
			    $smarty->assign('conteudo',$pesquisa->conteudo);
			    $smarty->assign('link',$pesquisa->endereco);
			    $smarty->assign('dataAtualizacao',$pesquisa->dataAtualizacao);
			    
			    $smarty->assign('total',$pesquisa->total);
			    $smarty->assign('totalPaginas',$pesquisa->totalPaginas);
			    $smarty->assign('anterior',$pesquisa->anterior);
			    $smarty->assign('proximo',$pesquisa->proximo);
			    
			    //parâmetros pesquisados
			    $smarty->assign('palav',$p);
			    $smarty->assign('font',$sFonte);
			    $smarty->assign('tfont',$sTipFonte);
			    $smarty->assign('nomerss',$rssNm);
			    $smarty->assign('dAtualizacao',$data);
			    $smarty->assign('palavraTitulo',$palavraTTL);
			    $smarty->assign('palavraConteudo',$palavraCNTD);
			    
			    
			    //busca o nome da fonte 
			    $codigoFonte = $pesquisa->codFonte;
			    
			    $pesquisa->consultarNomeFonte($codigoFonte);
			    
			    $smarty->assign('nomedaFonte',$pesquisa->nomedaFonte);
			    
			    
			    //preenche os combos fonte e tipo da fonte no final da consulta
			    $rss = new RSS();
			    
			    $rss->consultarFonte();
				$rss->consultarTipoFonte();
				
				$smarty->assign('codFonte',$rss->codFonte);
				$smarty->assign('nomeFonte',$rss->nomeFonte);
				$smarty->assign('codTipoFonte',$rss->codTipoFonte);
				$smarty->assign('nomeTipoFonte',$rss->nomeTipoFonte);
			    
			    $smarty->display('pesquisaAvancada.tpl');
		    
	  }    
		    
	    
	}

	/*
	 * Método responsável por formatar os termos 
	 * para a pesquisa Avançada. Esta formatação se dá pelo 
	 * particionamento da string em várias palavras
	 */

	
	function formatarPalavra($palavras){
	
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
	  	
	
		$arr = explode(' ',$palavras);
	
		
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
	
		$p1  = strtoupper($palavra1);
    	$p2  = strtoupper($palavra2);
    	$p3  = strtoupper($palavra3);
    	$p4  = strtoupper($palavra4);
    	$p5  = strtoupper($palavra5);
    	$p6  = strtoupper($palavra6);
    	$p7  = strtoupper($palavra7);
    	$p8  = strtoupper($palavra8);
    	$p9  = strtoupper($palavra9);
		$p10 = strtoupper($palavra10);    
		
		
		$arrform = array(0 => $p1, 1 => $p2, 2 => $p3, 3 => $p4, 4 => $p5, 5 => $p6, 6 => $p7, 7 => $p8, 8 => $p9, 9 => $p10);
		
		return $arrform; 
	
	}
	
	
	/*
	 * Método centralizador das chamadas de outros métodos  
	 * que executam atividades referentes ao objeto Pesquisa Avançada
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 */
	
	switch ($Submit){
		
	  case "consultar":
	    consultaAvancada();
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