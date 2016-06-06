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
 
    Este programa está nomeado como .tipoUsuarioDao.php e possui 238
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
 * Tipo Usuário.
 */

class TipoUsuario {

  var $codTipoUsuario;  
  var $nomeTipoUsuario;
  var $dscTipoUsuario;
  var $resultado;  
  
  
  /*
   * Método construtor da classe 
   */
  
  
  function TipoUsuario(){
  
  	$this->codTipoUsuario=array();  
  	$this->nomeTipoUsuario=array();
    $this->dscTipoUsuario=array();
    $this->resultado;
  	  
  }
  
  
  /*
   * Método responsável por incluir um Tipo de Usuário na Tabela TIP_USU.
   * Usa como parâmetros o nome do Tipo do Usuário, descricao do Tipo de Usuário
   * 
   * Retorna o resultado da opereção de Inclusão na Tabela TIP_USU
   * 
   */
  
  
  function inserirTipoUsuario($nomeTipoUsuario, $descricao){
  	
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
   //******************************* CONSULTA O MAIOR CODIGO DA ONTOLOGIA **********************************

		//COMANDO PARA POSTGRE
		//$sqlMaxOntologia = "SELECT MAX(\"CD_TIP_USU\") AS maximo FROM \"TIP_USU\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_TIP_USU) AS maximo FROM TIP_USU";
		
		$consulta = $conexaoBanco->executeQuery($stmp);
      
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codTipoUsuario = $respostaSQL['maximo'];
	    }

		//LIBERA CONEXÃO
		$conexaoBanco->disconnect;
		
		$this->codTipoUsuario = $this->codTipoUsuario + 1;
		
		$nm = strtoupper($nomeTipoUsuario);
		$dsc= strtoupper($descricao);
		  		
	//******************************** INSERE ONTOLOGIA *****************************************************
	
	//COMANDO PARA POSTGRE
	//$stmp ="INSERT INTO \"TIP_USU\"(\"CD_TIP_USU\", \"NM_TIP_USU\", \"DSC_TIP_USU\" ) VALUES ('$this->codTipoUsuario', '$nm', '$dsc')";
	
	//COMANDO PARA MYSQL  
	$stmp ="INSERT INTO TIP_USU (CD_TIP_USU, NM_TIP_USU, DSC_TIP_USU ) VALUES ('$this->codTipoUsuario', '$nm', '$dsc')";
	 			
	$this->resultado=$conexaoBanco->executeQuery($stmp);
		
	$conexaoBanco->disconnect;
	
  }
  
  /*
   * Método responsável por consultar um Tipo Usuario.
   * 
   * Retorna o objeto Ontologia
   */
  
  
  function consultarTipoUsuario(){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
  
    //código para o postgre
  	//$stmp ="SELECT * FROM \"TIP_USU\" ORDER BY \"NM_TIP_USU\"";
    
    //código para o mysql
  	$stmp ="SELECT * FROM TIP_USU ORDER BY NM_TIP_USU";
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    
	    	$this->codTipoUsuario[]=$respostaSQL['CD_TIP_USU'];
	  		$this->nomeTipoUsuario[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_TIP_USU']);
	  		$this->dscTipoUsuario[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_TIP_USU']);
	    }
  
		$conexaoBanco->disconnect;
	
  }
  
  /*
   * Método responsável por consultar um Tipo Usuario.
   * 
   * Usa o parâmetro codigo da Ontologia para efetivar a consulta
   * 
   * Retorna o objeto Tipo Usuario
   */
  
  
  function consultarTipUsu($cdTipoUsuario){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
    //$stmp ="SELECT * FROM \"TIP_USU\" WHERE \"CD_TIP_USU\" = " . $cdTipoUsuario . " ORDER BY \"NM_TIP_USU\"";
    
    //código para o mysql
    $stmp ="SELECT * FROM TIP_USU WHERE CD_TIP_USU = " . $cdTipoUsuario . " ORDER BY NM_TIP_USU";
	
		
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    
	    	$this->codTipoUsuario[]=$respostaSQL['CD_TIP_USU'];
	  		$this->nomeTipoUsuario[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_TIP_USU']);
	  		$this->dscTipoUsuario[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_TIP_USU']);
	    }
  
		$conexaoBanco->disconnect;
	
  }
  
  
  /*
   * Método responsável por excluir um Tipo Usuario.
   * 
   * Retorna os resultados da opereção de exclusão nas tabelas TIP_USU e USU 
   */
  
  
  
  function excluirTipoUsuario($codTipUsuario){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
  
    //código para o postgre
  	//$stmp ="DELETE FROM \"TIP_USU\" WHERE \"CD_TIP_USU\" = ". $codTipUsuario;
  	//código para o postgre
  	//$stmpII ="DELETE FROM \"USU\" WHERE \"CD_TIP_USU\" = ". $codTipUsuario;
    
    //código para o mysql
  	$stmp ="DELETE FROM TIP_USU WHERE CD_TIP_USU = ". $codTipUsuario;
  	//código para o mysql
  	$stmpII ="DELETE FROM USU WHERE CD_TIP_USU = ". $codTipUsuario;
  	
  	$this->resultado=$conexaoBanco->executeQuery($stmp);

	$this->resultado=$conexaoBanco->executeQuery($stmpII);	
		
	$conexaoBanco->disconnect;
  	
  	
  }
  
  
  /*
   * Método responsável por alterar um Tipo Usuário.
   * 
   * Retorna os resultados da opereção de alteracao na tabela TIP_USU  
   */
  
  
  function alterarTipoUsuario($array){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    $nome 		= strtoupper($array[1]);
    $descricao 	= strtoupper($array[2]);

    //código para o postgre
    //$stmp="update \"TIP_USU\" set ";
    //$stmp .="\"CD_TIP_USU\" = '". $array[0] . "'";
    //$stmp .=",\"NM_TIP_USU\" = '". $nome . "'";
    //$stmp .=",\"DSC_TIP_USU\" = '". $descricao . "'";
    //$stmp .=" WHERE \"CD_TIP_USU\" = '". $array[0] . "'";
    
    
    //código para o mysql
    $stmp="update TIP_USU set ";
    $stmp .="CD_TIP_USU = '". $array[0] . "'";
    $stmp .=",NM_TIP_USU = '". $nome . "'";
    $stmp .=",DSC_TIP_USU = '". $descricao . "'";
    $stmp .=" WHERE CD_TIP_USU = '". $array[0] . "'";
    
    $this->resultado=$conexaoBanco->executeQuery($stmp);
    
    $conexaoBanco->disconnect;
  }
  
  
} 
    
?>