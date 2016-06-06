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
 
    Este programa está nomeado como .tipoFonteDao.php e possui 351
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
 * Tipo de Fonte.
 */	

class TipoFonte {

  var $codTipoFonte;
  var $nomeTipoFonte;
  var $descricaoTipo;
  var $mensagemRetorno;
  var $totalPaginas; 
  var $anterior;
  var $proximo;
  var $total;

  
  /*
   * Método da classe
   */

  function TipoFonte(){
  
  	$this->codTipoFonte=array();
  	$this->nomeTipoFonte=array();
  	$this->descricaoTipo=array();
  
  	$this->mensagemRetorno="";
  	$this->totalPaginas=""; 
  	$this->anterior="";
  	$this->proximo="";
  	$this->total="";
  }
  
  /*
   * Método responsável por consultar a tabela tipo fonte
   * de acordo com o tipo de fonte 
   *
   * Usa como parâmetro o codigo do tipo de fonte 
   * 
   * Retorna o objeto Tipo de Fonte
   */
  
  function consultarTipoFonte($cdTipFonte){

    require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD(); 
        
    if($cdTipFonte != ""){
    
	    //COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT \"CD_TIP_FONT\", \"NM_FONT\", \"DSC_TIP_FONT\" FROM \"TIP_FONT\" WHERE \"CD_TIP_FONT\" = " . $cdTipFonte;
		
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT CD_TIP_FONT, NM_FONT, DSC_TIP_FONT FROM TIP_FONT WHERE CD_TIP_FONT = " . $cdTipFonte;
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codTipoFonte[]=$respostaSQL['CD_TIP_FONT'];
			$this->nomeTipoFonte[]=$respostaSQL['NM_FONT'];
			$this->descricaoTipo[]=$respostaSQL['DSC_TIP_FONT'];
	    	
	    }
  
		$conexaoBanco->disconnect; 
		
	}	
		
  }
  
  
  function consultarNomeTipoFonte($cdFonte){
  	
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD(); 
    
    
    if($cdFonte != ""){
    
    	//COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT \"CD_TIP_FONT\" FROM \"FONT\" WHERE \"CD_FONT\" = ". $cdFonte;
		
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT CD_TIP_FONT FROM FONT WHERE CD_FONT = " . $cdFonte;
    
    
    	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codTipoFonte[]=$respostaSQL['CD_TIP_FONT'];
	    }
		
		//LIBERA A CONEXÃO  
		$conexaoBanco->disconnect;
	    
    
	    //COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT \"NM_FONT\" FROM \"TIP_FONT\" WHERE \"CD_TIP_FONT\" = " .$this->codTipoFonte[0];
		
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT NM_FONT FROM TIP_FONT WHERE CD_TIP_FONT = " . $this->codTipoFonte[0];
		
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->nomeTipoFonte[]=$respostaSQL['NM_FONT'];
	    
	    }
		
		//LIBERA A CONEXÃO  
		$conexaoBanco->disconnect;
		
	}	
  	
  }
  
  
  /*
   * Método responsável por consultar a tabela tipo fonte
   * de acordo com o tipo de fonte 
   * 
   * Retorna o objeto Tipo de Fonte
   */
  
  
  function consultaTipoFonte(){

    require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD(); 
        
        //COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT \"CD_TIP_FONT\", \"NM_FONT\", \"DSC_TIP_FONT\" FROM \"TIP_FONT\"";
		
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT CD_TIP_FONT, NM_FONT, DSC_TIP_FONT FROM TIP_FONT ORDER BY NM_FONT";
		

		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codTipoFonte[]=$respostaSQL['CD_TIP_FONT'];
			$this->nomeTipoFonte[]=$respostaSQL['NM_FONT'];
			$this->descricaoTipo[]=$respostaSQL['DSC_TIP_FONT'];
	    
	    }
		
		//LIBERA A CONEXÃO  
		$conexaoBanco->disconnect;
		
  }
  
  /*
   * Método responsável por deletar a tabela TIP_FONT
   * e todas as tabela que utilizam o codigo do tipo da fonte
   * 
   * Usa como parâmetro o codigo do tipo de fonte
   * 
   * Retorna o resultado da operação de deleção da tabela TIP_FONT
   * 
   */
  
 function deletarTipoFonte($codTipoFonte){
   
   	  require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD(); 
	
    	//ATUALIZA A FONTE DA TABELA RSS - código para o postgre
    	//$stmp = "UPDATE \"RSS\" SET ";
		//$stmp .= "\"CD_TIP_FONT\" = 0 ";
		//$stmp .= ", \"DSC_TIP_FONT\" = 'SEM FONTE' ";
		//$stmp .= "WHERE \"CD_TIP_FONT\" = ".$codTipoFonte;
    	
    	//ATUALIZA A FONTE DA TABELA RSS - código para o mysql
    	$stmp = "UPDATE RSS SET ";
		$stmp .= "CD_TIP_FONT = 0 ";
		$stmp .= ", DSC_TIP_FONT = 'SEM FONTE' ";
		$stmp .= "WHERE CD_TIP_FONT = ".$codTipoFonte;
    	
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
	
		//ATUALIZA A FONTE DA TABELA DOC - código para o postgre 
		//$stmp1 = "UPDATE \"DOC\" SET ";
		//$stmp1 .= "\"CD_TIP_FONT\" = 0 ";
		//$stmp1 .= "WHERE \"CD_FONT\" = ".$codTipoFonte;
		
		
		//ATUALIZA A FONTE DA TABELA DOC - código para o mysql 
		$stmp1 = "UPDATE DOC SET ";
		$stmp1 .= "CD_TIP_FONT = 0 ";
		$stmp1 .= "WHERE CD_FONT = ".$codTipoFonte;
    	
		$this->resultado=$conexaoBanco->executeQuery($stmp1);
		
		$conexaoBanco->disconnect;
	
		//ATUALIZA A FONTE DA TABELA DOC - código para o postgre
		//$stmp2 = "UPDATE \"DOC_ONT\" SET ";
		//$stmp2 .= "\"CD_TIP_FONT\" = 0 ";
		//$stmp2 .= "WHERE \"CD_FONT\" = ".$codTipoFonte;
		
		
		//ATUALIZA A FONTE DA TABELA DOC - código para o mysql 
		$stmp2 = "UPDATE DOC_ONT SET ";
		$stmp2 .= "CD_TIP_FONT = 0 ";
		$stmp2 .= "WHERE CD_FONT = ".$codTipoFonte;
    	
		$this->resultado=$conexaoBanco->executeQuery($stmp2);
		
		$conexaoBanco->disconnect;
		
		//ATUALIZA A FONTE DA TABELA DOC - código para o postgre 
		//$stmp3 = "UPDATE \"CLIP\" SET ";
		//$stmp3 .= "\"CD_TIP_FONT\" = 0 ";
		//$stmp3 .= "WHERE \"CD_FONT\" = ".$codTipoFonte;
		
		
		//ATUALIZA A FONTE DA TABELA DOC - código para o mysql 
		$stmp3 = "UPDATE CLIP SET ";
		$stmp3 .= "CD_TIP_FONT = 0 ";
		$stmp3 .= "WHERE CD_FONT = ".$codTipoFonte;
    	
		$this->resultado=$conexaoBanco->executeQuery($stmp3);
		
		$conexaoBanco->disconnect;
		
		//código para o postgre
		//$stmp4 = "DELETE FROM \"TIP_FONT\" WHERE \"CD_TIP_FONT\" = ". $codTipoFonte;
		
		//código para o mysql
		$stmp4 = "DELETE FROM TIP_FONT WHERE CD_TIP_FONT = ". $codTipoFonte;
		
		$this->resultado=$conexaoBanco->executeQuery($stmp4);
		
		$conexaoBanco->disconnect;
		
   }
   
   /*
    * Método responsável por insere na tabela TIP_FONT
    * 
    * Usa como parámentro o nome do tipo da fonte e descrição do tipo da fonte
    * 
    * Retorno o resultado da operação de inclusão na tabela TIP_FONT
    */
   
   
   function inserirTipoFonte($nomeTipoFonte, $descricaoTipoFonte){
   
   	  require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD(); 
    
   //******************************* CONSULTA O MAIOR CODIGO DA ONTOLOGIA **********************************

		//COMANDO PARA POSTGRE
		//$sqlMaxOntologia = "SELECT MAX(\"CD_TIP_FONT\") AS maximo FROM \"TIP_FONT\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_TIP_FONT) AS maximo FROM TIP_FONT";
		 
		 $consulta = $conexaoBanco->executeQuery($stmp);
      
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codTipoFonte = $respostaSQL['maximo'];
	    }
	
		//LIBERAR CONEXÃO  
		$conexaoBanco->disconnect;  
		 
		
		$this->codTipoFonte = $this->codTipoFonte + 1;

		$nome 		= strtoupper($nomeTipoFonte);
		$descricao 	= strtoupper($descricaoTipoFonte);
		
	//******************************** INSERE ONTOLOGIA *****************************************************
	
	//COMANDO TESTE EXEMPLO PARA FUTURA UTILIZAÇÃO	
	//INSERT INTO TIP_FONT (CD_TIP_FONT, NM_FONT, DSC_TIP_FONT, IMG) VALUES (11,'MARCELO','TESTANDO INCLUSAO', LOAD_FILE("/home/marcelo/workspace/APOENA_PROCESSADOR/imagens/seta.gif"))	
		
	//COMANDO TESTE PARA FUTURA CONSULTA
	//SELECT IMG INTO OUTFILE "/home/marcelo/workspace/APOENA_PROCESSADOR/imagens/seta.gif" FROM teste WHERE CD_TIP_FONT = 1; 	
		
		
	//COMANDO PARA POSTGRE
	//$stmp ="INSERT INTO \"TIP_FONT\" (\"CD_TIP_FONT\", \"NM_FONT\", \"DSC_TIP_FONT\" ) VALUES ('$this->codTipoFonte', '$nome', '$descricao')";
	
	//COMANDO PARA MYSQL  
	    $stmp ="INSERT INTO TIP_FONT (CD_TIP_FONT, NM_FONT, DSC_TIP_FONT ) VALUES ('$this->codTipoFonte', '$nome', '$descricao')";
	 			
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
   }
   
   
   /*
		
    * Método responsável por alterar a tabela TIP_FONT
    * 
    * Usa como parâmentro o codigo do tipo de fonte, o nome do tipo da fonte e descrição do tipo da fonte
    * 
    * Retorna o resultado da operação de alteração da tabela TIP_FONT
    * 
    */
   
   
   function alterarTipoFonte($codTipoFonte, $nomeTipoFonte, $descricaoTipoFonte){
   
   		require_once '.conexaoBD.php';
	
	    $conexaoBanco = new conexaoBD(); 
    	
    	$nome 		= strtoupper($nomeTipoFonte);
		$descricao 	= strtoupper($descricaoTipoFonte);
    	
		//ATUALIZA A FONTE DA TABELA RSS - código para o postgre
    	//$stmp = "UPDATE \"TIP_FONT\" SET ";
		//$stmp .= "\"CD_TIP_FONT\" = ".$codTipoFonte;
		//$stmp .= ", \"NM_FONT\" = '".$nome ."' ";
		//$stmp .= ", \"DSC_TIP_FONT\" = '". $descricao ."' ";
		//$stmp .= "WHERE \"CD_TIP_FONT\" = ".$codTipoFonte;
		
		
    	//ATUALIZA A FONTE DA TABELA RSS - código para o mysql
    	$stmp = "UPDATE TIP_FONT SET ";
		$stmp .= "CD_TIP_FONT = ".$codTipoFonte;
		$stmp .= ", NM_FONT = '".$nome ."' ";
		$stmp .= ", DSC_TIP_FONT = '". $descricao ."' ";
		$stmp .= "WHERE CD_TIP_FONT = ".$codTipoFonte;
    	
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
   
   }
   
} 

?>