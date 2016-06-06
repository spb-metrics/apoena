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
	 * as ações iniciais do objeto Estatística.  
	 * Utiliza o parâmetro acaoEstatística para indicar
	 * a atividade referente ao Objeto Estatistica 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
 	  
		require_once '.estatisticaDao.php';
	
   		$smarty = new Smarty;

	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);
	  
	  	$estatistica = new Estatistica();
	  	
	  	$acaoEstatistica = $_GET['acaoEstatistica'];
	  	
	  	switch ($acaoEstatistica){
		
	  		case 1:
	  		
	  			$dataAtual = date("ymd");
	  			$dataAtual = "20" . $dataAtual ;
	  			// echo $dataAtual ;
	  			$estatistica->consultarValorTotalDocumento();
		
				$smarty->assign('valorTotal',$estatistica->totalDocumentos);
	  			
	  			$estatistica->consultarEstatisticaDocumento($dataAtual);
	  			
	  			$smarty->assign('codigoSequencialDoc',$estatistica->codigoSequencial);
	   			$smarty->assign('valorVinculoDoc',$estatistica->valorVinculo);
	  			
	  			$estatistica->consultarEstatisticaTipoFonte($dataAtual);
	  			
	  			$valor = $estatistica->valorVinculo;
    			$valorAjustado;
    			$contador = 0;
    			
	  			for($i=1; $i<sizeof($valor); $i++){
			
					$valorAjustado[$contador] = $valor[$i];
					$contador++;  
	  			}
	  			
	  			$smarty->assign('codigoSequencialTipFont',$estatistica->codigoSequencial);
				$smarty->assign('codigoEstatisticaTipFont',$estatistica->codigoEstatistica);
    			$smarty->assign('valorValorVinculoTipFont',$valorAjustado);
    			$smarty->assign('nomeVinculoTipFont',$estatistica->nomeVinculo);
    			$smarty->assign('consultaEstatistica',"DOC");
    		
	    		$smarty->display('estatisticaGeral.tpl');
	    		
	    	break;
	    	
	    	case 2 :
	    	    
	    	      $smarty->display('mineracaoConsulta.tpl');
	    	     
	    	break ;
	    	      
	    	default:
	    	break;
		}
	}
	
	
	/*
	 * Método responsável por obter os 
	 * os dados da estatísticos sobre a quantidade de documentos
	 * por fonte
	 */
	
	
	function consultarEstatisticaFonte(){
	
		require_once '.estatisticaDao.php';
	  
	  	$smarty = new Smarty;
     
	  	$estatistica = new Estatistica();	
	  	
		$codigoEstatistica = $_POST['codigoEstatistica'];
		
		$dataAtual = date("y-m-d");
		
		$estatistica->consultarEstatisticaFonte($dataAtual);
	    		
    	$smarty->assign('codigoSequencialFont',$estatistica->codigoSequencial);
   		$smarty->assign('codigoTipoEstatisticaFont',$estatistica->codigoTipoEstatistica);
    	$smarty->assign('valorVinculoFont',$estatistica->valorVinculo);
  		$smarty->assign('nomeVinculoFont',$estatistica->nomeVinculo);
  		$smarty->assign('consultaEstatistica',"FONT");
  		
   		   		
    	$smarty->display('estatisticaConsultaGeral.tpl');
		
	}
		
	
	
	/*
	 * Método responsável por obter os 
	 * os dados da estatísticos sobre a quantidade de documentos
	 * por arquivo RSS
	 */
	
	function consultarEstatisticaRSS(){
	
		require_once '.estatisticaDao.php';
	
   		$smarty = new Smarty;

	  	$estatistica = new Estatistica();
	  	
	  	$dataAtual = date("y-m-d");
	
		$estatistica->consultarEstatisticaRSS($dataAtual);
	  			
  		$smarty->assign('codigoRSS',$estatistica->codigoRSS);
   		$smarty->assign('quantidadeDocRSS',$estatistica->quantidadeDocRSS);
  		$smarty->assign('enderecoRSS',$estatistica->enderecoRSS);
  		$smarty->assign('nomeFonte',$estatistica->nomeFonte);
  		$smarty->assign('consultaEstatistica',"RSS");
  		
		$smarty->display('estatisticaConsultaGeral.tpl');
	
	} 
	
	/*
	 * Método responsável por obter os 
	 * os dados da mineracao  de documentos
	 * 
	 */
	
	function consultarMineracao(){
	
		require_once '.estatisticaDao.php';
	
   		$smarty = new Smarty;

	  	$estatistica = new Estatistica();
	  	$termo = $_POST['termo'];
	  	$dia = $_POST['dia'];
	  	$mes = $_POST['mes'];
	  	$ano = $_POST['ano'];
	  	$dia2 = $_POST['dia2'];
	  	$mes2 = $_POST['mes2'];
	  	$ano2 = $_POST['ano2'];
	  	
	  	 $dia0 = substr($dia,0,1);
		 $mes0 = substr($mes,0,1);
		 $diaf = substr($dia2,0,1);
		 $mesf = substr($mes2,0,1);
	  	
if ( $termo <> "" ){	  	
	  	if ($dia > 31 ) {
		
		
		$smarty->assign('resultado', "Dia informado errado $dia");
	    $smarty->display('processamento.tpl');
		
		}
		else {

		if ( $mes > 12 ) {
		
		$smarty->assign('resultado', "Mês informado errado $mes");
	    $smarty->display('processamento.tpl');	
			
		}
		else {	
		
		if ( $ano < 1900 ){
		
		$data = $dia . $mes . $ano ;
		$smarty->assign('resultado', "Ano informado errado $ano");
		$smarty->display('processamento.tpl');
		
		}
		else {
		if ( $dia < '10' ){
		 
		  if ( $dia0 == 0 ){
		     $dia =  $dia ;
		     } else {  
		     $dia = '0'. $dia ;
		} }
		
		if ( $mes < '10' ){
		  if ( $mes0 == 0 ){
		     $mes = $mes ;
		     } else {  
		     $mes = '0'. $mes ;
		} }
		// echo $dia ;
	   // shell_exec('cd /var/www/apache2-default/apoena/rss/;source muchaParcial.sh ' . $ano . $mes . $dia );
	   // $smarty->assign('resultado', "Muchação efetuada com sucesso");
	   // $smarty->display('processamento.tpl');
	    
	   } }	}    
	   if ($dia2 > 31 ) {
		
		$smarty->assign('resultado', "Dia informado errado $dia2");
	    $smarty->display('processamento.tpl');
		
		}
		else {

		if ( $mes2 > 12 ) {
		
		$smarty->assign('resultado', "Mês informado errado $mes2");
	    $smarty->display('processamento.tpl');	
			
		}
		else {	
		
		if ( $ano2 < 2000 ){
		
		$smarty->assign('resultado', "Ano informado errado $ano2");
		$smarty->display('processamento.tpl');
		
		}
		else {
		if ( $dia2 < '10' ){
		  if ( $diaf == 0) {
		     $dia2 = $dia2 ;
		     } else {  
		     $dia2 = '0'. $dia2 ;
		} }
		
		if ( $mes2 < '10' ){
		  if ( $mesf == 0 ){
		     $mes2 = $mes2 ;
		     } else {  
		     $mes2 = '0'. $mes2 ;
		} }
		
	    
	   } }	}    
        $data = $ano . $mes . $dia ;
        $data2 = $ano2 . $mes2 .$dia2 . "235959" ;
        $dataF = $ano2 . $mes2 .$dia2 ;
     
	  	$estatistica->consultarMineracao($termo, $data , $data2 ) ;
	  	
	  	$smarty->assign('minerqtdoc',$estatistica->minerqtdoc);
   		$smarty->assign('minerfontes',$estatistica->minerfontes);
   		$smarty->assign('termo',$termo);
   		$smarty->assign('data',$data);
   		$smarty->assign('dataF',$dataF);
	  	$smarty->assign('campo', "5");
	 
	  	$smarty->display('mineracaoConsulta.tpl');

}else{
          $smarty->assign('campo',"5");
          $smarty->assign('resultado',"Termo não informado");      
          $smarty->display('processamento.tpl');
          $smarty->display('mineracaoConsulta.tpl');
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
		
	  case "Consultar Documentos por Fonte":
	    consultarEstatisticaFonte();
	    break;
	  case "Consultar Documentos por RSS":
	  	consultarEstatisticaRSS();
	  	break;
	  case "Estatística Geral":
	  	$_GET['acaoEstatistica']=1;
	  	form();
	  break;	
	  case "consultar":
	  	consultarMineracao() ;
	  break;	
	  default:
	    form();
	    break;
	}

?>