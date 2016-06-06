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
 
    Este programa está nomeado como ontologiaControle.php e possui 374
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
	 * as ações iniciais do objeto Ontologia.  
	 * Utiliza o parâmetro acaoOnt para indicar
	 * a atividade referente ao Objeto Ontologia 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
 	  
		require_once '.ontologiaDao.php';
	
   		$smarty = new Smarty;

	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);
	  
	  	$ontologia = new Ontologia();
	  	
	  	$acaoOnt = $_GET['acaoOnt'];
	  	
	  	switch ($acaoOnt){
		
	  		case 1:
	  		
	  			$ontologia->consultarOntologia();
	    		
	    		$smarty->assign('codOntologia',$ontologia->codOntologia);
	   			$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
	   			$smarty->assign('descricao',$ontologia->descricao);
	  		
	    		$smarty->display('ontologiaAlteracao.tpl');
	    	break;
	  		case 2:
	    		
	    		$ontologia->consultarOntologia();
	    		
	    		$smarty->assign('codOntologia',$ontologia->codOntologia);
	   			$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
	   			$smarty->assign('descricao',$ontologia->descricao);
	   			
	    		$smarty->display('ontologiaConsulta.tpl');
	    	break;
	    	case 3:
	    			
	    		$ontologia->consultarOntologia();
	    		
	    		$smarty->assign('codOntologia',$ontologia->codOntologia);
	   			$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
	   			
	    		$smarty->display('ontologiaDelecao.tpl');
	    	break;
	    	case 4:
	    		$smarty->display('ontologiaInclusao.tpl');
	    	break;
	    	
	    	default:
	    	break;
		}
	  	
	  	
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete ontologiaInclusao.tpl e, 
	 * repassa-los ao método inserirOntologia
	 * 
	 * Recebe os parâmetros nome da Ontologia, descrição da Ontologia
	 * 
	 * Executa uma validação dos campos dos templete ontologiaInclusão.tpl
	 * 
	 * Retorna o resultado da operação de inserção na tabela
	 *  
	 */
	
	
	function inserirOntologia(){
		
	  require_once '.ontologiaDao.php';
	  
	  $smarty = new Smarty;
     
	  $ontologia = new Ontologia();
	  
	  $nmOntologia  = addslashes($_POST['nomeOntologia']);
	  $descricao    = addslashes($_POST['descricao']);
	  
	    if($nmOntologia == "" || $descricao == ""){
		  	 $smarty->assign('campo','branco');
		  }
		  
		   if($nmOntologia != "" && $descricao != ""){ 
			  	
			 $ontologia->inserirOntologia($nmOntologia, $descricao);
		  }
	  
		  
	  $smarty->assign('resultado',$ontologia->resultado);
	  $smarty->display('ontologiaInclusao.tpl');
	  
	} 
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete ontologiaExclusao.tpl e, 
	 * repassa-los ao método excluirOntologia
	 * 
	 * Recebe o parâmetro codigo da Ontologia
	 * 
	 * Executa uma validação dos campos dos templete ontologiaExclusão.tpl
	 * 
	 * Retorna o objeto Ontologia
	 *  
	 */
	
	
	function excluirOntologia(){
	
		require_once '.ontologiaDao.php';
	  
	  	$smarty = new Smarty;
     
	  	$ontologia = new Ontologia();
	
		$codOntologia  = $_POST['codigoOntologia'];
	
		
		if($codOntologia == ""){
		
			$smarty->assign('campo','branco');
		}
		
		//deslcupe mas a ontologia Clipping Geral de código 7 não pode ser removida. 
		if($codOntologia != "" && $codOntologia != "7"){
			$ontologia->excluirOntologia($codOntologia);
		}
		
		$smarty->assign('resultado',$ontologia->resultado); 
		
		
		$ontologia->consultarOntologia();
	    		
    	$smarty->assign('codOntologia',$ontologia->codOntologia);
   		$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
		
		
		$smarty->display('ontologiaDelecao.tpl');
		
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete ontologiaExclusao.tpl e, 
	 * repassa-los ao método excluirOntologia
	 * 
	 * Recebe o parâmetro codigo da Ontologia
	 * 
	 * Executa uma validação dos campos dos templete ontologiaExclusão.tpl
	 * 
	 * Retorna o objeto Ontologia
	 *  
	 */
	
	
	function consultarOntologia(){
	
		require_once '.ontologiaDao.php';
	  
	  	$smarty = new Smarty;
     
	  	$ontologia = new Ontologia();	
	  	
		$cdOntologia = $_GET['cdgOntologia'];
		
		$ontologia->consultarOnt($cdOntologia);
	    		
    	$smarty->assign('codOntologia',$ontologia->codOntologia);
   		$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
   		$smarty->assign('descricao',$ontologia->descricao);
   		$smarty->assign('consulta',1);
   		
    	$smarty->display('ontologiaAlteracao.tpl');
		
	}
	
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete ontologiaAlteracao.tpl e, 
	 * repassa-los ao método alterarOntologia
	 * 
	 * Recebe o parâmetro codigo da Ontologia, nome da Ontologia, descrição da Ontologia
	 * 
	 * Executa uma validação dos campos dos templete ontologiaAlteracao.tpl
	 * 
	 * Retorna o objeto Ontologia atualizado
	 *  
	 */
	
	
	function alterarOntologia(){
		
		require_once '.ontologiaDao.php';
	  
	  	$smarty = new Smarty;
     
	  	$ontologia = new Ontologia();
	  	
	  	$arrform = array(0 => $_POST['cdONT'],1 => addslashes($_POST['nomeOntologia']),2 => addslashes($_POST['descricao']));

	  	
	  	 if($arrform[1] == "" || $arrform[2] == ""){
		  	 $smarty->assign('campo','branco');
		  }
		  
		  if($arrform[1] != "" && $arrform[2] != ""){ 
	  	
	  		$ontologia->alterarOntologia($arrform);
		  }
		
		$smarty->assign('resultado',$ontologia->resultado);
		
		$ontologia->consultarOntologia();
	    		
    	$smarty->assign('codOntologia',$ontologia->codOntologia);
   		$smarty->assign('nomeOntologia',$ontologia->nomeOntologia);
   		$smarty->assign('descricao',$ontologia->descricao);
		
		
		$smarty->display('ontologiaAlteracao.tpl');
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
	 * Método centralizador das chamados de outros métodos  
	 * que executam atividades referentes ao objeto Ontologia
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 * 
	 */
	
	
	switch ($Submit){
		
	  case "inserir":
	    inserirOntologia();
	    break;
	  case "excluir":
	  	excluirOntologia();  
	    break;
	  case "consultar":  
	    consultarOntologia();	
	  	break;
	  case "alterar":  
	    alterarOntologia();	
	  	break;	
	  default:
	    form();
	    break;
	}

?>