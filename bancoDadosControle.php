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
 
    Este programa está nomeado como estatisticaControle.php e possui 196
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
	 * as ações referentes à manutenção do Banco de Dados do Apoena.  
	 * Utiliza o parâmetro acaoBD para indicar
	 * a atividade referente a manutenção do Banco de Dados 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
 	  
		require_once '.bancoDadosDao.php';
	
   		$smarty = new Smarty;

	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);
	  
	  	$bancoDados = new BancoDados();
	  	
	  	$acaoBancoDados = $_GET['acaoBD'];
	  	
	  	switch ($acaoBancoDados){
		
	  		case 1:
	  		
	  			becapearBancoDados();
	  					
	    	break;
	    
	    	case 2:
	    	
	    		recuperarBancoDados();
	    	
	    	break;
	    
	    	default:
	    	break;
		}
	}
	
	
	/*
	 * Método responsável por realizar o backup do Banco de Dados 
	 * do sistema Apoena
	 */
	
	function becapearBancoDados(){
	
	
		  $smarty = new Smarty;
      
	      $resultado = shell_exec("/var/www/apache2-default/apoena/rss/backupBDApoena.sh");
		  
		  if($resultado){
		  	
		  	$smarty->assign('resultado', "Backup do Banco de Dados Apoena realizado com sucesso !!!");
		  
		  	$smarty->display('bancoDados.tpl');
		  
		  }else{
		  
		  	$smarty->assign('resultado', "Backup do Banco de Dados Apoena não foi realizado !!!");
		  
		  	$smarty->display('bancoDados.tpl');
		  
		  }
	
	}
		
	
	
	/*
	 * Método responsável por formatar o Banco de Dados do 
	 * do sistema Apeona com um backup do Banco armazenado
	 */
	
	function recuperarBancoDados($nomeBackup){

		  $smarty = new Smarty;
            
      
	      $resultado = shell_exec("/var/www/apache2-default/apoena/rss/recuperaBD.sh " . $nomeBackup);
	      
		  
		  if($resultado){
		  	
		  	$smarty->assign('resultado', "Recuperação do Banco de Dados Apoena realizado com sucesso !!!");
		  
		  	$smarty->display('bancoDados.tpl');
		  
		  }else{
		  
		  	$smarty->assign('resultado', "Recuperação do Banco de Dados Apoena não foi realizado !!!");
		  
		  	$smarty->display('bancoDados.tpl');
		  
		  }
		
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
		
	  case "acao1":
	    
	    break;
	  case "acao2":
	  	
	  	break;
	  case "acao3":
	  	
	  	form();
	  break;		
	  default:
	    form();
	    break;
	}

?>