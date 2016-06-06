<?php
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

    $res= new TCon();
    $res->abreconexao();
    
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
		   " ORDER BY TOTAL DESC, T2.DT_ATL";
	
	
	 	$limite = " LIMIT ";

		$consulta=$res->retorno->query($stmp . $limite . $inicio . "," . $total_reg) ; 
        
        $consultaTotal =$res->retorno->query($stmp);
        
    	$this->total = $consultaTotal->numRows();

    	
			while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
	
				$this->codDocumento[]=$row['cd_doc'];
		  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $row['ttl']);
		  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd']);
		  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $row['end_doc']);
		  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $row['dsc_font']);
		  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $row['data']);
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

    $res= new TCon();
    $res->abreconexao();

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

    
    $consulta=$res->retorno->query($stmp); 
	

    	while ($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
       
	        $this->codDocumento[]=$row['cd_doc'];  
	  	 	$this->codFonte[]=$row[ 'cd_font'];
		    $this->codTipoDocumento[]=$row['cd_tip_doc'];
		 	$this->titulo[]=$row['ttl'];
		 	$this->conteudo[]=$row['cntd'];
		 	$this->endereco[]=$row['end_doc'];
			$this->dataAtualizacao[]=$row['dt_atl'];
			$this->horaAtualizacao[]=$row['hr_atl'];
			$this->dataAtSistema[]=$row['dt_atl_sts'];		 	 	 
			$this->horaAtSistema[]=$row['hr_atl_sts'];
		
		 }
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

 	$res= new TCon();
    $res->abreconexao();

    
    //formata o parâmetro data
 	if($data != ""){

 		$arrData = explode('/',$data);
		
    	$arrData[0] +=0;
    	$arrData[1] +=0;
    	$arrData[2] +=0;
    
	    $data = $arrData[0] ."/". $arrData[1] ."/". $arrData[2];
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
	
	
	echo $stmp;
	
	
    $limite = " LIMIT "; 
    
    $order  = " ORDER BY DT_ATL DESC ";
    
     
    $consulta=$res->retorno->query($stmp .$grupo . $order.  $limite . $inicio . "," . $total_reg); 
	
    //verificar o total de arquivo na tabela sem o limite estabelecido
    $consultaTotal=$res->retorno->query($stmp);
	$this->total = $consultaTotal->numRows();
	
		while ($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
      
      	    $this->codDocumento[]=$row['cd_doc']; 
	  	 }
	  	 
	  	
		for($i=0; $i<sizeof($this->codDocumento); $i++) {
		
			if($this->codDocumento[$i] != "" ){
			
				$query ="SELECT T1.DSC_FONT, T2.TTL, T2.CNTD, T2.END_DOC, DATE_FORMAT(T2.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T3.NM_FONT FROM FONT T1, DOC T2, TIP_FONT T3 ".
	    	   			" WHERE T2.CD_DOC = ". $this->codDocumento[$i] .
	    	   			" AND T1.CD_FONT = T2.CD_FONT" .
	    	   			" AND T3.CD_TIP_FONT = T2.CD_TIP_FONT";
	    	   			
	    	   			
			   
				$consult=$res->retorno->query($query);
				
							
				while ($row=$consult->fetchRow(DB_FETCHMODE_ASSOC)){
	
					$this->codDocumento[]=$row['cd_doc'];  
			  	 	$this->codFonte[]=$row[ 'cd_font'];
				    $this->codTipoDocumento[]=$row['cd_tip_doc'];
				    $this->titulo[]=iconv("ISO-8859-1", "UTF-8", $row['ttl']);
				 	$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd']);
				 	$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $row['end_doc']);
				 	$this->dataAtualizacao[]=$row['data'];
					$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $row['dsc_font']);
					$this->nomeTipoFonte[]=iconv("ISO-8859-1", "UTF-8", $row['nm_font']);
				
				}
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
  		
  		$res= new TCon();
    	$res->abreconexao();
    	
    	
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
	
		$consulta=$res->retorno->query($stmp . $limite . $inicio . "," . $total_reg) ;
		
		$consultaTotal =$res->retorno->query($stmp);
        
        $this->total = $consultaTotal->numRows();
		
			while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
	
				$this->codDocumento[]=$row['cd_doc'];
		  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $row['ttl']);
		  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd']);
		  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $row['end_doc']);
		  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $row['dsc_font']);
		  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $row['data']);
		  		
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
  		
  		$res= new TCon();
    	$res->abreconexao();
    	
    	
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
		
		$consulta=$res->retorno->query($stmp . $limite . $inicio . "," . $total_reg) ;
		
		
		$consultaTotal =$res->retorno->query($stmp);
        
        $this->total = $consultaTotal->numRows();
		
		
    		while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
	
				$this->codDocumento[]=$row['cd_doc'];
		  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $row['ttl']);
		  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd']);
		  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $row['end_doc']);
		  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $row['dsc_font']);
		  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $row['data']);
		  		
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
  		
  	$res= new TCon();
	$res->abreconexao();
	
	
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
		
		$consulta=$res->retorno->query($stmp . $limite . $inicio . "," . $total_reg);
		
		$consultaTotal =$res->retorno->query($stmp);
        
    	$this->total = $consultaTotal->numRows();
		
	
		while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			$this->codDocumento[]=$row['cd_doc'];
	  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $row['ttl']);
	  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd']);
	  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $row['end_doc']);
	  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $row['dsc_font']);
	  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $row['data']);
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
  
  
  function consultaDocumentoTipoFonte($tipoFonte, $pagina){
  	
  		$res= new TCon();
    	$res->abreconexao();
  		
  		
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
		
		$consulta=$res->retorno->query($stmp . $limite . $inicio . "," . $total_reg) ;
		
		$consultaTotal =$res->retorno->query($stmp);
        
        $this->total = $consultaTotal->numRows();
		
		
    		while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
	
				$this->codDocumento[]=$row['cd_doc'];
		  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $row['ttl']);
		  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd']);
		  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $row['end_doc']);
		  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $row['dsc_font']);
		  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $row['data']);
		  		
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
	* Este Método não está sendo usados
	*/
 
  function incluirDocumento($valor=''){
  
    $res= new TCon();
    $res->abreconexao();

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
    
    $consulta=$res->retorno->query($stmp); 

    
  }

  	/**
	* Este Método não está sendo usados
	*/
  
  
  function alteraDocumento($valor=''){

  	$res= new TCon();
    $res->abreconexao();


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
     

    $consulta=$res->retorno->query($stmp);  

  } 

  	/**
	* Este Método não está sendo usados
	*/

  function excluirDocumento($valor){
    
    $res= new TCon();
    $res->abreconexao();

    $stmp="DELETE FROM DOC WHERE CD_DOC= ". $valor;
    	
	$consulta=$res->retorno->query($stmp);	
	
    $mensagemRetorno;

  }
  
  
  
   /*
    * Método responsável por consultar a tabela ONT
    *
    * OBS= não sei se este método está sendo usando
    * desculpe
    */
  
   function consultaNomeOntologia(){
  	
  		$res= new TCon();
    	$res->abreconexao();
  	
  		$query ="SELECT * FROM ONT";
		   
		$consulta=$res->retorno->query($query);
					
		while ($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			$this->codOntologia[]=$row['cd_ont'];  
	  	 	$this->nomeOntologia[]=$row[ 'nm_ont'];
		    $this->descricaoOntologia[]=$row['dsc_ont'];
		}   
   }
 
 	/*
    * Método responsável por consultar a tabela CLIP_ARQ
    * de acordo com o codigo da Ontologia, data ou hora	
    * 	
    * Retorna um objeto Clipping 
    */
 
  
    function consultaClippingArquivo($codigoOntologia, $data, $hora){
  	
  		$res= new TCon();
    	$res->abreconexao();
  	
  	
  		if($codigoOntologia != "" &&  $data != "" && $hora != ""){
  			
  			$query  ="SELECT CD_CLIP_ARQ, CD_ONT, NM_CLP FROM CLIP_ARQ WHERE CD_ONT = " . $codigoOntologia;
  			$query .=" AND DATE_FORMAT('".$data."',GET_FORMAT(DATE,'EUR'))";
  			$query .=" AND DATE_FORMAT('".$hora."',GET_FORMAT(TIME,'EUR'))";
  			$query .=" ORDER BY NM_CLP ASC";
			  
			$consulta=$res->retorno->query($query);
						
			while ($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
	
				$this->cdClippingArquivo[]=$row['cd_clip_arq'];
  	 			$this->nomeClipping[]=$row['nm_clp'];
  	 			$this->codigoOntologia[]=$row['cd_ont'];
  	 		}  
  		
  		}else if($codigoOntologia != "" &&  $data != "" && $hora == ""){
  			
  			$query  ="SELECT CD_CLIP_ARQ, CD_ONT, NM_CLP FROM CLIP_ARQ WHERE CD_ONT = " . $codigoOntologia;
  			$query .=" AND DATE_FORMAT('".$data."',GET_FORMAT(DATE,'EUR'))";
  			$query .=" ORDER BY NM_CLP ASC";
  			  
			$consulta=$res->retorno->query($query);
						
			while ($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
	
				$this->cdClippingArquivo[]=$row['cd_clip_arq'];
  	 			$this->nomeClipping[]=$row['nm_clp'];
  	 			$this->codigoOntologia[]=$row['cd_ont'];
  	 		}
  			
  		}else if($codigoOntologia != "" &&  $data == "" && $hora != ""){
  			
  			$query  ="SELECT CD_CLIP_ARQ, CD_ONT, NM_CLP FROM CLIP_ARQ WHERE CD_ONT = " . $codigoOntologia;
  			$query .=" AND DATE_FORMAT('".$hora."',GET_FORMAT(TIME,'EUR'))";
  			$query .=" ORDER BY NM_CLP ASC";
  			
  			$consulta=$res->retorno->query($query);
						
			while ($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
	
				$this->cdClippingArquivo[]=$row['cd_clip_arq'];
  	 			$this->nomeClipping[]=$row['nm_clp'];
  	 			$this->codigoOntologia[]=$row['cd_ont'];
  	 		}
  			
  		}else if($codigoOntologia != "" &&  $data == "" && $hora == ""){
  			
  			$query  ="SELECT CD_CLIP_ARQ, CD_ONT, NM_CLP FROM CLIP_ARQ WHERE CD_ONT = " . $codigoOntologia;
  			$query .=" ORDER BY NM_CLP ASC";
  			  
			$consulta=$res->retorno->query($query);
						
			while ($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
	
				$this->cdClippingArquivo[]=$row['cd_clip_arq'];
  	 			$this->nomeClipping[]=$row['nm_clp'];
  	 			$this->codigoOntologia[]=$row['cd_ont'];
  	 		}
  			
  		}
  		 
   }   
   
   
   /*
    * Método responsável por consultar a documento por meio de uma expressão
    * 
    * Retorna um objeto Documento 
    */
   
   
   function consultarDocPorTermo($express, $pagina){
   	
   		$res= new TCon();
	    $res->abreconexao();
	    
	    
		$total_reg = "50"; // número de registros por página
		
		if (!$pagina) {
		    $pc = "1";
		} else {
		    $pc = $pagina;
		}
		
		$inicio = $pc - 1;
		$inicio = $inicio * $total_reg;	
		
		
		//COMANDO SQL PARA POSTGRE
//		$stmp ="SELECT T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\", DATE_FORMAT(T1.\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data, T2.\"DSC_FONT\"".
//	    	   " FROM  \"DOC\" T1, \"FONT\" T2".
//	    	   " WHERE T1.\"TTL\" LIKE '%".$express."%'" .
//	    	   " XOR T1.\"CNTD\" LIKE '%".$express. "%'" .
//	    	   " GROUP BY T1.\"CD_DOC\", T1.\"TTL\", T1.\"CNTD\", T1.\"END_DOC\" ".
//			   " ORDER BY T1.\"DT_ATL\" DESC";
	
		
		//COMANDO SQL PARA MYSQL
		$stmp ="SELECT T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC, DATE_FORMAT(T1.DT_ATL,GET_FORMAT(DATE,'EUR')) as data, T2.DSC_FONT".
	    	   " FROM  DOC T1, FONT T2".
	    	   " WHERE T1.TTL LIKE '%".trim($express)."%'" .
	    	   " XOR T1.CNTD LIKE '%".trim($express). "%'" .
	    	   " GROUP BY T1.CD_DOC, T1.TTL, T1.CNTD, T1.END_DOC ".
			   " ORDER BY T1.DT_ATL DESC";
		
			$limite = " LIMIT ";
	
			$consulta=$res->retorno->query($stmp . $limite . $inicio . "," . $total_reg) ; 
	        
	        $consultaTotal =$res->retorno->query($stmp);
	        
	    	$this->total = $consultaTotal->numRows();
	    
				while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
		
					$this->codDocumento[]=$row['cd_doc'];
			  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $row['ttl']);
			  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd']);
			  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $row['end_doc']);
			  		$this->nomeFonte[]=iconv("ISO-8859-1", "UTF-8", $row['dsc_font']);
			  		$this->dataAtualizacao[]=iconv("ISO-8859-1", "UTF-8", $row['data']);
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
   
  	/*
	* Método responsável por consultar o arquivo HTML 
	* de acordo com o codigo do Clipping
	* 
	* Retorna o arquivo HTML de um Clipping 
	*/
   
   function consultaArquivoClipping($codigoClipping){
   
   		$res= new TCon();
    	$res->abreconexao();
  	
  		$query ="SELECT ARQ FROM CLIP_ARQ WHERE CD_CLIP_ARQ = " .$codigoClipping;
		   
		$consulta=$res->retorno->query($query);
					
		while ($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			$this->arquivo=iconv("ISO-8859-1", "UTF-8",$row['arq']);  
		}   
   }
   
 
  /*
    * Método responsável por consultar o nome de uma ontologia
    * de acordo com o codigo da ontologia
    *
    */
  
   function consultaNomeOnt($codigoOnt){
  	
  		$res= new TCon();
    	$res->abreconexao();
  	
  		$query ="SELECT NM_ONT FROM ONT WHERE CD_ONT = " . $codigoOnt;
		   
		$consulta=$res->retorno->query($query);
					
		while ($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){

			$this->nomeOnt=$row[ 'nm_ont'];
		}   
   }
 
   
} 
