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
 
    Este programa está nomeado como .acessoDao.php e possui 117
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
 * Acesso.
 */

class Acesso {

  var $login;  
  var $senha;
  var $resultado;
  var $tipoUsuario;
  var $permissao;
  

  /*
   * Método construtor da classe 
   */
  
  
  function Acesso(){

	$this->login="";  
	$this->senha="";
	$this->tipoUsuario="";
	$this->resultado="";
	$this->permissao="";

  }
  
  
  /*
   * Método responsável por consultar uma Clipping.
   * 
   * Retorna o objeto Acesso
   */
  
  
   function verificarAcesso($login){
   
 	  require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD(); 
	  
	  //código para o postgre
      //$stmp ="SELECT \"T1.SNH\", \"T3.CD_TIP_USU\" FROM \"ACSS\" T1, \"USU\" T2 , \"TIP_USU\" T3 WHERE \"T1.LOG\" = '". $login ."'  AND \"T1.CD_USU\" = \"T2.CD_USU\" AND \"T2.CD_TIP_USU\" = \"T3.CD_TIP_USU\"";
	  
	  //código para o MYSQL  
      $stmp ="SELECT T1.SNH, T3.CD_TIP_USU FROM ACSS T1, USU T2 , TIP_USU T3 WHERE T1.LOG = '". $login ."'  AND T1.CD_USU = T2.CD_USU AND T2.CD_TIP_USU = T3.CD_TIP_USU";
     
      $consulta = $conexaoBanco->executeQuery($stmp);
      $consulta_totalRows = mysql_num_rows($consulta);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->senha=$respostaSQL['SNH'];
			$this->tipoUsuario=$respostaSQL['CD_TIP_USU'];
	    }
  
		$conexaoBanco->disconnect;   
   }	


  /*
   * Método responsável inserir acesso de usuários.
   * 
   * Retorna resposta da ação de inserção no banco de dados
   */
  
  
  function inserirAcesso($nmUsuario, $codUsuario, $novaSenha, $descricaoPerfil){
  
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  
	  	//código para o postgre
		//$stmp ="INSERT INTO \'ACSS\' (\'LOG\', \'CD_USU\', \'SNH\', \'DSC_ACSS\' ) VALUES ('$nmUsuario', '$codUsuario', '$novaSenha', '$descricaoPerfil')";
	
		//COMANDO PARA MYSQL  
		$stmp ="INSERT INTO ACSS (LOG, CD_USU, SNH, DSC_ACSS ) VALUES ('$nmUsuario', '$codUsuario', '$novaSenha', '$descricaoPerfil')";
		
	
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
		
   }
   
   
} 
    
?>