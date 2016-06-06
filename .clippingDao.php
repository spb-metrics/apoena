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
 
    Este programa está nomeado como .clippingDao.php e possui 420
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
 * Ontologia.
 */

class Clipping {

  var $codClipping;  
  var $nomeClipping;
  var $dataAtualizacao;  
  var $arquivo;
  var $nomeOntologia;
  var $total;
  var $textoArquivo;
  var $codigoSequencial;
  var $resultado;
  var $resumoArquivo;
  var $codigoOntologia;
  

  
  /*
   * Método construtor da classe 
   */
  
  
  function Clipping(){
  
  	$this->codClipping=array();  
  	$this->nomeClipping=array();
  	$this->dataAtualizacao=array();  
  	$this->arquivo=array();
  	$this->nomeOntologia=array();
  	$this->codigoOntologia=array();
  	$this->total="";
  	$this->textoArquivo="";  
  	$this->codigoSequencial="";
  	$this->resultado="";
  	$this->resumoArquivo="";
  }
  
  
  
  /*
   * Método responsável por consultar uma Clipping.
   * 
   * Retorna o objeto Clipping
   */
  
  
  function consultarClipping(){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
  
    //código para o postgre
    //$stmp ="SELECT * FROM \"CLIP\" WHERE \"TIP_CLP\" = 1 XOR \"TIP_CLP\" = 3 ORDER BY \"NM_CLP\"";
    
    //codigo para o mysql 
  	$stmp ="SELECT * FROM CLIP WHERE TIP_CLP = 1 XOR TIP_CLP = 3 ORDER BY NM_CLP";
  	
  	
  	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codClipping[]=$respostaSQL['CD_SEQ'];
			$this->nomeClipping[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_CLP']);
  			$this->arquivo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD_CLP']);
	    }
  	
	$conexaoBanco->disconnect;  	

  }
  
  /*
   * Método responsável por consulta o arquivo HTML de um Objeto Clipping 
   * por meio do código do Clipping
   * 
   * retorna um objeto o arquivo de um objeto Clipping
   * 
   */
  
  function consultarClp($codCLP){
  	
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
  
    //código para o postgre
    //$stmp ="SELECT \"CNTD_CLP\" FROM \"CLIP\" WHERE \"CD_SEQ\" = ". $codCLP; 
    
    //código para o msyql 
  	$stmp ="SELECT CNTD_CLP FROM CLIP WHERE CD_SEQ = ". $codCLP;
  	
  	
  	$consulta = $conexaoBanco->executeQuery($stmp);
  	$consultaTotal = mysql_num_rows($consulta);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->arquivo[]=iconv("UTF-8", "ISO-8859-1", $respostaSQL['CNTD_CLP']);
	    }
	
