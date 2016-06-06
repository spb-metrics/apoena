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
 
    Este programa está nomeado como .pesquisaAvancadaDao.php e possui 340
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
  
  
  function consultarAvancado($arrform, $pagina){

    require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
       
    
//    COMANDO PARA O POSTGRE 
//      $stmp = "SELECT \"CD_FONT\", \"CD_DOC\", \"TTL\", \"CNTD\", \"END_DOC\", DATE_FORMAT(\"DT_ATL\",GET_FORMAT(DATE,'EUR')) as data FROM \"DOC\" WHERE ";
//    
//    
//    if (!empty($arrayPalavras[0])){
//    
//    	$stmp .=" NOT \"TTL\" IN('".$arrayPalavras[0]. "', '".$arrayPalavras[1]."', '".$arrayPalavras[2]."', '".$arrayPalavras[3]. "', '".$arrayPalavras[4]. "', '".$arrayPalavras[5]. "', '".$arrayPalavras[6]. "' , '".$arrayPalavras[7]. "', '".$arrayPalavras[8]. "', '".$arrayPalavras[9]."')";
//        
//    }
//
//    if (!empty($arrForm[0]) && !empty($arrayPalavras[0])){
//    
//        $stmp .= " AND \"CD_FONT\" = " . $arrForm[1];
//        
//    }else if(!empty($arrForm[0]) && empty($arrayPalavras[0])){
//
//    	$stmp .= " \"CD_FONT\" = " . $arrForm[1];
//    }
//
//    if (!empty($arrayPalavras[0]) || !empty($arrForm[0])){
//        
//    	if(!empty($arrForm[1])){
//    		
//    		$stmp .= " AND \"CD_TIP_FONT\" = " . $arrForm[1];
//    	}
//    }else if(!empty($arrForm[1])){
//    	
//    	$stmp .= " \"CD_TIP_FONT\" = " . $arrForm[1];
//    }
//
//    if (!empty($arrayPalavras[0]) || !empty($arrForm[0]) || !empty($arrForm[1])){
//
//    	if(!empty($arrForm[2])){
//    		
//    		$stmp .= " AND \"END_RSS\" = " . $arrForm[2];
//    	}
//    }else if(!empty($arrForm[2])){
//    
//    	$stmp .= " \"END_RSS\" = " . $arrForm[2];
//    } 
//
//    if (!empty($arrayPalavras[0]) || !empty($arrForm[0]) || !empty($arrForm[1]) || !empty($arrForm[2])){
//
//    	if(!empty($arrForm[3])){
//
//    		$stmp .= " AND DATE_FORMAT('".$arrForm[3]."',GET_FORMAT(DATE,'EUR'))";
//    	}
//    }else if(!empty($arrForm[3])){
//    
//    	$stmp .= " DATE_FORMAT('".$arrForm[3]."',GET_FORMAT(DATE,'EUR'))";
//    }
//
//    if (!empty($arrayPalavras[0]) || !empty($arrForm[1]) || !empty($arrForm[2]) || !empty($arrForm[3])){
//        
//    	if(!empty($arrayTitulo[0])){
//    		
//    		$stmp .=" AND \"TTL\" IN('".$arrayTitulo[0]."', '".$arrayTitulo[1]."', '".$arrayTitulo[2]."', '".$arrayTitulo[3]."', '".$arrayTitulo[4]."', '".$arrayTitulo[5]."', '".$arrayTitulo[6]."', '".$arrayTitulo[7]."', '".$arrayTitulo[8]."', '".$arrayTitulo[9]."')";
//    	}
//    		
//    }else if(!empty($arrayTitulo[0])){
//    	
//    	$stmp .=" \"TTL\" IN('".$arrayTitulo[0]."', '".$arrayTitulo[1]."', '".$arrayTitulo[2]."', '".$arrayTitulo[3]."', '".$arrayTitulo[4]."', '".$arrayTitulo[5]."', '".$arrayTitulo[6]."', '".$arrayTitulo[7]."', '".$arrayTitulo[8]."', '".$arrayTitulo[9]."')";
//    }
//    
//    if (!empty($arrayPalavras[0]) || !empty($arrForm[0]) || !empty($arrForm[1]) || !empty($arrForm[2]) || !empty($arrForm[3]) || !empty($arrayTitulo[0])){
//        
//    	if(!empty($arrayCNTD[0])){
//    		
//    		$stmp .=" AND \"CNTD\" IN('".$arrayCNTD[0]."', '".$arrayCNTD[1]."', '".$arrayCNTD[2]."', '".$arrayCNTD[3]."', '".$arrayCNTD[4]."', '".$arrayCNTD[5]."', '".$arrayCNTD[6]."', '".$arrayCNTD[7]."', '".$arrayCNTD[8]."', '".$arrayCNTD[9]."')";
//    		
//    	}
//    }else if(!empty($arrayCNTD[0])){
//    
//    	$stmp .=" \"CNTD\" IN('".$arrayCNTD[0]."', '".$arrayCNTD[1]."', '".$arrayCNTD[2]."', '".$arrayCNTD[3]."', '".$arrayCNTD[4]."', '".$arrayCNTD[5]."', '".$arrayCNTD[6]."', '".$arrayCNTD[7]."', '".$arrayCNTD[8]."', '".$arrayCNTD[9]."')";
//    }    
    
    
    
    //COMANDO PARA O MYSQL 
    $stmp = "SELECT CD_FONT, CD_DOC, TTL, CNTD, END_DOC, DATE_FORMAT(DT_ATL,GET_FORMAT(DATE,'EUR')) as data FROM DOC WHERE ";
    
    
    if (!empty($arrform[4])){
    
    	$stmp .=" TTL NOT LIKE '% ".$arrform[4]." %' ";
    }

    if (!empty($arrform[0]) && !empty($arrform[4]) ){
    
        $stmp .= " AND CD_FONT = " . $arrform[0];
        
    }else if(!empty($arrform[0]) && empty($arrform[4])){

    	$stmp .= " CD_FONT = " . $arrform[0];
    }

    if (!empty($arrform[4]) || !empty($arrform[0])){
        
    	if(!empty($arrform[1])){
    		
    		$stmp .= " AND CD_TIP_FONT = " . $arrform[1];
    	}
    }else if(!empty($arrform[1])){
    	
    	$stmp .= " CD_TIP_FONT = " . $arrform[1];
    }

    if (!empty($arrform[4]) || !empty($arrform[0]) || !empty($arrform[1])){

    	if(!empty($arrform[2])){
    		
    		$stmp .= " AND END_RSS = " . $arrform[2];
    	}
    }else if(!empty($arrform[2])){
    
    	$stmp .= " END_RSS = " . $arrForm[2];
    } 

    if (!empty($arrform[4]) || !empty($arrform[0]) || !empty($arrform[1]) || !empty($arrform[2])){

    	if(!empty($arrform[3])){

    		$stmp .= " AND TIMESTAMP(DT_ATL) LIKE '%".$arrform[3]."%'";
    	}
    }else if(!empty($arrform[3])){
    
    	$stmp .= " TIMESTAMP(DT_ATL) LIKE '%".$arrform[3]."%'";
    }

    if (!empty($arrform[4]) || !empty($arrform[0]) || !empty($arrform[1]) || !empty($arrform[2]) || !empty($arrform[3])){
        
    	if(!empty($arrform[5])){
    		
    		$stmp .=" AND TTL LIKE '% ".$arrform[5]." %'";
    	}
    		
    }else if(!empty($arrform[5])){
    	
    	$stmp .=" TTL LIKE '% ".$arrform[5]." %'";
    }
    
    if (!empty($arrform[4]) || !empty($arrform[0]) || !empty($arrform[1]) || !empty($arrform[2]) || !empty($arrform[3]) || !empty($arrform[5]) ){
        
    	if(!empty($arrform[6])){
    		
    		$stmp .=" AND CNTD LIKE '%".$arrform[6]."%'";
    		
    	}
    }else if(!empty($arrform[6])){
    
    	$stmp .=" CNTD LIKE '%".$arrform[6]."%'";
    
    }
    
	$limite = " LIMIT ";
	
//	$order  = " ORDER BY DATE_FORMAT(DT_ATL,GET_FORMAT(DATE,'EUR')) DESC ";
	$order  = " ORDER BY CD_DOC DESC ";
	
	$total_reg = "40"; // número de registros por página
	
	
	if (!$pagina) {
	    $pc = "1";
	} else {
	    $pc = $pagina;
	}
	
	$inicio = $pc - 1;
	$inicio = $inicio * $total_reg;	
	
	$consulta = $conexaoBanco->executeQuery($stmp . $order . $limite . $inicio . "," . $total_reg);
	
	//para obter o total de registros da consulta SQL
	$totalRegistros = $conexaoBanco->executeQuery($stmp); 
	$this->total = mysql_num_rows($totalRegistros);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    
	    	$this->codFonte[]=$respostaSQL['CD_FONT'];
			$this->codDocumento[]=$respostaSQL['CD_DOC'];
	  		$this->titulo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['TTL']);
	  		$this->conteudo[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['CNTD']);
	  		$this->endereco[]=iconv("ISO-8859-1", "UTF-8", $respostaSQL['END_DOC']);
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
   * Método responsável por consultar a tabela FONT
   * 
   * Usa como parãmetro o código da Fonte
   * 
   * Retorna o objeto Fonte
   */
  
  
  function consultarNomeFonte($cdFonte){
  
    require_once '.conexaoBD.php';
	
	$conexaoBanco = new conexaoBD();
  
    if($cdFonte[0] != ""){
    	
    	//código para o postgre
    	//$stmp = "SELECT \"DSC_FONT\" FROM \"FONT\" WHERE \"CD_FONT\" = " . $cdFonte[0];

    	//código para o mysql
    	$stmp = "SELECT DSC_FONT FROM FONT WHERE CD_FONT = " . $cdFonte[0];
	  
	  	$consulta = $conexaoBanco->executeQuery($stmp);
  
	    while ($respostaSQL = mysql_fetch_array($consulta)){
	    
	    	$this->nomedaFonte=$respostaSQL['DSC_FONT'];
	    }
  
		$conexaoBanco->disconnect;  
	  
    }	
		
  }
  
} 
?>