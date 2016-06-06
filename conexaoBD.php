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
 
    Este programa está nomeado como .acessoDao.php e possui 117
	linhas de código. 
			 
	Você deve ter recebido uma cópia da Licença Pública Geral GNU
	junto com este programa; se não, escreva para a Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
	02111-1307, USA
			    
	Contato: accrvianna@bb.com.br (Antônio Carlos C. R. Vianna - desenvolverdor do projeto)
			 j.mar.rap@gmail.com (José Marcelo P. de Araujo - desenvolverdor do projeto)
 */


/**
* Classe responsável por executar a conexão 
* ao Banco de Dados MYSQL ou POSTGRE
*/

class conexaoBD {

   private $host="localhost";
   private $usuario="root";
   private $senha="12345678";
   private $bancoDados="apoena";

   private $query;
   private $link;
   private $result;

	/**
	* Método construtor da classe
	*
	*/
	
   function conexaoBD(){   }

   /**
	* Método responsável criar a conexão ao Banco de Dados
	*
	*/

   function connect(){
   
     $this->link=mysql_connect($this->host,$this->usuario,$this->senha);
     
     if(!$this->link){
       echo "Erro: " . mysql_error();
       die();
     
     }elseif(!mysql_select_db($this->bancoDados, $this->link)){
     
       echo "Erro: " . mysql_error();
       die();
     }
   }

   
   /**
	* Método responsável executar as instruções SQL
	*
	*/
   
   function executeQuery($query){
   
     $this->connect();
     $this->query=$query;
   
     	if($this->result=mysql_query($this->query)){
     
       		$this->disconnect();
       		return $this->result;

	     }else{
    
	       echo "Erro :" . mysql_error();
	       echo "SQL: " . $query;
	       die();
	       disconnect();
     }
   }

   
   /**
	* Método responsável desconectar o Banco de Dados
	*
	*/

   function disconnect(){
     return mysql_close($this->link);
   }
 }

?>