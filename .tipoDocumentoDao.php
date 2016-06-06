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
 
    Este programa está nomeado como .tipoDocumentoDao.php e possui 270
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
 * Tipo Documento.
 */

class TipoDocumento {

  var $codTipoDocumento;
  var $descricaoTipoDocumento;
  
  var $mensagemRetorno;
  var $totalPaginas; 
  var $anterior;
  var $proximo;
  var $total;
  
  
  /*
   * Método  construtor da classe
   */

  function TipoDocumento(){
  
  	$this->codTipoFonte=array();
  	$this->descricaoTipoDocumento=array();
  
  	$this->mensagemRetorno="";
  	$this->totalPaginas=""; 
  	$this->anterior="";
  	$this->proximo="";
  	$this->total="";
  }
  
  
  /*
   * Método responsável por consultar um tipo de Documento
   * de acordo com o codigo do tipo de Documento
   * 
   * Usa como parâmetro o codigo do Tipo de Documento
   * 
   * Retorna o objeto Tipo de Documento
   */
  
  function consultarTipoDocumento($cdTipDoc){

    require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //COMANDO SQL PARA POSTGRE
	//$stmp ="SELECT * FROM \"TIP_DOC\" WHERE \"CD_TIP_DOC\" = " . $cdTipDoc;
	
	//COMANDO SQL PARA MYSQL
	$stmp ="SELECT * FROM TIP_DOC WHERE CD_TIP_DOC = " . $cdTipDoc;
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codTipoDocumento[]=$respostaSQL['CD_TIP_DOC'];
			$this->descricaoTipoDocumento[]=$respostaSQL['DSC_TIP'];    	
	    }
  