	$conexaoBanco->disconnect; 
  	
   }
   
   /*
    * Método responsável por consultar 
    * todos os resumos dos clipping
    */
   
   function consultarResumoClp($codResumoCLP){
   	
		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
	  
	    //código para o postgre
	    //$stmp ="SELECT * FROM \"CLIP\" WHERE \"CD_SEQ\" = ". $codResumoCLP;
	    
	    //código para o msyql 
	    $stmp ="SELECT * FROM CLIP WHERE CD_SEQ = ". $codResumoCLP;
		
		
		$consulta = $conexaoBanco->executeQuery($stmp);
	  	$this->total = mysql_num_rows($consulta);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codClipping[]=$respostaSQL['CD_SEQ'];
  			$this->nomeClipping[]=$respostaSQL['NM_CLP'];
  			$this->arquivo[]=$respostaSQL['CNTD_CLP'];
	    }
	
		$conexaoBanco->disconnect; 
   	}
   
   
   /*
    * Método responsável por obter dos os clipping  
    * registrados na tabela CLIP_ARQ
    */
   
   function consultaTodosArquivoClipping($codigoOnt){
   	
   		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  
    	//código para o postgre
    	//$stmp ="SELECT T1.\"CD_CLIP_ARQ\", T1.\"NM_CLP\", T1.\"ARQ\", T2.\"NM_ONT\" FROM \"CLIP_ARQ\" T1, \"ONT\" T2 WHERE T1.\"CD_ONT\" = T2.\"CD_ONT\" AND T1.\"CD_ONT\" = ". $codigoOnt . " ORDER BY \"NM_CLP\" DESC";
  		
    	//código para o mysql
    	$stmp ="SELECT T1.CD_CLIP_ARQ, T1.NM_CLP, T1.ARQ , T2.NM_ONT FROM CLIP_ARQ T1, ONT T2 WHERE T1.CD_ONT = T2.CD_ONT AND T1.CD_ONT = ". $codigoOnt . " ORDER BY NM_CLP DESC";
	
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codClipping[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CD_CLIP_ARQ']);
			$this->nomeClipping[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_CLP']);
			$this->nomeOntologia[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_ONT']);
			$this->arquivo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['ARQ']);	
	    
	    }
	
		$conexaoBanco->disconnect;
   }
   
   
   /*
    * Método responsável por consultar o
    * clipping oriundo da palavras com 
    * maior índice de contagem
    * 
    */
   
   
   function visualizarClippingCeral($codigoClippingGeral){
   	
   		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  
    	//código para o postgre
    	//$stmp ="SELECT * FROM \"CLIP\" WHERE \"CD_SEQ\" = ". $codigoClippingGeral . " AND \"TIP_CLP\" = 2 ";
  		
    	//código para o mysql
    	$stmp ="SELECT * FROM CLIP WHERE CD_SEQ = ". $codigoClippingGeral . " AND TIP_CLP = 2 ";
	
	
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codClipping[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CD_SEQ']);
			$this->nomeClipping[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_CLP']);
			$this->arquivo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD_CLP']);
	    }
	
		$conexaoBanco->disconnect;
   }
   
   
   /*
    * Método responsável por inserir um clipping na 
    * tabela CLP
    * 
    */
   
   function inserirClipping($nome, $texto){
   
   		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
	    
    	//código para o postgre
    	//$stmp = "SELECT MAX(\"CD_SEQ\") AS maximo FROM \"CLIP\"";
    	
    	//código para o mysql
	    $stmp = "SELECT MAX(CD_SEQ) AS maximo FROM CLIP"; 
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codigoSequencial=$respostaSQL['maximo'];
	    }
	    
		//LIBERA A CONEXÃO	
		$conexaoBanco->disconnect;
		
		$this->codigoSequencial = $this->codigoSequencial + 1; 
		
		//variável para distinguir o tipo de clipping na tabela CLP	
		$tipoClip= "1";
	    
	    $stmpI ="INSERT INTO CLIP (CD_SEQ, NM_CLP, CNTD_CLP, TIP_CLP) VALUES ('".$this->codigoSequencial."', '".$nome."', '".$texto."', '".$tipoClip."')";
  
  	    $this->resultado=$conexaoBanco->executeQuery($stmpI);
		
		$conexaoBanco->disconnect; 
	}
	
	
	
	/*
	 * Método responsável por o clipping das palavras com o maior 
	 * índice de ocorrncia
	 */
	
	function consultaClippingGeral(){
		
		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
	    
    	//código para o postgre
    	//$stmp = "SELECT * FROM \"CLIP\" WHERE \"TIP_CLP\" = 2 ORDER BY \"NM_CLP\" DESC";
    	
    	//código para o mysql
	    $stmp = "SELECT * FROM CLIP WHERE TIP_CLP = 2 ORDER BY NM_CLP DESC"; 
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codClipping[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CD_SEQ']);
			$this->nomeClipping[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_CLP']);
			$this->arquivo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD_CLP']);
	    }
	    
	    $conexaoBanco->disconnect;
	}
	

	/*
	 * Método responsável por o clipping das palavras com o maior 
	 * índice de ocorrncia
	 */
	
	function consultaTodosClippingGeral($cdClippingGeral){
		
		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
	    
    	//código para o postgre
    	//$stmp = "SELECT * FROM \"CLIP\" WHERE \"TIP_CLP\" = 2 AND \"CD_SEQ\" = ".$cdClippingGeral ." ORDER BY \"NM_CLP DESC\"";
    	
    	//código para o mysql
	    $stmp = "SELECT CNTD_CLP FROM CLIP WHERE TIP_CLP = 2 AND CD_SEQ = ".$cdClippingGeral ." ORDER BY NM_CLP DESC"; 
	
	
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->arquivo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD_CLP']);
	    }
	    
	    $conexaoBanco->disconnect;

	}	
	
	
	/*
	 * Método responsável por o clipping das palavras com o maior 
	 * índice de ocorrncia
	 */
	
	function consultaClippingResumo(){
		
		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
	    
    	//código para o postgre
    	//$stmp = "SELECT * FROM \"CLIP\" WHERE \"TIP_CLP\" = 1 ORDER BY \"NM_CLP\" DESC";
    	
    	//código para o mysql
	    $stmp = "SELECT * FROM CLIP WHERE TIP_CLP = 1 ORDER BY NM_CLP DESC"; 
		
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codClipping[]= $respostaSQL['CD_SEQ'];
			$this->nomeClipping[]=$respostaSQL['NM_CLP'];
			$this->arquivo[]= $respostaSQL['CNTD_CLP'];
	    }
	    
	    $conexaoBanco->disconnect;
	}
	
	/*
	 * Método responsável por consultar os códigos dos documentos dos clippings
	 * a fim de gerar um resumo dos clippings de vários tipos de funte
	 */
	
	function consultarClippings($codigoClipping){
		
		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
	    
    	//código para o postgre
    	//$stmp = "SELECT \"CNTD_CLP\" FROM \"CLIP\" WHERE \"CD_SEQ\" = " . $codigoClipping;
    	
    	//código para o mysql
	    $stmp = "SELECT CNTD_CLP FROM CLIP WHERE CD_SEQ = " . $codigoClipping;
		
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
			$this->arquivo[]= $respostaSQL['CNTD_CLP'];
	    }
	    
	    $conexaoBanco->disconnect;
	}
