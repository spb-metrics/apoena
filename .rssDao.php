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
 
    Este programa está nomeado como .rssDao.php e possui 582
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
 * RSS.
 */

class RSS {

  var $codDocumento;  
  var $codFonte;
  var $nomeFonte;
  var $codTipoDocumento;
  var $nomeTipoDocumento;
  var $codTipoFonte;
  var $nomeTipoFonte;
  var $codigoRSS;
  var $enderecoRSS;
  var $descricaoTipo;
  var $mensagemRetorno;
  var $totalPaginas; 
  var $anterior;
  var $proximo;
  var $codRSS;
  var $status;
  
  
  /*
   * Método construtor da classe
   */
  

  function RSS(){
  
  	$this->codDocumento=array();  
  	$this->codFonte=array();
  	$this->nomeFonte=array();
  	$this->codTipoDocumento=array();
  	$this->nomeTipoDocumento=array();
  	$this->codTipoFonte=array();
  	$this->nomeTipoFonte=array();
  	$this->codigoRSS=array();
  	$this->enderecoRSS=array();
  	$this->descricaoTipo=array();
  	$this->status=array();
  
  	$this->mensagemRetorno="";
  	$this->totalPaginas=""; 
  	$this->anterior="";
  	$this->proximo="";
  	$this->codRSS;
  	
  	  	  
  }
  
  
  
  /*
   * Método responsável por consultar uma Fonte.
   * 
   * Retorna o objeto Fonte
   */
  
  
  function consultarFonte(){

     require_once '.conexaoBD.php';
	
	 $conexaoBanco = new conexaoBD();
    
    //COMANDO SQL PARA POSTGRE
	//$stmp ="SELECT * FROM \"FONT\"";
	
	//COMANDO SQL PARA MYSQL
	$stmp ="SELECT * FROM FONT ORDER BY DSC_FONT";
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){

			$this->codFonte[]=$respostaSQL['CD_FONT'];
		  	$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8",$respostaSQL['DSC_FONT']);

	    }
  
