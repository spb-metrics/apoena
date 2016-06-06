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
 
    Este programa está nomeado como .grupoUsuarioDao.php e possui 298
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

class GrupoUsuario {

	var $codGrupoUsuario; 
  	var $nomeGrupoUsuario; 
   	var $descricaoGrupoUsuario;
   	var $resultado;
   	var $emailUsuario;
   	var $nmusu;
   	var $cdusu;
   
   	
   	var $codGrpUsuario; 
  	var $nomeGrpUsuario; 
   	var $descricaoGrpUsuario;
   	
  
  /*
   * Método construtor da classe 
   */
  
  
  function GrupoUsuario(){
  
	$this->codGrupoUsuario=array(); 
	$this->nomeGrupoUsuario=array() ; 
	$this->descricaoGrupoUsuario=array();
	$this->emailUsuario=array();
	$this->cdusu=array();
	$this->nmusu=array();
	$this->resultado="";
	
	$this->codGrpUsuario=""; 
  	$this->nomeGrpUsuario=""; 
   	$this->descricaoGrpUsuario="";
  	
  }
  
  
  /*
   * Método responsável por consultar o maior valor da tabela GRP_USU.
   * 
   * Retorna o maior valor do código CD_GRP_USU da tabela GRP_USU
   * 
   */
  
  
  function consultarMaximoGrupoUsuario(){
  	
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
    
  		//COMANDO PARA POSTGRE
		//$sqlMaxUsuario = "SELECT MAX(\"CD_GRP_USU\") AS maximo FROM \"GRP_USU\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_GRP_USU) AS maximo FROM GRP_USU";
		
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codGrupoUsuario[] = $respostaSQL['maximo'];
	    }
  
