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
 
    Este programa está nomeado como processamentoControle.php e possui 147
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
	 * as ações iniciais do processamento de um Clipping.  
	 * Utiliza o parâmetro acaoProcessamento para indicar
	 * a atividade referente ao processamento do Clipping 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
 	  
		$smarty = new Smarty;

	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);
	  
	  	$acaoProcessamento = $_GET['acaoProcessamento'];
	  	
	  	switch ($acaoProcessamento){
		
	  		case 1:
	  			
	  			$smarty->display('processar.tpl');
	
	    	break;
	  		case 2:
	    		
	    		$smarty->display('gerarClipping.tpl');
	    		
	    	break;
	    	
	    	case 6:
	    	
	    		$smarty->display('agendaInclusao.tpl');
		    	    
	    	break;
	    	
	    	case 7:
	    	
	    		$smarty->display('muchaInclusao.tpl');
	    	    
	    	break;       
	    	
	    	case 8:
	    	
	    		$smarty->display('restaura.tpl');
	    	    
	    	break;
	    	  
	    	case 9:
	    	
	    		$smarty->display('criarNoticia.tpl');
	    	    
	    	break;  
	    	  
	    	default:
	    	break;
		}
	  	
	  	
	}
	
	
	/*
	 * Método responsável por obter os
	 * startar os comandos shell script para baixar e processamento de Documentos 
	 *  
	 */
	
	
	function baixarDocumento(){
		
	  $smarty = new Smarty;
      
          $processamento = "";
	  
	  //processamento do documentos para depois inserir nos banco de dados
	  shell_exec('cd /var/www/apache2-default/apoena/rss/; ./recolhe' );
	  
	  
	  $smarty->assign('resultado', "Processamento realizado com sucesso !!!");
	  $smarty->display('processamento.tpl');
	  
	} 
	
	
	/*
	 * Método responsável por obter os
	 * startar o comando shell script para gerar um novo Clipping 
	 *  
	 */
	
	
	function gerarClipping(){
	
		$smarty = new Smarty;
    
    	//comando shell script para gerar novos clippings
     	shell_exec('cd /var/www/apache2-default/apoena/rss/; source processaCliping.sh');
     		  	
     		  	
		$smarty->assign('resultado', "Clipping gerado com sucesso");
		$smarty->display('processamento.tpl');
		
	}
	
	function agendaRodada() {
	
	    $smarty  = new Smarty;
	    $horap = $_POST['hora'];
	    if ( $horap < 25 ) {
	    	    shell_exec('/var/www/apache2-default/apoena/rss/./agenda.sh ' . $horap);
	    		$smarty->assign('resultado', "Agendado processamento com sucesso");
	    		$smarty->display('processamento.tpl');
	    }else{
	    		$smarty->assign('resultado', "Agendamento Não processado, hora inválida $horap ");
	    		$smarty->display('processamento.tpl');
	    }
	 }
	 
	 function agendaRodada2() {
	
			
	    $smarty  = new Smarty;
	    $hora1 = $_POST['hora1'];
	    $hora2 = $_POST['hora2'];
	    if ( $hora1 > 24 or $hora2 > 24	) {
	    	    $smarty->assign('resultado', "Agendamento Não processado, hora inválida $hora1 $hora2 ");
	    		$smarty->display('processamento.tpl');
	    }else{
	    		shell_exec('/var/www/apache2-default/apoena/rss/./agenda2.sh ' . $hora1 . ' ' .  $hora2 );
	    		$smarty->assign('resultado', "Agendado processamento com sucesso");
	    		$smarty->display('processamento.tpl');
	    }
	    
	 }
	 
	 
	 function muchaTabela() {
	
	    $smarty  = new Smarty;
		    
	    shell_exec('cd /var/www/apache2-default/apoena/rss/;source mucha.sh');
	    
	    $smarty->assign('resultado', "Muchação efetuada com sucesso");
	    $smarty->display('processamento.tpl');
	    
	 }
	 
	 function muchaTabela2() {
	
	    $smarty  = new Smarty;
		    
		$dia = $_POST['dia'];		  
		$mes = $_POST['mes'];
		$ano = $_POST['ano'];
		
		if ($dia > 31 ) {
		
		$data = $dia . $mes . $ano ;
		$smarty->assign('resultado', "Muchação não efetuada, erro na data informada $data");
	    $smarty->display('processamento.tpl');
		
		}
		else {

		if ( $mes > 12 ) {
		
		$data = $dia . $mes . $ano ;
		$smarty->assign('resultado', "Muchação não efetuada, erro na data informada $data");
	    $smarty->display('processamento.tpl');	
			
		}
		else {	
		
		if ( $ano < 2000 ){
		
		$data = $dia . $mes . $ano ;
		$smarty->assign('resultado', "Muchação não efetuada, ano tem que ser maior que 2000 $data");
		$smarty->display('processamento.tpl');
		
		}
		else {
		if ( $dia < '10' ){
		     $dia = '0'. $dia ;
		}
		if ( $mes < 10 ){
		    $mes = '0'. $mes ;
		}
		echo $dia ;
	    shell_exec('cd /var/www/apache2-default/apoena/rss/;source muchaParcial.sh ' . $ano . $mes . $dia );
	    $smarty->assign('resultado', "Muchação efetuada com sucesso");
	    $smarty->display('processamento.tpl');
	    
	   } }	}    
	 }
	
	function restaura() {
	
	    $smarty  = new Smarty;
		    
	    shell_exec('cd /var/www/apache2-default/apoena/rss/;source restaura.sh');
	    $smarty->assign('resultado', "Restauração efetuada com sucesso");
	    $smarty->display('processamento.tpl');
	    
	 }
	
	function incluirNoticia() {
	
	    $smarty  = new Smarty;

		$titulo = $_POST['titulo'];        
        $noticia = $_POST['noticia'];		  
     
        shell_exec("cd /var/www/apache2-default/apoena/rss/; source ./apoena.sh '$titulo' '$noticia'");
        shell_exec("cd /var/www/apache2-default/apoena/rss/; source ./processaNoticia.sh ");
	   
	    $smarty->assign('resultado', "1");
	    $smarty->display('criarNoticia.tpl');
	    
	 }
	
	
	/*
	 * Método centralizador das chamadas de outros métodos  
	 * que executam atividades referentes ao processamento
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 */
			
	switch ($Submit){
	  case "inserir":
	    agendaRodada();
	    break;
	  case "inserir2":
	    agendaRodada2();
	    break;  
	  case "murcha":
	  	muchaTabela();
	  	break;
	  case "murcha2":
	  	muchaTabela2();
	  	break;
	  case "restaura":
	  	restaura();
	  	break;
	  case "consultar":  
	    tela_alterar();
	    break;
	  case "processar": 
		baixarDocumento();
	    break;
	  case "gerar":
	  	gerarClipping();  
	    break;
	   case "InserirNoticia":
	  	incluirNoticia() ;  
	    break;  
	  default:
	    form();
	    break;
	
	    
	}
	
	
?>
