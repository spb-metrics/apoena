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
 
    Este programa está nomeado como .usuarioDao.php e possui 394
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

class Usuario {

	var $codUsuario; 
  	var $codTipoUsuario;
  	var $nomeTipoUsuario; 
   	var $nomeUsuario;
   	var $e_mail;  
   	var $resultado;
   	var $codigoUsuario;
   	var $indice ;

  
  /*
   * Método construtor da classe 
   */
  
  
  function Usuario(){
  
  	$this->codUsuario=array(); 
  	$this->codTipoUsuario=array(); 
   	$this->nomeUsuario=array();
   	$this->nomeTipoUsuario=array();
   	$this->e_mail=array();  
   	$this->resultado;
   	$this->codigoUsuario="";
    $this->indice=array();
    
  }
  
  
  /*
   * Método responsável por incluir um Usuário na Tabela USU.
   * Usa como parâmetros o nome do Usuário, descricao do Usuário
   * 
   * Retorna o resultado da opereção de Inclusão na Tabela USU
   * 
   */
  
  
  function inserirUsuario($array){
  	
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
   //******************************* CONSULTA O MAIOR CODIGO DA ONTOLOGIA **********************************

		//COMANDO PARA POSTGRE
		//$sqlMaxUsuario = "SELECT MAX(\"CD_USU\") AS maximo FROM \"USU\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_USU) AS maximo FROM USU";
		
		 $consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codUsuario = $respostaSQL['maximo'];
	    
	    }

		//LIBERA CONEXÃO  
		$conexaoBanco->disconnect;
		
		$this->codUsuario = $this->codUsuario + 1;
	
		$codTipoUsuario= $array[0]; 
		$nome = strtoupper($array[1]);
		$e_mail= $array[2];
		
		  		
	//******************************** INSERE ONTOLOGIA *****************************************************
	
	//COMANDO PARA POSTGRE
	//$stmp ="INSERT INTO \"USU\" (\"CD_USU\", \"CD_TIP_USU\", \"NM_USU\", \"E_MAIL\" ) VALUES ('$this->codUsuario', '$codTipUsuario' ,'$nome', '$e_mail')";
	
	//COMANDO PARA MYSQL  
	$stmp ="INSERT INTO USU (CD_USU, CD_TIP_USU, NM_USU, E_MAIL ) VALUES ('$this->codUsuario', '$codTipoUsuario' ,'$nome', '$e_mail')";
	
	
	$this->resultado=$conexaoBanco->executeQuery($stmp);
	
	$this->codUsuario=$this->codUsuario;	
		
