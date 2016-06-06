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
 
    Este programa está nomeado como tipoFonteControle.php e possui 345
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
	 * as ações iniciais do objeto Tipo de Fonte.  
	 * Utiliza o parâmetro acaoTermo para indicar
	 * a atividade referente ao Objeto Termo 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
		
		require_once '.tipoFonteDao.php';
 	  
   		$smarty = new Smarty;
	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);

		$tipoFonte = new tipoFonte();
		
		$acaoTipoFonte = $_GET['acaoTipoFonte'];
	  	
	  	switch ($acaoTipoFonte){
		
	  		case 1:
	  			
	  		   	$tipoFonte->consultaTipoFonte();
	  			
	  		    $smarty->assign('codTipoFonte',$tipoFonte->codTipoFonte);
	   		    $smarty->assign('nomeTipoFonte',$tipoFonte->nomeTipoFonte);
	   		    $smarty->assign('descricaoTipoFonte',$tipoFonte->descricaoTipo);
				
	    	    $smarty->display('tipoFonteAlteracao.tpl');
	    	    
	    	break;
	  		case 2:
	    		
	  			$tipoFonte->consultaTipoFonte();
	  			
	  		    $smarty->assign('codTipoFonte',$tipoFonte->codTipoFonte);
	   		    $smarty->assign('nomeTipoFonte',$tipoFonte->nomeTipoFonte);
	   		    $smarty->assign('descricaoTipoFonte',$tipoFonte->descricaoTipo);
	    		
	    		$smarty->display('tipoFonteConsulta.tpl');
	    		
	    	break;
	    	case 3:
	
	    		$tipoFonte->consultaTipoFonte();
	  			
	  		    $smarty->assign('codTipoFonte',$tipoFonte->codTipoFonte);
	   		    $smarty->assign('nomeTipoFonte',$tipoFonte->nomeTipoFonte);
	   		    $smarty->assign('descricaoTipoFonte',$tipoFonte->descricaoTipo);
				
	    		$smarty->display('tipoFonteDelecao.tpl');
	    	break;
	    	case 4:
	    	
	    	
	    		$smarty->display('tipoFonteInclusao.tpl');
	    	break;
	    	default:
	    	break;
		}
	  	
	}

	
	
	/*
	 * Método responsável por consultar a tabela TIP_FONT 
	 * de acordo como o codigo do tipo da fonte
	 * 
	 * Usa como parâmetro o codigo do tipo da fonte
	 * 
	 * Retorna o objeto tipo da fonte
	 */
	
	
	function consultarTipoFonte(){
		
		require_once '.tipoFonteDao.php';
		
	    $tipoFonte = new tipoFonte();

	    $cdTipoFonte = $_GET['cdTipoFonte'];
	    
		$tipoFonte->consultarTipoFonte($cdTipoFonte);

		if(isset ($smarty)){
		   require('Smarty.class.php');
	    }

		$smarty = new smarty;
	    
	    $smarty->assign('codFonte',$rss->codFonte);
	    $smarty->assign('codTipFonte',$rss->codTipFonte);
	    $smarty->assign('nomeFonte', $rss->nomeFonte);
	    
	    $smarty->display('consultaTema.tpl');
	}
	
	
	
	/*
	 * Método responsável por deleta a tabela TIP_FONT
	 * 
	 * Usa como parâmetro o codigo do tipo da fonte
	 * 
	 * Realiza a validação do campos contido no templete tipoFonteDeleção.tpl
	 * 
	 * Retorna o resultado da operação de deleção da tabela TIP_FONT além 
	 * do objeto  tipo da fonte atualizado
	 */
	
	function deletarFonte(){
	
		require_once '.tipoFonteDao.php';

		$smarty = new Smarty;	
		
	    $tipoFonte = new TipoFonte();
	    
	    if(isset($_POST['itens'])){	
	    
	    	$tipoFonteSelecionados = $_POST['itens'];
			
	    	for($i=0; $i<sizeof($tipoFonteSelecionados); $i++) {
	
	    		$tipoFonte->deletarTipoFonte($tipoFonteSelecionados[$i]);
			}
	    }else{
	    
	    	$smarty->assign('campo','branco');
	    }
	    
		$smarty->assign('resultado',$tipoFonte->resultado);
		
		$tipoFonte->consultaTipoFonte();
	  			
  	    $smarty->assign('codTipoFonte',$tipoFonte->codTipoFonte);
   	    $smarty->assign('nomeTipoFonte',$tipoFonte->nomeTipoFonte);
   	    $smarty->assign('descricaoTipoFonte',$tipoFonte->descricaoTipo);
	    
	    $smarty->display('tipoFonteDelecao.tpl');
	}
	
	
	
	/*
	 * Método responsável por inserir na tabela FONT
	 * 
	 * Usa como parâmetro o nome do tipo da fonte e a descrição do tipo da fonte
	 * 
	 * Realiza a validação do campos contido no templete tipoFonteInclusão.tpl
	 * 
	 * Retorna o resultado da operação de deleção da tabela TIP_FONT além 
	 * do objeto  tipo da fonte atualizado
	 */
	
	function inserirFonte(){
	
		require_once '.tipoFonteDao.php';

		$smarty = new Smarty();
		
	    $tipoFonte = new TipoFonte();
		
	    $nomeTipoFonte 		= addslashes(strtoupper($_POST['nomeFonte']));
	    $descricaoTipoFonte = addslashes(strtoupper($_POST['descricaoFonte']));	
	
	    if($nomeTipoFonte == "" || $descricaoTipoFonte == ""){
	    
	    	$smarty->assign('campo','branco');
	    }
	    
	    if($nomeTipoFonte != "" && $descricaoTipoFonte != ""){
	    	$tipoFonte->inserirTipoFonte($nomeTipoFonte, $descricaoTipoFonte); 
	    }
	    
	    $smarty->assign('resultado',$tipoFonte->resultado);
	    
	    $smarty->display('tipoFonteInclusao.tpl');
	}
	
	
	/*
	 * Método responsável por consular na tabela FONT
	 * 
	 * Usa como parâmetro o codigo do tipo da fonte
	 * 
	 * Retorna o objeto tipo da fonte duas vezes, mas com os nomes 
	 * dos parâmetros diferentes.
	 */
	
	
	function consultaTipoFonte(){
	
		require_once '.tipoFonteDao.php';

	    $tipoFonte = new TipoFonte();
	
	    $codTipoFonte = $_GET['cdTipoFonte'];
	    
	    $tipoFonte->consultarTipoFonte($codTipoFonte);
	    
	    $smarty = new Smarty();
	    
	    $smarty->assign('cdTipoFonte',$tipoFonte->codTipoFonte);
   	    $smarty->assign('nmTipoFonte',$tipoFonte->nomeTipoFonte);
   	    $smarty->assign('dscTipoFonte',$tipoFonte->descricaoTipo);
	    
	    $tipoFonte = new TipoFonte();
	
		$tipoFonte->consultaTipoFonte();
	  	
		$smarty->assign('resultado',$tipoFonte->resultado);
		
  	    $smarty->assign('codTipoFonte',$tipoFonte->codTipoFonte);
   	    $smarty->assign('nomeTipoFonte',$tipoFonte->nomeTipoFonte);
   	    $smarty->assign('descricaoTipoFonte',$tipoFonte->descricaoTipo);
   	    
   	    $smarty->display('tipoFonteAlteracao.tpl');
	
	}
	
	/*
	 * Método responsável por alterar a tabela TIP_FONT
	 * 
	 * Usa como parâmetro o codigo do tipo da fonte , nome do tipo da fonte e a descrição do tipo da fonte
	 * 
	 * Realiza a validação do campos contido no templete tipoFonteAlteracao.tpl
	 * 
	 * Retorna o resultado da operação da alteração na tabela TIP_FONT além 
	 * do objeto  tipo da fonte atualizado
	 */
	
	
	function alterarTipoFonte(){
	
		require_once '.tipoFonteDao.php';

		$smarty = new Smarty();
		
	    $tipoFonte = new TipoFonte();
	    
	    $codTipoFonte  		= $_POST['cdFonte'];
	    $nomeTipoFonte 		= addslashes(strtoupper($_POST['nomeFonte']));
	    $descricaoTipoFonte = addslashes(strtoupper($_POST['descricaoFonte']));	 
	    
	    
	    if($nomeTipoFonte == "" || $descricaoTipoFonte == ""){
	    
	    	$smarty->assign('campo','branco');
	    }
	    
	    if($codTipoFonte != "" && $nomeTipoFonte != "" && $descricaoTipoFonte != ""){
			$tipoFonte->alterarTipoFonte($codTipoFonte, $nomeTipoFonte, $descricaoTipoFonte);
	    }
		
		$tipoFonte->consultaTipoFonte();
	  	
		$smarty->assign('resultado',$tipoFonte->resultado);
		$smarty->assign('codTipoFonte',$tipoFonte->codTipoFonte);
   	    $smarty->assign('nomeTipoFonte',$tipoFonte->nomeTipoFonte);
   	    $smarty->assign('descricaoTipoFonte',$tipoFonte->descricaoTipo);
   	    
   	    $smarty->display('tipoFonteAlteracao.tpl');
	
	}
	
	function inserirTipoFonte(){
	
	
	
	//INSERT INTO TIP_FONT (CD_TIP_FONT, NM_FONT, DSC_TIP_FONT, IMG) VALUES (11,'MARCELO','TESTANDO INCLUSAO', LOAD_FILE("/home/marcelo/workspace/APOENA_PROCESSADOR/imagens/seta.gif"))
	
	
	
	}
	
	
	
	/*
	 * Método centralizador das chamadas de outros métodos  
	 * que executam atividades referentes ao objeto Tipo da Fonte
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 */
	
	switch ($Submit){
		
	  case "deletar":  
	    deletarFonte();
	    break;
	  case "inserir":  
	    inserirFonte();
	    break;
	  case "consultaTipoFonte":
	  	consultaTipoFonte();
	    break;
	  case "alterar":
	  	alterarTipoFonte();
	  default:
	    form();
	    break;
	}

?>