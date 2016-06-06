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
 
    Este programa está nomeado como .fonteDao.php e possui 332
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
 * Fonte.
 */


class Fonte {

  var $codFonte;
  var $nomeFonte;
  var $codTipoFonte;
  var $nomeTipoFonte;
  var $descricaoTipo;
  var $mensagemRetorno;
  var $totalPaginas; 
  var $anterior;
  var $proximo;
  var $total;
  var $resultado;
  
  /*
   * Método construtor da Classe
   */

  function Fonte(){
  
  	$this->codFonte=array();
  	$this->nomeFonte=array();
  	$this->codTipoFonte=array();
  	$this->nomeTipoFonte=array();
  	$this->descricaoTipo=array();
  
  	$this->resultado="";
  	$this->mensagemRetorno="";
  	$this->totalPaginas=""; 
  	$this->anterior="";
  	$this->proximo="";
  	$this->total="";
  	  
  }
  
  /*
  *	 Método responsável pela consulta Fonte 	
  *  usando como parâmetro o código do Tipo da Fonte
  * 
  *  Retorna o objeto tipoFonte
  * 
  */	

  function consultarFonte($cdTipFonte){

	  require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD();
    
    if($cdTipFonte != ""){
    
	    //COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT * FROM \"FONT\" WHERE \"CD_TIP_FONT\" = ".$cdTipFonte;
		
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT * FROM FONT WHERE CD_TIP_FONT = " . $cdTipFonte . " ORDER BY DSC_FONT";
		
		
		 $consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codFonte[]=$respostaSQL['CD_FONT'];
		  	$this->codTipoFonte=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CD_TIP_FONT']);
			$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_FONT']);
	    
	    }
  
		$conexaoBanco->disconnect; 
		
    }	
		
  }

  /*
  *	 Método responsável pela consulta Fonte 	
  *  usando como parâmetro o código do Tipo da Fonte
  * 
  *  Retorna o objeto tipoFonte
  * 
  */	

  function consultarFontePorNome($nomeFonte){

      require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD();
    
        //COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT \"CD_FONT\" FROM \"FONT\" WHERE \"NM_FONT\" = " . $nomeFonte;
		
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT CD_FONT FROM FONT WHERE DSC_FONT = '" . $nomeFonte . "'";
		
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codFonte[]=$respostaSQL['CD_FONT'];
	    
	    }
  
		$conexaoBanco->disconnect;
		
		
  }




  /*
   * Método responsável por consulta Fontes  	 
   * usando como parãmetro o código da Fonte
   * 
   *  Retorna o objeto Fonte
   */

  
  function consultaFonte($codFonte){

   	  require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD();
    
    //COMANDO SQL PARA POSTGRE
	//$stmp ="SELECT * FROM \"FONT\"";
	
	//COMANDO SQL PARA MYSQL
	$stmp ="SELECT * FROM FONT WHERE CD_FONT = " .$codFonte;
	
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codFonte[]=$respostaSQL['CD_FONT'];
			$this->codTipoFonte=$respostaSQL['CD_TIP_FONT'];
		  	$this->nomeFonte[]=$respostaSQL['DSC_FONT'];
	    
	    }
  
		$conexaoBanco->disconnect;
		
   }
   
   /*
    * Método responsável por consultar Fonte. 
    * Não utiliza nenhum parâmetro
    * 
    *  Retorna o objeto Fonte ordenado alfabeticamente
    *  
    */
   
   
  function consultaTabelaFonte(){

      require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD();
    
    
    //COMANDO SQL PARA POSTGRE
	//$stmp ="SELECT * FROM \"FONT\"";
	
    //COMANDO SQL PARA MYSQL
	$stmp ="SELECT * FROM FONT ORDER BY DSC_FONT ASC";
	
	
	
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codFonte[]=$respostaSQL['CD_FONT'];
			$this->codTipoFonte=$respostaSQL['CD_TIP_FONT'];
		  	$this->nomeFonte[]=$respostaSQL['DSC_FONT'];
	    
	    }
  
		$conexaoBanco->disconnect;
		
   }

   
   
   /*
    * Método responsável por deletar as 
    * fontes, usando como parâmetro o 
    * código da Fonte
    */
   
   
   function deletarFonte($codFonte){
   
   		require_once '.conexaoBD.php';
	
	    $conexaoBanco = new conexaoBD();
	
    	
    	//código para o postgre
		//$stmp = "UPDATE \"RSS\" SET ";
		//$stmp .= "\"CD_FONT\" = '0' ";
		//$stmp .= ", \"DSC_FONT\" = 'SEM FONTE' ";
		//$stmp .= "WHERE \"CD_FONT\" = ".$codFonte."";
    	
    	//DELETA A FONTE DA TABELA RSS - código para o mysql
    	$stmp = "UPDATE RSS SET ";
		$stmp .= "CD_FONT = '0' ";
		$stmp .= ", DSC_FONT = 'SEM FONTE' ";
		$stmp .= "WHERE CD_FONT = ".$codFonte."";
    	
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
	
		
		//código para o postgre
		//$stmp1 = "UPDATE \"DOC\" SET ";
		//$stmp1 .= "\"CD_FONT\" = '0' ";
		//$stmp1 .= "WHERE \"CD_FONT\" = ".$codFonte."";
		
		
		//DELETA A FONTE DA TABELA DOC - código para o mysql 
		$stmp1 = "UPDATE DOC SET ";
		$stmp1 .= "CD_FONT = '0' ";
		$stmp1 .= "WHERE CD_FONT = ".$codFonte."";
    	
		$this->resultado=$conexaoBanco->executeQuery($stmp1);
		
		$conexaoBanco->disconnect;
	
		//código para o postgre
		//$stmp2 = "DELETE FROM \"FONT\" WHERE \"CD_FONT\" = ". $codFonte;
		
		//código para o mysql
		$stmp2 = "DELETE FROM FONT WHERE CD_FONT = ". $codFonte;
		
		$this->resultado=$conexaoBanco->executeQuery($stmp2);
		
		$conexaoBanco->disconnect;
		
   }
   
   /*
    * Método responsável por incluir uma Fonte na Tabela FONT.
    * Usa como parâmetros o código do Tipo da Fonte e
    * o nome da Fonte 
    */
   
   
   function incluirFonte($codTipoFonte, $nomeFonte){
   
   		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    
   //******************************* CONSULTA O MAIOR CODIGO DA ONTOLOGIA **********************************

		//COMANDO PARA POSTGRE
		//$sqlMaxOntologia = "SELECT MAX(\"CD_FONT\") AS maximo FROM \"FONT\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_FONT) AS maximo FROM FONT";
		 
		 
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codFonte=$respostaSQL['maximo'];
	    }
  		//LIBERA A CONEXÃO
		$conexaoBanco->disconnect; 
		 
		$this->codFonte = $this->codFonte + 1;

		$nome = strtoupper($nomeFonte);
		
	//******************************** INSERE ONTOLOGIA *****************************************************
	
	//COMANDO PARA POSTGRE
	//$stmp ="INSERT INTO \"FONT\" (\"CD_FONT\", \"CD_TIP_FONT\", \"DSC_FONT\" ) VALUES ('$this->codFonte', '$nome', '$descricao')";
	
	//COMANDO PARA MYSQL  
		$stmp ="INSERT INTO FONT (CD_FONT, CD_TIP_FONT, DSC_FONT ) VALUES ('$this->codFonte', '$codTipoFonte', '$nomeFonte')";
	 			
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
   }

   
   
   /*
    * Método responsável por altera uma Fonte.
    * Usa como parâmetro: o código da Fonte,
    * nome da Fonte, código do Tipo da Fonte
    */
   
   function alteraFonte($cdFonte, $nomeFonte, $codTipoFonte){
   
   		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
	
    	//código para o postgre
		//$stmp = "update \"FONT\" SET ";
		//$stmp .= "\"CD_TIP_FONT\" = '" .$codTipoFonte ."' ";
		//$stmp .= ", \"DSC_FONT\" = '". $nomeFonte ."'";
		//$stmp .= " WHERE \"CD_FONT\" = '". $cdFonte ."'";
    	
		
    	//DELETA A FONTE DA TABELA FONT - código para o mysql
    	$stmp = "update FONT SET ";
		$stmp .= "CD_TIP_FONT = '" .$codTipoFonte ."' ";
		$stmp .= ", DSC_FONT = '". $nomeFonte ."'";
		$stmp .= " WHERE CD_FONT = '". $cdFonte ."'";
    	
    	$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
   }
   
} 

?>