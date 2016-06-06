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
 
    Este programa está nomeado como .documentoDao.php e possui 1327
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

/**
* Created on 01/01/2008
*
* Classe realizar todas as operações  
* de consulta a base no que se refere 
* ao objeto documento
* 
* @author J.Marcelo (j.mar.rap@gmail.com)
* @version 1.0.0
*
*/


class Documento {

  var $codDocumento;  
  var $codFonte;
  var $codTipoDocumento;  
  var $titulo;
  var $conteudo;
  var $endereco;
  var $dataAtualizacao;
  var $horaAtualizacao;
  var $dataAtSistema;
  var $horaAtSistema;
  var $mensagemRetorno;
  var $nomeFonte;
  var $totalPaginas; 
  var $anterior;
  var $proximo;
  var $codTipFont;
  var $nomeTipoFonte;
  var $codigoClipping;
  var $cdClippingArquivo;
  var $nomeClipping;
  var $arquivo;
  var $codigoOntologia;
  var $nomeOnt;
  
  
  	/**
	*Método construtor da classe 
	*/

  function Documento(){
  
	 $this->codDocumento=array();		 
	 $this->codFonte=array();
	 $this->codTipoDocumento=array();		 
	 $this->titulo=array();
	 $this->conteudo=array();
	 $this->endereco=array();  	
  	 $this->dataAtualizacao=array();  	
     $this->horaAtualizacao=array();
  	 $this->dataAtSistema=array();
  	 $this->horaAtSistema=array();
  	 $this->nomeFonte=array();
  	 $this->codTipFont=array();
  	 $this->totalPaginas=""; 
  	 $this->anterior="";
  	 $this->proximo="";
  	 $this->nomeTipoFonte=array();
  	 $this->cdClippingArquivo=array();
  	 $this->nomeClipping=array();
  	 $this->codigoOntologia=array();
  	 $this->codigoClipping="";
  	 $this->arquivo="";
  	 $this->nomeOnt="";
  	   	  
  }
  
  
  
   /**
	* Método responsável por consultar a tabela DOC
	* de acordo com as palavras e o numero da página recebidos como parâmetros
	* 
	* Possui também um versão do código SQL para O SGBD  Postgre
	* 
	* Usa como parâmetro a palavra e numero da pagina
	* 
	* @return  o objeto Documento, o total de pagina, o numero da pagina 
	* 		   e o total registro consultados 
	*/
  