/*
   	 * Método responsável por deletar a tabela Clipping
     * 
     * Usa como parâmetros o codigo Clipping
     * 
     * Retorna o resultado da operação de alteracao nas tabelas Clipping  
     */
	
	
	function fimClipping($codigoClipping){
	
		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    	    	  	
    	//código para o postgre
    	//$stmp = "DELETE \"CNTD_CLP\" FROM \"CLIP\" WHERE \"CD_SEQ\" = " . $codigoClipping;
    	
    	//código para o mysql
	    $stmp = "DELETE FROM CLIP WHERE CD_SEQ = " . $codigoClipping;
    		
    	$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
	}
	
	
   /*
    * Método responsável por inserir um clipping na 
    * tabela CLP
    * 
    */
   
   function inserirMergeClipping($nome, $texto){
   
   		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
	    
    	//código para o postgre
    	//$stmp = "SELECT MAX(\"CD_SEQ\") AS maximo FROM \"CLIP\"";
    	
    	//código para o mysql
	    $stmp = "SELECT MAX(CD_SEQ) AS maximo FROM CLIP"; 

		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
			$this->codigoSequencial=$respostaSQL['maximo'];
	    }
	    
	    //LIBERA A CONEXÃO
	    $conexaoBanco->disconnect;

		$this->codigoSequencial = $this->codigoSequencial + 1; 
		
		//variável para distinguir o tipo de clipping na tabela CLP	
		$tipoClip= "3";
	    
	    $stmpI ="INSERT INTO CLIP (CD_SEQ, NM_CLP, CNTD_CLP, TIP_CLP) VALUES ('".$this->codigoSequencial."', '".$nome."', '".$texto."', '".$tipoClip."')";
  
  	    $this->resultado=$conexaoBanco->executeQuery($stmpI);
		
		$conexaoBanco->disconnect;
		
	}
	
} 
    
?>