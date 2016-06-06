<?php
require_once 'configs/.connect.php';
require_once 'includes/config.php';

class Termo {

  var $codOntologia;  
  var $nomeOntologia;
  var $descricaoOntologia;
  var $codTermo;
  var $resultado; 
  

  function Termo(){
  
	 $this->codOntologia=array();
	 $this->nomeOntologia=array();
	 $this->descricaoOntologia=array();
	 $this->codTermo="";
	 $this->resultado=""; 		 
	  
  }
  
  
  
  function inserirTermos($codigoOntologia, $arrformTermo, $arrformSignificado){

		$res= new TCon();
    	$res->abreconexao();	

  	//********************************* CONSULTA MAX TERMO *********************************************************
  		
  		//COMANDO PARA POSTGRE
		//$stmp = "SELECT MAX(\"CD_TRM\") AS maximo FROM \"TRM\"";
		
		//COMANDO PARA MYSQL
		$stmp = "SELECT MAX(CD_TRM) AS maximo FROM TRM";
		 
		$consulta=$res->retorno->query($stmp); 
		
		while ($row=$consulta->fetchRow(DB_FETCHMODE_ASSOC)){
		
			$this->codTermo = $row['maximo'];
		}
		
		//libera a consulta
		$consulta->free();
		
		$this->codTermo = $this->codTermo + 1;
  		
  		
  	//******************************************* INSERE TERMO *****************************************************
		    $countTermo = count($arrformTermo);
		    $countSig	= count($arrformSignificado);
			
			for ($i = 0; $i < $countTermo; $i++) {
				
				//COMANDO SQL PARA POSTGRE
				//$stmp ="INSERT INTO \"TRM\" (\"CD_TRM\" , \"CD_ONT\" , \"NM_TRM\" , \"SIG_TRM\")  VALUES (?, ?, ?, ? )";
		    
				//COMANDO SQL PARA MYSQL    	
				$stmp ="INSERT INTO TRM (CD_TRM , CD_ONT , NM_TRM , SIG_TRM)  VALUES ('$this->codTermo','$codigoOntologia', strtoupper('$arrformTermo[$i]'), strtoupper('$arrformTermo[$i]'))";
				
				$this->codTermo = $this->codTermo + 1;
				
				$this->resultado=$res->retorno->query($stmp);
			}
			
  }			
  
    
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
  
}
?>