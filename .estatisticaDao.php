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
 
    Este programa está nomeado como .estatisticaDao.php e possui 275
	linhas de código. 
			 
	Você deve ter recebido uma cópia da Licença Pública Geral GNU
	junto com este programa; se não, escreva para a Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
	02111-1307, USA
			    
	Contato: accrvianna@bb.com.br (Antônio Carlos C. R. Vianna - desenvolverdor do projeto)
			 j.mar.rap@gmail.com (José Marcelo P. de Araujo - desenvolverdor do projeto)
 */

require_once 'configs/.connect.php';
require_once 'includes/config.php';

/*
 * Classe php responsável por controlar  
 * todas as ações referentes ao objeto 
 * Estatística.
 */


class Estatistica {

  var $codigoSequencial;	
  var $codigoTipoEstatistica;
  var $codigoEstatistica;
  var $valorVinculo;	
  var $nomeVinculo;
  var $dataAtualizacao;
  var $totalDocumentos;
  
  var $codigoRSS;
  var $enderecoRSS;
  var $nomeFonte;
  var $quantidadeDocRSS;
  
  var $total;
  var $resultado;
  var $termo ;
  var $data ;
  var $data2 ;
  
  var $minerqtdoc ;
  var $minerfontes ;
  
  /*
   * Método construtor da Classe
   */

  function Estatistica(){
  
  	$this->codigoSequencial=array();	
  	$this->codigoTipoEstatistica=array();
  	$this->codigoEstatistica=array();
    $this->valorVinculo=array();	
    $this->nomeVinculo=array();
    $this->dataAtualizacao=array();
	$this->codigoRSS=array();
    $this->enderecoRSS=array();
  	$this->nomeFonte=array();
  	$this->quantidadeDocRSS=array();
  	$this->minerqtdoc=array();
  	$this->minerfontes=array();
    
	$this->totalDocumentos="";
  	$this->resultado="";
  	$this->termo="";
  	$this->data="";
  	$this->data2="";
  	$this->total="";
  }
  
  
  
  /*
  *	 Método responsável pela consulta de Estatísticas Geral do sistema  	
  * 
  *  Retorna o objeto Estatistica
  * 
  */	

  function consultarEstatisticaDocumento($dataAtual){

      require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD();
    
        //COMANDO SQL PARA POSTGRE
		//$stmp = "SELECT \"VLR_VINC\", \"CD_SEQ_STS\" FROM \"STS\" WHERE TIMESTAMP(\"DT_ATL_STS\") > '".$dataAtual."' AND \"CD_TIP_STS\" = 1 GROUP BY \"VINC\"";
    
		//COMANDO SQL PARA MYSQL
		// $stmp = "SELECT VLR_VINC, CD_SEQ_STS FROM STS WHERE DT_ATL_STS > '".$dataAtual."' AND CD_TIP_STS = 1 GROUP BY VINC";
		 $stmp = "SELECT count(*) as TOTAL FROM `DOC` where `DT_ATL` > '".$dataAtual."' ";
		$consulta = $conexaoBanco->executeQuery($stmp);
     
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    
	    //	$this->codigoSequencial[]=$respostaSQL['CD_TIP_STS'];
        	$this->valorVinculo[]=$respostaSQL['TOTAL'];
	    }
  
