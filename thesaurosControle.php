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
 
    Este programa está nomeado como thesaurosControle.php e possui 443
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
	 * as ações iniciais do objeto Termo.  
	 * Utiliza o parâmetro acaoTermo para indicar
	 * a atividade referente ao Objeto Termo 
	 * que será inicializado pelo sistema.
	 */
	

	function form(){
 	  
 	  	require_once '.ontologiaDao.php';
 	  	
   		$smarty = new Smarty;
	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);

	  	$ontologia 	= new Ontologia();
	  	
	  	$acaoTermo = $_GET['acaoTermo'];
	  	
	  	switch ($acaoTermo){
		
	  		case 1:
	  		
	  			$ontologia->consultarOntologia();
	    		
	    		$smarty->assign('codOntologia',$ontologia->codOntologia);
	   			$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
	   			$smarty->assign('descricaoOntologia',$ontologia->descricao);
	  		
	  			$smarty->display('thesaurosAlteracao.tpl');
	    		
	    	break;
	  		case 2:
	  		
	  			$ontologia->consultarOntologia();	      
	
    			$smarty->assign('codOntologia',$ontologia->codOntologia);
	    		$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
	    		$smarty->assign('descricaoOntologia',$ontologia->descricaoOntologia);
	    		
	    		$smarty->display('thesaurosConsulta.tpl');
	   			
	    	break;
	    	case 3:
	    	
	    		$ontologia->consultarOntologia();	      
	
    			$smarty->assign('codOntologia',$ontologia->codOntologia);
	    		$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
	    		$smarty->assign('descricaoOntologia',$ontologia->descricaoOntologia);
	    			
	    		$smarty->display('thesaurosDelecao.tpl');
	    		
	    	break;
	    	case 4:
	    	
	    		$ontologia->consultarOntologia();
	    		
	    		$smarty->assign('codOntologia',$ontologia->codOntologia);
	   			$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
	   			$smarty->assign('descricaoOntologia',$ontologia->descricao);
	    	
	    		$smarty->display('thesaurosInclusao.tpl');
	    	break;
	    	
	    	default:
	    	break;
	  	}
	  	
	  	
	}
	
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete thesaurosInclusao.tpl  e, 
	 * repassa-los ao método inserirTermos
	 * 
	 * Recebe os parâmetros nome da Ontologia e os nomes dos Termos  
	 * 
	 * Executa a validação dos campos existentes no templete thesaurosInclusao.tpl
	 * 
	 * Retorna o objeto Ontologia e o resultado da operação de Inclusão na tabela TRM  
	 * 
	 */
	
	
	function inserirTermos(){
		
	  require_once '.thesaurosDao.php';	
	  require_once '.ontologiaDao.php';	 
	  
	  $smarty = new Smarty;	
	  
      $termo 		= new Termo();
      $ontologia 	= new Ontologia();
	  
	  $codOntologia  = addslashes($_POST['nomeOntologia']);
	  
	  $arrformTermo = array(0 => addslashes(strtoupper($_POST['termo1'])),1 => addslashes(strtoupper($_POST['termo2'])),2 => addslashes(strtoupper($_POST['termo3'])),3 => addslashes(strtoupper($_POST['termo4'])),4 => addslashes(strtoupper($_POST['termo5'])),5 =>  addslashes(strtoupper($_POST['termo6'])),6 =>  addslashes(strtoupper($_POST['termo7'])),7 => addslashes(strtoupper($_POST['termo8'])),8 =>  addslashes(strtoupper($_POST['termo9'])), 9 =>  addslashes(strtoupper($_POST['termo10'])));
	  
	  //verificar se o termo existe na base
	  
	  if($codOntologia != "" && sizeof($arrformTermo) > 0){
	  	$termo->verificaTermo($codOntologia, $arrformTermo);
	  }
	  
	  $codigos = $termo->codigoTermo;
	  
	   if($codOntologia != "" && sizeof($codigos) == 0 && $arrformTermo[0] != ""){
		  
	   	  $termo->inserirTermos($codOntologia, $arrformTermo);

	   }else if ($codOntologia == ""){
		  
	   	  $smarty->assign('validacaoOntologia',1);
	   	  
	   }else if ($codOntologia != "" && sizeof($codigos) > 0){
		  
	   		for($i=0; $i<sizeof($codigos); $i++) {
	
	    		$smarty->assign('validacaoOntologia',2);
	    		
	    		//consulta o nome do termo
	    		$termo->consultarNomeTermo($codigos[$i]);
	    		
	    		$smarty->assign('termoConsultado', $termo->nomeTermo[0]);
	    	}   
	   	  	
	   }else if(sizeof($codigos) == 0){
	   
	   	   $smarty->assign('validacaoOntologia',3);
	   }
	   
	  
	  $smarty->assign('resultado',$termo->resultado);
	  
	  // PARA POPULAR NOVAMENTE O COMBO 
	  $ontologia->consultarOntologia();
	    		
      $smarty->assign('codOntologia',$ontologia->codOntologia);
   	  $smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
   	  $smarty->assign('descricaoOntologia',$ontologia->descricao);
      
	  $smarty->display('thesaurosInclusao.tpl');
	  
	} 
	
	
	
	/*
	 * Método responsável por consultar a tabela TRM 
	 * 
	 * Usa como parâmetro o codigo da Ontologia
	 * 
	 * Retorna os objetos Termo e Ontologia
	 */
	
	
	function consultarTermo(){
		
		require_once '.thesaurosDao.php';
 	  	require_once '.ontologiaDao.php';
		
		$termo 		= new Termo();
		$ontologia 	= new Ontologia();
		
		
   		$smarty = new Smarty;
	
   		$cdOntologia = $_GET["cdOnto"];
   		
   		$termo->consultaTermo($cdOntologia);
   		
   		$smarty->assign('codTermo',$termo->codigoTermo);
      	$smarty->assign('nomeTermo',$termo->nomeTermo);
      	$smarty->assign('descricaoTermo',$termo->descricaoTermo);
   		
      	$ontologia->consultarOntologia();
	    		
    	$smarty->assign('codOntologia',$ontologia->codOntologia);
   		$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
   		$smarty->assign('descricaoOntologia',$ontologia->descricao);
      	
      	$smarty->display('thesaurosConsulta.tpl');
   		
	}
	
	
	/*
	 * Método responsável por consultar a tabela TRM
	 * de acordo com o codigo da Ontologia
	 * 
	 * Usa como parâmetro o codigo da Ontologia
	 * 
	 * Retorna os objetos Termo e Ontologia, mas como parâmetros com nomes diferentes
	 */
	
	function consultarTermoAlteracao(){
		
		require_once '.thesaurosDao.php';
		require_once '.ontologiaDao.php';
 	  
		$termo 		= new Termo();
		$ontologia 	= new Ontologia();
		
   		$smarty = new Smarty;
	
   		$cdOntologia = $_GET["codigoOnto"];
   		
   		$termo->consultaTermo($cdOntologia);
   		
   		$smarty->assign('codTermo',$termo->codigoTermo);
      	$smarty->assign('nomeTermo',$termo->nomeTermo);
      	$smarty->assign('descricaoTermo',$termo->descricaoTermo);
   		
      	$ontologia->consultarOntologia();
	    		
    	$smarty->assign('codOntologia',$ontologia->codOntologia);
   		$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
   		$smarty->assign('descricaoOntologia',$ontologia->descricao);
      	
      	$smarty->display('thesaurosAlteracao.tpl');
   		
	}
	
	
	
	/*
	 * Método responsável por alterar a tabela TRM
	 * 
	 * Usa como parâmetro o nome do Termo
	 * 
	 * Retorna o objeto Ontologia
	 */
	
	
	function alterarTermo(){
	
		require_once '.thesaurosDao.php';
		require_once '.ontologiaDao.php';
 	  
		$termo 		= new Termo();
		$ontologia 	= new Ontologia();
		
   		$smarty = new Smarty;
		
		$codigoTermo = $_POST['cdTrm'];
		
		
		if(isset($_POST['termo'])){	
		
			$trm = $_POST['termo'];
			
			
			//conversão para maiusculo
			for($i=0; $i<sizeof($trm); $i++){
			
				$trm[$i] = strtoupper($trm[$i]);
			}
			
			$termo->consultarCodigoOntologia($codigoTermo);
			
			$termo->deletarTabelaTermo($termo->codOntologia[0]);		
		
			$termo->inserirTermos($termo->codOntologia[0], $trm);
			
		}
	    
	     $smarty->assign('resultado',$termo->resultado);
	    
	    
	    $ontologia->consultarOntologia();
	    		
    	$smarty->assign('codOntologia',$ontologia->codOntologia);
   		$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
   		$smarty->assign('descricaoOntologia',$ontologia->descricao);
      	
      	$smarty->display('thesaurosAlteracao.tpl');
	    
	}
	
	/*
	 * Método responsável por deletar termos da tabela TRM
	 * 
	 * Usa como parâmetro o codigo do Termo
	 * 
	 * Retorna o objeto Ontologia e o resultado da deleção na tabela TRM
	 * 
	 */
	
	
	function deletarTermo(){
	
		require_once '.thesaurosDao.php';
		require_once '.ontologiaDao.php';
		
		$termo 		= new Termo();
		$ontologia  = new Ontologia();
		
   		$smarty = new Smarty;
   		
   		if(isset($_POST['itensTermo'])){	
	    
			$termosSelecionados = $_POST['itensTermo'];
			
	    	for($i=0; $i<sizeof($termosSelecionados); $i++) {
	
	    		$termo->deletarTermo($termosSelecionados[$i]);
	    	}
	    	
	    }else{
			
			$smarty->assign('campo','branco');
		}
	
	    $smarty->assign('resultado',$termo->resultado);
	    
	    $ontologia->consultarOntologia();
	    		
    	$smarty->assign('codOntologia',$ontologia->codOntologia);
   		$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
   		$smarty->assign('descricaoOntologia',$ontologia->descricao);
	
		$smarty->display('thesaurosDelecao.tpl');
	}
	
	
	/*
	 * Método responsável por deleta a tabela TRM
	 * de acordo com o codigo da Ontologia
	 * 
	 * Usa o parâmetro codigo da Ontologia 
	 * 
	 * Retorno os objetos Termo e Ontologia 
	 */
	
	function consultarTermoDeletar(){
	
		require_once '.thesaurosDao.php';
		require_once '.ontologiaDao.php';
 	  
		$termo 		= new Termo();
		$ontologia 	= new Ontologia();
		
   		$smarty = new Smarty;
	
   		$cdOntologia = $_GET["cdgOnto"];
   		
   		$termo->consultaTermo($cdOntologia);
   		
   		$smarty->assign('codTermo',$termo->codigoTermo);
      	$smarty->assign('nomeTermo',$termo->nomeTermo);
      	$smarty->assign('descricaoTermo',$termo->descricaoTermo);
   		
      	$ontologia->consultarOntologia();
	    		
    	$smarty->assign('codOntologia',$ontologia->codOntologia);
   		$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
   		$smarty->assign('descricaoOntologia',$ontologia->descricao);
      	
      	$smarty->display('thesaurosDelecao.tpl');
	
	}
	
	
	/*
	 * Método centralizador das chamadas de outros métodos  
	 * que executam atividades referentes ao objeto Termo
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 */
	
	switch ($Submit){
		
	  case "inserir":
	    inserirTermos();
	    break;
	  case "consultar":
	    consultarTermo();
	    break;
	  case "consultarAlterar":
	    consultarTermoAlteracao();
	    break;
	  case "alterar":
	    alterarTermo();
	    break;
	  case "deletar":
	    deletarTermo();
	    break;
	  case "consultarDeletar":	
	    consultarTermoDeletar();
	    break;
	  default:
	    form();
	    break;
	}


?>