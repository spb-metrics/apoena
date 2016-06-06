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
 
    Este programa está nomeado como usuarioControle.php e possui 424
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
	 * as ações iniciais do objeto Usuario.  
	 * Utiliza o parâmetro acaoUsu para indicar
	 * a atividade referente ao Objeto Usuario 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
 	  
		require_once '.usuarioDao.php';
		require_once '.tipoUsuarioDao.php';
	
   		$smarty = new Smarty;

	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);
	  
	  	$usuario 		= new Usuario();
	  	$tipoUsuario	= new TipoUsuario();
	  	
	  	$acaoUsu = $_GET['acaoUsu'];
	  	
	  	switch ($acaoUsu){
		
	  		case 1:
	  		
	  			$usuario->consultarUsuario();
	    		
	    		$smarty->assign('codUsuario',$usuario->codUsuario);
	   			$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
	   			$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
	   			$smarty->assign('e_mail',$usuario->e_mail);
	  		
	  			
	    		$smarty->display('usuarioAlteracao.tpl');
	    	break;
	  		case 2:
	    		
	    		$usuario->consultarUsuario();
	    		
	    		$smarty->assign('codUsuario',$usuario->codUsuario);
	   			$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
	   			$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
	   			$smarty->assign('e_mail',$usuario->e_mail);
	    		
	    		$smarty->display('usuarioConsulta.tpl');
	    	break;
	    	case 3:
	    	
	    		$usuario->consultarUsuario();
	    		
	    		$smarty->assign('codUsuario',$usuario->codUsuario);
	   			$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
	   			$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
	   			$smarty->assign('e_mail',$usuario->e_mail);
	    	
	    		$smarty->display('usuarioDelecao.tpl');
	    	break;
	    	case 4:
	    		
	    		$tipoUsuario->consultarTipoUsuario();
	    		
	    		$smarty->assign('codTipoUsuario',$tipoUsuario->codTipoUsuario);
	   			$smarty->assign('nomeTipoUsuario',$tipoUsuario->nomeTipoUsuario);
	   			$smarty->assign('dscTipoUsuario',$tipoUsuario->dscTipoUsuario);
	    	
	    		$smarty->display('usuarioInclusao.tpl');
	    	break;
	    	default:
	    	break;
		}
	  	
	  	
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete usuarioInclusao.tpl e, 
	 * repassa-los ao método inserirUsuario
	 * 
	 * Recebe os parâmetros nome do Usuario , codigo do tipo de Usuário, e_mail, 
	 * telefones residencial, trabalho e celular
	 * 
	 * Executa uma validação dos campos dos templete usuarioInclusão.tpl
	 * 
	 * Retorna o resultado da operação de inserção na tabela USU e TEL
	 *  
	 */
	
	
	function inserirUsuario(){
		
	  require_once '.usuarioDao.php';
	  require_once '.tipoUsuarioDao.php';
	  require_once '.telefoneDao.php';
	  require_once '.acessoDao.php';
	  
	  $smarty = new Smarty;
     
	  $usuario 		= new Usuario();
	  $tipoUsuario	= new TipoUsuario();
	  $telefone 	= new Telefone();
	  $acesso 		= new Acesso();
	  
	  $codTipoUsuario	= $_POST['codTipoUsuario'];
	  $nmUsuario	  	= addslashes($_POST['nomeUsuario']);
	  $e_mail	    	= $_POST['email'];
	  
	  $telCasa 			= $_POST['telResidencial']; 
	  $telTrabalho 		= $_POST['TelComercial'];
	  $celular  		= $_POST['celular'];
	  $novaSenha		= $_POST['NovaSenha'];
	  $descricaoPerfil	= $_POST['descricao'];
	  
	  
	  	//verificar se o email é válido
	  	if (!verificar_email($e_mail)){
			$smarty->assign('validacaoEmail','branco');
		}
	  
	  	//verifica se os campos estão vazios
	    if($nmUsuario == "" || $e_mail == "" || $codTipoUsuario == "" || $novaSenha == "" ){
		  	 $smarty->assign('campo','branco');
		  	 $smarty->assign('email',$e_mail);
		  	 $smarty->assign('nomeUsuario',$nmUsuario);
		  	 $smarty->assign('NovaSenha',$novaSenha);
		  	 $smarty->assign('codTipoUsuario',$codTipoUsuario);
		  	 $smarty->assign('telResidencial',$telCasa);
		  	 $smarty->assign('TelComercial',$telTrabalho);
		  	 $smarty->assign('celular',$celular);
		  	 $smarty->assign('descricao',$descricaoPerfil);
		}
		
		//inclui na tabela apenas os campos que não estão vazios  
		if($nmUsuario != "" && $e_mail != "" && $codTipoUsuario != "" && verificar_email($e_mail) && $novaSenha != "" ){ 
		
			$arrform = array(0 => $codTipoUsuario,1 => $nmUsuario,2 => $e_mail);	
		
			$usuario->inserirUsuario($arrform);
			
			$usuario->consultarUsuarioNome($nmUsuario);
			
			$acesso->inserirAcesso($nmUsuario, $usuario->codigoUsuario, $novaSenha, $descricaoPerfil);
			
		}
		
		//inclui na tabela TEL os telefones   
		$arrformTel = array(0 => $usuario->codUsuario,1 => $telCasa,2 => $telTrabalho, 3 =>$celular);	
			
		$telefone->inserirTelefone($arrformTel);
		
		
	  	$tipoUsuario->consultarTipoUsuario();
	    		
		$smarty->assign('codTipoUsuario',$tipoUsuario->codTipoUsuario);
		$smarty->assign('nomeTipoUsuario',$tipoUsuario->nomeTipoUsuario);
		$smarty->assign('dscTipoUsuario',$tipoUsuario->dscTipoUsuario);
	
	  	$smarty->assign('resultado',$usuario->resultado);
	  	$smarty->display('usuarioInclusao.tpl');
	  
	} 
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete usuarioExclusao.tpl e, 
	 * repassa-los ao método excluirUsuario
	 * 
	 * Recebe o parâmetro codigo da Usuario
	 * 
	 * Executa uma validação dos campos dos templete usuarioExclusão.tpl
	 * 
	 * Retorna o objeto usuario
	 *  
	 */
	
	
	function excluirUsuario(){
	
		require_once '.usuarioDao.php';
	  
	  	$smarty = new Smarty;
     
	  	$usuario = new Usuario();
	
		$codUsuario  = $_POST['codUsuario'];
		
		if($codUsuario == ""){
		
			$smarty->assign('campo','branco');
		}
		
		if($codUsuario != ""){
			$usuario->excluirUsuario($codUsuario);
		}
		
		$smarty->assign('resultado',$usuario->resultado); 
		
		
		$usuario->consultarUsuario();
	    		
	    $smarty->assign('codUsuario',$usuario->codUsuario);
	   	$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
	   	$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
	   	$smarty->assign('e_mail',$usuario->e_mail);
		
		
		$smarty->display('usuarioDelecao.tpl');
		
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete usuarioConsulta.tpl e, 
	 * repassa-los ao método consultaUsuario
	 * 
	 * Recebe o parâmetro codigo do Usuairo
	 * 
	 * Executa uma validação dos campos dos templete usuarioConsulta.tpl
	 * 
	 * Retorna o objeto Usuario
	 *  
	 */
	
	
	function consultarUsuario(){
	
		require_once '.usuarioDao.php';
	    require_once '.telefoneDao.php';
	  
	  
	  	$smarty 	= new Smarty;
     
	  	$usuario 	= new Usuario();
	  	$telefone 	= new Telefone();	
	  	
		$cdUsuario = $_GET['codigoUsu'];
		
		//consulta o objeto usuario
		$usuario->consultarUSU($cdUsuario);
		
		$smarty->assign('codUsu',$usuario->codUsuario);
		$smarty->assign('codTipUsuario', $usuario->codTipoUsuario);
		$smarty->assign('nomeTipUsuario',$usuario->nomeTipoUsuario);
		$smarty->assign('nomeUsu',$usuario->nomeUsuario);
		$smarty->assign('email',$usuario->e_mail);
		
		// consulta os telefones do usuario
		
		$telefone->consultarTel($cdUsuario);
		
		$smarty->assign('telefoneCasa',$telefone->telefoneCasa);
		$smarty->assign('telefoneTrabalho',$telefone->telefoneTrabalho);
		$smarty->assign('celular',$telefone->celular);
		
   		//esta consulta é para preencher o combo de escolha do usuário
   		
   		$usuario = new Usuario();
   		
   		$usuario->consultarUsuario();
	    		
		$smarty->assign('codUsuario',$usuario->codUsuario);
		$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
		$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
		$smarty->assign('e_mail',$usuario->e_mail);
   		
   		$smarty->assign('consulta',1);
   		
   		
    	$smarty->display('usuarioAlteracao.tpl');
		
	}
	
	
	
	/*
	 * Método responsável por obter os 
	 * os parâmetros oriundos do templete usuarioAlteracao.tpl e, 
	 * repassa-los ao método alterarUsuario
	 * 
	 * Recebe o parâmetro codigo do Usuario, nome do Usuario, e_mail do Usuario e seus telefones
	 * 
	 * Executa uma validação dos campos dos templete usuarioAlteracao.tpl
	 * 
	 * Retorna o objeto Usuario atualizado
	 *  
	 */
	
	
	function alterarUsuario(){
		
		require_once '.usuarioDao.php';
		require_once '.telefoneDao.php';
	  
	  	$smarty 	= new Smarty;
     
	  	$usuario 	= new Usuario();
	  	$telefone 	= new Telefone();
	  	
	  	$arrform 	= array(0 => $_POST['codUSU'],1 => $_POST['codTUsuario'],2 => addslashes($_POST['nomeUsu']), 3 => addslashes($_POST['email']));
		$arrformTel	= array(0 => $_POST['codUSU'],1 => $_POST['telResidencial'],2 => $_POST['telComercial'], 3 => $_POST['celular']);


	 	 if($arrform[1] == "" || $arrform[2] == "" || $arrform[3] == ""){
		  	 $smarty->assign('campo','branco');
		  }
		  
		  if($arrform[1] != "" && $arrform[2] != "" && $arrform[3] != "" ){ 
	  	
	  		$usuario->alterarUsuario($arrform);
		  }
		  
		  if($arrformTel[1] != "" || $arrformTel[2] != "" || $arrformTel[3] != "" ){ 
	  	
	  		$telefone->alterarTelefone($arrformTel);
		  } 
		  
		
		$smarty->assign('resultado',$usuario->resultado);
		
		$usuario->consultarUsuario();
	    		
		$smarty->assign('codUsuario',$usuario->codUsuario);
		$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
		$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
		$smarty->assign('e_mail',$usuario->e_mail);
		
		$smarty->display('usuarioAlteracao.tpl');
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
		
	  case "inserir":
	  	inserirUsuario();	
	    break;
	  case "excluir":
	  	excluirUsuario();  
	    break;
	  case "consultarUsuario":
	  	consultarUsuario();	
	  	break;
	  case "alterar":  
	    alterarUsuario();	
	  	break;	
	  default:
	    form();
	    break;
	}
	


	/*
	 * Função responsável pela validação do campo  
	 * email 
	 *
	 * returna um boolean indicando a validade do email 
	 */
	

	function verificar_email($email){
   	
   		$result = 0;
   	

		if(ereg("^([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$", $email)){

			$result = 1;
			return $result;

		}else{
		
			return $result;
		}
	}
	

?>