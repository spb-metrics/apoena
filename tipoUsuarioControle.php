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
 
    Este programa está nomeado como tipoUsuarioControle.php e possui 308
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
	 * as ações iniciais do objeto Tipo Usuario.  
	 * Utiliza o parâmetro acaoOnt para indicar
	 * a atividade referente ao Objeto Tipo Usuario 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
 	  
		require_once '.tipoUsuarioDao.php';
	
   		$smarty = new Smarty;

	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);
	  
	  	$tipoUsuario = new TipoUsuario();
	  	
	  	$acaoTipoUsu = $_GET['acaoTipoUsu'];
	  	
	  	switch ($acaoTipoUsu){
		
	  		case 1:
	  		
	  			$tipoUsuario->consultarTipoUsuario();
	    		
	    		$smarty->assign('codTipoUsuario',$tipoUsuario->codTipoUsuario);
	   			$smarty->assign('nomeTipoUsuario',$tipoUsuario->nomeTipoUsuario);
	   			$smarty->assign('dscTipoUsuario',$tipoUsuario->dscTipoUsuario);
	  		
	    		$smarty->display('tipoUsuarioAlteracao.tpl');
	    	break;
	  		case 2:
	    		
	    		$tipoUsuario->consultarTipoUsuario();
	    		
	    		$smarty->assign('codTipoUsuario',$tipoUsuario->codTipoUsuario);
	   			$smarty->assign('nomeTipoUsuario',$tipoUsuario->nomeTipoUsuario);
	   			$smarty->assign('dscTipoUsuario',$tipoUsuario->dscTipoUsuario);
	   			
	    		$smarty->display('tipoUsuarioConsulta.tpl');
	    	break;
	    	case 3:
	    			
	    		$tipoUsuario->consultarTipoUsuario();
	    		
	    		$smarty->assign('codTipoUsuario',$tipoUsuario->codTipoUsuario);
	   			$smarty->assign('nomeTipoUsuario',$tipoUsuario->nomeTipoUsuario);
	   			
	    		$smarty->display('tipoUsuarioDelecao.tpl');
	    	break;
	    	case 4:
	    		$smarty->display('tipoUsuarioInclusao.tpl');
	    	break;
	    	
	    	default:
	    	break;
		}
	  	
	  	
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete tipoUsuarioInclusao.tpl e, 
	 * repassa-los ao método inserirTipoUsuario
	 * 
	 * Recebe os parâmetros nome do Tipo de Usuário, descrição do Tipo de Usuario
	 * 
	 * Executa uma validação dos campos dos templete tipoUsuarioInclusão.tpl
	 * 
	 * Retorna o resultado da operação de inserção na tabela TIP_USU
	 *  
	 */
	
	
	function inserirTipoUsuario(){
		
	  require_once '.tipoUsuarioDao.php';
	  
	  $smarty = new Smarty;
     
	  $tipoUsuario = new TipoUsuario();
	  
	  $nmTipoUsuario  = addslashes($_POST['nomeTipoUsuario']);
	  $descricao    = addslashes($_POST['descricao']);
	  
	    if($nmTipoUsuario == "" || $descricao == ""){
		  	 $smarty->assign('campo','branco');
		  }
		  
		   if($nmTipoUsuario != "" && $descricao != ""){ 
			  	
			 $tipoUsuario->inserirTipoUsuario($nmTipoUsuario, $descricao);
		  }
	  
		  
	  $smarty->assign('resultado',$tipoUsuario->resultado);
	  $smarty->display('tipoUsuarioInclusao.tpl');
	  
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
	
	
	function excluirTipoUsuario(){
	
		require_once '.tipoUsuarioDao.php';
	  
	  	$smarty = new Smarty;
     
	  	$tipoUsuario = new TipoUsuario();
	
		$codTipoUsuario  = $_POST['codigoTipoUsuario'];
	
		
		if($codTipoUsuario == ""){
		
			$smarty->assign('campo','branco');
		}
		
		if($codTipoUsuario != ""){
			$tipoUsuario->excluirTipoUsuario($codTipoUsuario);
		}
		
		$smarty->assign('resultado',$tipoUsuario->resultado); 
		
		$tipoUsuario->consultarTipoUsuario();
		
	    $smarty->assign('codTipoUsuario',$tipoUsuario->codTipoUsuario);
	   	$smarty->assign('nomeTipoUsuario',$tipoUsuario->nomeTipoUsuario);		
	    			
    	$smarty->display('tipoUsuarioDelecao.tpl');
		
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
	
	
	function consultarTipoUsuario(){
	
		require_once '.tipoUsuarioDao.php';
	  
	  	$smarty = new Smarty;
     
	  	$tipoUsuario = new TipoUsuario();	
	  	
		$codTipoUsuario = $_GET['codTipUsu'];
		
		$tipoUsuario->consultarTipUsu($codTipoUsuario);
	    		
	    $smarty->assign('codTipoUsuario',$tipoUsuario->codTipoUsuario);
	   	$smarty->assign('nomeTipoUsuario',$tipoUsuario->nomeTipoUsuario);
	   	$smarty->assign('dscTipoUsuario',$tipoUsuario->dscTipoUsuario);		
	    		
    	$smarty->assign('consulta',1);
   		
    	$smarty->display('tipoUsuarioAlteracao.tpl');
		
	}
	
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete tipoUsuarioAlteracao.tpl e, 
	 * repassa-los ao método alterarTipoUsuario
	 * 
	 * Recebe o parâmetro codigo do Tipo Usuário, nome do Tipo de Usuário, descrição do Tipo de Usuário
	 * 
	 * Executa uma validação dos campos dos templete tipoUsuarioAlteracao.tpl
	 * 
	 * Retorna o objeto Tipo Usuário atualizado
	 *  
	 */
	
	
	function alterarTipoUsuario(){
		
		require_once '.tipoUsuarioDao.php';
	  
	  	$smarty = new Smarty;
     
	  	$tipoUsuario = new TipoUsuario();
	  	
	  	$arrform = array(0 => $_POST['cdTipUsu'],1 => addslashes($_POST['nomeTipUsuario']),2 => addslashes($_POST['descricao']));

	  	
	  	 if($arrform[1] == "" || $arrform[2] == ""){
		  	 $smarty->assign('campo','branco');
		  }
		  
		  if($arrform[1] != "" && $arrform[2] != ""){ 
	  	
	  		$tipoUsuario->alterarTipoUsuario($arrform);
		  }
		
		$smarty->assign('resultado',$tipoUsuario->resultado);
		
		$tipoUsuario->consultarTipoUsuario();
	    		
		$smarty->assign('codTipoUsuario',$tipoUsuario->codTipoUsuario);
		$smarty->assign('nomeTipoUsuario',$tipoUsuario->nomeTipoUsuario);
		$smarty->assign('dscTipoUsuario',$tipoUsuario->dscTipoUsuario);
	
		$smarty->display('tipoUsuarioAlteracao.tpl');
	}
	
	
	/*
	 * Método centralizador das chamados de outros métodos  
	 * que executam atividades referentes ao objeto TipoUsuario
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 * 
	 */
	
	
	switch ($Submit){
		
	  case "inserir":
	    inserirTipoUsuario();
	    break;
	  case "excluir":
	  	excluirTipoUsuario();  
	    break;
	  case "consultar":  
	    consultarTipoUsuario();	
	  	break;
	  case "alterar":  
	    alterarTipoUsuario();	
	  	break;
	  case "consultarTipUsuario":  
	    consultarTipoUsuario();	
	  	break;		
	  default:
	    form();
	    break;
	}

?>