  function consultarDocumentoPalavra($termo1, $termo2, $termo3, $termo4, $termo5, $termo6, $termo7, $termo8, $termo9, $termo10, $pagina){

    require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
    
    $t1  = strtoupper($termo1);
    $t2  = strtoupper($termo2);
    $t3  = strtoupper($termo3);
    $t4  = strtoupper($termo4);
    $t5  = strtoupper($termo5);
    $t6  = strtoupper($termo6);
    $t7  = strtoupper($termo7);
    $t8  = strtoupper($termo8);
    $t9  = strtoupper($termo9);
	$t10 = strtoupper($termo10);    

	
	$total_reg = "50"; // número de registros por página
	
	if (!$pagina) {
	    $pc = "1";
	} else {
	    $pc = $pagina;
	}
	
	$inicio = $pc - 1;
	$inicio = $inicio * $total_reg;	
	
	
	//COMANDO SQL PARA POSTGRE
//  $stmp ="SELECT SUM(T1.\"QUANT_PLV\") as TOTAL , T2.\"CD_DOC\", DATE_FORMAT(T2.\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data, T2.\"CNTD\", T2.\"END_DOC\", T3.\"DSC_FONT\"".
//    	   " FROM \"DOC_FORMT\" T1, \"DOC\" T2, \"FONT\" T3".
//    	   " WHERE \"PLV\" IN ('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9','$t10')".
//		   " AND T2.\"CD_DOC\" = T1.\"CD_DOC\"" .
//		   " AND T2.\"CD_FONT\" = T3.\"CD_FONT\"".
//		   " GROUP BY T2.\"CD_DOC\", T2.\"TTL\", T2.\"CNTD\", T2.\"END_DOC\"".
//		   " ORDER BY TOTAL DESC, T2.\"DT_ATL\"";

	
	//COMANDO SQL PARA MYSQL
	$stmp ="SELECT SUM(T1.QUANT_PLV) as TOTAL , T2.CD_DOC, T2.TTL, T2.CNTD, T2.END_DOC, DATE_FORMAT(T2.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T3.DSC_FONT".
    	   " FROM DOC_FORMT T1, DOC T2, FONT T3".
    	   " WHERE PLV IN ('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9','$t10')" .
    	   " AND T2.CD_DOC = T1.CD_DOC".
    	   " AND T2.CD_FONT = T3.CD_FONT".
		   " GROUP BY T2.CD_DOC, T2.TTL, T2.CNTD, T2.END_DOC ".
		   " ORDER BY T1.DT_ATL DESC ";
	
	 	$limite = " LIMIT ";


		$consulta = $conexaoBanco->executeQuery($stmp . $limite . $inicio . "," . $total_reg);

		//para obter o total de registros da consulta SQL
		$totalRegistros = $conexaoBanco->executeQuery($stmp); 
		$this->total = mysql_num_rows($totalRegistros);	
		
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codDocumento[]=$respostaSQL['CD_DOC'];
	  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['TTL']);
	  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD']);
	  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['END_DOC']);
	  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_FONT']);
	  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['data']);
	    
	    }
	
		$conexaoBanco->disconnect; 
		
		
		$totalArquivo = $pagina * $total_reg;
		
		if($totalArquivo < $this->total){
		
			$this->totalPaginas = $this->total / $total_reg + 1;
		}else{
			
			$this->totalPaginas = $this->total / $total_reg;
		}      
				    
		$this->anterior = $pc -1;
		$this->proximo = $pc +1;
		    
  }
  
  

   /**
	* Método responsável por consultar a tabela DOC
	* de acordo com as palavras e o numero da página recebidos como parâmetros
	* 
	* Possui também um versão do código SQL para O SGBD  Postgre
	* 
	* Usa como parâmetro a palavra e numero da pagina
	* 
	* @return  o objeto Documento, o total de pagina, o numero da pagina 
	* 		   e o total registro consultados 
	*/

  
  function consultarDocumento(){

    require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();

    
    //código para o postgre
	//$stmp="SELECT * FROM \"DOC\"";

    
    //código para o mysql
    $stmp="SELECT * FROM DOC";
    
	 if (!empty($valor[0])){
          $stmp .=" and codDocumento =$valor[0]";
    }

    if (!empty($valor[1])){
          $stmp .=" and codFonte =$valor[1]";
    }

    if (!empty($valor[2])){
          $stmp .=" and codTipoDocumento =$valor[2]";
    }

    if (!empty($valor[3])){
          $stmp .=" and titulo =$valor[3]";
    } 

    if (!empty($valor[4])){
          $stmp .=" and conteudo =$valor[4]";
    }

    if (!empty($valor[5])){
          $stmp .=" and endereco =$valor[5]";
    }

	 if (!empty($valor[6])){
          $stmp .=" and DATE_FORMAT('". $valor[6] ."', GET_FORMAT( TIME, 'EUR'))";
     }

    
    
     $consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codDocumento[]=$respostaSQL['CD_DOC'];  
	  	 	$this->codFonte[]=$respostaSQL[ 'CD_FONT'];
		    $this->codTipoDocumento[]=$respostaSQL['CD_TIP_DOC'];
		 	$this->titulo[]=$respostaSQL['TTL'];
		 	$this->conteudo[]=$respostaSQL['CNTD'];
		 	$this->endereco[]=$respostaSQL['END_DOC'];
			$this->dataAtualizacao[]=$respostaSQL['DT_ATL'];
			$this->horaAtualizacao[]=$respostaSQL['HR_ATL'];
			$this->dataAtSistema[]=$respostaSQL['DT_ATL_STS'];		 	 	 
			$this->horaAtSistema[]=$respostaSQL['HR_ATL_STS'];
	    
	    }
	
		$conexaoBanco->disconnect; 
    
  }


	/**
	* Método responsável consulta a tabela CLIP
	* de acordo com o codigo da Ontologia, data, hora e numero da pagina
	* 
	* Possui também um versão do código SQL para O SGBD  Postgre
	* 
	* Usa como parâmentro o código da Ontologia, a data, a hora e a página  
	* 
	* @return o objeto Documento, o total de pagina, o numero da pagina 
	* 		  e o total de registro consultados  
	*/

 function consultarClipping($codigoOntologia, $data, $hora, $pagina){ 	

 	 require_once '.conexaoBD.php';
	
	 $conexaoBanco = new conexaoBD();

    
    //formata o parâmetro data
 	if($data != ""){

 		$arrData = explode('.',$data);
		
    	$arrData[0] +=0;
    	$arrData[1] +=0;
    	$arrData[2] +=0;
    
	    $data = $arrData[0] .".". $arrData[1] .".". $arrData[2];
     }
	 	
    //formata o parâmetro hora
    if($hora != ""){
	  
 		$arrHora = explode(':',$hora);
		
    	$arrHora[0] +=0;
    	$arrHora[1] +=0;
    	$arrHora[2] +=0;
    
	    $hora = $arrHora[0] .":". $arrHora[1] .":". $arrHora[2];
     } 

     
    $total_reg = "20"; // número de registros por página
		
	if (!$pagina) {
	    $pc = "1";
	} else {
	    $pc = $pagina;
	}
	
	$inicio = $pc - 1;
	$inicio = $inicio * $total_reg;
    
	//codigo para o postgre
//  if($codigoOntologia != "" && $data == "" && $hora == ""){
//		$stmp="SELECT \"CD_DOC\" FROM \"CLIP\" WHERE \"CD_ONT\" = ".$codigoOntologia;
//	}else if ($codigoOntologia != "" && $data != ""){
//		$stmp="SELECT \"CD_DOC\" FROM \"CLIP\" WHERE \"CD_ONT\" = ".$codigoOntologia ." AND \"DT_ATL\" = " . $data;
//	}else if ($codigoOntologia != "" && $data != "" && $hora !=  ""){
//		$stmp="SELECT \"CD_DOC\" FROM \"CLIP\" WHERE \"CD_ONT\" = ".$codigoOntologia ." AND \"DT_ATL\" = " . $data . " AND \"HR_ATL\" = " . $hora;
//	}else if ($codigoOntologia != "" && $hora != ""){
//		$stmp="SELECT CD_DOC FROM CLIP WHERE \"CD_ONT\" = ".$codigoOntologia ." AND \"HR_ATL\" = " . $hora;
//	}
	
	//codigo para o mysql
	if($codigoOntologia != "" && $data == "" && $hora == ""){

		$stmp="SELECT CD_DOC FROM CLIP WHERE CD_ONT = ".$codigoOntologia;
	}else if ($codigoOntologia != "" && $data != "" && $hora == ""){
			
		$stmp="SELECT CD_DOC FROM CLIP WHERE CD_ONT = ".$codigoOntologia ." AND  DATE_FORMAT('". $data ."', GET_FORMAT( DATE, 'EUR'))";
	}else if ($codigoOntologia != "" && $data != "" && $hora !=  ""){
	
		$stmp="SELECT CD_DOC FROM CLIP WHERE CD_ONT = ".$codigoOntologia ." AND DATE_FORMAT('". $data ."', GET_FORMAT( DATE, 'EUR')) AND DATE_FORMAT('".$hora."', GET_FORMAT( TIME, 'EUR'))";
	}else if ($codigoOntologia != "" && $hora != ""){
	
		$stmp="SELECT CD_DOC FROM CLIP WHERE CD_ONT = ".$codigoOntologia ." AND DATE_FORMAT('". $hora ."', GET_FORMAT( TIME, 'EUR'))";
	}
	
	
	$limite = " LIMIT "; 
    
	//código para o postgre 
	//$order  = " ORDER BY \"DT_ATL\" DESC ";
	
	
	//código para o mysql 
    $order  = " ORDER BY DT_ATL DESC ";
    
    
     $consulta = $conexaoBanco->executeQuery($stmp .$grupo . $order.  $limite . $inicio . "," . $total_reg);

	 //para obter o total de registros da consulta SQL
	 $totalRegistros = $conexaoBanco->executeQuery($stmp); 
	 $this->total = mysql_num_rows($totalRegistros);	

     
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
			$this->codDocumento[]=$respostaSQL['CD_DOC'];
	    }
  
		$conexaoBanco->disconnect;   
    
	  	
		for($i=0; $i<sizeof($this->codDocumento); $i++) {
		
			if($this->codDocumento[$i] != "" ){
			
			
				//código para o postgre
//				$query ="SELECT T1.\"DSC_FONT\", T2.\"TTL\", T2.\"CNTD\", T2.\"END_DOC\", DATE_FORMAT(T2.\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data, T3.\"NM_FONT\" FROM \"FONT\" T1, \"DOC\" T2, \"TIP_FONT\" T3 ".
//	    	   			" WHERE T2.\"CD_DOC\" = ". $this->codDocumento[$i] .
//	    	   			" AND T1.\"CD_FONT\" = T2.\"CD_FONT\"" .
//	    	   			" AND T3.\"CD_TIP_FONT\" = T2.\"CD_TIP_FONT\"";	
			
			
				//código para o mysql
				$query ="SELECT T1.DSC_FONT, T2.TTL, T2.CNTD, T2.END_DOC, DATE_FORMAT(T2.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T3.NM_FONT FROM FONT T1, DOC T2, TIP_FONT T3 ".
	    	   			" WHERE T2.CD_DOC = ". $this->codDocumento[$i] .
	    	   			" AND T1.CD_FONT = T2.CD_FONT" .
	    	   			" AND T3.CD_TIP_FONT = T2.CD_TIP_FONT";
	    	   	
	    	   	$consulta = $conexaoBanco->executeQuery($query);
		
  
	    		while ($respostaSQL = mysql_fetch_array($consulta)){
	    
					$this->codDocumento[]=$respostaSQL['CD_DOC'];
					$this->codFonte[]=$respostaSQL[ 'CD_FONT'];
				    $this->codTipoDocumento[]=$respostaSQL['CD_TIP_DOC'];
				    $this->titulo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['TTL']);
				 	$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD']);
				 	$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['END_DOC']);
				 	$this->dataAtualizacao[]=$respostaSQL['data'];
					$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_FONT']);
					$this->nomeTipoFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_FONT']);
					
			    }
  
				$conexaoBanco->disconnect;
	    	   	
			}
		}
		
		
		$totalArquivo = $pagina * $total_reg;
		
		if($totalArquivo < $this->total){
		
			$this->totalPaginas = $this->total / $total_reg + 1;
		}else{
			
			$this->totalPaginas = $this->total / $total_reg;
		}
		 
		$this->anterior = $pc -1;
		$this->proximo = $pc +1;
		
 }

 	/**
	* Método responsável consulta a tabela DOC
	* de acordo com o codigo do tipo da fonte e o numero da pagina
	* 
	* Possui também um versão do código SQL para O SGBD  Postgre
	* 
	* Usa como parâmentro o código do tipo da fonte e numero da pagina  
	* 
	* @return o objeto Documento, o total de pagina, o numero da pagina 
	* 		  e o total de registro consultados  
	*/
 
  function consultarDocumentoFonte($codigo, $pagina){
  		
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
    	
    	
    	$total_reg = "10"; // número de registros por página
		
		if (!$pagina) {
		    $pc = "1";
		} else {
		    $pc = $pagina;
		}
		$inicio = $pc - 1;
		$inicio = $inicio * $total_reg;
    	
    	
    	//COMANDO SQL PARA POSTGRE
//		$stmp ="SELECT T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\", DATE_FORMAT(T1.\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data, T2.\"DSC_FONT\""" .
//			   " FROM \"DOC\" T1, \"FONT\" T2" .
//			   " WHERE T1.\"CD_TIP_FONT\" = ".$codigo .
//			   " AND T1.\"CD_FONT\" = T2.\"CD_FONT\"". 
//			   " ORDER BY T1.\"DT_ATL\" DESC ";

    	
    	//COMANDO SQL PARA MYSQL
		$stmp ="SELECT T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC, DATE_FORMAT(T1.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T2.DSC_FONT" .
			   " FROM DOC T1, FONT T2" .
			   " WHERE T1.CD_TIP_FONT = ".$codigo .
			   " AND T1.CD_FONT = T2.CD_FONT". 
			   " ORDER BY T1.DT_ATL DESC ";
		
		$limite = " LIMIT ";
	
	
		$consulta = $conexaoBanco->executeQuery($stmp . $limite . $inicio . "," . $total_reg);

		//para obter o total de registros da consulta SQL
		$totalRegistros = $conexaoBanco->executeQuery($stmp); 
		$this->total = mysql_num_rows($totalRegistros);

  
	    	while ($respostaSQL = mysql_fetch_array($consulta)){
	    
				$this->codDocumento[]=$respostaSQL['CD_DOC'];
		  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['TTL']);
		  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD']);
		  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['END_DOC']);
		  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_FONT']);
		  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['data']);
				
			}
  
			$conexaoBanco->disconnect;
	
		    
			$totalArquivo = $pagina * $total_reg;
			
			if($totalArquivo < $this->total){
			
				$this->totalPaginas = $this->total / $total_reg + 1;
			}else{
				
				$this->totalPaginas = $this->total / $total_reg;
			}
			 
			$this->anterior = $pc -1;
			$this->proximo = $pc +1;
		    
  }	

  
  
  	/**
	* Método responsável consulta a tabela DOC
	* de acordo com o codigo  da fonte e o numero da pagina
	* 
	* Possui também um versão do código SQL para O SGBD  Postgre
	* 
	* Usa como parâmentro o código da fonte e numero da pagina  
	* 
	* @return o objeto Documento, o total de pagina, o numero da pagina 
	* 		  e o total de registro consultados  
	*/
  
  
	function consultarDocumentoPorFonte($codigo, $pagina){
  		
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
    	
    	
    	$total_reg = "10"; // número de registros por página
		
		if (!$pagina) {
		    $pc = "1";
		} else {
		    $pc = $pagina;
		}
		$inicio = $pc - 1;
		$inicio = $inicio * $total_reg;
    	
    	
    	//COMANDO SQL PARA POSTGRE
//		$stmp ="SELECT T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\", DATE_FORMAT(T1.\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data, T2.\"DSC_FONT\"" .
//			   " FROM DOC T1, FONT T2" .
//			   " WHERE T1.CD_FONT = ".$codigo .
//			   " AND T2.CD_FONT = " .$codigo .
//			   " ORDER BY T1.DT_ATL DESC ";
    	
		
    	//COMANDO SQL PARA MYSQL
		$stmp ="SELECT T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC, DATE_FORMAT(T1.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T2.DSC_FONT" .
			   " FROM DOC T1, FONT T2" .
			   " WHERE T1.CD_FONT = ".$codigo .
			   " AND T2.CD_FONT = " .$codigo .
			   " ORDER BY T1.DT_ATL DESC ";	 
		
		$limite = " LIMIT ";
		
		
		$consulta = $conexaoBanco->executeQuery($stmp . $limite . $inicio . "," . $total_reg);

		//para obter o total de registros da consulta SQL
		$totalRegistros = $conexaoBanco->executeQuery($stmp); 
		$this->total = mysql_num_rows($totalRegistros);			  
		
	    	while ($respostaSQL = mysql_fetch_array($consulta)){
	    
				$this->codDocumento[]=$respostaSQL['CD_DOC'];
		  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['TTL']);
		  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD']);
		  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['END_DOC']);
		  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_FONT']);
		  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['data']);
				
			}
		
		$conexaoBanco->disconnect;
		
		$totalArquivo = $pagina * $total_reg;
		
		if($totalArquivo < $this->total){
		
			$this->totalPaginas = $this->total / $total_reg + 1;
		}else{
			
			$this->totalPaginas = $this->total / $total_reg;
		}
		 
		$this->anterior = $pc -1;
		$this->proximo = $pc +1;
		    
  }

  
  	/**
	* Método responsável consulta a tabela DOC
	* de acordo com o codigo da Fonte , palavra e numero da pagina
	* 
	* Possui também um versão do código SQL para O SGBD  Postgre
	* 
	* Usa como parâmentro codigo da Fonte , palavra e numero da pagina  
	* 
	* @return o objeto Documento, o total de pagina, o numero da pagina 
	* 		  e o total de registro consultados  
	*/
  
  function consultarDocFonte($codigoFonte, $codigoTipoFonte, $plv1, $plvr2, $plvr3, $plvr4, $plvr5, $plvr6, $plvr7, $plvr8, $plvr9, $plvr10, $pagina){
  		
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
	
	
	if($plv1 == ".|||."){
		$plv1 ="";	
	}
	
	$tm1  = strtoupper($plv1);
    $tm2  = strtoupper($plv2);
    $tm3  = strtoupper($plv3);
    $tm4  = strtoupper($plv4);
    $tm5  = strtoupper($plv5);
    $tm6  = strtoupper($plv6);
    $tm7  = strtoupper($plv7);
    $tm8  = strtoupper($plv8);
    $tm9  = strtoupper($plv9);
	$tm10 = strtoupper($plv10);
	
	$total_reg = "10"; // número de registros por página
	
	if (!$pagina) {
	    $pc = "1";
	} else {
	    $pc = $pagina;
	}
	$inicio = $pc - 1;
	$inicio = $inicio * $total_reg;
	
	
	//COMANDO SQL PARA POSTGRE
//				if($codigoFonte != "" && $codigoTipoFonte != ""){
//					
//					$stmp = "SELECT T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\", DATE_FORMAT(T1.\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data, T3.\"DSC_FONT\"" .
//							" FROM \"DOC\" T1 , \"DOC_FORMT\" T2 , \"FONT\" T3" .
//							" WHERE T1.\"CD_FONT\" = ".$codigoFonte .
//							" AND T1.\"CD_TIP_FONT\" = ". $codigoTipoFonte;
//							
//							if($tm1 != "" || $tm2 != "" || $tm3 != "" || $tm4 != "" || $tm5 != "" || $tm6 != "" || $tm7 != "" || $tm8 != "" || $tm9 != "" || $tm10 != ""){
//								$stmp .= " AND T2.\"PLV\" IN ('$tm1', '$tm2', '$tm3', '$tm4', '$tm5', '$tm6', '$tm7', '$tm8', '$tm9 ', '$tm10')"; 									
//							}
//															
//							$stmp .=" AND T1.\"CD_DOC\" = T2.\"CD_DOC\"" .
//							" AND T1.\"CD_FONT\" = T3.\"CD_FONT\"" .
//							" GROUP BY T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\" " .
//							" ORDER BY T1.\"DT_ATL\" DESC "; 
//					
//				}else if ($codigoTipoFonte != ""){
//					
//					$stmp = "SELECT T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\", DATE_FORMAT(T1.\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data, T3.\"DSC_FONT\"" .
//							" FROM \"DOC\" T1 , \"DOC_FORMT\" T2 , \"FONT\" T3" .				
//							" WHERE T1.\"CD_TIP_FONT\" = " .$codigoTipoFonte .
//							" AND T2.\"PLV\" IN ('$tm1', '$tm2', '$tm3', '$tm4', '$tm5', '$tm6', '$tm7', '$tm8', '$tm9 ', '$tm10')" .
//						    " AND T1.\"CD_DOC\" = T2.\"CD_DOC\"" .
//							" AND T1.\"CD_FONT\" = T3.\"CD_FONT\"" .
//							" GROUP BY T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\" " .
//							" ORDER BY T1.\"DT_ATL\" DESC ";
//				}
	
		//COMANDO SQL PARA MYSQL
		
				
				if($codigoFonte != "" && $codigoTipoFonte != ""){
					
					$stmp = "SELECT T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC, DATE_FORMAT(T1.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T3.DSC_FONT" .
							" FROM DOC T1 , DOC_FORMT T2 , FONT T3" .
							" WHERE T1.CD_FONT = ".$codigoFonte .
							" AND T1.CD_TIP_FONT = ". $codigoTipoFonte;
							
							if($tm1 != "" || $tm2 != "" || $tm3 != "" || $tm4 != "" || $tm5 != "" || $tm6 != "" || $tm7 != "" || $tm8 != "" || $tm9 != "" || $tm10 != ""){
								$stmp .= " AND T2.PLV IN ('$tm1', '$tm2', '$tm3', '$tm4', '$tm5', '$tm6', '$tm7', '$tm8', '$tm9 ', '$tm10')"; 									
							}
															
							$stmp .=" AND T1.CD_DOC = T2.CD_DOC" .
							" AND T1.CD_FONT = T3.CD_FONT" .
							" GROUP BY T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC " .
							" ORDER BY T1.DT_ATL DESC "; 
					
				}else if ($codigoTipoFonte != ""){
					
					$stmp = "SELECT T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC, DATE_FORMAT(T1.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T3.DSC_FONT" .
							" FROM DOC T1 , DOC_FORMT T2 , FONT T3" .				
							" WHERE T1.CD_TIP_FONT = " .$codigoTipoFonte .
							" AND T2.PLV IN ('$tm1', '$tm2', '$tm3', '$tm4', '$tm5', '$tm6', '$tm7', '$tm8', '$tm9 ', '$tm10')" .
						    " AND T1.CD_DOC = T2.CD_DOC" .
							" AND T1.CD_FONT = T3.CD_FONT" .
							" GROUP BY T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC " .
							" ORDER BY T1.DT_ATL DESC ";
				
				}
				
		$limite = " LIMIT ";
		
		
		
		$consulta = $conexaoBanco->executeQuery($stmp . $limite . $inicio . "," . $total_reg);

		//para obter o total de registros da consulta SQL
		$totalRegistros = $conexaoBanco->executeQuery($stmp); 
		$this->total = mysql_num_rows($totalRegistros);			    
			    
		
	    	while ($respostaSQL = mysql_fetch_array($consulta)){
	    
				$this->codDocumento[]=$respostaSQL['CD_DOC'];
		  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['TTL']);
		  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD']);
		  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['END_DOC']);
		  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_FONT']);
		  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['data']);
				
			}
		
		$conexaoBanco->disconnect;
		
	    
		$totalArquivo = $pagina * $total_reg;
		
		if($totalArquivo < $this->total){
		
			$this->totalPaginas = $this->total / $total_reg + 1;
		}else{
			
			$this->totalPaginas = $this->total / $total_reg;
		}
		
		$this->anterior = $pc -1;
		$this->proximo = $pc +1;
  }
  
	/**
	* Método responsável consulta a tabela DOC
	* de acordo com o codigo da Fonte , palavra e numero da pagina
	* 
	* Possui também um versão do código SQL para O SGBD  Postgre
	* 
	* Usa como parâmentro codigo da Fonte , palavra e numero da pagina  
	* 
	* @return o objeto Documento, o total de pagina, o numero da pagina 
	* 		  e o total de registro consultados  
	*/
  
  function consultarDocumetFont($plv1, $plvr2, $plvr3, $plvr4, $plvr5, $plvr6, $plvr7, $plvr8, $plvr9, $plvr10, $pagina, $codigoFonte){
  		
  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
	
	
	if($plv1 == ".|||."){
		$plv1 ="";	
	}
	
	$tm1  = strtoupper($plv1);
    $tm2  = strtoupper($plv2);
    $tm3  = strtoupper($plv3);
    $tm4  = strtoupper($plv4);
    $tm5  = strtoupper($plv5);
    $tm6  = strtoupper($plv6);
    $tm7  = strtoupper($plv7);
    $tm8  = strtoupper($plv8);
    $tm9  = strtoupper($plv9);
	$tm10 = strtoupper($plv10);
	
	$total_reg = "10"; // número de registros por página
	
	if (!$pagina) {
	    $pc = "1";
	} else {
	    $pc = $pagina;
	}
	$inicio = $pc - 1;
	$inicio = $inicio * $total_reg;
	
	
	//COMANDO SQL PARA POSTGRE
//		$stmp = "SELECT T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\", DATE_FORMAT(T1.\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data, T3.\"DSC_FONT\"" .
//							" FROM \"DOC\" T1 , \"DOC_FORMT\" T2 , \"FONT\" T3" .
//							" WHERE T1.\"CD_FONT\" = ".$codigoFonte .
//							
//							if($tm1 != "" || $tm2 != "" || $tm3 != "" || $tm4 != "" || $tm5 != "" || $tm6 != "" || $tm7 != "" || $tm8 != "" || $tm9 != "" || $tm10 != ""){
//								$stmp .= " AND T2.\"PLV\" IN ('$tm1', '$tm2', '$tm3', '$tm4', '$tm5', '$tm6', '$tm7', '$tm8', '$tm9 ', '$tm10')"; 									
//							}
//															
//							$stmp .=" AND T1.\"CD_DOC\" = T2.\"CD_DOC\"" .
//							" AND T1.\"CD_FONT\" = T3.\"CD_FONT\"" .
//							" GROUP BY T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\" " .
//							" ORDER BY T1.\"DT_ATL\" DESC "; 
					
	
	//COMANDO SQL PARA MYSQL
					
		$stmp = "SELECT T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC, DATE_FORMAT(T1.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T3.DSC_FONT" .
				" FROM DOC T1 , DOC_FORMT T2 , FONT T3" .
				" WHERE T1.CD_FONT = ".$codigoFonte; 
				
				if($tm1 != "" || $tm2 != "" || $tm3 != "" || $tm4 != "" || $tm5 != "" || $tm6 != "" || $tm7 != "" || $tm8 != "" || $tm9 != "" || $tm10 != ""){
					$stmp .= " AND T2.PLV IN ('$tm1', '$tm2', '$tm3', '$tm4', '$tm5', '$tm6', '$tm7', '$tm8', '$tm9 ', '$tm10')"; 									
				}
												
				$stmp .=" AND T1.CD_DOC = T2.CD_DOC" .
				" AND T1.CD_FONT = T3.CD_FONT" .
				" GROUP BY T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC " .
				" ORDER BY T1.DT_ATL DESC "; 
					
								
		$limite = " LIMIT ";
			
		
		$consulta = $conexaoBanco->executeQuery($stmp . $limite . $inicio . "," . $total_reg);

		//para obter o total de registros da consulta SQL
		$totalRegistros = $conexaoBanco->executeQuery($stmp); 
		$this->total = mysql_num_rows($totalRegistros);

	    
	    	while ($respostaSQL = mysql_fetch_array($consulta)){
	    
				$this->codDocumento[]=$respostaSQL['CD_DOC'];
		  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['TTL']);
		  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD']);
		  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['END_DOC']);
		  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_FONT']);
		  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['data']);
				
			}
		
		$conexaoBanco->disconnect;
		
	    
		$totalArquivo = $pagina * $total_reg;
		
		if($totalArquivo < $this->total){
		
			$this->totalPaginas = $this->total / $total_reg + 1;
		}else{
			
			$this->totalPaginas = $this->total / $total_reg;
		}
		
		$this->anterior = $pc -1;
		$this->proximo = $pc +1;
  }
  
  
  /*
   * Método responsável por consultar documentos
   * de acordo com o código do tipo de Fonte
   */
  
  
  function consultaDocumentoTipoFonte($tipoFonte, $pagina){
  	
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  		
  		
  		$total_reg = "10"; // número de registros por página
		
		if (!$pagina) {
		    $pc = "1";
		} else {
		    $pc = $pagina;
		}
		$inicio = $pc - 1;
		$inicio = $inicio * $total_reg;
    	
    	
    	//COMANDO SQL PARA POSTGRE
//		$stmp ="SELECT T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\", DATE_FORMAT(T1.\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data, T2.\"DSC_FONT\"" .
//			   " FROM \"DOC\" T1 , \"FONT\" T2" .
//			   " WHERE T1.\"CD_TIP_FONT\" = ".$tipoFonte .
//			   " AND T1.CD_FONT = T2.CD_FONT " .
//			   " ORDER BY T1.\"DT_ATL\"";
    	
    	
    	//COMANDO SQL PARA MYSQL
		$stmp ="SELECT T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC, DATE_FORMAT(T1.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T2.DSC_FONT" .
			   " FROM DOC T1, FONT T2 " .
			   " WHERE T1.CD_TIP_FONT = ".$tipoFonte .
			   " AND T1.CD_FONT = T2.CD_FONT ". 
			   " ORDER BY T1.DT_ATL DESC ";	 
		
		$limite = " LIMIT ";
		
			
		
		$consulta = $conexaoBanco->executeQuery($stmp . $limite . $inicio . "," . $total_reg);

		//para obter o total de registros da consulta SQL
		$totalRegistros = $conexaoBanco->executeQuery($stmp); 
		$this->total = mysql_num_rows($totalRegistros);
  
  
	    	while ($respostaSQL = mysql_fetch_array($consulta)){
	    
				$this->codDocumento[]=$respostaSQL['CD_DOC'];
		  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['TTL']);
		  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD']);
		  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['END_DOC']);
		  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_FONT']);
		  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['data']);
				
			}
		
		$conexaoBanco->disconnect;
		
		    
		$totalArquivo = $pagina * $total_reg;
		
		if($totalArquivo < $this->total){
		
			$this->totalPaginas = $this->total / $total_reg + 1;
		}else{
			
			$this->totalPaginas = $this->total / $total_reg;
		}
		 
		$this->anterior = $pc -1;
		$this->proximo = $pc +1;
  		
  }
  
  	/**
	* Este Método não está sendo usado
	*/
 
  function incluirDocumento($valor=''){
  
    require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();

    //código para o postgre
    //$stmp=" insert into \"DOC\" values(";
    
    //código para mysql
    $stmp=" insert into DOC values(";
    $stmp.="  '$valor[0]'";
    $stmp.=" ,'$valor[1]'";
    $stmp.=" ,'$valor[2]'"; 
    $stmp.=" ,'$valor[3]'"; 
    $stmp.=" ,'$valor[4]'"; 
    $stmp.=" ,'$valor[5]'";
    $stmp.=" ,'$valor[6]'";
    $stmp.=" ,'$valor[7]'";
    $stmp.=" ,'$valor[8]'"; 
    $stmp.=" ,'$valor[9]')"; 
    
    $this->resultado=$conexaoBanco->executeQuery($stmp);
		
	$conexaoBanco->disconnect;
    
  }

  	/**
	* Este Método não está sendo usados
	*/
  
  
  function alteraDocumento($valor){

  	require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();

    //código para o postgre
	//$stmp="update \"DOC\" set ";
	//$stmp .="\"CD_DOC\"=$valor[1]"; 
	//$stmp .=",\"CD_FONT\"=$valor[2]";
	//$stmp .=",\"CD_TIP_DOC\"=$valor[3]";  
	//$stmp .=",\"TTL\"='$valor[4]'";  
	//$stmp .=",\"CONTD\"='$valor[5]'";  
	//$stmp .=",\"DT_ATL\"='$valor[6]'";
	//$stmp .=",\"HT_ATL\"='$valor[7]'";  
	//$stmp .=",\"DT_ATL_STS\"='$valor[8]'";
	//$stmp .=",\"HR_ATL_STS\"='$valor[9]'";
    
	
    //código para o mysql
    $stmp="update DOC set ";
    $stmp .="CD_DOC=$valor[1]"; 
    $stmp .=",CD_FONT=$valor[2]";
    $stmp .=",CD_TIP_DOC=$valor[3]";  
    $stmp .=",TTL='$valor[4]'";  
    $stmp .=",CONTD='$valor[5]'";  
    $stmp .=",DT_ATL='$valor[6]'";
    $stmp .=",HT_ATL='$valor[7]'";  
    $stmp .=",DT_ATL_STS='$valor[8]'";
    $stmp .=",HR_ATL_STS='$valor[9]'";  
     

    $this->resultado=$conexaoBanco->executeQuery($stmp);
		
	$conexaoBanco->disconnect; 

  } 

  	/**
	* Este Método não está sendo usados
	*/

  function excluirDocumento($valor){
    
    require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();

    //código para o postgre
    //$stmp="DELETE FROM \"DOC\" WHERE \"CD_DOC\"= ". $valor;
    
    //código para o mysql
    $stmp="DELETE FROM DOC WHERE CD_DOC= ". $valor;

    $this->resultado=$conexaoBanco->executeQuery($stmp);
		
	$conexaoBanco->disconnect; 
	
  }
  
  
  
   /*
    * Método responsável por consultar a tabela ONT
    *
    * OBS= não sei se este método está sendo usando
    * desculpe
    */
  
   function consultaNomeOntologia(){
  	
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  	
    	//códgio para o postgre
    	//$query ="SELECT * FROM /"ONT\"";
    	
    	//código para mysql
  		$query ="SELECT * FROM ONT";
		 
		 
		$consulta = $conexaoBanco->executeQuery($query);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->codOntologia[]=$respostaSQL['CD_ONT'];  
	  	 	$this->nomeOntologia[]=$respostaSQL[ 'NM_ONT'];
		    $this->descricaoOntologia[]=$respostaSQL['DSC_ONT'];
	    }
  
		$conexaoBanco->disconnect;  
		   
   }
 
 	/*
    * Método responsável por consultar a tabela CLIP_ARQ
    * de acordo com o codigo da Ontologia, data ou hora	
    * 	
    * Retorna um objeto Clipping 
    */
 
  
    function consultaClippingArquivo($codigoOntologia, $data, $hora){
  	
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  	
  	
  		if($codigoOntologia != "" &&  $data != "" && $hora != ""){
  			
  			//código para o postgre
			//$query  ="SELECT \"CD_CLIP_ARQ\", \"CD_ONT\", \"NM_CLP\" FROM \"CLIP_ARQ\" WHERE \"CD_ONT\" = " . $codigoOntologia;
			//$query .=" AND DATE_FORMAT('".$data."',GET_FORMAT(DATE,'EUR'))";
			//$query .=" AND DATE_FORMAT('".$hora."',GET_FORMAT(TIME,'EUR'))";
			//$query .=" ORDER BY \"NM_CLP DESC\" LIMIT 10";	
  		
  			
  			//código para o mysql
  			$query  ="SELECT CD_CLIP_ARQ, CD_ONT, NM_CLP FROM CLIP_ARQ WHERE CD_ONT = " . $codigoOntologia;
  			$query .=" AND DATE_FORMAT('".$data."',GET_FORMAT(DATE,'EUR'))";
  			$query .=" AND DATE_FORMAT('".$hora."',GET_FORMAT(TIME,'EUR'))";
  			$query .=" ORDER BY NM_CLP DESC LIMIT 10";
			  
			$consulta = $conexaoBanco->executeQuery($query);
  
		    while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    	$this->cdClippingArquivo[]=$respostaSQL['CD_CLIP_ARQ'];
  	 			$this->nomeClipping[]=$respostaSQL['NM_CLP'];
  	 			$this->codigoOntologia[]=$respostaSQL['CD_ONT'];
		    }
	  
			$conexaoBanco->disconnect;  
			  
  		
  		}else if($codigoOntologia != "" &&  $data != "" && $hora == ""){
  			
  			//código para o postgre
			//$query  ="SELECT \"CD_CLIP_ARQ\", \"CD_ONT\", \"NM_CLP\" FROM \"CLIP_ARQ\" WHERE \"CD_ONT\" = " . $codigoOntologia;
			//$query .=" AND DATE_FORMAT('".$data."',GET_FORMAT(DATE,'EUR'))";
			//$query .=" ORDER BY \"NM_CLP\" DESC LIMIT 10";
  		
  			//código para o mysql
  			$query  ="SELECT CD_CLIP_ARQ, CD_ONT, NM_CLP FROM CLIP_ARQ WHERE CD_ONT = " . $codigoOntologia;
  			$query .=" AND DATE_FORMAT('".$data."',GET_FORMAT(DATE,'EUR'))";
  			$query .=" ORDER BY NM_CLP DESC LIMIT 10";
  			  
  			
  			$consulta = $conexaoBanco->executeQuery($query);
  
		    while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    	$this->cdClippingArquivo[]=$respostaSQL['CD_CLIP_ARQ'];
  	 			$this->nomeClipping[]=$respostaSQL['NM_CLP'];
  	 			$this->codigoOntologia[]=$respostaSQL['CD_ONT'];
		    }
	  
			$conexaoBanco->disconnect;  
  			  
  		}else if($codigoOntologia != "" &&  $data == "" && $hora != ""){
  			
  		
  			//código para o postgre
			//$query  ="SELECT \"CD_CLIP_ARQ\", \"CD_ONT\", \"NM_CLP\" FROM \"CLIP_ARQ\" WHERE \"CD_ONT\" = " . $codigoOntologia;
			//$query .=" AND DATE_FORMAT('".$hora."',GET_FORMAT(TIME,'EUR'))";
			//$query .=" ORDER BY \"NM_CLP\" DESC LIMIT 10";	
  		
  			//código para o mysql
  			$query  ="SELECT CD_CLIP_ARQ, CD_ONT, NM_CLP FROM CLIP_ARQ WHERE CD_ONT = " . $codigoOntologia;
  			$query .=" AND DATE_FORMAT('".$hora."',GET_FORMAT(TIME,'EUR'))";
  			$query .=" ORDER BY NM_CLP DESC LIMIT 10";
  			
  			
  			$consulta = $conexaoBanco->executeQuery($query);
  
		    while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    	$this->cdClippingArquivo[]=$respostaSQL['CD_CLIP_ARQ'];
  	 			$this->nomeClipping[]=$respostaSQL['NM_CLP'];
  	 			$this->codigoOntologia[]=$respostaSQL['CD_ONT'];
		    }
	  
			$conexaoBanco->disconnect;
  			
  			
  		}else if($codigoOntologia != "" &&  $data == "" && $hora == ""){
  			
  			//código para o postgre
			//$query  ="SELECT \"CD_CLIP_ARQ\", \"CD_ONT\", \"NM_CLP\" FROM \"CLIP_ARQ\" WHERE \"CD_ONT\" = " . $codigoOntologia;
			//$query .=" ORDER BY \"NM_CLP\" DESC LIMIT 10";
  			
  			//código para o mysql
  			$query  ="SELECT CD_CLIP_ARQ, CD_ONT, NM_CLP FROM CLIP_ARQ WHERE CD_ONT = " . $codigoOntologia;
  			$query .=" ORDER BY NM_CLP DESC LIMIT 10";
  			  
			$consulta = $conexaoBanco->executeQuery($query);
  
		    while ($respostaSQL = mysql_fetch_array($consulta)){
		    
		    	$this->cdClippingArquivo[]=$respostaSQL['CD_CLIP_ARQ'];
  	 			$this->nomeClipping[]=$respostaSQL['NM_CLP'];
  	 			$this->codigoOntologia[]=$respostaSQL['CD_ONT'];
		    }
	  
			$conexaoBanco->disconnect;
  			
  		}
  		 
   }   
   
   
   /*
    * Método responsável por consultar a documento por meio de uma expressão
    * 
    * Retorna um objeto Documento 
    */
   
   
   function consultarDocPorTermo($express, $pagina){
   	
   		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
	    
	    
		$total_reg = "50"; // número de registros por página
		
		if (!$pagina) {
		    $pc = "1";
		} else {
		    $pc = $pagina;
		}
		
		$inicio = $pc - 1;
	//	$inicio = 1 ;
		$inicio = $inicio * $total_reg;	
		
		
		//COMANDO SQL PARA POSTGRE
//		$stmp ="SELECT T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\", DATE_FORMAT(T1.\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data, T2.\"DSC_FONT\"".
//	    	   " FROM  \"DOC\" T1, \"FONT\" T2".
//	    	   " WHERE T1.\"TTL\" LIKE '%".$express."%'" .
//	    	   " XOR T1.\"CNTD\" LIKE '%".$express. "%'" .
//	    	   " GROUP BY T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\" ".
//			   " ORDER BY T1.\"DT_ATL\" DESC";
	
		
		//COMANDO SQL PARA MYSQL
		
		//$stmp ="SELECT T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC, DATE_FORMAT(T1.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T2.DSC_FONT".
	    //	   " FROM  DOC T1, FONT T2".
	    //	   " WHERE T1.TTL LIKE '%".trim($express)."%'" .
	    //	   " XOR T1.CNTD LIKE '%".trim($express). "%'" .
	    //	   " AND T1.CD_FONT = T2.CD_FONT " .
		//	   " ORDER BY T1.DT_ATL DESC";
		
			$limite = " LIMIT ";
		$stmp = 'SELECT T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC, DATE_FORMAT(T1.DT_ATL,GET_FORMAT(DATE,\'EUR\')) as data, T2.DSC_FONT FROM DOC T1 , FONT T2 WHERE T1.CD_FONT = T2.CD_FONT AND ( T1.TTL LIKE \'%inclusao digital%\' XOR T1.CNTD LIKE \'%inclusao digital%\' ) ORDER BY T1.DT_ATL DESC ';	
	

    	$consulta = $conexaoBanco->executeQuery($stmp . $limite . $inicio . "," . $total_reg);
//		$consulta = $conexaoBanco->executeQuery($sql . $inicio . "," . $total_reg);
	//		$consulta = $conexaoBanco->executeQuery($stmp . $limite ) ;

		    $consulta = $conexaoBanco->executeQuery( $stmp ) ; 
				
			

			//para obter o total de registros da consulta SQL
			$totalRegistros = $conexaoBanco->executeQuery($stmp); 
			$this->total = mysql_num_rows($totalRegistros);

	    	while ($respostaSQL = mysql_fetch_array($consulta)){
	    
				$this->codDocumento[]=$respostaSQL['CD_DOC'];
		  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['TTL']);
                $this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD']);
		  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['END_DOC']);
		  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_FONT']);
		  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['data']);
				
			}
		
			$conexaoBanco->disconnect;
	
	
			$totalArquivo = $pagina * $total_reg;
			
			if($totalArquivo < $this->total){
			
				$this->totalPaginas = $this->total / $total_reg + 1;
			}else{
				
				$this->totalPaginas = $this->total / $total_reg;
			}      
					    
			$this->anterior = $pc -1;
			$this->proximo = $pc +1;
   	
   }
   
  	/*
	* Método responsável por consultar o arquivo HTML 
	* de acordo com o codigo do Clipping
	* 
	* Retorna o arquivo HTML de um Clipping 
	*/
   
   function consultaArquivoClipping($codigoClipping){
   
   		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
    	
    	//código para o postgre
    	//$query ="SELECT \"ARQ\" FROM \"CLIP_ARQ\" WHERE \"CD_CLIP_ARQ\" = " .$codigoClipping;
    	
    	//código para o mysql
    	$query ="SELECT ARQ FROM CLIP_ARQ WHERE CD_CLIP_ARQ = " .$codigoClipping;
		
		
		$consulta = $conexaoBanco->executeQuery($query);
		 
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->arquivo=iconv("ISO-8859-1", "UTF-8",$respostaSQL['ARQ']);
	    }
		
		$conexaoBanco->disconnect;
   }
   
 
  /*
    * Método responsável por consultar o nome de uma ontologia
    * de acordo com o codigo da ontologia
    *
    */
  
   function consultaNomeOnt($codigoOnt){
  	
  		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
  	
    	if($codigoOnt != ""){

    		//código para o postgre
    		//$query ="SELECT \"NM_ONT\" FROM \"ONT\" WHERE \"CD_ONT\" = " . $codigoOnt;	
    	
    		//código para o mysql
    		$query ="SELECT NM_ONT FROM ONT WHERE CD_ONT = " . $codigoOnt;
		   
		   
		    $consulta = $conexaoBanco->executeQuery($query);
		 
  
		    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    		$this->nomeOnt=$respostaSQL[ 'NM_ONT'];
	    	}
		
			$conexaoBanco->disconnect;
		   
    	}
    
   }
   
   
   /*
    * Método responsável por obter dados de um documento
    * por meio do código do documento
    * 
    * Return um objeto Documento
    */
 
 	function consultarDocumentoPorCodigo($codigoDoc){
 		
 		require_once '.conexaoBD.php';
	
		$conexaoBanco = new conexaoBD();
 	
 	
 		if($codigoDoc != ""){
 	
 			//código para o postgre	
			//$query ="SELECT T1.\"DSC_FONT\", T2.\"TTL\", T2.\"CNTD\", T2.\"END_DOC\", DATE_FORMAT(T2.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T3.\"NM_FONT\" FROM \"FONT\" T1, \"DOC\" T2, \"TIP_FONT\" T3 ".
			//" WHERE T2.\"CD_DOC\" = ". $codigoDoc .
			//" AND T1.\"CD_FONT\" = T2.\"CD_FONT\"" .
			//" AND T3.\"CD_TIP_FONT\" = T2.\"CD_TIP_FONT\"";
 		
 		
 			//código para o mysql
			$query ="SELECT T1.DSC_FONT, T2.TTL, T2.CNTD, T2.END_DOC, DATE_FORMAT(T2.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T3.NM_FONT FROM FONT T1, DOC T2, TIP_FONT T3 ".
	    	   		" WHERE T2.CD_DOC = ". $codigoDoc .
	    	   		" AND T1.CD_FONT = T2.CD_FONT" .
	    	   		" AND T3.CD_TIP_FONT = T2.CD_TIP_FONT";
	
			$consulta = $conexaoBanco->executeQuery($query);
		 
  
			    while ($respostaSQL = mysql_fetch_array($consulta)){
		    		
		    		$this->codDocumento[]=$respostaSQL['CD_DOC'];  
			  	 	$this->codFonte[]=$respostaSQL[ 'CD_FONT'];
				    $this->codTipoDocumento[]=$respostaSQL['CD_TIP_DOC'];
				    $this->titulo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['TTL']);
				 	$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD']);
				 	$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['END_DOC']);
				 	$this->dataAtualizacao[]=$respostaSQL['data'];
					$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['DSC_FONT']);
					$this->nomeTipoFonte[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['NM_FONT']);
		    	}
		
			$conexaoBanco->disconnect;
	
		}	
	}
	
	
		
	
	
} 
