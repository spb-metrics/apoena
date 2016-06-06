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
 
    Este programa está nomeado como rssControle.php e possui 635
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
	 * as ações iniciais do objeto RSS.  
	 * Utiliza o parâmetro acaoRSS para indicar
	 * a atividade referente ao Objeto RSS 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
		
		require_once '.rssDao.php';
 	  
   		$smarty = new Smarty;
	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);

		$rss = new RSS();
		
		$acaoRss = $_GET['acaoRss']; 
		
		switch ($acaoRss){
		
			case 1:
			
				$rss->consultarRSS();
				
				$smarty->assign('codRSS',$rss->codigoRSS);
			    $smarty->assign('endRSS',$rss->enderecoRSS);
			    
			    $smarty->display('rssAlteracao.tpl');
				
			break;
			case 2:
			
				$rss->consultarRSS();
			    
			    $smarty->assign('codRSS',$rss->codigoRSS);
			    $smarty->assign('endRSS',$rss->enderecoRSS);
			    $smarty->assign('status',$rss->status);
			    $smarty->assign('nomeFonte',$rss->nomeFonte);
			    $smarty->assign('nomeTipoFonte',$rss->nomeTipoFonte);
			    			    	    
			    $smarty->display('rssConsulta.tpl');
				
			break;
			case 3:
			
				$rss->consultarRSS();
			    
			    $smarty->assign('codRSS',$rss->codigoRSS);
			    $smarty->assign('endRSS',$rss->enderecoRSS);
			    $smarty->assign('check',2);
			    
			
				$smarty->display('rssDelecao.tpl');
			break;
			case 4:    
			
				$rss->consultarTipoFonte();
				$rss->consultarTipoDocumento();
				
			    $smarty->assign('codTipoFonte',$rss->codTipoFonte);
			    $smarty->assign('nomeTipoFonte',$rss->nomeTipoFonte);
			    $smarty->assign('codTipoDocumento',$rss->codTipoDocumento);
			    $smarty->assign('nomeTipoDocumento',$rss->nomeTipoDocumento);
			    
			    $smarty->display('rssInclusao.tpl');
			    
		    break;
		    
		    default:
		    break;
		}
		
	}

	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos dos templetes que fazem a consultas a tabela RSS e, 
	 * repassa-os ao método consultarFonte
	 * 
	 * Retorna o objeto fonte  
	 * 
	 */
	
	
	function consultarFonte(){
		
		require_once '.rssDao.php';
		
	    $rss = new RSS();

		$rss->consultarFonte();

		if(isset ($smarty)){
		   require('Smarty.class.php');
	    }

		$smarty = new smarty;
	    
	    $smarty->assign('codFonte',$rss->codFonte);
	    $smarty->assign('nomeFonte', $rss->nomeFonte);
	    
	    $smarty->display('rssInclusao.tpl');
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos dos templetes que fazem a consultas a tabela TIP_FONT e, 
	 * repassa-os ao método consultarTipoFonte
	 * 
	 * Retorna o objeto tipoFonte  
	 * 
	 */
	
	
	function consultarTipoFonte(){
		
		require_once '.rssDao.php';
		
	    $rss = new RSS();

		$rss->consultarTipoFonte();
		
		if(isset ($smarty)){
		   require('Smarty.class.php');
	    }

		$smarty = new smarty;
	    
	    $smarty->assign('codTipoFonte',$rss->codTipoFonte);
	    $smarty->assign('nomeTipoFonte', $rss->nomeTipoFonte);
	    $smarty->assign('descricaoTipo', $rss->descricaoTipo);
	    
	    $smarty->display('rssInclusao.tpl');
	}
	
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos dos templetes que fazem a consultas a tabela TIP_DOC e, 
	 * repassa-os ao método consultarTipoDocumento
	 * 
	 * Retorna o objeto tipoDocumento  
	 * 
	 */
	
	
	function consultarTipoDocumento(){
		
		require_once '.rssDao.php';
		
	    $rss = new RSS();

		$rss->consultarTipoDocumento();

		if(isset ($smarty)){
		   require('Smarty.class.php');
	    }

		$smarty = new smarty;
	    
	    $smarty->assign('codTipoDocumento',$rss->codTipoDocumento);
	    $smarty->assign('nomeTipoDocumento', $rss->nomeTipoDocumento);
	    
	    $smarty->display('rssInclusao.tpl');
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete rssInclusao.tpl  e, 
	 * repassa-los ao método inserirRSS
	 * 
	 * Recebe os parâmetros código da Fonte, codigo tipo da Fonte, 
	 * nome da Fonte, nome do Tipo da Fonte , nome do RSS 
	 * 
	 * Executa a validação dos campos existentes no templete rssInclusao.tpl
	 * 
	 * Retorna os objetos fonte, tipoFonte e tipoDocumento  
	 * 
	 */
	
	
	function inserirRSS(){
		
	  require_once '.rssDao.php';
	  
	  $smarty = new Smarty;
     
	  $rss = new RSS();
	                  
	  $selectFonte = addslashes($_POST['selectFonte']);
	  $selectTipoFonte = addslashes($_POST['selectTipoFonte']);
	  //$selectTipoDocumento = addslashes($_POST['selectTipoDocumento']);
	  
	  $arrFonte = explode('|', $selectFonte);
	  $arrTipoFonte = explode('|', $selectTipoFonte);
	  //$arrTipoDoc = explode('|', $selectTipoDocumento);
	  
	  $codFonte = $arrFonte[0];
	  $nomeFonte =  strtoupper($arrFonte[1]);
	  $codTipoFonte = $arrTipoFonte[0];
	  $nomeTipoFonte = strtoupper($arrTipoFonte[1]);
	  //$codTipoDocumento = $arrTipoDoc[0];
	  //$nomeTipoDocumento = strtoupper($arrTipoDoc[1]);
	  $status = 1;
	  $codTipoDocumento = 1;
	  $nomeTipoDocumento = strtoupper("RSS");
	  
	  $nomeRSS = addslashes($_POST['enderecoRSS']);
	  
	  
	  //validação do campo rss
	  $nomeaux = substr($nomeRSS, 0, 4);
	  
	  if($nomeaux == "http"){
	  	
	  	$smarty->assign('campoRSS','http');
	  }
	  
	  
	  //verificação da existência do endereço RSS
	  $rss->verificaNomeRSS($nomeRSS);
	  
	  if($rss->codigoRSS[0] != ""){
	  	
	  	$smarty->assign('validador','contem');
	  }
	  
	  //verificação se os campos preenchidos
	   if($codFonte == "" || $nomeFonte == "" || $codTipoFonte == "" || $nomeTipoFonte == "" || $nomeRSS == ""){
	  	 
	  		$smarty->assign('campo','branco');
	   } 
		  
	  
	  if($codFonte != "" && $nomeFonte != "" && $codTipoFonte != ""  
	  	 && $nomeTipoFonte != "" && $codTipoDocumento != "" && $nomeTipoDocumento != "" 
	  	 && $rss->codigoRSS[0] == "" && $nomeaux != "http"){
	  	    
	  	    $rss->inserirRSS($codFonte, $nomeFonte, $codTipoFonte, $nomeTipoFonte, $codTipoDocumento, $nomeTipoDocumento, $nomeRSS, $status);
	  }
	  
	   $smarty->assign('resultado',$rss->resultado);
	  
	   $rss->consultarTipoFonte();
	   $rss->consultarTipoDocumento();
		
	   $smarty->assign('codTipoFonte',$rss->codTipoFonte);
	   $smarty->assign('nomeTipoFonte',$rss->nomeTipoFonte);
	   $smarty->assign('codTipoDocumento',$rss->codTipoDocumento);
	   $smarty->assign('nomeTipoDocumento',$rss->nomeTipoDocumento);
	    
	    
	   $smarty->display('rssInclusao.tpl');
	  
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete rssConsulta.tpl  e, 
	 * repassa-los ao método consultarRSS
	 * 
	 * Retorna o objetos RSS  
	 * 
	 */
	
	
	
	function consultarRSS(){
  	
  		require_once '.rssDao.php';

	    $rss = new RSS();

	    $rss->consultarRSS();
	    
	    $smarty = new Smarty;
	    $smarty->assign('codRSS',array($rss->codRSS));
	    $smarty->assign('endRSS',$rss->enderecoRSS);
	    $smarty->assign('codTipoDoc',$rss->codTipoDocumento);
	    $smarty->assign('dscTipo',$rss->descricaoTipo);
	    $smarty->assign('codFonte',$rss->codFonte);
	    $smarty->assign('nomeFonte',$rss->nomeFonte);
	    $smarty->assign('codTipoFonte',$rss->codTipoFonte);
	    $smarty->assign('nomeTipoFonte',$rss->nomeTipoFonte);
	    $smarty->assign('status',$rss->status);
	    
	    $smarty->display('rssConsulta.tpl');
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete rssConsulta.tpl  e, 
	 * repassa-los ao método mudarStatusRSS. Este método muda o status do arquivo
	 * indicando se o mesmo deve ser capturado ou não. Status 1 indica captura, 
	 * Status 2 indica a não captura
	 * 
	 * Recebe os parâmetros código RSS 
	 * 
	 * Retorna o objeto RSS atualizado  
	 * 
	 */
	
	
	function processarRSS(){
	
		require_once '.rssDao.php';

		$smarty = new Smarty;
		
	    $rss = new RSS();
	    
	    if(isset($_POST['itensRSS'])){	
	    
			$rss->resetTabelaRSS();
	    
			$rssSelecionados = $_POST['itensRSS'];
			
	    	for($i=0; $i<sizeof($rssSelecionados); $i++) {
	
	    		$rss->mudarStatus($rssSelecionados[$i], 1);
			}
	    }else{
	    
	    	$smarty->assign('campo','branco');
	    }
	    
		$smarty->assign('resultado',$rss->resultado);
		
		$rss->consultarRSS();
		    
	    $smarty->assign('codRSS',$rss->codigoRSS);
	    $smarty->assign('endRSS',$rss->enderecoRSS);
	    $smarty->assign('status',$rss->status);
	    $smarty->assign('nomeFonte',$rss->nomeFonte);
		$smarty->assign('nomeTipoFonte',$rss->nomeTipoFonte);
	    
	    $smarty->display('rssConsulta.tpl');
		
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete rssAlteracao.tpl  e, 
	 * repassa-los ao método consultaRSS
	 * 
	 * Retorna o objetos RSS, Fonte, TipoFonte, TipoDocumento  
	 * 
	 */
	
	
	
	function consultarRssAlterar(){
	
		require_once '.rssDao.php';
		require_once '.fonteDao.php';
		require_once '.tipoFonteDao.php';
		require_once '.tipoDocumentoDao.php';
		
		$codRSS = $_GET['cdRSS'];		
		
	    $rss 			= new RSS();
	    $fonte 			= new Fonte();
	    $tipoFonte 		= new TipoFonte();
	    $tipoDocumento	= new TipoDocumento();
	    
	    $rss->consultaRSS($codRSS);
	    
	    $fonte->consultaFonte($rss->codFonte[0]);
	    $tipoFonte->consultarTipoFonte($rss->codTipoFonte[0]);
	    $tipoDocumento->consultarTipoDocumento($rss->codTipoDocumento[0]);
	    
	    $smarty 	= new Smarty;
	    
	    $smarty->assign('codigoRSS',$rss->codigoRSS);
	    $smarty->assign('enderecoRSS',$rss->enderecoRSS);
	    $smarty->assign('cdFont',$fonte->codFonte[0]);
	    $smarty->assign('cdTipFont',$tipoFonte->codTipoFonte[0]);
	    $smarty->assign('cdTipDoc',$tipoDocumento->codTipoDocumento[0]);
	    
	    $rss = new RSS();
	    
	    $rss->consultarFonte();
		$rss->consultarTipoFonte();
		$rss->consultarTipoDocumento();
		
		$smarty->assign('codFonte',$rss->codFonte);
	    $smarty->assign('nomeFonte',$rss->nomeFonte);
	    $smarty->assign('codTipoFonte',$rss->codTipoFonte);
	    $smarty->assign('nomeTipoFonte',$rss->nomeTipoFonte);
	    $smarty->assign('codTipoDocumento',$rss->codTipoDocumento);
	    $smarty->assign('nomeTipoDocumento',$rss->nomeTipoDocumento);
	    
	    
	    $rss = new RSS();
	    
	    $rss->consultarRSS();
				
		$smarty->assign('codRSS',$rss->codigoRSS);
	    $smarty->assign('endRSS',$rss->enderecoRSS);
	    
	    $smarty->display('rssAlteracao.tpl');
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete rssAlteracao.tpl  e, 
	 * repassa-los ao método atualizarRSS
	 * 
	 * Recebe os parâmetros código da RSS, endereço RSS, codigo tipo da Fonte, 
	 * nome da Fonte, nome do Tipo da Fonte , nome do tipo da Fonte,
	 * codigo do Tipo do Documento, nome do Tipo de Documento
	 * 
	 * Executa a validação dos campos existentes no templete rssAlteracao.tpl
	 * 
	 * Retorna o objeto RSS  
	 * 
	 */
	
	
	function alterarRSS(){
	
		require_once '.rssDao.php';

	    $rss = new RSS();

	    $smarty = new Smarty;
	    
	    $codigoRSS				= $_POST['cdgRSS'];
	    $enderecoRSS     		= addslashes($_POST['enderecoRSS']);
		$selectFonte 	 		= addslashes($_POST['selectFonte']);
	  	$selectTipoFonte 		= addslashes($_POST['selectTipoFonte']); 
	  	$selectTipoDocumento  	= addslashes($_POST['selectTipoDocumento']);  

	  	$arrFonte = explode('|', $selectFonte);
	  	$arrTipoFonte = explode('|', $selectTipoFonte);
	    $arrTipoDoc = explode('|', $selectTipoDocumento);
	  
	    
	    if($arrFonte[0] == "" || $arrFonte[1] == "" || $arrTipoFonte[0] == "" || $arrTipoFonte[1] == "" || $arrTipoDoc[0] == "" || $arrTipoDoc == ""){
	    	$smarty->assign('campo','branco');
	    }
	    
	    if($arrFonte[0] != "" && $arrFonte[1] != "" && $arrTipoFonte[0] != "" && $arrTipoFonte[1] != "" && $arrTipoDoc[0] != "" && $arrTipoDoc != ""){
	    	$rss->altualizarRSS($codigoRSS, $enderecoRSS, $arrFonte, $arrTipoFonte, $arrTipoDoc); 
	    }
	    
		$rss->consultarRSS();

	    $smarty->assign('codRSS',$rss->codigoRSS);
	    $smarty->assign('endRSS',$rss->enderecoRSS);
	    $smarty->assign('resultado',$rss->resultado);
	    
	    $smarty->display('rssAlteracao.tpl');
	
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete rssDelecao.tpl  e, 
	 * repassa-los ao método deletarRSS
	 * 
	 * Recebe os parâmetros código da RSS
	 * 
	 * Executa a validação dos campos existentes no templete rssDelecao.tpl
	 * 
	 * Retorna o objeto RSS  
	 * 
	 */
	
	
	function deletarRSS(){
	
		require_once '.rssDao.php';

		$smarty = new Smarty;
			
	    $rss = new RSS();
	    
	    if(isset($_POST['itens'])){	
	    
			$rssSelecionados = $_POST['itens'];
			
	    	for($i=0; $i<sizeof($rssSelecionados); $i++) {
	
	    		$rss->deletarRSS($rssSelecionados[$i]);
			}
	    }else{
	    
	      $smarty->assign('campo','branco');
	    }
		
		$smarty->assign('resultado',$rss->resultado);
		
		$rss->consultarRSS();
		    
	    $smarty->assign('codRSS',$rss->codigoRSS);
	    $smarty->assign('endRSS',$rss->enderecoRSS);
	     $smarty->assign('check',2);
	    
	    $smarty->display('rssDelecao.tpl');
	
	}
	
	
	/*
	 * Método responsável por marcar ou desmacar os checks do 
	 * templete rssDelecao.tpl
	 * 
	 * Retorna o objeto RSS
	 * 
	 */
	
	
	function atualizarCheck($valor){
	
		require_once '.rssDao.php';
	
		$rss = new RSS();
		
		
		$smarty = new Smarty;
		
		
		if($valor == 1){
		
			$smarty->assign('check',1);
		}else if($valor ==2 ){
		
			$smarty->assign('check',2);
		}
		
		
		$rss->consultarRSS();
		    
	    $smarty->assign('codRSS',$rss->codigoRSS);
	    $smarty->assign('endRSS',$rss->enderecoRSS);
	    		
		$smarty->display('rssDelecao.tpl');
	
	}
	
	
	/*
	 * Método centralizador das chamadas de outros métodos  
	 * que executam atividades referentes ao objeto RSS
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 * 
	 */
	
	
	switch ($Submit){
		
	  case "inserir":
	  	inserirRSS();
	    break;
	  case "consultar":  
	    tela_alterar();
	    break;
	  case "processar": 
	  	processarRSS();
	    break;
	  case "consultarAlterar":  
	  	consultarRssAlterar();
	    break;
	  case "alterar":  
	  	alterarRSS();
	    break;
	  case "deletar":  
	  	deletarRSS();
	  	break;
	  case "selecionar Todos": 
	  	atualizarCheck(1);
	  	break;
	  case "desmarcar Todos":  
	  	atualizarCheck(2);
	  	break;
	  default:
	    form();
	    break;
	}

?>