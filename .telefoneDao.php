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
 
    Este programa está nomeado como .telefoneDao.php e possui 249
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
 * Usuário.
 */

class Telefone {

	var $codUsuario; 
  	var $codTelefone; 
   	var $telefoneCasa;
   	var $telefoneTrabalho;
   	var $celular;  
   	var $resultado;

  
  /*
   * Método construtor da classe 
   */
  
  
  function Telefone(){
  
  	$this->codUsuario=array(); 
  	$this->codTelefone=array(); 
   	$this->telefoneCasa=array();
   	$this->telefoneTrabalho=array();
   	$this->celular=array();  
   	$this->resultado;
  	
  }
  
  
  /*
   * Método responsável por incluir um Usuário na Tabela USU.
   * Usa como parâmetros o nome do Usuário, descricao do Usuário
   * 
   * Retorna o resultado da opereção de Inclusão na Tabela USU
   * 
   */
  
  
  function inserirTelefone($array){
  	
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
   //******************************* CONSULTA O MAIOR CODIGO DA ONTOLOGIA **********************************

		//COMANDO PARA POSTGRE
		//$sqlMaxUsuario = "SELECT MAX(\"CD_TEL\") AS maximo FROM \"TEL\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_TEL) AS maximo FROM TEL";
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codTelefone = $respostaSQL['maximo'];
	    
	    }
		//LIBERAR CONEXÃO  
		$conexaoBanco->disconnect; 
		
		$this->codTelefone = $this->codTelefone + 1;
		
		$this->codUsuario		=$array[0]; 
  		$this->telefoneCasa		=$array[1];
   		$this->telefoneTrabalho	=$array[2];
   		$this->celular			=$array[3]; 
   		  		
	//******************************** INSERE ONTOLOGIA *****************************************************
	
	//COMANDO PARA POSTGRE
	//$stmp ="INSERT INTO \"TEL\" (\"CD_TEL\", \"CD_USU\", \"TEL_CASA\", \"TEL_TRB\", \"CEL\" ) VALUES ('$this->codTelefone', '	$this->codUsuario' ,'$this->telefoneCasa', '$this->telefoneTrabalho', '$this->celular')";
	
	//COMANDO PARA MYSQL  
	$stmp ="INSERT INTO TEL (CD_TEL, CD_USU, TEL_CASA, TEL_TRB, CEL ) VALUES ('$this->codTelefone', '	$this->codUsuario' ,'$this->telefoneCasa', '$this->telefoneTrabalho', '$this->celular')";
	 			
	$this->resultado=$conexaoBanco->executeQuery($stmp);
		
	$conexaoBanco->disconnect;
	
  }
  
  /*
   * Método responsável por consultar uma Ontologia.
   * 
   * Retorna o objeto Ontologia
   */
  
  
  function consultarTelefone(){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
  
    //código para o postgre
    //$stmp ="SELECT * FROM \"TEL\"";
    
    
    //código para o mysql
  	$stmp ="SELECT * FROM TEL";
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codUsuario[]=$respostaSQL['CD_USU']; 
  			$this->codTelefone[]=$respostaSQL['CD_TEL']; 
   			$this->telefoneCasa[]=$respostaSQL['TEL_CASA'];
   			$this->telefoneTrabalho[]=$respostaSQL['TEL_TRB'];
   			$this->celular[]=$respostaSQL['CEL'];
	    
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
   
  
  function consultarTel($cdUsuario){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
    //$stmp ="SELECT \"TEL_CASA\", \"TEL_TRB\", \"CEL\" FROM \"TEL\" WHERE \"CD_USU\" = " . $cdUsuario;
    
    //código para o mysql
    $stmp ="SELECT TEL_CASA, TEL_TRB, CEL FROM TEL WHERE CD_USU = " . $cdUsuario;
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->telefoneCasa[]=$respostaSQL['TEL_CASA'];
   			$this->telefoneTrabalho[]=$respostaSQL['TEL_TRB'];
   			$this->celular[]=$respostaSQL['CEL'];
	    
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
    
    
    //código para o mysql
  	$stmp ="DELETE FROM ONT WHERE CD_ONT = ". $codOntologia;
  	//código para o mysql
  	$stmpII ="DELETE FROM TRM WHERE CD_ONT = ". $codOntologia;
  	
  	$this->resultado=$conexaoBanco->executeQuery($stmp);
  	
  	$this->resultado=$conexaoBanco->executeQuery($stmpII);
		
	$conexaoBanco->disconnect;
  	
  	
  }
  
  
  /*
   * Método responsável por alterar uma Ontologia.
   * 
   * Retorna os resultados da opereção de alteracao nas tabelas ONT  
   */
  
  
  function alterarTelefone($array){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();

    //código para postgre
	//$stmp="update \"TEL\" set ";
	//$stmp .="\"TEL_CASA\" = '". $array[1] . "'";
	//$stmp .=",\"TEL_TRB\" = '". $array[2] . "'";
	//$stmp .=",\"CEL\" = '". $array[3] . "'";
	//$stmp .=" WHERE \"CD_USU\" = '". $array[0] . "'";
    
    
    //código para mysql
    $stmp="update TEL set ";
    $stmp .="TEL_CASA = '". $array[1] . "'";
    $stmp .=",TEL_TRB = '". $array[2] . "'";
    $stmp .=",CEL = '". $array[3] . "'";
    $stmp .=" WHERE CD_USU = '". $array[0] . "'";
    
    $this->resultado=$conexaoBanco->executeQuery($stmp);
		
	$conexaoBanco->disconnect;
  }
  
  
} 
    
?>