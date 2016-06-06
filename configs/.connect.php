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
 */


//  function conecta($con){
  
//	 $query= new TCon();
	  
//	 if ($con ==1){ 
	     
//	    $conexao = $query -> abreconexao();
	    
//	 }else{ 
	 
//	    $conexao = $query -> fechaconexao();
//	 }
//  }


// class TCon {

//    var $Conn; 
//    var $Sql;
//    var $retorno;

//	private $host 		= "localhost";
//	private $usuario	= "root";
//	private $senha		= "12345678";
//	private $nomeBase 	= "apoena";		  	

//    var $Options = array('debug' => 2,'portability' => DB_PORTABILITY_ALL, );	
//    var $queryID;
//    var $record;

//	define('DB_FETCHMODE_ORDERED', 1);
	
    
//    function abreconexao(){
    
//    	$this->Conn = mysql_connect("$this->host", "$this->usuario", "$this->senha")
//			or die ("Problemas ao conectar ao banco de dados!");
//		mysql_selectdb("$this->nomeBase")
//			or die ("Problemas ao selecionar o banco de dados!");
		
		
		
//    }
    
//  	function fechaconexao() {
  
//	 	$this->abreconexao();
//        $this->Conn->disconnect();
//    }


//  function query($Sql){
   
//   echo $Sql;
   
   
//    if(empty($this->Conn))
//      $this->abreconexao();
//      $this->queryID = $this->Conn->query($Sql);


//	if(!($con=mysql_select_db($this->nomeBase,$this->queryID))) {
		
//		echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. ";
//		exit;
//	}
	
//  }
  
  
//   function nextRows(){
   
//     while ($this->queryID->fetchInto($row, 1)){
//		 echo $row[2] . "<br>";
//     }
//   }
   

//}//end class


class TCon {


	var $id;	// Identificador da conexão
	var $res;	// Armazena resultado das consultas
	var $qtd;	// Quantidade de linhas retornadas
	var $data;	// Armazena os dados retornados
	var $erro;	// Armazena o últmo erro
	
	var $retorno;
	
	
	private $host 		= "localhost";
	private $usuario	= "root";
	private $senha		= "12345678";
	private $nomeBase 	= "apoena";
	
	
	function abreconexao(){

		$this->id = mysql_connect("$this->host", "$this->usuario", "$this->senha")
			or die ("Problemas ao conectar ao banco de dados!");
		mysql_selectdb("$this->nomeBase")
			or die ("Problemas ao selecionar o banco de dados!");		
			
			
			
	}


	function query($sql="")	{

		if ($sql=="")	{       
			$this->res = 0; 
			$this->qtd = 0; 
		} else {            
			$this->res = mysql_query($sql, $this->id); 
			if ($this->res) 
				$this->qtd = mysql_num_rows($this->res); 
		}
		
		$this->retorno = $this->res;
		
		return $this->retorno;
		
	}
	
	function manipula($sql="")	{

		if (mysql_query($sql, $this->id))	{
			return TRUE; 
		} else {
			$this->erro = mysql_error($this->id); 
			return FALSE;
		}
	}

	function dados()	{
		/* Busca os dados de uma linha do resultado e
		   posiciona o ponteiro na próxima.
                   Para listar os dados no código basta utilizar por exemplo:
                   while ($obj->dados())  {
                      echo $obj->data["nome"];
                   }
		*/
		if ($this->data = mysql_fetch_array($this->res))	{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function fecha()	{
		mysql_close($this->id);
		$this->id = "";
		$this->res = 0;
		$this->qtd = 0;
		$this->data = "";
	}
}



?>
