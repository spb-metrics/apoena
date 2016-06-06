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
 
    Este programa está nomeado como fonteControle.php e possui 768
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
	 * as ações iniciais do objeto Fonte.  
	 * Utiliza o parâmetro acaoFonte para indicar
	 * a atividade referente ao Objeto Fonte 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
		
		require_once '.fonteDao.php';
		require_once '.tipoFonteDao.php';
 	  
   		$smarty = new Smarty;
	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);

	  	$fonte 		= new Fonte();
	  	$tipoFonte	= new TipoFonte();
	  	
		$acaoFonte = $_GET['acaoFonte'];
	  	
	  	switch ($acaoFonte){
		
	  		case 1:
	  		
	  			$fonte->consultaTabelaFonte();
	  			
	  			$smarty->assign('codFonte',$fonte->codFonte);
	   			$smarty->assign('codTipoFonte',$fonte->codTipoFonte);
	   			$smarty->assign('nomeFonte',$fonte->nomeFonte);
	  			
	  			$smarty->display('fonteAlteracao.tpl');
	    	break;
	  		case 2:
	    		
	  			$fonte->consultaTabelaFonte();
	  			
	  			$smarty->assign('codFonte',$fonte->codFonte);
	   			$smarty->assign('codTipoFonte',$fonte->codTipoFonte);
	   			$smarty->assign('nomeFonte',$fonte->nomeFonte);
	  			
	    		$smarty->display('fonteConsulta.tpl');
	    	break;
	    	case 3:
	    		
	    		$fonte->consultaTabelaFonte();
	  			
	  			$smarty->assign('codFonte',$fonte->codFonte);
	   			$smarty->assign('codTipoFonte',$fonte->codTipoFonte);
	   			$smarty->assign('nomeFonte',$fonte->nomeFonte);
	    		
	    		$smarty->display('fonteDelecao.tpl');
	    	break;
	    	case 4:
	    	
	    		$tipoFonte->consultaTipoFonte();
	    	
	    		$smarty->assign('codTipoFonte',$tipoFonte->codTipoFonte);
	   			$smarty->assign('nomeTipoFonte',$tipoFonte->nomeTipoFonte);
	   			$smarty->assign('descricaoTipoFonte',$tipoFonte->descricaoTipo);
	    		
	    		$smarty->display('fonteInclusao.tpl');
	    	break;
	    	default:
	    	break;
		}
	  	
	}

	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete fonteConsulta.tpl e, 
	 * repassa-los ao método consultaDocumentoFonte
	 * 
	 * Recebe os parâmetros pagina e código da Fonte 
	 * 
	 * Retornar os objetos Documento e Fonte. 
	 */
	
	
	function consultarDocumentoFonte(){
		
		require_once '.documentoDao.php';
		require_once '.fonteDao.php';
		require_once '.tipoFonteDao.php';
			
		
		if(isset ($smarty)){
		   require('Smarty.class.php');
	    }
		
	    $documento 	= new Documento();
	    $tipoFonte 	= new TipoFonte();
       	$fonte 		= new Fonte();
	    
	    
	    $pagina = $_GET['pagina'];
	    
	    $cdFonte = $_GET['codFonte'];
	    
	    if($cdFonte != ""){
	    	
	    	$_SESSION['cdFont']=$cdFonte;
	    }
	    
	    
	    $cdFt=isset ($_SESSION["cdFont"])?$_SESSION["cdFont"]:"";
	    
	    $codTipFonteSession=isset ($_SESSION["codigoTipFont"])?$_SESSION["codigoTipFont"]:"";
	    
	    
	    if($cdFt != ""){
	   
	   		$documento->consultarDocumentoPorFonte($cdFt, $pagina);
	    	
	    }else if($codTipFonteSession != ""){
	    
	    	$documento->consultaDocumentoTipoFonte($codTipFonteSession, $pagina);
	    }

		
		$smarty = new smarty;
	    
		$smarty->assign('codDocumento',$documento->codDocumento);
	    $smarty->assign('titulo',$documento->titulo);
	    $smarty->assign('conteudo',$documento->conteudo);
	    $smarty->assign('link',$documento->endereco);
	    $smarty->assign('nomeFonte',$documento->nomeFonte);
	    $smarty->assign('dataAtualizacao',$documento->dataAtualizacao);
	    $smarty->assign('nmTipoFonte',$tipoFonte->nomeTipoFonte);
	    
	    $smarty->assign('total',$documento->total);
	    
	    $smarty->assign('totalPaginas',$documento->totalPaginas);
	    $smarty->assign('anterior',$documento->anterior);
	    $smarty->assign('proximo',$documento->proximo);
	    
	    $codigoTipoFonte=isset ($_SESSION["codigoTipFont"])?$_SESSION["codigoTipFont"]:"";
	    
	    $fonte->consultarFonte($codigoTipoFonte);

        $smarty->assign('codFonte',$fonte->codFonte);
        $smarty->assign('codTipoFonte',$fonte->codTipoFonte);
        $smarty->assign('nmFonte',$fonte->nomeFonte);
	    
	    $smarty->display('consultaTema.tpl');
	}
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete fonteDeleta.tpl e, 
	 * repassa-los ao método deletarFonte
	 * 
	 * Recebe os parâmetros itens
	 * 
	 * Retornar o objeto Fonte atualizado 
	 */
	
	function deletarFonte(){
	
		require_once '.fonteDao.php';

		$smarty = new Smarty;
		
	    $fonte = new Fonte();
	    
	    if(isset($_POST['itens'])){	
	    
	    	$fontesSelecionados = $_POST['itens'];
			
	    	for($i=0; $i<sizeof($fontesSelecionados); $i++) {
	
	    		$fonte->deletarFonte($fontesSelecionados[$i]);
			}
	    }else{
	    
	    	$smarty->assign('campo','branco');
	    }
		
		$smarty->assign('resultado',$fonte->resultado);
		
		$fonte->consultaTabelaFonte();
	  			
	  	$smarty->assign('codFonte',$fonte->codFonte);
	   	$smarty->assign('codTipoFonte',$fonte->codTipoFonte);
	   	$smarty->assign('nomeFonte',$fonte->nomeFonte);
	    
	    $smarty->display('fonteDelecao.tpl');
	
	}
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete fonteInclusao.tpl e, 
	 * repassa-los ao método incluirFonte
	 * 
	 * Recebe os parâmetros nome do Tipo da Fonte e nome da Fonte
	 * 
	 * Retorna o objeto Fonte atualizado
	 *  
	 */
	
	
	function incluirFonte(){
	
		require_once '.fonteDao.php';
		require_once '.tipoFonteDao.php';
		
		$smarty = new Smarty;
		
		$fonte 		= new Fonte();
		$tipoFonte 	= new TipoFonte();
	
	    $codTipoFonte 	= strtoupper($_POST['nomeTipoFonte']);
	    $nomeFonte    	= addslashes(strtoupper($_POST['nomeFonte']));
	    
	    $fonte->consultarFontePorNome($nomeFonte);
	    
	    $codigoFonteExistente = $fonte->codFonte[0]; 
	    
	    if($nomeFonte == "" ||  $codTipoFonte == ""){
	    
	    	$smarty->assign('campo','branco');
	    }
	    
	    if($nomeFonte != "" &&  $codTipoFonte != "" && $codigoFonteExistente == ""){
	    	$fonte->incluirFonte($codTipoFonte, retirarAcentuacao($nomeFonte));
	    }
	    
	    if($codigoFonteExistente != ""){
	    	
	    	$smarty->assign('campoNome','existe');
	    	$codigoFonteExistente = "";
	    }	
	    	
	    	
	    $tipoFonte->consultaTipoFonte();
	    
	    
	    $smarty->assign('resultado',$fonte->resultado);
	    $smarty->assign('codTipoFonte',$tipoFonte->codTipoFonte);
   		$smarty->assign('nomeTipoFonte',$tipoFonte->nomeTipoFonte);
   		$smarty->assign('descricaoTipoFonte',$tipoFonte->descricaoTipo);
    	
    	$smarty->display('fonteInclusao.tpl');
	
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos dos templetes que fazem a consultas a tabela FONT e, 
	 * repassa-los ao método consultaTipoFonte
	 * 
	 * Recebe o parâmetro código da Fonte 
	 * 
	 * Retorna o objeto fonte duas vezes, mas com os nomes dos campos diferente 
	 * para serem mostrados no template  
	 * 
	 */
	
	
	function consultarFonte(){
	
		require_once '.fonteDao.php';
		require_once '.tipoFonteDao.php';
		
		$fonte 		= new Fonte();
		$tipoFonte 	= new TipoFonte();
		
		$codigoFonte = $_GET['cdFonte'];
		
		$fonte->consultaFonte($codigoFonte);
	    
	    $tipoFonte->consultaTipoFonte();
	    
	    $smarty = new Smarty;
	    
	    $smarty->assign('cdFonte',$fonte->codFonte);
   		$smarty->assign('cdTipFont',$fonte->codTipoFonte);
   		$smarty->assign('nmFonte',$fonte->nomeFonte);
    	
   		$smarty->assign('total',$fonte->total);
   		$smarty->assign('totalPaginas',$fonte->totalPaginas);
		$smarty->assign('anterior',$fonte->anterior);
		$smarty->assign('proximo',$fonte->proximo);
   		
   		$fonte  = new Fonte();
   		
   		$fonte->consultaTabelaFonte();
	  		
  		$smarty->assign('codFonte',$fonte->codFonte);
   		$smarty->assign('nomeFonte',$fonte->nomeFonte);
	  
   		$smarty->assign('codTipoFonte',$tipoFonte->codTipoFonte);
   		$smarty->assign('nomeTipoFonte',$tipoFonte->nomeTipoFonte);
   		$smarty->assign('descricaoTipoFonte',$tipoFonte->descricaoTipo);
   		
   		$smarty->display('fonteAlteracao.tpl');
	
	}
	
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete fonteConsulta.tpl, 
	 * repassa-los ao método alteraFonte
	 * 
	 * Recebe os parâmetros o código da Fonte, nome da Fonte e código do Tipo da Fonte 
	 * 
	 * Retorna o objeto fonte atualizado 
	 * 
	 */
	
	
	function alterarFonte(){
	
		
		require_once '.fonteDao.php';
		require_once '.tipoFonteDao.php';
		
		$smarty = new Smarty;
		
		$fonte 		= new Fonte();
		$tipoFonte 	= new TipoFonte();
		
		$cdFonte 		= $_POST['cdFonte'];
		$nomeFonte 		= addslashes(strtoupper($_POST['nomeFonte']));
		$codTipoFonte 	= $_POST['TipoFonte'];
	    
		
		if($nomeFonte == "" || $codTipoFonte == ""){
		
			$smarty->assign('campo','branco');
		}
		
		if($nomeFonte != "" &&  $codTipoFonte != "" && $cdFonte != ""){
	    	$fonte->alteraFonte($cdFonte, retirarAcentuacao($nomeFonte), $codTipoFonte);
		}
	    
	    $fonte->consultaTabelaFonte();
	    
	    $smarty->assign('resultado',$fonte->resultado);	
  		$smarty->assign('codFonte',$fonte->codFonte);
   		$smarty->assign('nomeFonte',$fonte->nomeFonte);
	  
   		$smarty->display('fonteAlteracao.tpl');
	
	}
	
	
	
	/*
	 * Método responsável por receber e formatar
	 * os parâmetros de consulta a tabela DOC
	 * 
	 * Usa os parãmetro  palavra e codigo do tipo da fonte oriundos do templete documentoVisao.tpl
	 * 
	 * Retorna o objeto Documento
	 */
	
	
	function montarConsultaPorFonte(){
		
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
		
		$pagina = $_GET['pagina'];
		
		
		//CAPTURA E COLOCAR A PALAVRA NA SESSÃO
		$plv = addslashes($_POST['palavra']);
		
		if($plv != ""){
		
			$_SESSION['plvr']=$plv;
		}
		
		//CAPTURA E COLOCAR O CODIGO TIPO FONTE NA SESSÃO
		$codigoFonte = $_POST['fonte'];
		
		
		if($codigoFonte != ""){
			
			$_SESSION['cdTFont']=$codigoFonte;
		}
				
		$p=isset ($_SESSION["plvr"])?$_SESSION["plvr"]:"";
		
		
		$cdFonte=isset ($_SESSION["cdTFont"])?$_SESSION["cdTFont"]:"";
		
		$codigoTipFonteSession = isset ($_SESSION["codigoTipFont"])?$_SESSION["codigoTipFont"]:""; 
		
		$arr = explode(' ',$p);
		
		if($arr[0] != null && $arr[0] != ""){
			$palavra1 = $arr[0];
		}
		
		if($arr[1] != null && $arr[1] != ""){
			$palavra2 = $arr[1];
		}
		
		if($arr[2] != null && $arr[2] != ""){
			$palavra3 = $arr[2];
		}
		
		if($arr[3] != null && $arr[3] != ""){
			$palavra4 = $arr[3];
		}
		
		if($arr[4] != null && $arr[4] != ""){
			$palavra5 = $arr[4];
		}
		
		if($arr[5] != null && $arr[5] != ""){
			$palavra6 = $arr[5];
		}
		
		if($arr[6] != null && $arr[6] != ""){
			$palavra7 = $arr[6];
		}
		
		if($arr[7] != null && $arr[7] != ""){
			$palavra8 = $arr[7];
		}
		
		if($arr[8] != null && $arr[8] != ""){
			$palavra9 = $arr[8];
		}
	
		if($arr[9] != null && $arr[9] != ""){
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
		
		
		if ($cdFonte != "" || $codigoTipFonteSession != ""){
			
			consultarDocFonte($cdFonte, $codigoTipFonteSession, $palavra1, $palavra2, $palavra3, $palavra4, $palavra5, $palavra6, $palavra7, $palavra8, $palavra9, $palavra10, $pagina);	
		
		}else{
			
			require_once '.fonteDao.php';
			
			$smarty = new smarty;
		
			$fonte = new Fonte();
		
			$codigoTipFonte = isset ($_SESSION["codigoTipFont"])?$_SESSION["codigoTipFont"]:""; 	
			
			$fonte->consultarFonte($codigoTipFonte);

        	$smarty->assign('codFonte',$fonte->codFonte);
        	$smarty->assign('codTipoFonte',$fonte->codTipoFonte);
        	$smarty->assign('nmFonte',$fonte->nomeFonte);
        	$smarty->assign('nmTipoFonte',$tipoFonte->nomeTipoFonte);
			
        	$smarty->assign('controleDocumento',0);
        	
			$smarty->assign('validacao',"branco");
	    
	    	$smarty->display('consultaTema.tpl');
		}
		
	}
	
	
	
	/*
	 * Método responsável por consultar a tabela DOC
	 * de acordo com a palavra e codigo do tipo de Fonte 
	 * 
	 * Usa como parâmetro palavra e codigo do tipo de fonte
	 * 
	 * Retorna os objetos Documento e Ontologia 
	 */
	
	
	function consultarDocFonte($cdFonte, $codigoTipFonteSession, $palavra1, $palavra2, $palavra3, $palavra4, $palavra5, $palavra6, $palavra7, $palavra8, $palavra9, $palavra10, $pagina){
		
		require_once '.documentoDao.php';
		require_once '.fonteDao.php';
		
	    $documento	= new Documento();
	    $fonte 		= new Fonte();
	    
	    //consulta por codigo da Fonte e palavras
	    
	    
	    
	    
	    if($cdFonte != "" || $codigoTipFonteSession != "" && $palavra1 != ".|||." || $palavra2 != ".|||." || $palavra3 != ".|||." || $palavra4 != ".|||." ||$palavra5 != ".|||." || $palavra6 != ".|||." || $palavra7 != ".|||." || $palavra8 != ".|||." || $palavra9 != ".|||." || $palavra10 != ".|||."){
	    
	    
	    	$documento->consultarDocFonte($cdFonte, $codigoTipFonteSession, $palavra1, $palavra2, $palavra3, $palavra4, $palavra5, $palavra6, $palavra7, $palavra8, $palavra9, $palavra10, $pagina);
	        
	        $smarty = new smarty;
	    
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
		    
		    $smarty->assign('consultaPalavra', 1);
		    
		    
		    $codigoTipFonte = isset ($_SESSION["codigoTipFont"])?$_SESSION["codigoTipFont"]:""; 	
		    
		    $fonte->consultarFonte($codigoTipFonte);
	
	        $smarty->assign('codFonte',$fonte->codFonte);
	        $smarty->assign('codTipoFonte',$fonte->codTipoFonte);
	        $smarty->assign('nmFonte',$fonte->nomeFonte);
	            
			$smarty->assign('controleDocumento',0);
	        
	        
			$smarty->display('consultaTema.tpl');
		
		
	    }else {
	    
	    	//consulta somente pelo codigo da Fonte
	    	$documento->consultarDocumentoFonte($codigoTipFonteSession, $pagina);
	        
	        $smarty = new smarty;
	    
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
		    
		    $smarty->assign('consultaPalavra', 1);
		    
		    
		    $codigoTipFonte = isset ($_SESSION["codigoTipFont"])?$_SESSION["codigoTipFont"]:""; 	
		    
		    $fonte->consultarFonte($codigoTipFonte);
	
	        $smarty->assign('codFonte',$fonte->codFonte);
	        $smarty->assign('codTipoFonte',$fonte->codTipoFonte);
	        $smarty->assign('nmFonte',$fonte->nomeFonte);
	        $smarty->assign('nmTipoFonte',$tipoFonte->nomeTipoFonte);
		    
		    $smarty->assign('controleDocumento',0);
		       
		    
			$smarty->display('consultaTema.tpl');
	    	
	    }
		
	}
	
	
	function consultarFontePorTipoFonte(){
	
		require_once '.fonteDao.php';
		require_once '.rssDao.php';
		
		$fonte 		= new Fonte();
		$rss 		= new RSS();
		
		
		$smarty = new Smarty;
		
		$cdTipFonte = $_GET['codigoTipoFonte'];
		
		$arrTipoFonte = explode('|', $cdTipFonte);
	  
	  	$codTipoFonte = $arrTipoFonte[0];
	  
		$fonte->consultarFonte($codTipoFonte);
	    
	    $smarty->assign('codFonte',$fonte->codFonte);
	    $smarty->assign('codTFonte', $fonte->codTipoFonte);
   		$smarty->assign('nomeFonte',$fonte->nomeFonte);
	  
	    $rss->consultarTipoFonte();
				
		$smarty->assign('codTipoFonte',$rss->codTipoFonte);
		$smarty->assign('nomeTipoFonte',$rss->nomeTipoFonte);
		
		$smarty->display('rssInclusao.tpl');
		
	}
	
	
	/*
	 * Método centralizador das chamados de outros métodos  
	 * que executam atividades referentes ao objeto Fonte
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 * 
	 */
		
	
	switch ($Submit){
		
	  case "consultarDocFonte":  
	    consultarDocumentoFonte();
	    break;
	  case "consultar":
	  	consultarFonte();
	    break;
	  case "deletar":  
	    deletarFonte();
	    break;
	  case "incluir":  
	    incluirFonte();
	    break;
	  case "consultarFonte":  
	    consultarFonte();
	    break;
	  case "alterar":  
	    alterarFonte();
	    break;
	  case "pesquisar":
	  	montarConsultaPorFonte();
	  	break;
	  case "consultarFontePorTipoFonte":
	  	consultarFontePorTipoFonte();
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
	     $dado = str_replace("á", "A", $dado);
	     $dado = str_replace("é", "E", $dado);
	     $dado = str_replace("í", "I", $dado);
	     $dado = str_replace("ó", "O", $dado);
	     $dado = str_replace("ú", "U", $dado);
	     $dado = str_replace("Á", "A", $dado);
	     $dado = str_replace("É", "E", $dado);
	     $dado = str_replace("Í", "I", $dado);
	     $dado = str_replace("Ó", "O", $dado);
	     $dado = str_replace("Ú", "U", $dado);
	
	     // acento circunflexo
	     $dado = str_replace("â", "A", $dado);
	     $dado = str_replace("ê", "E", $dado);
	     $dado = str_replace("î", "I", $dado);
	     $dado = str_replace("ô", "O", $dado);
	     $dado = str_replace("û", "U", $dado);
	     $dado = str_replace("Â", "A", $dado);
	     $dado = str_replace("Ê", "E", $dado);
	     $dado = str_replace("Î", "I", $dado);
	     $dado = str_replace("Ô", "O", $dado);
	     $dado = str_replace("Û", "U", $dado);
	
	     // til
	     $dado = str_replace("ã", "A", $dado);
	     $dado = str_replace("õ", "O", $dado);
	     $dado = str_replace("Ã", "A", $dado);
	     $dado = str_replace("Õ", "O", $dado);
	
	     // ce-cedilha
	     $dado = str_replace("ç", "C", $dado);
	     $dado = str_replace("Ç", "C", $dado);
	
	     // trema
	     $dado = str_replace("ü", "U", $dado);
	     $dado = str_replace("Ü", "U", $dado);
	
	     // crase
	     $dado = str_replace("à", "A", $dado);
	     $dado = str_replace("è", "E", $dado);
	     $dado = str_replace("ì", "I", $dado);
	     $dado = str_replace("ò", "O", $dado);
	     $dado = str_replace("À", "A", $dado);
	     $dado = str_replace("È", "E", $dado);
	     $dado = str_replace("Ì", "I", $dado);
	     $dado = str_replace("Ò", "O", $dado);
	     $dado = str_replace("Ù", "U", $dado);

     	return $dado;
	}
	

?>