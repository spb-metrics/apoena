<?PHP
/* header("content-type: text/html; charset=utf-8");
?>

<?php */

/*
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
 
    Você deve ter recebido uma cópia da Licença Pública Geral GNU
    junto com este programa; se não, escreva para a Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
    02111-1307, USA
    
    Contato: accrvianna@bb.com.br (Antônio Carlos C. R. Vianna - Análista responsável pelo projeto)
*/

require_once 'configs/.connect.php';
require_once 'includes/config.php';


if(!isset ($smarty)){
	require('Smarty.class.php');
}

$smarty = new Smarty;


    switch ($Submit){
		
	  case "acessar":
	    logarSistema();
	    break;
	  default:
		$smarty->assign('acesso', 1);
	    $smarty->display('login.tpl');
	    break;
	}


	/*
	* Método responsável por compor o menu inicial
	* de acordo com o tipo de usuário. Além de verificar o 
	* acesso
	*
	*/


	function logarSistema(){

		require_once '.acessoDao.php';
		
		$smarty = new Smarty;
		
		$acesso = new Acesso();
		
		$login = addslashes($_POST['login']);
		$senha = addslashes($_POST['senha']);
		
		
		if($login != "" && $senha != ""){
		
			$acesso->verificarAcesso($login);
		
			$senhaBancoDados = $acesso->senha;


			if(strcmp($senha, $senhaBancoDados) == 0){
			
				$acss = $acesso->tipoUsuario;
			
				switch ($acss){
					
				  case "1":
				    
				    $smarty->assign('indexMenu',1);  
					$smarty->display('index.tpl');
				    
				    break;
				  case "2":  
				  	
				  	$smarty->assign('indexMenu',2);
					$smarty->display('index.tpl');
				  
				    break;
				  default:
				    $smarty->display('login.tpl');
				    break;
				}
				
				
			}else{
				$smarty->assign('acesso', 0);
				$smarty->display('login.tpl');
			}	
				
		
		}else{
			
			$smarty->assign('campor', "branco");
			$smarty->display('login.tpl');
		
		}	
		
	}

?>