		$conexaoBanco->disconnect;  
		
   }
   

  /*
  *	 Método responsável pela consulta de Estatísticas Geral do sistema  	
  * 
  *  Retorna o objeto Estatistica
  * 
  */	

  function consultarEstatisticaTipoFonte($dataAtual){

   		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    
    
	    //COMANDO SQL PARA POSTGRE
		//$stmp = "SELECT SUM(\"VLR_VINC\" ) as total, \"VINC\", \"CD_SEQ_STS\", \"CD_STS\" FROM \"STS\" WHERE TIMESTAMP( \"DT_ATL_STS\" ) > '".$dataAtual."' AND \"CD_TIP_STS\" = 3 GROUP BY \"VINC\"";
    
		//COMANDO SQL PARA MYSQL
		$stmp = "SELECT VLR_VINC as total, VINC, CD_SEQ_STS, CD_STS FROM STS WHERE  DT_ATL_STS  > '".$dataAtual."' AND CD_TIP_STS = 3 ORDER BY total DESC LIMIT 0 , 9";
    //    $stmp = "SELECT SUM( VLR_VINC ) as total, VINC FROM STS WHERE  DT_ATL_STS  > '".$dataAtual."' AND CD_TIP_STS = 3 GROUP BY VINC";

		$consulta = $conexaoBanco->executeQuery($stmp);
     
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    
	    	$this->valorVinculo[]=$respostaSQL['total'];
        	$this->nomeVinculo[]=$respostaSQL['VINC'];
        	$this->codigoSequencial[]=$respostaSQL['CD_SEQ_STS'];
  			$this->codigoEstatistica[]=$respostaSQL['CD_STS'];
	    }
  
		$conexaoBanco->disconnect;  

	}
   
  /*
  *	 Método responsável pela consulta de Estatísticas Geral do sistema  	
  * 
  *  Retorna o objeto Estatistica
  * 
  */	

  function consultarEstatisticaFonte($dataAtual){

    	require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    
    
	    //COMANDO SQL PARA POSTGRE
		//$stmp = "SELECT SUM( \"VLR_VINC\" ) AS total, \"VINC\", \"CD_SEQ_STS\", \"CD_STS\" FROM \"STS\" WHERE TIMESTAMP( \"DT_ATL_STS\" ) > '".$dataAtual."' AND \"CD_TIP_STS\" = 2 GROUP BY \"VINC\"";
		
		//COMANDO SQL PARA MYSQL
		$stmp = "SELECT SUM( VLR_VINC ) AS total, VINC, CD_SEQ_STS, CD_STS FROM STS WHERE DT_ATL_STS  > '".$dataAtual."' AND CD_TIP_STS = 2 GROUP BY VINC";
		
		
		$consulta = $conexaoBanco->executeQuery($stmp);
     
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    
	    	$this->valorVinculo[]=$respostaSQL['total'];
        	$this->nomeVinculo[]=$respostaSQL['VINC'];
        	$this->codigoSequencial[]=$respostaSQL['CD_SEQ_STS'];
  			$this->codigoEstatistica[]=$respostaSQL['CD_STS'];
	    }
  
		$conexaoBanco->disconnect;
		
   }
   
   
   
   /*
    * Método responsável por obter estatísticas por Fonte de acordo 
    * com o código da estatística
    * 
    */
   
   
   function consultarEstatisticaFont($codigoEstatistica){
   
   		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    
    
	    //COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT * FROM \"STS\" WHERE \"CD_STS\" = '" . $codigoEstatistica . "' AND \"CD_TIP_STS\" = '2'";
		
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT * FROM STS WHERE CD_STS = '" . $codigoEstatistica . "' AND CD_TIP_STS = '2'";


		$consulta = $conexaoBanco->executeQuery($stmp);
     
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
  			$this->codigoSequencial[]=$respostaSQL['CD_SEQ_STS'];	
  			$this->codigoTipoEstatistica[]=$respostaSQL['CD_TIP_STS'];
  			$this->codigoEstatistica[]=$respostaSQL['CD_STS'];
    		$this->valorVinculo[]=$respostaSQL['VLR_VINC'];	
    		$this->nomeVinculo[]=$respostaSQL['VINCc'];
    		$this->dataAtualizacao[]=$respostaSQL['DT_ATL_STS'];
  			
	    }
  
		$conexaoBanco->disconnect;
		
   }
   
   
      
   /*
    * Método responsável por obter estatísticas por RSS de acordo 
    * com o código da estatística
    * 
    */
   
   function consultarEstatisticaRSS($dataAtual){
   
   		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();    
    
	    //COMANDO SQL PARA POSTGRE
		//$stmp = "SELECT COUNT(T1.\"CD_DOC\" ) AS total, T2.\"DSC_FONT\", T1.\"END_RSS\", T1.\"CD_RSS\" FROM \"DOC\" T1, \"FONT\" T2 WHERE TIMESTAMP( T1.\"DT_ATL\" ) > '".$dataAtual."' AND T1.\"CD_FONT\" = T2.\"CD_FONT\" GROUP BY T1.\"CD_RSS\" ORDER BY T2.\"DSC_FONT\"";
		
		//COMANDO SQL PARA MYSQL
		$stmp = "SELECT COUNT(T1.CD_DOC ) AS total, T2.DSC_FONT, T1.END_RSS, T1.CD_RSS FROM DOC T1, FONT T2 WHERE  T1.DT_ATL  > '".$dataAtual."' AND T1.CD_FONT = T2.CD_FONT GROUP BY T1.CD_RSS ORDER BY T2.DSC_FONT";
		

		$consulta = $conexaoBanco->executeQuery($stmp);
     
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codigoRSS[]=$respostaSQL['CD_RSS'];
    		$this->enderecoRSS[]=$respostaSQL['END_RSS'];
  			$this->nomeFonte[]=$respostaSQL['DSC_FONT'];
  			$this->quantidadeDocRSS[]=$respostaSQL['total'];
	    
	    }
  
		$conexaoBanco->disconnect;
   
   }
   
   
   /*
    * Método responsável por obter a quantidade de 
    * documentos existentes na tabela DOC
    * 
    */
   
   function consultarValorTotalDocumento(){
   
   		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    
    
	    //COMANDO SQL PARA POSTGRE
		//$stmp = "SELECT COUNT(\"CD_DOC\") as total FROM \"DOC\"";
		
		//COMANDO SQL PARA MYSQL
		$stmp = "SELECT COUNT(CD_DOC) as total FROM DOC";
		
		
		$consulta = $conexaoBanco->executeQuery($stmp);
     
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->totalDocumentos=$respostaSQL['total'];
	    }
  
		$conexaoBanco->disconnect;
  
   }
    /*
    * Método responsável por obter a quantidade de 
    * documentos existentes na tabela DOC
    * 
    */
   
   function consultarMineracao($termo, $data , $data2){
   
   		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    
    
	    //COMANDO SQL PARA POSTGRE
		//$stmp = "SELECT COUNT(\"CD_DOC\") as total FROM \"DOC\"";
		
		//COMANDO SQL PARA MYSQL

		$stmp = "SELECT COUNT(A.CD_SEQ) AS TOTAL , C.DSC_FONT AS DSC  FROM DOC_FORMT A , DOC B , FONT C WHERE A.PLV = '".$termo."' AND A.CD_DOC = B.CD_DOC AND B.CD_FONT = C.CD_FONT AND A.DT_ATL >= '".$data."' AND A.DT_ATL < '".$data2."'  GROUP BY C.DSC_FONT  ORDER BY TOTAL DESC";
		
		
		$consulta = $conexaoBanco->executeQuery($stmp);
     
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	        
	    	$this->minerqtdoc[]=$respostaSQL['TOTAL'];
	    	$this->minerfontes[]=$respostaSQL['DSC'] ;
	    	
	   }
         
      
		$conexaoBanco->disconnect;
  
   }
   
} 

?>