		$conexaoBanco->disconnect;  
	
  }	
  
  
  /*
   * Método responsável por consultar um Tipo da Fonte.
   * 
   * Retorna o objeto Tipo da Fonte
   */
  

  function consultarTipoFonte(){

     require_once '.conexaoBD.php';
	
	 $conexaoBanco = new conexaoBD();
    
    //COMANDO SQL PARA POSTGRE
	//$stmp ="SELECT * FROM \"TIP_FONT\"";
	
	//COMANDO SQL PARA MYSQL
	$stmp ="SELECT * FROM TIP_FONT ORDER BY NM_FONT";
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
			$this->codTipoFonte[]=$respostaSQL['CD_TIP_FONT'];
		  	$this->nomeTipoFonte[]=$respostaSQL['NM_FONT'];
		  	$this->descricaoTipo[]=$respostaSQL['DSC_TIP_FONT'];

	    }
  
		$conexaoBanco->disconnect; 
	
  }
  
  
  /*
   * Método responsável por consultar um Tipo de Documento.
   * 
   * Retorna o objeto Tipo de Documento
   */
  
  function consultarTipoDocumento(){

     require_once '.conexaoBD.php';
	
	 $conexaoBanco = new conexaoBD();
    
    //COMANDO SQL PARA POSTGRE
	//$stmp ="SELECT * FROM \"TIP_DOC\"";
	
	//COMANDO SQL PARA MYSQL
	$stmp ="SELECT * FROM TIP_DOC ORDER BY DSC_TIP";
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	   $this->codTipoDocumento[]=$respostaSQL['CD_TIP_DOC'];
	   $this->nomeTipoDocumento[]=$respostaSQL['DSC_TIP'];
	    
	}
  
	$conexaoBanco->disconnect;
	
  }
  
  
  /*
   * Método responsável por consultar um RSS, ordenado
   * pelo código do Tipo de Fonte
   * 
   * Retorna o objeto RSS
   */
  
  
  function consultarRSS(){

   require_once '.conexaoBD.php';
	
   $conexaoBanco = new conexaoBD();
 
    //COMANDO SQL PARA POSTGRE
	//$stmp = "SELECT * FROM RSS ORDER BY \"CD_TIP_FONT\", \"CD_FONT\", \"END_RSS\"";
	
	//COMANDO SQL PARA MYSQL
	
    $stmp = "SELECT * FROM RSS ORDER BY CD_TIP_FONT, CD_FONT, END_RSS";
	
	
	$consulta = $conexaoBanco->executeQuery($stmp);
  
	while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    $this->codigoRSS[]=$respostaSQL['CD_RSS'];
  		$this->enderecoRSS[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['END_RSS']);
    	$this->codTipoDocumento[]=$respostaSQL['CD_TIP_DOC'];
  		$this->nomeTipoDocumento[]= iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_TIP']);
  		$this->codFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CD_FONT']);
  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_FONT']);
  		$this->codTipoFonte[]=$respostaSQL['CD_TIP_FONT'];
  		$this->nomeTipoFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_TIP_FONT']);
  		$this->status[]=$respostaSQL['STS']; 
	    
	}
  
	$conexaoBanco->disconnect;
		    	
  }

  
  /*
   * Método responsável por consultar um RSS. 
   * 
   * Retorna o objeto RSS
   */
  
  function consultaRSS($cdRSS){

  	 require_once '.conexaoBD.php';
	
	 $conexaoBanco = new conexaoBD();
    
    	//COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT \"CD_TIP_DOC\", \"CD_FONT\", \"CD_TIP_FONT\" FROM \"RSS\" WHERE \"CD_RSS\" = " . $cdRSS;
			
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT CD_TIP_DOC, CD_FONT, CD_TIP_FONT, CD_RSS, END_RSS FROM RSS WHERE CD_RSS = " . $cdRSS;
	

	   $consulta = $conexaoBanco->executeQuery($stmp);
  
		while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    
		    $this->codigoRSS=$respostaSQL['CD_RSS'];
  			$this->enderecoRSS=$respostaSQL['END_RSS'];
    		$this->codTipoDocumento[]=$respostaSQL['CD_TIP_DOC'];
  			$this->codFonte[]=$respostaSQL['CD_FONT'];
  			$this->codTipoFonte[]=$respostaSQL['CD_TIP_FONT'];
		    
		}
	  
		$conexaoBanco->disconnect;
		
  }
  
  
    
  /*
   * Método responsável por incluir um rss na Tabela RSS.
   * 
   * Usa como parâmetros o codigo Fonte, nome Fonte, nome Tipo Fonte,
   * codigo Tipo Documento, nome Tipo Documento, nome RSS e Status 
   * 
   * Retorna o resultado da operação de Inclusão na Tabela RSS
   * 
   */
  
  
  function inserirRSS($codFonte, $nomeFonte, $codTipoFonte, $nomeTipoFonte, $codTipoDocumento, $nomeTipoDocumento, $nomeRSS, $status){

  	 require_once '.conexaoBD.php';
	
	 $conexaoBanco = new conexaoBD();
    
    
    //******************************* CONSULTA O MAIOR CODIGO DA ONTOLOGIA ************************	
    
    	//COMANDO PARA POSTGRE
		//$sqlMaxOntologia = "SELECT MAX(\"CD_RSS\") AS maximo FROM \"RSS\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_RSS) AS maximo FROM RSS";
		 
		$consulta = $conexaoBanco->executeQuery($stmp);
  
		while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    $this->codRSS = $respostaSQL['maximo'];
		    
		}
		//LIBERA CONEXÃO	  
		$conexaoBanco->disconnect;
		 
		$this->codRSS = $this->codRSS + 1;
    
    //*********************************************************************************************
    
	//*************************************INSERIR NA TABELA **************************************	
		
		//COMANDO SQL PARA POSTGRE
