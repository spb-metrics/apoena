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
 
    Este programa está nomeado como .thesaurosDao.php e possui 342
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
 * (Termo).
 */


class Termo {

  var $codOntologia;  
  var $nomeOntologia;
  var $descricaoOntologia;
  var $codTermo;
  var $codigoTermo;
  var $nomeTermo;
  var $descricaoTermo;
  var $resultado;
  
  
  /*
   * Método construtor da classe
   */
  
  function Termo(){
  
	 $this->codOntologia=array();
	 $this->nomeOntologia=array();
	 $this->descricaoOntologia=array();
	 $this->codigoTermo=array();
     $this->nomeTermo=array();
  	 $this->descricaoTermo=array();

  	 $this->codTermo="";
	 $this->resultado=""; 		 
	  
  }
  
  
  /*
   * Método responsável por incluir termos na Tabela TRM.
   * 
   * Usa como parâmetros o codigo da Ontologia, codigo do Termo, nome do Termo
   * 
   * Retorna o resultado da operação de Inclusão na Tabela TRM
   * 
   */
  
  function inserirTermos($codigoOntologia, $arrformTermo){

		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();	
    	
  	//********************************* CONSULTA MAX TERMO *********************************************************
  		
  		//COMANDO PARA POSTGRE
		//$stmp = "SELECT MAX(\"CD_TRM\") AS maximo FROM \"TRM\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_TRM) AS maximo FROM TRM";
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codTermo = $respostaSQL['maximo'];
	    }
	    
		//LIBERAR CONEXÃO  
		$conexaoBanco->disconnect; 
		
		$this->codTermo = $this->codTermo + 1;
  		
  		
  	//******************************************* INSERE TERMO *****************************************************
		    
