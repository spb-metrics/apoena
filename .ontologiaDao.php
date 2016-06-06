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
 
    Este programa está nomeado como .ontologiaDao.php e possui 251
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

class Ontologia {

  var $codOntologia;  
  var $nomeOntologiaAntigo;
  var $descricao;  
  var $resultado;

  
  /*
   * Método construtor da classe 
   */
  
  
  function Ontologia(){
  
  	 $this->codOntologia=array();
	 $this->nomeOntologia=array();
	 $this->descricao=array();
	 $this->resultado;		 
	  
  }
  
  
  /*
   * Método responsável por incluir uma Ontologia na Tabela ONT.
   * Usa como parâmetros o nome da Ontologia, descricao da Ontologia
   * 
   * Retorna o resultado da opereção de Inclusão na Tabela ONT
   * 
   */
  
  
  function inserirOntologia($nomeOntologia, $descricao){
  	
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
   //******************************* CONSULTA O MAIOR CODIGO DA ONTOLOGIA **********************************

		//COMANDO PARA POSTGRE
		//$sqlMaxOntologia = "SELECT MAX(\"CD_ONT\") AS maximo FROM \"ONT\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_ONT) AS maximo FROM ONT";
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codOntologia = $respostaSQL['maximo'];
	    }
  
		$conexaoBanco->disconnect;  
		
		$this->codOntologia = $this->codOntologia + 1;
		
		$nm = strtoupper($nomeOntologia);
		$dsc= strtoupper($descricao);
		  		
	//******************************** INSERE ONTOLOGIA *****************************************************
	
	 //COMANDO PARA POSTGRE
	  //$stmp ="INSERT INTO \"ONT\" (\"CD_ONT\" , \"NM_ONT\" , \"DSC_ONT\" ) VALUES ('$this->codigoOntologia', '$clipping', '$descricao')";
	
	 //COMANDO PARA MYSQL  
	   	$stmp ="INSERT INTO ONT (CD_ONT, NM_ONT, DSC_ONT ) VALUES ('$this->codOntologia', '$nm', '$dsc')";
	 			
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
	
  }
  
  /*
   * Método responsável por consultar uma Ontologia.
   * 
   * Retorna o objeto Ontologia
   */
  
  
  function consultarOntologia(){
  
	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    
    //código para o postgre
    //$stmp ="SELECT * FROM \"ONT\" ORDER BY \"NM_ONT\"";
    
    //código para o mysql
  	$stmp ="SELECT * FROM ONT ORDER BY NM_ONT";
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codOntologia[]=$respostaSQL['CD_ONT'];
	  		$this->nomeOntologia[]=iconv("UTF-8", "UTF-8", $respostaSQL['NM_ONT']);
	  		$this->descricao[]=iconv("UTF-8", "UTF-8", $respostaSQL['DSC_ONT']);

	    }
	
	$conexaoBanco->disconnect;    
	    
  }
  
  /*
   * Método responsável por consultar uma Ontologia.
   * 
   * Usa o parâmetro codigo da Ontologia para efetivar a consulta
   * 
   * Retorna o objeto Ontologia
   */
  
  
  function consultarOnt($cdOntologia){
  
    require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
    //$stmp ="SELECT * FROM \"ONT\" WHERE \"CD_ONT\" = " . $cdOntologia . " ORDER BY \"NM_ONT\"";
    
    //código para o mysql
    $stmp ="SELECT * FROM ONT WHERE CD_ONT = " . $cdOntologia . " ORDER BY NM_ONT";
	
  	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codOntologia[]=$respostaSQL['CD_ONT'];
	  		$this->nomeOntologia[]=iconv("UTF-8", "UTF-8", $respostaSQL['NM_ONT']);
	  		$this->descricao[]=iconv("UTF-8", "UTF-8", $respostaSQL['DSC_ONT']);

	    }
	
	$conexaoBanco->disconnect;    
	    
  }
  
  
  /*
   * Método responsável por excluir uma Ontologia.
   * 
   * Retorna os resultados da opereção de exclusão nas tabelas ONT e TRM 
   */
  
  
  
  function excluirOntologia($codOntologia){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
  
    //código para o postgre    
	//$stmp ="DELETE FROM \"ONT\" WHERE \"CD_ONT\" = ". $codOntologia;
	  
  	//código para o postgre
  	//$stmpII ="DELETE FROM \"TRM\" WHERE \"CD_ONT\" = ". $codOntologia;
    
    //código para o postgre
  	//$stmpIII ="DELETE FROM \"CLIP_ARQ\" WHERE \"CD_ONT\" = ". $codOntologia;
    
    
	//código para o mysql    
  	$stmp ="DELETE FROM ONT WHERE CD_ONT = ". $codOntologia;
  
  	//código para o mysql
  	$stmpII ="DELETE FROM TRM WHERE CD_ONT = ". $codOntologia;
  	
  	//código para o mysql
  	$stmpIII ="DELETE FROM CLIP_ARQ WHERE CD_ONT = ". $codOntologia;
  	
  	
  	$this->resultado=$conexaoBanco->executeQuery($stmp);
	$this->resultado=$conexaoBanco->executeQuery($stmpII);
	$this->resultado=$conexaoBanco->executeQuery($stmpIII);
		
	$conexaoBanco->disconnect;
  	
  }
  
  
  /*
   * Método responsável por alterar uma Ontologia.
   * 
   * Retorna os resultados da opereção de alteracao nas tabelas ONT  
   */
  
  
  function alterarOntologia($array){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    $nome 		= strtoupper($array[1]);
    $descricao 	= strtoupper($array[2]);

    //código para postgre
	//$stmp="update \"ONT\" set ";
	//$stmp .="\"CD_ONT\" = '". $array[0] . "'";
	//$stmp .=",\"NM_ONT\" = '". $nome . "'";
	//$stmp .=",\"DSC_ONT\" = '". $descricao . "'";
	//$stmp .=" WHERE \"CD_ONT\" = '". $array[0] . "'";
    
    
    //código para o mysql
    $stmp="update ONT set ";
    $stmp .="CD_ONT = '". $array[0] . "'";
    $stmp .=",NM_ONT = '". $nome . "'";
    $stmp .=",DSC_ONT = '". $descricao . "'";
    $stmp .=" WHERE CD_ONT = '". $array[0] . "'";
    
    $this->resultado=$conexaoBanco->executeQuery($stmp);
		
	$conexaoBanco->disconnect;
  }
  
} 
    
?>