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
 
    Este programa está nomeado como .emailDao.php e possui 252
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
 * Email.
 */

class Email {

	var $codConfiguracao; 
  	var $host;
  	var $porta; 
   	var $auth;
   	var $e_mail;
   	var $login;
   	var $senha;  
   	var $resultado;

  
  /*
   * Método construtor da classe 
   */
  
  
  function Email(){
  
  	$this->codConfiguracao=array(); 
  	$this->host=array();
  	$this->porta=array(); 
   	$this->auth=array();
   	$this->e_mail=array();
   	$this->login=array();
   	$this->senha=array();
   	$this->e_mail=array();  
   	
   	$this->resultado = "";
   	
  }
    
  
  /*
   * Método responsável por inserir o email de cadastro  
   * do sistema Apoena 
   * OBS - este e-mail é o e-mail do sistema Apoena
   * cadastrado na operadora 
   * 
   */
  
  function inserirEmailApoena($arrayEmail){
  
  	  require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD();
    
   //******************************* CONSULTA O MAIOR CODIGO DO USUARIO **********************************

		//COMANDO PARA POSTGRE
		//$stmp = "SELECT MAX(\"CD_CONFIG\") AS maximo FROM \"CONFIG_EMAIL\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_CONFIG) AS maximo FROM CONFIG_EMAIL";
		

		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codConfiguracao[] = $respostaSQL['maximo'];
	    }

		//LIBERAR CONEXÃO  
		$conexaoBanco->disconnect; 
		
		$this->codConfiguracao[0] = $this->codConfiguracao[0] + 1;
	
		  		
	//******************************** INSERE USUARIO *****************************************************
	
		//COMANDO PARA POSTGRE
		//$stmp ="INSERT INTO \"CONFIG_EMAIL\" (\"CD_CONFIG\", \"HOST\", \"PORT\", \"AUTH\", \"LOGIN\", \"SENHA\", \"EMAIL\" ) VALUES ('".$this->codConfiguracao[0]."','".$arrayEmail[1] . "','".$arrayEmail[2] ."','" .$arrayEmail[3]."','".$arrayEmail[4]."','" .$arrayEmail[5] ."','" .$arrayEmail[0]. "'")";
	
		//COMANDO PARA MYSQL  
		$stmp ="INSERT INTO CONFIG_EMAIL (CD_CONFIG, HOST, PORT, AUTH, LOGIN, SENHA, EMAIL ) VALUES ('".$this->codConfiguracao[0]."','".$arrayEmail[1] . "','".$arrayEmail[2] ."','" .$arrayEmail[3]."','".$arrayEmail[4]."','" .$arrayEmail[5] ."','" .$arrayEmail[0]. "')";
		
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
  }

  
  /*
   * Método responsável por consultar o email de cadastro na operadora
   * do sistema Apoena 
   * 
   * Retorna o objeto o email do Apoena
   */
  
  
  function consultarEmail(){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
    //$stmp ="SELECT * FROM \"CONFIG_EMAIL\"";
    
    //código para o mysql 
    $stmp ="SELECT * FROM CONFIG_EMAIL";
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codConfiguracao[]=$respostaSQL['CD_CONFIG']; 
  			$this->host[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['HOST']);
  			$this->porta[]=$respostaSQL['PORT']; 
   			$this->auth[]=$respostaSQL['AUTH'];
   			$this->e_mail[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['EMAIL']);
   			$this->login[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['LOGIN']);
   			$this->senha[]=$respostaSQL['SENHA'];
	    }
  
		$conexaoBanco->disconnect;   

  }

  
  /*
   * Método responsável por consultar o email de cadastro na operadora
   * do sistema Apoena de acordo com o codigo da configuração 
   * 
   * Retorna o objeto o email do Apoena
   */
  
  
  function consultarEmailCodigo($codConfiguracao){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
    //$stmp ="SELECT * FROM \"CONFIG_EMAIL\" WHERE \"CD_CONFIG\" = " . $codConfiguracao ;
    
    //código para o mysql
    $stmp ="SELECT * FROM CONFIG_EMAIL WHERE CD_CONFIG = " . $codConfiguracao ;
	
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codConfiguracao[]=$respostaSQL['CD_CONFIG']; 
  			$this->host[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['HOST']);
  			$this->porta[]=$respostaSQL['PORT']; 
   			$this->auth[]=$respostaSQL['AUTH'];
   			$this->e_mail[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['EMAIL']);
   			$this->login[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['LOGIN']);
   			$this->senha[]=$respostaSQL['SENHA'];
	    }
  
		$conexaoBanco->disconnect; 
	
  }
  
  
  
  /*
   * Método responsável por atualizar o email de cadastro na operadora
   * do sistema Apoena  
   * 
   * Retorna o resultado da operação sql de altualização da tabela CONFIG_EMAIL
   */
  
  
  function atualizarEmail($arrayEmail){
  
  	 	require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
	
	    //código para o postgre
		//$stmp="update \"CONFIG_EMAIL\" set ";
		//$stmp .=" \"HOST\"= '". $arrayEmail[2]."'";
		//$stmp .=" ,\"PORT\"=". $arrayEmail[3];  
		//$stmp .=" ,\"AUTH\"='". $arrayEmail[4]."'";  
		//$stmp .=" ,\"LOGIN\"='". $arrayEmail[5]."'";  
		//$stmp .=" ,\"SENHA\"='". $arrayEmail[6]."'";
		//$stmp .=" ,\"EMAIL\"='". $arrayEmail[1]."'";  
		//$stmp .=" WHERE \"CD_CONFIG\" = '". $arrayEmail[0] . "'";
	    
	   
	    //código para o mysql
		$stmp="update CONFIG_EMAIL set ";
	    $stmp .=" HOST= '". $arrayEmail[2]."'";
	    $stmp .=" ,PORT=". $arrayEmail[3];  
	    $stmp .=" ,AUTH='". $arrayEmail[4]."'";  
	    $stmp .=" ,LOGIN='". $arrayEmail[5]."'";  
	    $stmp .=" ,SENHA='". $arrayEmail[6]."'";
	    $stmp .=" ,EMAIL='". $arrayEmail[1]."'";  
	    $stmp .=" WHERE CD_CONFIG = '". $arrayEmail[0] . "'";

	    
	    $this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
  
  }
  
  /*
   * Método responsável por deletar o email de cadas na operadora
   * do sistema APOENA
   * 
   * Retorna o resultado da operação sql de deleção da tabela CONFIG_EMAIL
   */
  
  
  function deletarEmailApoena($codConfiguracao){
  
  
  	  	require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
	
	    //código para o postgre
		//$stmp="DELETE FROM \"CONFIG_EMAIL\" WHERE \"CD_CONFIG\" = ". $codConfiguracao;	
	    
	    //código para o mysql
		$stmp="DELETE FROM CONFIG_EMAIL WHERE CD_CONFIG = ". $codConfiguracao;
	    
	    $this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
  }
  
} 
    
?>