		$conexaoBanco->disconnect;  
		
  }



  /*
   * Método responsável por incluir um Grupo de usuários na Tabela GRP_USU.
   * Usa como parâmetros o nome do Grupo de Usuários, descricao do Grupo de Usuários
   * 
   * Retorna o resultado da opereção de Inclusão na Tabela GRP_USU
   * 
   */
  
  
  function incluirGrupoUsuario($codigoGrupo, $nome, $descricao){
  	
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
    
  		//COMANDO PARA POSTGRE
		//$stmp ="INSERT INTO \"GRP_USU\" (\"CD_GRP_USU\", \"NM_GRP_USU\", \"DSC_GRP_USU\") VALUES ('$codigoGrupo', '$nome', '$descricao')";

		
		//COMANDO PARA MYSQL
		$stmp ="INSERT INTO GRP_USU (CD_GRP_USU, NM_GRP_USU, DSC_GRP_USU) VALUES ('$codigoGrupo', '$nome', '$descricao')";

		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
		
  }
  
  
  /*
   * Método responsável por fazer a vinculação de um usuário a um grupo de usuário,
   * utilizando para isto, a Tabela USU_GRP_USU
   *
   */
  
	
  function incluirUsuarioGrupoUsuario($codigoUsuario, $codigoGrupo){
  
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
    	
  		//COMANDO PARA POSTGRE
  		//$stmp ="INSERT INTO \"USU_GRP_USU\" (\"CD_USU\", \"CD_GRP_USU\") VALUES ('$codigoUsuario', '$codigoGrupo' )";
  
  	
  		//COMANDO PARA MYSQL 
  		$stmp ="INSERT INTO USU_GRP_USU (CD_USU, CD_GRP_USU) VALUES ('$codigoUsuario', '$codigoGrupo' )";
  		
  		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;	
  
  }
  
  
  
  /*
   * Método responsável por consultar Grupos de Usuários
   * 
   * Retorna o objeto Grupos de Usuarios
   */
  
  
  function consultarGrupoUsuario(){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
  	//$stmp ="SELECT * FROM \"GRP_USU\"";
    
    
    //código para o mysql
  	$stmp ="SELECT * FROM GRP_USU ";
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codGrupoUsuario[]=$respostaSQL['CD_GRP_USU']; 
			$this->nomeGrupoUsuario[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_GRP_USU']);  
			$this->descricaoGrupoUsuario[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_GRP_USU']);

	    }
  
		$conexaoBanco->disconnect; 
	
  }
  
   
   
   
  /*
   * Método responsável por consultar Grupos de Usuários de acordo com o código de Grupo de Usuários
   * 
   * Retorna o objeto Grupos de Usuarios
   */

  function consultarGrupoUsuarioCodigo($cdGrupoUsuario){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
  	//$stmp ="SELECT * FROM \"GRP_USU\" WHERE \"CD_GRP_USU\" = " . $cdGrupoUsuario;
    
    
    //código para o mysql
  //$stmp ="SELECT * FROM GRP_USU WHERE CD_GRP_USU = " . $cdGrupoUsuario;
	$stmp ="SELECT T1.CD_GRP_USU , T1.NM_GRP_USU , T1.DSC_GRP_USU , T2.CD_USU , T3.NM_USU  FROM GRP_USU T1,  USU_GRP_USU T2 , USU T3  WHERE T2.CD_GRP_USU = T1.CD_GRP_USU AND T2.CD_USU = T3.CD_USU AND T1.CD_GRP_USU =" . $cdGrupoUsuario;
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codGrpUsuario=$respostaSQL['CD_GRP_USU']; 
			$this->nomeGrpUsuario=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_GRP_USU']);  
			$this->descricaoGrpUsuario=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_GRP_USU']);
			$this->cdusu[]=$respostaSQL['CD_USU'];
			$this->nmusu[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_USU']);    
	    echo $nmusu[0] ;
	    }
	    
	    
	    
		$conexaoBanco->disconnect;
  }
   
   
  /*
   * Método responsável por consultar usuários de acordo com o código de Grupo de Usuários
   * 
   * Retorna o objeto usuário
   */
  
  function consultarUsuarioGrupo($codigoGrupoUsuario){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
  	//$stmp ="SELECT \"T2.E_MAIL\" FROM USU_GRP_USU T1, USU T2  WHERE \"T1.CD_GRP_USU\" = " . $codigoGrupoUsuario . " AND \"T1.CD_USU\" = \"T2.CD_USU\"";
    
    
    //código para o mysql
  	$stmp ="SELECT T2.E_MAIL FROM USU_GRP_USU T1, USU T2  WHERE T1.CD_GRP_USU = " . $codigoGrupoUsuario . " AND T1.CD_USU = T2.CD_USU";
	
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->emailUsuario[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['E_MAIL']); 
	    
	    }
  
		$conexaoBanco->disconnect;
	
  }
  
  
  /*
   * Método responsável por excluir um Grupo de Usuários.
   * 
   * Retorna os resultados da opereção de exclusão nas tabelas GRP_USU e USU_GRP_USU
   */
  
  
  function excluirGrupoUsuario($codGrupoUsuario){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
  
    
    //código para o postgre
  	//$stmp ="DELETE FROM \"GRP_USU\" WHERE \"CD_GRP_USU\" = ". $codGrupoUsuario;
    //código para o postgre
  	//$stmpII ="DELETE FROM \"USU_GRP_USU\" WHERE \"CD_GRP_USU\" = ". $codGrupoUsuario;
    
    
    //código para o mysql
  	$stmp ="DELETE FROM GRP_USU WHERE CD_GRP_USU = ". $codGrupoUsuario;
    //código para o mysql
  	$stmpII ="DELETE FROM USU_GRP_USU WHERE CD_GRP_USU = ". $codGrupoUsuario;
  	
  	$this->resultado=$conexaoBanco->executeQuery($stmp);
		
	$this->resultado=$conexaoBanco->executeQuery($stmpII);
		
	$conexaoBanco->disconnect;
  	
  	
  	
  }
  
  
  /*
   * Método responsável por alterar um Grupo de Usuários.
   * 
   * Retorna os resultados da opereção de alteracao nas tabelas GRP_USU
   */
  
  function alterarGrupoUsuario($codigoGrpUsuario, $nomeGrupo, $descricao) {
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //código para o postgre
    //$stmp="update \"GRP_USU\" set ";
    //$stmp .="\"CD_GRP_USU\" = '". $codigoGrupo . "'";
    //$stmp .=",\"NM_GRP_USU\" = '". $nomeGrupo . "'";
    //$stmp .=",\"DSC_GRP_USU\" = '". $descricao . "'";
    //$stmp .=" WHERE \"CD_GRP_USU\" = '". $codigoGrupo . "'";
    
    //código para o mysql
      $stmp="update GRP_USU set ";
      $stmp .=" NM_GRP_USU = '". $nomeGrupo . "'";
      $stmp .=" ,DSC_GRP_USU = '". $descricao . "'";
      $stmp .=" WHERE CD_GRP_USU = '". $codigoGrpUsuario . "'";
    
    $this->resultado=$conexaoBanco->executeQuery($stmp);
    
    $conexaoBanco->disconnect;
  }

	function limparGrupoUsuario($codigoGrpUsuario){
	
	require_once '.conexaoBD.php';
	$conexaoBanco = new conexaoBD();
	
		
	$stmp="DELETE FROM USU_GRP_USU WHERE CD_GRP_USU = '" . $codigoGrpUsuario . "'" ;
    $this->resultado=$conexaoBanco->executeQuery($stmp);
    
    $conexaoBanco->disconnect;
	
	}
   
   function inserirUsuariosGrupo($codigoGrpUsuario, $cdusu ) {
   
    require_once '.conexaoBD.php';
	$conexaoBanco = new conexaoBD();
	
	$qtd = count($cdusu) ;
	
   for ( $indice = 0 ; $indice <= $qtd ; $indice += 1 ) {
       if ($cdusu[$indice] > 0 ) {
	    $stmp ="INSERT INTO USU_GRP_USU (CD_USU, CD_GRP_USU) VALUES ('$cdusu[$indice]', '$codigoGrpUsuario' )";
        $this->resultado=$conexaoBanco->executeQuery($stmp);
     	  
  	   }
  	}
  		
    
    $conexaoBanco->disconnect;	
   
   }
   
} 
    
?>