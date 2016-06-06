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
 
    Você deve ter recebido uma cópia da Licença Pública Geral GNU
    junto com este programa; se não, escreva para a Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
    02111-1307, USA
    
    Contato: accrvianna@bb.com.br (Antônio Carlos C. R. Vianna - Análista responsável pelo projeto)
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
  	$this->resumoArquivo;
  }
  
  
  
  /*
   * Método responsável por consultar uma Clipping.
   * 
   * Retorna o objeto Clipping
   */
  
  
  function consultarClipping(){
  
  	$res= new TCon();
    $res->abreconexao();
  
    //código para o postgre
    //$stmp ="SELECT * FROM \"CLIP\" WHERE \"TIP_CLP\" = 1 ORDER BY \"NM_CLP\"";
    
    //codigo para o mysql 
  	$stmp ="SELECT * FROM CLIP WHERE TIP_CLP = 1 ORDER BY NM_CLP";
  	
	$consulta=$res->retorno->query($stmp) ;
	
		while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			
			$this->codClipping[]=$row['cd_seq'];
			$this->nomeClipping[]=iconv("ISO-8859-1", "UTF-8", $row['nm_clp']);
  			$this->arquivo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd_clp']);
  		}
  }
  
  /*
   * Método responsável por consulta o arquivo HTML de um Objeto Clipping 
   * por meio do código do Clipping
   * 
   * retorna um objeto o arquivo de um objeto Clipping
   * 
   */
  
  function consultarClp($codCLP){
  	
  	$res= new TCon();
    $res->abreconexao();
  
    //código para o postgre
    //$stmp ="SELECT \"CNTD_CLP\" FROM \"CLIP\" WHERE \"CD_SEQ\" = ". $codCLP; 
    
    //código para o msyql 
  	$stmp ="SELECT CNTD_CLP FROM CLIP WHERE CD_SEQ = ". $codCLP;
  	
	
  	$consulta=$res->retorno->query($stmp) ;
	
	$consultaTotal =$res->retorno->query($stmp);
        
    $this->total = $consultaTotal->numRows();
	
		while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			$this->arquivo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd_clp']);
	    }
   }
   
   /*
    * Método responsável por consultar 
    * todos os resumos dos clipping
    */
   
   function consultarResumoClp($codResumoCLP){
   	
		$res= new TCon();
	    $res->abreconexao();
	  
	    //código para o postgre
	    //$stmp ="SELECT * FROM \"CLIP\" WHERE \"CD_SEQ\" = ". $codResumoCLP;
	    
	    //código para o msyql 
	    $stmp ="SELECT * FROM CLIP WHERE CD_SEQ = ". $codResumoCLP;
		
	  	$consulta=$res->retorno->query($stmp) ;
		
		$consultaTotal =$res->retorno->query($stmp);
        
    	$this->total = $consultaTotal->numRows();
		
		
		while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			$this->codClipping[]=$row['cd_seq'];
			
  			$this->nomeClipping[]=$row['nm_clp'];
  			$this->arquivo[]=$row['cntd_clp'];
  		}
   	}
   
   
   /*
    * Método responsável por obter dos os clipping  
    * registrados na tabela CLIP_ARQ
    */
   
   function consultaTodosArquivoClipping($codigoOnt){
   	
   		$res= new TCon();
    	$res->abreconexao();
  
    	//código para o postgre
    	//$stmp ="SELECT T1.\"CD_CLIP_ARQ\", T1.\"NM_CLP\", T1.\"ARQ\", T2.\"NM_ONT\" FROM \"CLIP_ARQ\" T1, \"ONT\" T2 WHERE T1.\"CD_ONT\" = T2.\"CD_ONT\" AND T1.\"CD_ONT\" = ". $codigoOnt . " ORDER BY \"NM_CLP\" DESC";
  		
    	//código para o mysql
    	$stmp ="SELECT T1.CD_CLIP_ARQ, T1.NM_CLP, T1.ARQ , T2.NM_ONT FROM CLIP_ARQ T1, ONT T2 WHERE T1.CD_ONT = T2.CD_ONT AND T1.CD_ONT = ". $codigoOnt . " ORDER BY NM_CLP DESC";
	
		$consulta=$res->retorno->query($stmp) ;
	
		while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			$this->codClipping[]=iconv("ISO-8859-1", "UTF-8", $row['cd_clip_arq']);
			$this->nomeClipping[]=iconv("ISO-8859-1", "UTF-8", $row['nm_clp']);
			$this->nomeOntologia[]=iconv("ISO-8859-1", "UTF-8", $row['nm_ont']);
			$this->arquivo[]=iconv("ISO-8859-1", "UTF-8", $row['arq']);
		}
   }
   
   
   /*
    * Método responsável por consultar o
    * clipping oriundo da palavras com 
    * maior índice de contagem
    * 
    */
   
   
   function visualizarClippingCeral($codigoClippingGeral){
   	
   	
   		$res= new TCon();
    	$res->abreconexao();
  
    	//código para o postgre
    	//$stmp ="SELECT * FROM \"CLIP\" WHERE \"CD_SEQ\" = ". $codigoClippingGeral . " AND \"TIP_CLP\" = 2 ";
  		
    	//código para o mysql
    	$stmp ="SELECT * FROM CLIP WHERE CD_SEQ = ". $codigoClippingGeral . " AND TIP_CLP = 2 ";
	
		$consulta=$res->retorno->query($stmp) ;
	
		while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			$this->codClipping[]=iconv("ISO-8859-1", "UTF-8", $row['cd_seq']);
			$this->nomeClipping[]=iconv("ISO-8859-1", "UTF-8", $row['nm_clp']);
			$this->arquivo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd_clp']);
		}
   	
   }
   
   
   /*
    * Método responsável por inserir um clipping na 
    * tabela CLP
    * 
    */
   
   function inserirClipping($nome, $texto){
   
   		$res= new TCon();
    	$res->abreconexao();
	    
    	//código para o postgre
    	//$stmp = "SELECT MAX(\"CD_SEQ\") AS maximo FROM \"CLIP\"";
    	
    	//código para o mysql
	    $stmp = "SELECT MAX(CD_SEQ) AS maximo FROM CLIP"; 
		
		$consulta=$res->retorno->query($stmp);
		
		while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			$this->codigoSequencial=$row['maximo'];
		}
		
		$this->codigoSequencial = $this->codigoSequencial + 1; 
		
		$stmp=" insert into CLIP values(";
	    $stmp.="  '".$this->codigoSequencial."'";
	    $stmp.=" ,'".$nome."'";
	    $stmp.=" ,'".$texto."'";
	    $stmp.=" ,'1')"; 
	    
	    $this->resultado=$res->retorno->query($stmp); 
		
	}
	
	
	
	/*
	 * Método responsável por o clipping das palavras com o maior 
	 * índice de ocorrncia
	 */
	
	function consultaClippingGeral(){
		
		$res= new TCon();
    	$res->abreconexao();
	    
    	//código para o postgre
    	//$stmp = "SELECT * FROM \"CLIP\" WHERE \"TIP_CLP\" = 2 ORDER BY \"NM_CLP\" DESC";
    	
    	//código para o mysql
	    $stmp = "SELECT * FROM CLIP WHERE TIP_CLP = 2 ORDER BY NM_CLP DESC"; 
		
		$consulta=$res->retorno->query($stmp) ;
	
		while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			$this->codClipping[]=iconv("ISO-8859-1", "UTF-8", $row['cd_seq']);
			$this->nomeClipping[]=iconv("ISO-8859-1", "UTF-8", $row['nm_clp']);
			$this->arquivo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd_clp']);
		}	
		
	}
	

	/*
	 * Método responsável por o clipping das palavras com o maior 
	 * índice de ocorrncia
	 */
	
	function consultaTodosClippingGeral($cdClippingGeral){
		
		$res= new TCon();
    	$res->abreconexao();
	    
    	//código para o postgre
    	//$stmp = "SELECT * FROM \"CLIP\" WHERE \"TIP_CLP\" = 2 AND \"CD_SEQ\" = ".$cdClippingGeral ." ORDER BY \"NM_CLP DESC\"";
    	
    	//código para o mysql
	    $stmp = "SELECT CNTD_CLP FROM CLIP WHERE TIP_CLP = 2 AND CD_SEQ = ".$cdClippingGeral ." ORDER BY NM_CLP DESC"; 
		
		$consulta=$res->retorno->query($stmp) ;
	
		while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			$this->textoArquivo=iconv("ISO-8859-1", "UTF-8", $row['cntd_clp']);
		}	
		
	}	
	
   
} 
    
?>