			for($i=0; $i<sizeof($arrformTermo); $i++) {
				
				if($arrformTermo[$i] != ""){
						
					//COMANDO SQL PARA POSTGRE
					//$stmp ="INSERT INTO \"TRM\" (\"CD_TRM\" , \"CD_ONT\" , \"NM_TRM\" , \"SIG_TRM\")  VALUES (?, ?, ?, ? )";
		    
					//COMANDO SQL PARA MYSQL    	 
					$stmp ="INSERT INTO TRM (CD_TRM , CD_ONT , NM_TRM , SIG_TRM)  VALUES ('$this->codTermo','$codigoOntologia', '$arrformTermo[$i]', 'sem significado')";
				
					$this->codTermo = $this->codTermo + 1;
				
					$this->resultado=$conexaoBanco->executeQuery($stmp);
		
					$conexaoBanco->disconnect;
				}	
			}
			
  }	
  
  
  
  /*
   * Método responsável por consultar a tabela TRM 
   * de acordo com o codigo da Ontologia
   * 
   * Usa como parâmetros o codigo da Ontologia  
   * 
   * Retorna o objeto Termo 
   */
  
  
  function consultaTermo($codOntologia){
  	
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  	
    	//código para o postgre
  		//$query ="SELECT * FROM \"TRM\" WHERE \"CD_ONT\" =" . $codOntologia . " ORDER BY \"NM_TRM\"";
    	
    	//código para o mysql
  		$query ="SELECT * FROM TRM WHERE CD_ONT =" . $codOntologia . " ORDER BY NM_TRM";
		
		
		$consulta = $conexaoBanco->executeQuery($query);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codigoTermo[]=$respostaSQL['CD_TRM'];
     		$this->nomeTermo[]=$respostaSQL['NM_TRM'];
  	 		$this->descricaoTermo[]=$respostaSQL['SIG_TRM'];
	    
	    }
  
		$conexaoBanco->disconnect;
		   
  }
  
  
  /*
   * Método responsável por verificar se o termo 
   * já está cadastrado na tabela TRM
   * 
   * Usa como parâmetros o codigo da Ontologia, nome do Termo  
   * 
   * Retorna o codigo do Termo caso exista na tabela TRM 
   */
  

  function verificaTermo($codOntologia, $nomeTermo){
  	
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  		    
    	for($i=0; $i<sizeof($nomeTermo); $i++) {
    	
    		//código para o postgre
  			//$query ="SELECT \"CD_TRM\" FROM \"TRM\" WHERE \"CD_ONT\" =" . $codOntologia . " AND \"NM_TRM\" = '". $nomeTermo[$i] ."'";
    	
    		//código para o mysql
  			$query ="SELECT CD_TRM FROM TRM WHERE CD_ONT =" . $codOntologia . " AND NM_TRM = '". $nomeTermo[$i] ."'";
  		
  		
			$consulta = $conexaoBanco->executeQuery($query);
  
		    while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    	$this->codigoTermo[]=$respostaSQL['CD_TRM'];
		    }
	  
			$conexaoBanco->disconnect;
  		
		}	
  }
  
  
  
 /*
  * Método responsável por verificar o codigo da Ontologia
  * de acordo com o termo
  * 
  * Usa como parâmetro o codigo do Termo
  * 
  * Retorna o codigo da Ontologia
  * 
  */
  
  
  function consultarCodigoOntologia($codigoTermo){
  
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  	
    	//código para o postgre
    	//$query ="SELECT \"CD_ONT\" FROM \"TRM\" WHERE \"CD_TRM\" = '" . $codigoTermo . "'";
    	
    	//código para o mysql
  		$query ="SELECT CD_ONT FROM TRM WHERE CD_TRM = '" . $codigoTermo . "'";
		 
		 
		$consulta = $conexaoBanco->executeQuery($query);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codOntologia[]=$respostaSQL['CD_ONT'];
	    
	    }
  
		$conexaoBanco->disconnect; 
		 
  }
  
  /*
   * Método responsável por deletar a tabela TRM 
   * de acordo com o codigo da Ontologia
   * 
   * Usa como parâmetro o codigo da Ontologia 
   * 
   * Retorna o resultado da operação de deleção da tabela TRM 
   */
  
  
  function deletarTabelaTermo($codigoOntologia){
  
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  	
    	
    	//código para o mysql
    	//$query ="DELETE FROM \"TRM\" WHERE \"CD_ONT\" = " . $codigoOntologia;
    	
    	//código para o mysql
    	$query ="DELETE FROM TRM WHERE CD_ONT = " . $codigoOntologia;
    	
		$this->resultado=$conexaoBanco->executeQuery($query);
		
		$conexaoBanco->disconnect;
  }
  
  /*
   * Método responsável por deletar o Termo 
   * de acordo com o codigo do Termo
   * 
   * Usa como parâmetro o codigo do Termo
   * 
   * Retorna o resultado da aperação de deleçãod a tabela TRM
   * 
   */
  
  
  function deletarTermo($codigoTermo){
  
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  	
    	//código para o postgre
  		//$query ="DELETE FROM \"TRM\" WHERE \"CD_TRM\" = " . $codigoTermo;
    	
    	
    	//código para o mysql
  		$query ="DELETE FROM TRM WHERE CD_TRM = " . $codigoTermo;
		   
		$this->resultado=$conexaoBanco->executeQuery($query);
		
		$conexaoBanco->disconnect;
  }
  
  /*
   * Método responsável por consultar o nome  Termo 
   * de acordo com o codigo do Termo
   * 
   * Usa como parâmetro o codigo do Termo
   * 
   * Retorna o nome do termo
   * 
   */
  
  
  function consultarNomeTermo($codigoTermo){
  	
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
    	
    	
    	//código para o postgre
  		//$query ="SELECT \"NM_TRM\" FROM \"TRM\" WHERE \"CD_TRM\" = ". $codigoTermo ;
    	
    	//código para o mysql
  		$query ="SELECT NM_TRM FROM TRM WHERE CD_TRM = ". $codigoTermo ;
		 
		 
		$consulta = $conexaoBanco->executeQuery($query);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->nomeTermo[]=$respostaSQL['NM_TRM'];
	    
	    }
  
		$conexaoBanco->disconnect;  
		 
  }
  
  
   /*
   * Método responsável por consultar o nome codigo do Termo 
   * de acordo com o nome e codigo da Ontologia
   * 
   * Usa como parâmetro o codigo do Termo
   * 
   * Retorna o nome do termo
   * 
   */
  
  
  function consultarCodigoTermo($nomeTermo, $codigoOntologia){
  	
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  	
    	//código para o postgre
  		//$query ="SELECT \"CD_TRM\" FROM \"TRM\" WHERE \"NM_TRM\" = ". $nomeTermo ." AND \"CD_ONT\" = " . $codigoOntologia;
    	
    	//código para o mysql
  		$query ="SELECT CD_TRM FROM TRM WHERE NM_TRM = ". $nomeTermo ." AND CD_ONT = " . $codigoOntologia;
		
  		$consulta = $conexaoBanco->executeQuery($query);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->nomeTermo[]=$respostaSQL['NM_TRM'];
	    
	    }
  
		$conexaoBanco->disconnect;
  	
  }
  
}
?>