<?php
require_once 'configs/.connect.php';
require_once 'includes/config.php';

/*
 * Classe php responsável por controlar  
 * todas as ações referentes ao objeto 
 * Pesquisa Avançada.
 */

class PesquisaAvancada {

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
  var $nomedaFonte;
  
  
  
  /*
   * Método construtor da classe
   */  
  
  function PesquisaAvancada(){
  
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
  	 $this->nomedaFonte="";
  	 
  	  
  }
  
  /*
   * Método responsável por efetivar consultas avançadas 
   * a tabela DOC
   * 
   * Recebe um array com os parâmetros palavra, codigo da fonte, nome da fonte,
   * codigo do tipo da fonte, nome do tipo da fonte, endereço RSS
   * data
   *
   * Possui também uma versão do código SQL para o SGBD Postgre
   * 
   * Retorna o objeto Documento, total paginas, numeoro das paginas 
   * 	     e o total de registro encontrados na tabela
   */
  
  
  function consultarAvancado($arrForm, $pagina){

    $res= new TCon();
    $res->abreconexao();
       
    
//    COMANDO PARA O POSTGRE 
//      $stmp = "SELECT \"CD_FONT\", \"CD_DOC\", \"TTL\", \"CNTD\", \"END_DOC\", DATE_FORMAT(\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data FROM DOC WHERE ";
//    
//    
//    if (!empty($arrForm[0])){
//    
//        $stmp .=" NOT \"TTL\" LIKE '%" . $arrForm[0] . "%' AND NOT \"CNTD\" LIKE '%" . $arrForm[0] ."%'";
//    }
//
//    if (!empty($arrForm[1]) && !empty($arrForm[0])){
//    
//        $stmp .= " AND \"CD_FONT\" = " . $arrForm[1];
//    }else if(!empty($arrForm[1]) && empty($arrForm[0])){
//
//    	$stmp .= " \"CD_FONT\" = " . $arrForm[1];
//    }
//
//    if (!empty($arrForm[0]) || !empty($arrForm[1])){
//        
//    	if(!empty($arrForm[2])){
//    		
//    		$stmp .= " AND \"CD_TIP_FONT\" = " . $arrForm[2];
//    	}
//    }else if(!empty($arrForm[2])){
//    	
//    	$stmp .= " \"CD_TIP_FONT\" = " . $arrForm[2];
//    }
//
//    if (!empty($arrForm[0]) || !empty($arrForm[1]) || !empty($arrForm[2])){
//
//    	if(!empty($arrForm[3])){
//    		
//    		$stmp .= " AND \"END_RSS\" = " . $arrForm[3];
//    	}
//    }else if(!empty($arrForm[3])){
//    
//    	$stmp .= " \"END_RSS\" = " . $arrForm[3];
//    } 
//
//	if (!empty($arrForm[0]) || !empty($arrForm[1]) || !empty($arrForm[2]) || !empty($arrForm[3])){
//
//    	if(!empty($arrForm[4])){
//
//    		$stmp .= " AND DATE_FORMAT('".$arrForm[4]."',GET_FORMAT(DATE,'EUR'))";
//    	}
//    }else if(!empty($arrForm[4])){
//    
//    	$stmp .= " DATE_FORMAT('".$arrForm[4]."',GET_FORMAT(DATE,'EUR'))";
//    }
//
//    if (!empty($arrForm[0]) || !empty($arrForm[1]) || !empty($arrForm[2]) || !empty($arrForm[3]) || !empty($arrForm[4])){
//        
//    	if(!empty($arrForm[5])){
//    		
//    		$stmp .= "  AND \"TTL\" LIKE '% " . $arrForm[5] ."%'";	
//    	}	
//    }else if(!empty($arrForm[5])){
//    
//    	$stmp .= " \"TTL\" LIKE '%" . $arrForm[5] ."%'";
//    }
//    
//    if (empty($arrForm[0]) || !empty($arrForm[1]) || !empty($arrForm[2]) || !empty($arrForm[3]) || !empty($arrForm[4]) || !empty($arrForm[5])){
//        
//    	if(!empty($arrForm[6])){
//    		$stmp .= " AND \"CNTD\" LIKE '%" . $arrForm[6] ."%'";
//    	}
//    }else if(!empty($arrForm[6])){
//    
//    	$stmp .= " \"CNTD\" LIKE '%" . $arrForm[6] ."%'";
//    }    
    
    
    
    //COMANDO PARA O MYSQL 
    $stmp = "SELECT CD_FONT, CD_DOC, TTL, CNTD, END_DOC, DATE_FORMAT(DT_ATL,GET_FORMAT(DATE,'EUR')) as data FROM DOC WHERE ";
    
    
    if (!empty($arrForm[0])){
    
        $stmp .=" NOT TTL LIKE '%" . $arrForm[0] . "%' AND NOT CNTD LIKE '%" . $arrForm[0] ."%'";
    }

    if (!empty($arrForm[1]) && !empty($arrForm[0])){
    
        $stmp .= " AND CD_FONT = " . $arrForm[1];
    }else if(!empty($arrForm[1]) && empty($arrForm[0])){

    	$stmp .= " CD_FONT = " . $arrForm[1];
    }

    if (!empty($arrForm[0]) || !empty($arrForm[1])){
        
    	if(!empty($arrForm[2])){
    		
    		$stmp .= " AND CD_TIP_FONT = " . $arrForm[2];
    	}
    }else if(!empty($arrForm[2])){
    	
    	$stmp .= " CD_TIP_FONT = " . $arrForm[2];
    }

    if (!empty($arrForm[0]) || !empty($arrForm[1]) || !empty($arrForm[2])){

    	if(!empty($arrForm[3])){
    		
    		$stmp .= " AND END_RSS = " . $arrForm[3];
    	}
    }else if(!empty($arrForm[3])){
    
    	$stmp .= " END_RSS = " . $arrForm[3];
    } 

    if (!empty($arrForm[0]) || !empty($arrForm[1]) || !empty($arrForm[2]) || !empty($arrForm[3])){

    	if(!empty($arrForm[4])){

    		$stmp .= " AND DATE_FORMAT('".$arrForm[4]."',GET_FORMAT(DATE,'EUR'))";
    	}
    }else if(!empty($arrForm[4])){
    
    	$stmp .= " DATE_FORMAT('".$arrForm[4]."',GET_FORMAT(DATE,'EUR'))";
    }

    if (!empty($arrForm[0]) || !empty($arrForm[1]) || !empty($arrForm[2]) || !empty($arrForm[3]) || !empty($arrForm[4])){
        
    	if(!empty($arrForm[5])){
    		
    		$stmp .= "  AND TTL LIKE '% " . $arrForm[5] ." %'";	
    	}	
    }else if(!empty($arrForm[5])){
    
    	$stmp .= " TTL LIKE '% ". $arrForm[5] ." %'";
    }
    
    if (!empty($arrForm[0]) || !empty($arrForm[1]) || !empty($arrForm[2]) || !empty($arrForm[3]) || !empty($arrForm[4]) || !empty($arrForm[5])){
        
    	if(!empty($arrForm[6])){
    		$stmp .= " AND CNTD LIKE '% ". $arrForm[6] ." %'";
    	}
    }else if(!empty($arrForm[6])){
    
    	$stmp .= " CNTD LIKE '% ". $arrForm[6] ." %'";
    }
    
	$limite = " LIMIT ";
	
	$order  = " ORDER BY DATE_FORMAT(DT_ATL,GET_FORMAT(DATE,'EUR')) DESC ";
	
	$total_reg = "40"; // número de registros por página
	
	
	if (!$pagina) {
	    $pc = "1";
	} else {
	    $pc = $pagina;
	}
	
	echo $stmp . $order . $limite . $inicio . "," . $total_reg;
	
	$inicio = $pc - 1;
	$inicio = $inicio * $total_reg;	
	
	$consulta=$res->retorno->query($stmp . $order . $limite . $inicio . "," . $total_reg); 
    	
    $consultaTotal =$res->retorno->query($stmp);
        
    $this->total = $consultaTotal->numRows();
    	
    	
			while($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
	
			    $this->codFonte[]=$row['cd_font'];
				$this->codDocumento[]=$row['cd_doc'];
		  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $row['ttl']);
		  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $row['cntd']);
		  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $row['end_doc']);
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
   * Método responsável por consultar a tabela FONT
   * 
   * Usa como parãmetro o código da Fonte
   * 
   * Retorna o objeto Fonte
   */
  
  
  function consultarNomeFonte($cdFonte){
  
    $res= new TCon();
    $res->abreconexao();
  
    if($cdFonte[0] != ""){
    
	  	$stmp = "SELECT DSC_FONT FROM FONT WHERE CD_FONT = " . $cdFonte[0];
	  
	  		$consulta=$res->retorno->query($stmp); 
		
	  		$row=$consulta->fetchRow(DB_FETCHMODE_ASSOC); 
	  	
			$this->nomedaFonte=$row['dsc_font'];
    }	
		
  }
  
} 
?>