//		$stmp="INSERT INTO RSS (\"CD_RSS\", \"END_RSS\", \"CD_TIP_DOC\", \"DSC_TIP\", \"CD_FONT\", \"DSC_FONT\", \"CD_TIP_FONT\", \"NM_TIP_FONT\", \"STS\" ) VALUES (";
//    	$stmp.=" '".$this->codRSS."'";
//    	$stmp.=" ,'".$nomeRSS ."'";
//    	$stmp.=" ,'".$codTipoDocumento."'"; 
//    	$stmp.=" ,'".$nomeTipoDocumento."'"; 
//    	$stmp.=" ,'".$codFonte."'"; 
//    	$stmp.=" ,'".$nomeFonte."'";
//    	$stmp.=" ,'".$codTipoFonte."'";
//    	$stmp.=" ,'".$nomeTipoFonte."'";
//    	$stmp.=" ,'".$status."')
		
		
		//COMANDO SQL PARA MYSQL
		$stmp="INSERT INTO RSS (CD_RSS, END_RSS, CD_TIP_DOC, DSC_TIP, CD_FONT, DSC_FONT, CD_TIP_FONT, NM_TIP_FONT, STS ) VALUES (";
    	$stmp.=" ".$this->codRSS;
    	$stmp.=" ,'".$nomeRSS ."'";
    	$stmp.=" ,".$codTipoDocumento; 
    	$stmp.=" ,'".$nomeTipoDocumento."'"; 
    	$stmp.=" ,".$codFonte; 
    	$stmp.=" ,'".$nomeFonte."'";
    	$stmp.=" ,".$codTipoFonte;
    	$stmp.=" ,'".$nomeTipoFonte."'";
    	$stmp.=" ,".$status.")";
    	
    	$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
  }
  
  
  
  /*
   * Método responsável por consultar o nome da fonte
   * 
   * Usa como parâmetros o codigo Fonte 
   * 
   * Retorna o nome da Fonte
   */
  
  function consultarNomeFonte($codigoFonte){
	
	  require_once '.conexaoBD.php';
	
	  $conexaoBanco = new conexaoBD();
    
    	//COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT \"DSC_FONT\" FROM \"FONT\" WHERE \"CD_FONT\" = ".$codigoFonte;
	
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT DSC_FONT FROM FONT WHERE CD_FONT = ". $codigoFonte;
	
	
		$consulta = $conexaoBanco->executeQuery($stmp);
  
		while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    $this->nomeFonte[]=$respostaSQL['DSC_FONT'];
		}
	  
		$conexaoBanco->disconnect;
	
	}
	
	
	/*
   * Método responsável por consultar o nome do tipo da fonte
   * 
   * Usa como parâmetros o codigo tipo Fonte 
   * 
   * Retorna o nome do tipo da fonte
   * 
   */
	
	function consultarNomeTipoFonte($codigoTipoFonte){
	
		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    
    	//COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT \"NM_FONT\" FROM \"TIP_FONT\" WHERE \"CD_TIP_FONT\" = '$codigoTipoFonte'";
	
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT NM_FONT FROM TIP_FONT WHERE CD_TIP_FONT = ".$codigoTipoFonte;
	
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
		while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    $this->nomeFonte[]=$respostaSQL['NM_FONT'];
		}
	  
		$conexaoBanco->disconnect;	
	
		
	}
	
	/*
	 * Método responsável por consultar o nome do tipo de Documento
	 * 
	 * Usa como parâmetros o codigo do tipo de Documento 
	 * 
	 * Retorna o nome do tipo de Documento
	 * 
	 */
	
	function consultarNomeTipoDocumento($codigoTipoDocumento){
	
		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    
    	//COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT \"DSC_TIP\" FROM \"TIP_DOC\" WHERE \"CD_TIP_DOC\" = ".$codigoTipoDocumento;
	
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT DSC_TIP FROM TIP_DOC WHERE CD_TIP_DOC = ".$codigoTipoDocumento;
	
		
		$consulta = $conexaoBanco->executeQuery($stmp);
  
		while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    $this->nomeFonte[]=$respostaSQL['DSC_TIP'];
		}
	  
		$conexaoBanco->disconnect;	
			 
	}
	
	
	
	/*
	 * Método responsável o maior valor do codigo RSS na tabela RSS
	 * 
	 * Retorna o maior codigo RSS 
	 * 
	 */
	
	
	function consultarMaxRSS(){
	
		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    
    	//COMANDO SQL PARA POSTGRE
		//$stmp ="SELECT MAX(\"CD_RSS\") FROM \"RSS\"";
	
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT MAX(CD_RSS) FROM RSS ";
	
	
		$consulta = $conexaoBanco->executeQuery($stmp);
  
		while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    $this->codigoRSS[]=$respostaSQL[1];
		}
	  
		$conexaoBanco->disconnect;	
	
	}

	/*
	 * Método responsável atualizar o status da tabela RSS, 
	 * com o valor 0 
	 * 
	 * Retorna o resultado da operação de Update  
	 * 
	 */
	
	
	function resetTabelaRSS(){
	
		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
	
    	//código para o postgre
		//$stmp = "UPDATE \"RSS\" SET ";
		//$stmp .= "\"STS\" = 0 ";
		//$stmp .= "WHERE \"CD_RSS\" >= 0";
    	
    	//código para o mysql
    	$stmp = "UPDATE RSS SET ";
		$stmp .= "STS = 0 ";
		$stmp .= "WHERE CD_RSS >= 0";
    	
		$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
	}
	
	
	
	/*
	 * Método responsável atualizar o status da tabela RSS, 
	 * com o valor 0 
	 * 
	 * Retorna o resultado da operação de Update  
	 * 
	 */
	
	function mudarStatus($itens, $status){
	
		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
		
    	//código para o postgre
		//$stmp1 = "UPDATE \"RSS\" SET ";
		//$stmp1 .= "\"STS\" = ".$status;
		//$stmp1 .= " WHERE \"CD_RSS\" = ".$itens;
    	
    	//código para o mysql
		$stmp1 = "UPDATE RSS SET ";
		$stmp1 .= "STS = ".$status;
		$stmp1 .= " WHERE CD_RSS = ".$itens;
		
		$this->resultado=$conexaoBanco->executeQuery($stmp1);
		
		$conexaoBanco->disconnect;
		
	}
	
	
	/*
   	 * Método responsável por altualizar a tabela RSS
     * 
     * Usa como parâmetros o codigo RSS, endereço RSS, codigo Fonte, nome Fonte,
     * codigo Tipo Fonte, nome Tipo Fonte, codigo Tipo Documento, nome Tipo Documento
     * 
     * Retorna o resultado da operação de alteracao nas tabelas RSS  
     */
	
	function altualizarRSS($codigoRSS, $enderecoRSS, $arrFonte, $arrTipoFonte, $arrTipoDoc){
	
		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
		
    	//código para o postgre
		//$stmp1 = "UPDATE \"RSS\" SET ";
		//$stmp1 .= "\"END_RSS\" = '$enderecoRSS' ";
		//$stmp1 .= ", \"CD_TIP_DOC\" = ".$arrTipoDoc[0];
		//$stmp1 .= ", \"DSC_TIP\" = '".$arrTipoDoc[1]."'";
		//$stmp1 .= ", \"CD_FONT\" = ".$arrFonte[0];
		//$stmp1 .= ", \"DSC_FONT\" = '".$arrFonte[1]."'";
		//$stmp1 .= ", \"CD_TIP_FONT\" = ".$arrTipoFonte[0];
		//$stmp1 .= ", \"NM_TIP_FONT\" = '".$arrTipoFonte[1]."'";
		//$stmp1 .= " WHERE \"CD_RSS\" = ". $codigoRSS;
    	
    	
    	//código para o mysql
		$stmp1 = "UPDATE RSS SET ";
		$stmp1 .= "END_RSS = '$enderecoRSS' ";
		$stmp1 .= ", CD_TIP_DOC = ".$arrTipoDoc[0];
		$stmp1 .= ", DSC_TIP = '".$arrTipoDoc[1]."'";
		$stmp1 .= ", CD_FONT = ".$arrFonte[0];
		$stmp1 .= ", DSC_FONT = '".$arrFonte[1]."'";
		$stmp1 .= ", CD_TIP_FONT = ".$arrTipoFonte[0];
		$stmp1 .= ", NM_TIP_FONT = '".$arrTipoFonte[1]."'";
		$stmp1 .= " WHERE CD_RSS = ". $codigoRSS;
		
		$this->resultado=$conexaoBanco->executeQuery($stmp1);
		
		$conexaoBanco->disconnect;
	}

	
	/*
   	 * Método responsável por deletar a tabela RSS
     * 
     * Usa como parâmetros o codigo RSS
     * 
     * Retorna o resultado da operação de alteracao nas tabelas RSS  
     */
	
	
	function deletarRSS($codigoRSS){
	
		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    	
    	//código para postgre
    	//$stmp = "DELETE FROM \"RSS\" WHERE \"CD_RSS\" = ". $codigoRSS;

    	//código para o mysql
    	$stmp = "DELETE FROM RSS WHERE CD_RSS = ". $codigoRSS;
	
    	$this->resultado=$conexaoBanco->executeQuery($stmp);
		
		$conexaoBanco->disconnect;
	}
	
	
	/*
   	 * Método responsável por verficar se os endereço 
   	 * já está registrado na tabela RSS
   	 * 
     * Retorna o codigo RSS caso o endereço esteja cadastrado 
     * na tabela RSS  
     */
	
	
	function verificaNomeRSS($nome){
	
		require_once '.conexaoBD.php';
	
	  	$conexaoBanco = new conexaoBD();
    	
    	//código para o postgre
    	//$stmp = "SELECT \"CD_RSS\" FROM \"RSS\" WHERE \"END_RSS\" = '". trim($nome) . "'";
    	
		//código para o mysql	
    	$stmp = "SELECT CD_RSS FROM RSS WHERE END_RSS = '". trim($nome) . "'";
	
		$consulta = $conexaoBanco->executeQuery($stmp);
  
		while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    $this->codigoRSS[]=$respostaSQL['CD_RSS'];
		}
	  
		$conexaoBanco->disconnect;
	
	}
	
} 
?>