		$conexaoBanco->disconnect; 
	
  }

  
  /*
   * Método responsável por consultar um tipo de Documento
   * de acordo com o codigo do tipo de Documento
   * 
   * Usa como parâmetro o codigo do Tipo de Documento
   * 
   * Retorna o objeto Tipo de Documento
   */
  
  function consultaTipoDocumento(){

    require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    //COMANDO SQL PARA POSTGRE
	//$stmp ="SELECT * FROM \"TIP_DOC\" ORDER BY \"DSC_TIP\"";
	
	//COMANDO SQL PARA MYSQL
	$stmp ="SELECT * FROM TIP_DOC ORDER BY DSC_TIP";
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codTipoDocumento[]=$respostaSQL['CD_TIP_DOC'];
	    	$this->descricaoTipoDocumento[]=$respostaSQL['DSC_TIP'];
	    }
  
		$conexaoBanco->disconnect; 
	
   }
  
  
  /*
   * Método responsável por deletar da tabela TIP_DOC
   * de acordo com o codigo do tipo de Documento
   * 
   * Atualiza as tabela RSS e DOC de acordo com o codigo do tipo de Documento 
   * 
   * Usa como parâmetro o codigo do Tipo de Documento
   * 
   * Retorna o resultado da deleção da tabela TIP_DOC
   */
  
  
  function deletarFonte($codTipoDocumento){
  
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    	
    	//ATUALIZA A FONTE DA TABELA RSS - código para o postgre
		//$stmp = "UPDATE \"RSS\" SET ";
		//$stmp .= "\"CD_TIP_DOC\" = '0' ";
		//$stmp .= "WHERE \"CD_TIP_DOC\" = ".$codTipoDocumento;
    
    
	    //ATUALIZA A FONTE DA TABELA RSS - código para o mysql
	    $stmp = "UPDATE RSS SET ";
		$stmp .= "CD_TIP_DOC = '0' ";
		$stmp .= "WHERE CD_TIP_DOC = ".$codTipoDocumento;
	    
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
	
		
		//ATUALIZA A FONTE DA TABELA DOC - código para o postgre 
		//$stmp1 = "UPDATE \"DOC\" SET ";
		//$stmp1 .= "\"CD_TIP_DOC\" = '0' ";
		//$stmp1 .= "WHERE \"CD_TIP_DOC\" = ".$codTipoDocumento;
		
		
		//ATUALIZA A FONTE DA TABELA DOC - código para o mysql 
		$stmp1 = "UPDATE DOC SET ";
		$stmp1 .= "CD_TIP_DOC = '0' ";
		$stmp1 .= "WHERE CD_TIP_DOC = ".$codTipoDocumento;
	    
		$this->resultado=$conexaoBanco->executeQuery($stmp1);
		
		$conexaoBanco->disconnect;
	    
	    
	    //COMANDO SQL PARA POSTGRE
		//$stmp2 ="DELETE FROM \"TIP_DOC\" WHERE \"CD_TIP_DOC\" = " .$codTipoDocumento;
		
		//COMANDO SQL PARA MYSQL
		$stmp2 ="DELETE FROM TIP_DOC WHERE CD_TIP_DOC = ".$codTipoDocumento;
		
	    $this->resultado=$conexaoBanco->executeQuery($stmp2);
		
		$conexaoBanco->disconnect;
	    
  }
  
  
  /* 
   * Método responsável por incluir um tipo de Documento na Tabela TIP_DOC.
   * 
   * Usa como parâmetros o Nome do Tipo de Documento 
   * 
   * Retorna o resultado da operação de Inclusão na Tabela TIP_DOC
   */
  
  
  function incluirTipoDocumento($nomeTipoDocumento){
  
  	  require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD();
    
   //******************************* CONSULTA O MAIOR CODIGO DA ONTOLOGIA **********************************

		//COMANDO PARA POSTGRE
		//$stmp = "SELECT MAX(\"CD_TIP_DOC\") AS maximo FROM \"TIP_DOC\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_TIP_DOC) AS maximo FROM TIP_DOC";
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codTipoDocumento = $respostaSQL['maximo'];
	    }
	
		//LIBERA CONEXÃO  
		$conexaoBanco->disconnect; 
		
		
		$this->codTipoDocumento = $this->codTipoDocumento + 1;

		$nome = strtoupper($nomeTipoDocumento);
		
		
	//******************************** INSERE ONTOLOGIA *****************************************************
	
	//COMANDO PARA POSTGRE
	//$stmp ="INSERT INTO \"TIP_DOC\" (\"CD_TIP_DOC\", \"DSC_TIP\" ) VALUES ('$this->codTipoDocumento', '$nome')";
	
	//COMANDO PARA MYSQL  
	    $stmp ="INSERT INTO TIP_DOC (CD_TIP_DOC, DSC_TIP ) VALUES ('$this->codTipoDocumento', '$nome')";

	    $this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
  
  }
  
  
 	/*
  	 * Método responsável por altualizar a tabela TIP_DOC
     * 
     * Usa como parâmetros o codigo do tipo de Documento, nome do Tipo de Documento
     * 
     * Retorna o resultado da operação de alteracao na tabela TIP_DOC  
     */
  
  
  function alteraTipoDocumento($codTipoDocumento, $nomeTipoDocumento){
  
  	  require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD();
    
    	//COLOCAR O NOME EM CAIXA ALTA
    	$nome = strtoupper($nomeTipoDocumento);

    	
    	//ATUALIZA A FONTE DA TABELA TIP_DOC - código para o postgre
	    //$stmp = "UPDATE \"TIP_DOC\" SET ";
		//$stmp .= "\"CD_TIP_DOC\" = ".$codTipoDocumento;
		//$stmp .= ", \"DSC_TIP\" = '".$nome."'";
		//$stmp .= " WHERE \"CD_TIP_DOC\" = ".$codTipoDocumento;
    	
    	
    	//ATUALIZA A FONTE DA TABELA TIP_DOC
	    $stmp = "UPDATE TIP_DOC SET ";
		$stmp .= "CD_TIP_DOC = ".$codTipoDocumento;
		$stmp .= ", DSC_TIP = '".$nome."'";
		$stmp .= " WHERE CD_TIP_DOC = ".$codTipoDocumento;
	    
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
  }
  
} 

?>