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
 
    Este programa está nomeado como grupoUsuarioControle.php e possui 375
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
	 * as ações iniciais do objeto Grupo Usuario.  
	 * Utiliza o parâmetro acaoUsu para indicar
	 * a atividade referente ao Objeto Grupo Usuario 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
 	  
		require_once '.usuarioDao.php';
		require_once '.grupoUsuarioDao.php';
	
   		$smarty = new Smarty;

	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);
	  
	  	$usuario 		= new Usuario();
	  	$grupoUsuario   = new GrupoUsuario();
	  	
	  	$acaoGrupoUsu = $_GET['acaoGrupoUsu'];
	  	
	  	switch ($acaoGrupoUsu){
		
	  		case 1:
	  		
	  			$grupoUsuario->consultarGrupoUsuario();
	    		
	    		$smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
	   			$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
	    	
	    		$smarty->display('grupoUsuarioAltera.tpl');
	    		
	    	break;
	  		case 2:
	    		
	    		$grupoUsuario->consultarGrupoUsuario();
	    		
	    		$smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
	   			$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
	   			$smarty->assign('descricaoGrupoUsuario',$grupoUsuario->descricaoGrupoUsuario);
	    		
	    		$smarty->display('grupoUsuarioConsulta2.tpl');
	    	break;
	    	case 3:
	    	           
	    		$grupoUsuario->consultarGrupoUsuario();
	    		
	    		$smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
	   			$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
	    	
	    		$smarty->display('grupoUsuarioDeleta.tpl');
	    	break;
	    	case 4:
	    		
	    		$usuario->consultarUsuario();
	    		
	    		$smarty->assign('codUsuario',$usuario->codUsuario);
	   			$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
	   			$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
	   			$smarty->assign('e_mail',$usuario->e_mail);
	    	
	    		$smarty->display('grupoUsuarioInclusao.tpl');
	    	break;
	    		    		    	
	    	default:
	    	break;
		}
	  	
	  	
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete grupoUsuarioInclusao.tpl e, 
	 * repassa-los ao método inserirGrupoUsuario e inserirUsuarioGrupoUsuario
	 * 
	 * Executa uma validação dos campos dos templete grupoUsuarioInclusão.tpl
	 * 
	 * Retorna o resultado da operação de inserção na tabela GRP_USU e USU_GRP_USU
	 *  
	 */
	
	
	function inserirGrupoUsuario(){
		
	  require_once '.usuarioDao.php';
	  require_once '.grupoUsuarioDao.php';
	  
	  $smarty 			= new Smarty;
     
	  $usuario 			= new Usuario();
	  $grupoUsuario		= new GrupoUsuario();
	  
	  $nmGrupo			= addslashes($_POST['nomeGrupo']);
	  $itensUsuarios   	= $_POST['itensUsuario'];
	  $descricao 		= addslashes($_POST['descricaoGrupo']);
	  
	  
	  
	  if(isset($_POST['itensUsuario']) && $nmGrupo != "" && $descricao != ""){	
	    
	    
	    	$grupoUsuario->consultarMaximoGrupoUsuario();
	    
	    	$maximoGrupo = $grupoUsuario->codGrupoUsuario[0];
		  
		  	$maximoGrupo = $maximoGrupo + 1;
		  
			for($i=0; $i<sizeof($itensUsuarios); $i++) {
	
				$grupoUsuario->incluirUsuarioGrupoUsuario($itensUsuarios[$i], $maximoGrupo);
	    	}
			
										
			 $grupoUsuario->incluirGrupoUsuario($maximoGrupo, $nmGrupo, $descricao);
			
			 $usuario->consultarUsuario();
	    		
    		 $smarty->assign('codUsuario',$usuario->codUsuario);
	   		 $smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
   			 $smarty->assign('nomeUsuario',$usuario->nomeUsuario);
   			 $smarty->assign('e_mail',$usuario->e_mail);
    	
    		 $smarty->assign('resultado',$grupoUsuario->resultado); 	
    			
	         $smarty->display('grupoUsuarioInclusao.tpl');
			
			
	  }else{
	    	 $smarty->assign('campo','branco');
	    	 
	    	 
	    	 $usuario->consultarUsuario();
	    		
    		 $smarty->assign('codUsuario',$usuario->codUsuario);
	   		 $smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
   			 $smarty->assign('nomeUsuario',$usuario->nomeUsuario);
   			 $smarty->assign('e_mail',$usuario->e_mail);
    	
	         $smarty->display('grupoUsuarioInclusao.tpl');
	     	 
	  }
		
	  
	} 
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete grupoUsuarioExclusao.tpl e, 
	 * repassa-los ao método excluirUsuario
	 * 
	 * Recebe o parâmetro codigo do Grupo de Usuarios
	 * 
	 * Executa uma validação dos campos dos templete grupoUsuarioExclusão.tpl
	 * 
	 *  
	 */
	
	
	function excluirGrupoUsuario(){
	
		require_once '.grupoUsuarioDao.php';
	  
	  	$smarty = new Smarty;
     
	  	$grupoUsuario = new GrupoUsuario();
	                                   
		$codigoGrupoUsuario  = $_POST['codigoGrpUsuario'];
	
		
		if($codigoGrupoUsuario == ""){
		
			$smarty->assign('campo','branco');
			
			$grupoUsuario->consultarGrupoUsuario();
	    		
	    	$smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
	   		$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
	    	
	    	$smarty->display('grupoUsuarioDeleta.tpl');
			

		}else{

			$grupoUsuario->excluirGrupoUsuario($codigoGrupoUsuario);
			
			$smarty->assign('resultado',$grupoUsuario->resultado);
			
			$grupoUsuario->consultarGrupoUsuario();
	    		
	    	$smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
	   		$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
	    	    	 
	    	$smarty->display('grupoUsuarioDeleta.tpl');
			
		}
		
	}
	
	
	
	/*
	* Método responsael por consultar grupos de usuários 
	* de acordo com o códgio do grupo de Usuários
	*
	* retorna um grupo de Usuários
	*/
	
	function consultarGrupoUsuarioCodigo(){
	
		require_once '.grupoUsuarioDao.php';
	  
	  	$smarty 	= new Smarty;
     
	  	$grupoUsuario 	= new GrupoUsuario();
	  	
		$cdGrupoUsuario = $_GET['cdGrpUsuario'];
		
		
		if($cdGrupoUsuario != ""){
		
		
			$grupoUsuario->consultarGrupoUsuario();
	    		
		    $smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
		   	$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
		
			$grupoUsuario->consultarGrupoUsuarioCodigo($cdGrupoUsuario);
		
			$smarty->assign('codGrpUsuario',$grupoUsuario->codGrpUsuario);
	   		$smarty->assign('nomeGrpUsuario',$grupoUsuario->nomeGrpUsuario);
	   		$smarty->assign('dscGrpUsuario',$grupoUsuario->descricaoGrpUsuario);
		
			$smarty->assign('consulta',1);
		
			
			$smarty->display('grupoUsuarioAltera.tpl');
		}
				
	}
	
	function consultarGrupoUsuarioCodigo2(){
	
		require_once '.grupoUsuarioDao.php';
	  
	  	$smarty 	= new Smarty;
     
	  	$grupoUsuario 	= new GrupoUsuario();
	  	
		$cdGrupoUsuario = $_GET['cdGrpUsuario'];
		
		
		if($cdGrupoUsuario != ""){
		
		
			$grupoUsuario->consultarGrupoUsuario();
	    		
		    $smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
		   	$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
		
			$grupoUsuario->consultarGrupoUsuarioCodigo($cdGrupoUsuario);
		
			$smarty->assign('codGrpUsuario',$grupoUsuario->codGrpUsuario);
	   		$smarty->assign('nomeGrpUsuario',$grupoUsuario->nomeGrpUsuario);
	   		$smarty->assign('dscGrpUsuario',$grupoUsuario->descricaoGrpUsuario);
		    $smarty->assign('nmusu',$grupoUsuario->nmusu);
	   		$smarty->assign('cdusu',$grupoUsuario->cdusu);
			$smarty->assign('consulta',1);
		
			$smarty->display('grupoUsuarioConsulta2.tpl');
		//	$smarty->display('grupoUsuarioAltera.tpl');
		}
				
	}
	
	function consultarGrupoUsuarioCodigo3(){
	
		require_once '.grupoUsuarioDao.php';
		require_once '.usuarioDao.php';
	  
	  	$smarty 	= new Smarty;
     
	  	$grupoUsuario 	= new GrupoUsuario();
	  	$usuario        = new Usuario();
	  	
		$cdGrupoUsuario = $_GET['cdGrpUsuario'];
		
		
		if($cdGrupoUsuario != ""){
		
		
			$grupoUsuario->consultarGrupoUsuario();
	    		
		    $smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
		   	$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
		
			$grupoUsuario->consultarGrupoUsuarioCodigo($cdGrupoUsuario);
		
			$smarty->assign('codGrpUsuario',$grupoUsuario->codGrpUsuario);
	   		$smarty->assign('nomeGrpUsuario',$grupoUsuario->nomeGrpUsuario);
	   		$smarty->assign('dscGrpUsuario',$grupoUsuario->descricaoGrpUsuario);
		    $smarty->assign('nmusu',$grupoUsuario->nmusu);
	   		$smarty->assign('cdusu',$grupoUsuario->cdusu);
	   		
	   		$usuario->consultarUsuario();
	    	$smarty->assign('codUsuario',$usuario->codUsuario);
	   		$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
	   		$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
	   		$smarty->assign('e_mail',$usuario->e_mail);
	   		$qtd = count($usuario->nomeUsuario);
	   		
	   		for ( $i = 0 ; $i <= $qtd ; $i += 1 ) {
	   		       for ( $h = 0 ; $h <= $qtd ; $h += 1 ) {
	   		         if ( $usuario->nomeUsuario[$i] == $grupoUsuario->nmusu[$h] ) {
	   		            $usuario->indice[$i] = 1 ;
	   		            
	   		          } 
	   		        }
	   		  }  
	   		$smarty->assign('indice',$usuario->indice);  
			$smarty->assign('consulta',1);
		    $smarty->assign('codigo',$cdGrupoUsuario);
			$smarty->display('grupoUsuarioAltera.tpl');
		
		}
				
	}
	
	
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete grupoUsuarioAltera.tpl e, 
	 * repassa-los ao método alterarGrupoUsuario
	 * 
	 * Recebe o parâmetro codigo, nome e descrição do Grupo de Usuários
	 * 
	 */
	
	
	function alterarGrupoUsuario(){
		
		require_once '.grupoUsuarioDao.php';
	  
	  	$smarty 		= new Smarty;
     
	  	$grupoUsuario 	= new GrupoUsuario();

		$nomeGrupo		= $_POST['nomeGrpUsuario'];
		$descricao		= $_POST['dscGrpUsuario'];
		$cdusu = $_POST['cdusual'];	
		$codigoGrpUsuario    = $_POST['codigoGrpUsuario'];
		
	    $grupoUsuario->alterarGrupoUsuario($codigoGrpUsuario, $nomeGrupo, $descricao );
	    $grupoUsuario->limparGrupoUsuario($codigoGrpUsuario);
	 
	    $grupoUsuario->inserirUsuariosGrupo($codigoGrpUsuario, $cdusu ) ;
		$smarty->assign('consulta',3);
    
    	$smarty->display('grupoUsuarioAltera.tpl');	
	  
	}
	
	
	/*
	 * Método centralizador das chamados de outros métodos  
	 * que executam atividades referentes ao objeto Usuario
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 * 
	 */
	
	switch ($Submit){
		
	  case "criar grupo":
	  	inserirGrupoUsuario();	
	    break;
	  case "excluir":
	  	excluirGrupoUsuario();  
	    break;
	  case "consultarUsuario":
	  	consultarUsuario();	
	  	break;
	  case "alterar":  
	    alterarGrupoUsuario() ;	
	  	break;
	  case "consultarGrupoUsuarioCodigo":	
	  	consultarGrupoUsuarioCodigo2();
	 	break;
	  case "consultarGrupoUsuarioCodigo3":	
	  	consultarGrupoUsuarioCodigo3();
	 	break;	
	  default:
	    form();
	    break;
	}
	
	

?>