	$conexaoBanco->disconnect;
	
	
	
  }
  
  /*
   * Método responsável por consultar um Usuário.
   * 
   * Retorna o objeto usuario
   */
  
  
  function consultarUsuario(){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
  	//$stmp ="SELECT T1.\"CD_USU\", T1.\"NM_USU\", T1.\"E_MAIL\", T2.\"NM_TIP_USU\" FROM \"USU\" T1 , \"TIP_USU\" T2 WHERE T1.\"CD_TIP_USU\" = T2.\"CD_TIP_USU\" ORDER BY \"NM_USU\"";
    
    
    //código para o mysql
  	$stmp ="SELECT T1.CD_USU, T1.NM_USU, T1.E_MAIL, T2.NM_TIP_USU FROM USU T1 , TIP_USU T2 WHERE T1.CD_TIP_USU = T2.CD_TIP_USU ORDER BY NM_USU";
	
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codUsuario[]=$respostaSQL['CD_USU']; 
  			$this->nomeTipoUsuario[]=$respostaSQL['NM_TIP_USU']; 
   			$this->nomeUsuario[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_USU']);
   			$this->e_mail[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['E_MAIL']);
	    }
  
		$conexaoBanco->disconnect;
	
  }
  


  /*
   * Método responsável por consultar um Usuario de acordo com o nome.
   * 
   * Retorna o objeto Usuario
   */
  
  
  function consultarUsuarioNome($nomeUsuario){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
  	//$stmp ="SELECT \'CD_USU\' FROM \'USU\' WHERE \'NM_USU\' = '".$nomeUsuario."'";
    
    //código para o mysql
  	$stmp ="SELECT CD_USU FROM USU WHERE NM_USU = '".$nomeUsuario."'";
			
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	         
	    	 $this->codigoUsuario=$respostaSQL['CD_USU'];  	
	    	
	    }
  
		$conexaoBanco->disconnect;
	
  }

  
  
  /*
   * Método responsável por consultar um Usuario.
   * 
   * Usa o parâmetro codigo do Usuário para efetivar a consulta
   * 
   * Retorna o objeto Usuario
   */
  
  
  function consultarUsu($cdUsuario){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
    //$stmp ="SELECT T1.\"CD_USU\", T1.\"NM_USU\", T1.\"E_MAIL\", T2.\"CD_TIP_USU\", T2.\"NM_TIP_USU\" FROM \"USU\" T1 , \"TIP_USU\" T2 WHERE T1.\"CD_TIP_USU\" = T2.\"CD_TIP_USU\" AND T1.\"CD_USU\" = " . $cdUsuario;
    
    //código para o mysql
    $stmp ="SELECT T1.CD_USU, T1.NM_USU, T1.E_MAIL, T2.CD_TIP_USU, T2.NM_TIP_USU FROM USU T1 , TIP_USU T2 WHERE T1.CD_TIP_USU = T2.CD_TIP_USU AND T1.CD_USU = " . $cdUsuario;
	
  	
  	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codUsuario[]=$respostaSQL['CD_USU']; 
  			$this->codTipoUsuario[]=$respostaSQL['CD_TIP_USU'];
  			$this->nomeTipoUsuario[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_TIP_USU']);
  			$this->nomeUsuario[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_USU']);
   			$this->e_mail[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['E_MAIL']);
	    
	    }
  
		$conexaoBanco->disconnect;
  	
  }
  
  /*
   * Método responsável por consultar o email de um Usuario.
   * 
   * Usa o parâmetro codigo do Usuário para efetivar a consulta
   * 
   * Retorna o objeto o email de um Usuario
   */
  
  
  function consultarEmailUsuario($cdUsuario){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
    //$stmp ="SELECT \"E_MAIL\" FROM \"USU\" WHERE \"CD_USU\" = " . $cdUsuario;
    
    //código para o mysql
    $stmp ="SELECT E_MAIL FROM USU WHERE CD_USU = " . $cdUsuario;
	
  	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->e_mail[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['E_MAIL']);
	    
	    }
  
		$conexaoBanco->disconnect;
  }
  
  
  /*
   * Método responsável por excluir uma Ontologia.
   * 
   * Retorna os resultados da opereção de exclusão nas tabelas ONT e TRM 
   */
  
  
  
  function excluirUsuario($codUsuario){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
  
    
    //código para o postgre
  	//$stmp ="DELETE FROM \"USU\" WHERE \"CD_USU\" = ". $codUsuario;
    //código para o postgre
  	//$stmpII ="DELETE FROM \"TEL\" WHERE \"CD_USU\" = ". $codUsuario;
    //código para o postgre
  	//$stmpII ="DELETE FROM \"ACSS\" WHERE \"CD_USU\" = ". $codUsuario;
    
    //código para o mysql
  	$stmp ="DELETE FROM USU WHERE CD_USU = ". $codUsuario;
    //código para o mysql
  	$stmpII ="DELETE FROM TEL WHERE CD_USU = ". $codUsuario;
  	//código para o mysql
  	$stmpIII ="DELETE FROM ACSS WHERE CD_USU = ". $codUsuario;
  	
  	
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
  
  
  function alterarUsuario($array){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    $nome 	= strtoupper($array[2]);

    //código para o postgre
    //$stmp="update \"USU\" set ";
    //$stmp .="\"CD_USU\" = '". $array[0] . "'";
    //$stmp .=",\"CD_TIP_USU\" = '". $array[1]  . "'";
    //$stmp .=",\"NM_USU\" = '". $nome . "'";
    //$stmp .=",\"E_MAIL\" = '". $array[3] . "'";
    //$stmp .=" WHERE \"CD_USU\" = '". $array[0] . "'";
    
    //código para o mysql
    $stmp="update USU set ";
    $stmp .="CD_USU = '". $array[0] . "'";
    $stmp .=",CD_TIP_USU = '". $array[1]  . "'";
    $stmp .=",NM_USU = '". $nome . "'";
    $stmp .=",E_MAIL = '". $array[3] . "'";
    $stmp .=" WHERE CD_USU = '". $array[0] . "'";
    
    $this->resultado=$conexaoBanco->executeQuery($stmp);
		
	$conexaoBanco->disconnect;
  }
  
  
  /*
   * Método responsável por inserir o email de cadastro  
   * do sistema Apoena 
   * OBS - este e-mail é o e-mail do sistema Apoena
   * cadastrado na operadora 
   * 
   */
  
  function inserirEmailApoena($emailApoena){
  
  	  	require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
    
   //******************************* CONSULTA O MAIOR CODIGO DO USUARIO **********************************

		//COMANDO PARA POSTGRE
		//$sqlMaxUsuario = "SELECT MAX(\"CD_USU\") AS maximo FROM \"USU\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_USU) AS maximo FROM USU";
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codUsuario = $respostaSQL['maximo'];
	    
	    }

		//LIBERA CONEXÃO
		$conexaoBanco->disconnect;
		
		$this->codUsuario = $this->codUsuario + 1;
	
		  		
	//******************************** INSERE USUARIO *****************************************************
	
		//COMANDO PARA POSTGRE
		//$stmp ="INSERT INTO /'USU/' (/'CD_USU/', /'CD_TIP_USU/', /'NM_USU/', /'E_MAIL/' ) VALUES ('$this->codUsuario', '2' , '', '$emailApoena')";
	
		//COMANDO PARA MYSQL  
		$stmp ="INSERT INTO USU (CD_USU, CD_TIP_USU, NM_USU, E_MAIL ) VALUES ('$this->codUsuario', '2' , '', '$emailApoena')";
		
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
		
  }

  
  /*
   * Método responsável por consultar o email de cadastro na operadora
   * do sistema Apoena 
   * 
   * Retorna o objeto o email do Apoena
   */
  
  
  function consultarEmailApoena(){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
    //$stmp ="SELECT \"E_MAIL\" FROM \"USU\" WHERE \"CD_TIP_USU\" = 2";
    
    //código para o mysql
    $stmp ="SELECT E_MAIL FROM USU WHERE CD_TIP_USU = 2";
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->e_mail[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['E_MAIL']);
	    
	    }
  
		$conexaoBanco->disconnect;
	
  }
  
} 
    
?>