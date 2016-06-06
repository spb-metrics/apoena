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
 
    Este programa está nomeado como tipoDocumentoControle.php e possui 285
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
	 * as ações iniciais do objeto Tipo de Documento.  
	 * Utiliza o parâmetro acaoTipoDoc para indicar
	 * a atividade referente ao Objeto Termo 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
		
		require_once '.tipoDocumentoDao.php';
		
 	  	$smarty = new Smarty;
	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);

	  	$tipoDocumento	= new TipoDocumento();
	  	
		$acaoTipoDoc = $_GET['acaoTipoDoc'];
	  	
	  	switch ($acaoTipoDoc){
		
	  		case 1:
	  		
	  			$tipoDocumento->consultaTipoDocumento();	
	  		
				$smarty->assign("codTipoDocumento", $tipoDocumento->codTipoDocumento);
		  		$smarty->assign("nomeTipoDocumento", $tipoDocumento->descricaoTipoDocumento);
	  		
	  			$smarty->display('tipoDocumentoAlteracao.tpl');
	    	break;
	  		case 2:
	    		
	  			$tipoDocumento->consultaTipoDocumento();	
	  		
				$smarty->assign("codTipoDocumento", $tipoDocumento->codTipoDocumento);
		  		$smarty->assign("nomeTipoDocumento", $tipoDocumento->descricaoTipoDocumento);
		  	
	    		$smarty->display('tipoDocumentoConsulta.tpl');
	    	break;
	    	case 3:
	    		
	    		$tipoDocumento->consultaTipoDocumento();	
	  		
				$smarty->assign("codTipoDocumento", $tipoDocumento->codTipoDocumento);
		  		$smarty->assign("nomeTipoDocumento", $tipoDocumento->descricaoTipoDocumento);
	    	
	    		$smarty->display('tipoDocumentoDelecao.tpl');
	    	break;
	    	case 4:
	    			
	    		$smarty->display('tipoDocumentoInclusao.tpl');
	    	break;
	    	default:
	    	break;
		}
	}
	
	
	/*
	 * Método responsável por deleta a tabela TIP_DOC
	 * de acordo com o codigo do tipo de Documento
	 * 
	 * Usa como parâmetro o codigo do tipo de documento
	 * 
	 * Realiza a validação dos compos do templete tipoDocumentoAlteracao.tpl
	 * 
	 * Retorna o Objeto Tipo Documento além do resultado da deleção da tabela TIP_DOC
	 * 
	 */
	
	function deletarTipoDocumento(){
	
		require_once '.tipoDocumentoDao.php';

		$smarty = new Smarty;
		
	    $tipoDocumento = new TipoDocumento();
	    
	    if(isset($_POST['itens'])){	
	    
	    	$tipDocSelecionados = $_POST['itens'];
			
	    	for($i=0; $i<sizeof($tipDocSelecionados); $i++) {
	
				$tipoDocumento->deletarFonte($tipDocSelecionados[$i]);
	    	}
	    	
	    }else{
	    
	    	$smarty->assign('campo', 'branco');
	    }
		
		$smarty->assign('resultado',$tipoDocumento->resultado);
		
		$tipoDocumento->consultaTipoDocumento();	
	  		
		$smarty->assign("codTipoDocumento", $tipoDocumento->codTipoDocumento);
  		$smarty->assign("nomeTipoDocumento", $tipoDocumento->descricaoTipoDocumento);
    
    	$smarty->display('tipoDocumentoDelecao.tpl');
	}
	
	
	/*
	 * Método responsável por insere na tabela TIP_DOC
	 * 
	 * Usa como parâmetro o nome do tipo de documento
	 * 
	 * Realiza a validação do campos contidos no templete tipoDocumentoInsercao.tpl
	 * 
	 * Retorna o resultado da operação de inclusão na tabela TIP_DOC
	 */
	
	function incluirTipoDocumento(){
	
		require_once '.tipoDocumentoDao.php';
		
		$smarty = new Smarty;
		
		$tipoDocumento 		= new TipoDocumento();
	
	    $nomeTipoDocumento 	= addslashes(strtoupper($_POST['nomeTipoDocumento']));
	    
	    if($nomeTipoDocumento == ""){
	    
	    	$smarty->assign('campo', 'branco');
	    }
	    
	    if($nomeTipoDocumento != ""){
	    	$tipoDocumento->incluirTipoDocumento($nomeTipoDocumento);
	    }
	    
	    $smarty->assign('resultado',$tipoDocumento->resultado);
    	
    	$smarty->display('tipoDocumentoInclusao.tpl');
	}
	
	
	
	/*
	 * Método responsável por alterar a tabela TIP_DOC 
	 * de acordo com o codigo do tipo de Documento 
	 * 
	 * Usa como parâmetro o codigo do tipo de documento, nome do tipo de documento
	 * 
	 * Retorna o resultado da operação de alteração na tabela TIP_DOC
	 * 
	 */
	
	function alterarTipoDocumento(){
		
		require_once '.tipoDocumentoDao.php';
		
		$smarty = new Smarty();
		
		$tipoDocumento	= new TipoDocumento();
		
		$codTipoDocumento	= $_POST['codigoTipoDocumento'];
	    $nomeTipoDocumento	= addslashes(strtoupper($_POST['nomeTipoDocumento']));
		
	    
	    if($codTipoDocumento == "" || $nomeTipoDocumento == ""){
	    
	    	$smarty->assign("campo", 'branco');
	    }
	    
	    
	    if($codTipoDocumento != "" && $nomeTipoDocumento != ""){
	    	$tipoDocumento->alteraTipoDocumento($codTipoDocumento, $nomeTipoDocumento);
	    }
	    
	    $tipoDocumento->consultaTipoDocumento();	
	  		
	    $smarty->assign("resultado", $tipoDocumento->resultado);
		$smarty->assign("codTipoDocumento", $tipoDocumento->codTipoDocumento);
  		$smarty->assign("nomeTipoDocumento", $tipoDocumento->descricaoTipoDocumento);
  	
  		$smarty->display('tipoDocumentoAlteracao.tpl');
	}
	
	/*
	 * Método responsável por consutar a tabela TIP_DOC  
	 * de acordo com o codigo do tipo de documento
	 * 
	 * Usa como parâmetro o codigo do tipo de documento 
	 * 
	 * Retorna o objeto Tipo de Documento
	 */
	
	
	function consultarTipoDocumento(){
	
		require_once '.tipoDocumentoDao.php';
		
		$tipoDocumento 	  = new TipoDocumento();
	
		$codTipoDocumento = $_GET['cdTipoDocumento'];
		
		$tipoDocumento->consultarTipoDocumento($codTipoDocumento);
		
		
		$smarty = new Smarty();
		
		$smarty->assign('cdTipoDocumento',$tipoDocumento->codTipoDocumento);
   		$smarty->assign('nmTipoDocumento',$tipoDocumento->descricaoTipoDocumento);

   		$tipoDocumento = new TipoDocumento();
   		
  		$tipoDocumento->consultaTipoDocumento();	
  	
		$smarty->assign("codTipoDocumento", $tipoDocumento->codTipoDocumento);
  		$smarty->assign("nomeTipoDocumento", $tipoDocumento->descricaoTipoDocumento);
   		
   		$smarty->display('tipoDocumentoAlteracao.tpl');
	}
	
	
	/*
	 * Método centralizador das chamadas de outros métodos  
	 * que executam atividades referentes ao objeto Tipo de Documento
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 */
	
	switch ($Submit){
		
	  case "deletar":  
	    deletarTipoDocumento();
	    break;
	  case "incluir":  
	    incluirTipoDocumento();
	    break;
	  case "consultaTipoDocumento":  
	    consultarTipoDocumento();
	    break;
	  case "alterar":  
	    alterarTipoDocumento();
	    break;
	  default:
	    form();
	    break;
	}

?>