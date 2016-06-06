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
 
    Este programa está nomeado como mensagemControle.php e possui 752
	linhas de código. 
			 
	Você deve ter recebido uma cópia da Licença Pública Geral GNU
	junto com este programa; se não, escreva para a Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
	02111-1307, USA
			    
	Contato: accrvianna@bb.com.br (Antônio Carlos C. R. Vianna - desenvolverdor do projeto)
 */


  /**
   * Classe php responsável configurar, formatar e enviar 
   * e-mails 
   */

 class SMTP {
  
  public $SMTP_PORT = 25;
  public $CRLF = "\r\n";
  public $do_debug;       
  public $do_verp = false;

  private $smtp_conn;      
  private $error;          
  private $helo_rply;      


  /**
  * Método construtor da classe 
  *
  */
  
  public function __construct() {
  
    $this->smtp_conn = 0;
    $this->error = null;
    $this->helo_rply = null;
    $this->do_debug = 0;
    
  }

  /**
  * Método responsável por executar a conexão à internet 
  * para o envio do e-mail
  *
  */


  public function Connect($host,$port=0,$tval=30) {

    $this->error = null;

    if($this->connected()) {

      $this->error = array("error" => "Servidor ainda conectado");
      return false;
    }

    if(empty($port)) {
      $port = $this->SMTP_PORT;
    }

    $this->smtp_conn = fsockopen($host,$port, $errno, $errstr, $tval);  
    
    if(empty($this->smtp_conn)) {
      	
      	$this->error = array("error" => "Coneção não realizada",
                           "errno" => $errno,
                           "errstr" => $errstr);
      	if($this->do_debug >= 1) {
        	echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": $errstr ($errno)" . $this->CRLF;
        }
      
      return false;
    }


    if(substr(PHP_OS, 0, 3) != "WIN"){
    	 socket_set_timeout($this->smtp_conn, $tval, 0);
	}
	
	$announce = $this->get_lines();

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $announce;
    }

    return true;
  }


  /**
  * Método responsável por executar a conexão à internet 
  * para o envio do e-mail
  *
  */

  public function StartTLS() {

    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array("error" => "Called o método StartTLS() sem estar conectado");
      return false;
    }

    fputs($this->smtp_conn,"STARTTLS" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 220) {
      $this->error =
         array("error"     => "STARTTLS não aceito pelo servidor",
               "smtp_code" => $code,
               "smtp_msg"  => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $rply . $this->CRLF;
      }
      return false;
    }

    if(!stream_socket_enable_crypto($this->smtp_conn, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
      return false;
    }

    return true;
  }


  /**
  * Método responsável por autenticar a conexão à internet 
  * para o envio do e-mail
  *
  */

  public function Authenticate($username, $password) {

    fputs($this->smtp_conn,"AUTH LOGIN" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($code != 334) {
      $this->error =
        array("error" => "AUTH não aceito pelo servidor",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    fputs($this->smtp_conn, base64_encode($username) . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($code != 334) {
      $this->error =
        array("error" => "Username não aceito pelo servidor",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    fputs($this->smtp_conn, base64_encode($password) . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($code != 235) {
      $this->error =
        array("error" => "Password não aceito pelo servidor",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    return true;
  }

  /**
  * Método responsável por verificar se a conexão à internet está estabelecida
  * para o envio do e-mail
  *
  */	

  public function Connected() {

    if(!empty($this->smtp_conn)) {

      $sock_status = socket_get_status($this->smtp_conn);

      if($sock_status["eof"]) {

        if($this->do_debug >= 1) {
            echo "SMTP -> NOTICE:" . $this->CRLF .
                 "EOF travando ao verificar a conexão";
        }
        $this->Close();
        return false;
      }
      return true; 
    }
    return false;
  }

  /**
  * Método responsável por fechar a conexão à internet 
  * para o envio do e-mail
  *
  */

  public function Close() {

    $this->error = null; 
    $this->helo_rply = null;

    if(!empty($this->smtp_conn)) {

      fclose($this->smtp_conn);
      $this->smtp_conn = 0;
    }
  }


  /**
  * Método responsável por autenticar a conexão à internet 
  * para o envio do e-mail
  *
  */


  public function Data($msg_data) {

    $this->error = null;

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Chamando o método Data() sem estar conectada");
      return false;
    }

    fputs($this->smtp_conn,"DATA" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 354) {
      $this->error =
        array("error" => "DATA comando não aceito pelo servidor",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }


    $msg_data = str_replace("\r\n","\n",$msg_data);
    $msg_data = str_replace("\r","\n",$msg_data);
    $lines = explode("\n",$msg_data);

    $field = substr($lines[0],0,strpos($lines[0],":"));
    $in_headers = false;

    if(!empty($field) && !strstr($field," ")) {
      $in_headers = true;
    }

    $max_line_length = 998; 

    while(list(,$line) = @each($lines)) {
      $lines_out = null;
      if($line == "" && $in_headers) {
        $in_headers = false;
      }

      while(strlen($line) > $max_line_length) {
        $pos = strrpos(substr($line,0,$max_line_length)," ");

        if(!$pos) {
          $pos = $max_line_length - 1;
          $lines_out[] = substr($line,0,$pos);
          $line = substr($line,$pos);
        } else {
          $lines_out[] = substr($line,0,$pos);
          $line = substr($line,$pos + 1);
        }

        if($in_headers) {
          $line = "\t" . $line;
        }
      }

      $lines_out[] = $line;

      while(list(,$line_out) = @each($lines_out)) {
        if(strlen($line_out) > 0)
        {
          if(substr($line_out, 0, 1) == ".") {
            $line_out = "." . $line_out;
          }
        }
        fputs($this->smtp_conn,$line_out . $this->CRLF);
      }
    }

    fputs($this->smtp_conn, $this->CRLF . "." . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "DATA não aceita pelo servidor",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
  * Método responsável formatar o texto 
  * para o envio do e-mail
  *
  */ 

  public function Expand($name) {
    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
            "error" => "Chamando o método Expand() sem estar conectado");
      return false;
    }

    fputs($this->smtp_conn,"EXPN " . $name . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "EXPN não aceito pelo servidor",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    $entries = explode($this->CRLF,$rply);
    while(list(,$l) = @each($entries)) {
      $list[] = substr($l,4);
    }

    return $list;
  }


  /**
  * Método responsável formatar uma mensagem de apresentação 
  * para o envio do e-mail
  *
  */ 	
  
  public function Hello($host="") {

    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
            "error" => "Chamando o método Hello() sem estar conectado");
      return false;
    }

    if(empty($host)) {
      $host = "localhost";
    }

    if(!$this->SendHello("EHLO", $host))
    {
      if(!$this->SendHello("HELO", $host))
          return false;
    }

    return true;
  }

  /**
  * Método responsável enviar uma mensagem de apresentação 
  * para o envio do e-mail
  *
  */


  private function SendHello($hello, $host) {

    fputs($this->smtp_conn, $hello . " " . $host . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER: " . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => $hello . " Servidor não aceito",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    $this->helo_rply = $rply;

    return true;
  }


  /**
  * Método responsável formatar uma mensagem de ajuda
  * para o envio do e-mail
  *
  */


  public function Help($keyword="") {

    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Chamando o método Help() sem estar conectado");
      return false;
    }

    $extra = "";
    if(!empty($keyword)) {
      $extra = " " . $keyword;
    }

    fputs($this->smtp_conn,"HELP" . $extra . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 211 && $code != 214) {
      $this->error =
        array("error" => "HELP não aceito pelo servidor",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    return $rply;
  }
  
  /**
  * Método responsável formatar uma mensagem  
  * para o envio do e-mail
  *
  */
  
  public function Mail($from) {

    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Chamando o método Mail() sem estar conectado");
      return false;
    }

    $useVerp = ($this->do_verp ? "XVERP" : "");
    fputs($this->smtp_conn,"MAIL FROM:<" . $from . ">" . $useVerp . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "MAIL não aceito pelo servidor",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
  * Método responsável formatar uma mensagem 
  * para o envio do e-mail
  *
  */

  public function Noop() {

    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Chamando o método Noop() sem estar conectado");
      return false;
    }

    fputs($this->smtp_conn,"NOOP" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "NOOP não aceito pelo servidor",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }


  /**
  * Método responsável por fechar a conexão 
  *
  */	

  public function Quit($close_on_error=true) {

    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Chamando o método Quit() sem estar conectado");
      return false;
    }

    fputs($this->smtp_conn,"quit" . $this->CRLF);

    $byemsg = $this->get_lines();

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $byemsg;
    }

    $rval = true;
    $e = null;

    $code = substr($byemsg,0,3);
    if($code != 221) {
      $e = array("error" => "SMTP não foi fechado",
                 "smtp_code" => $code,
                 "smtp_rply" => substr($byemsg,4));
      $rval = false;
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $e["error"] . ": " .
                 $byemsg . $this->CRLF;
      }
    }

    if(empty($e) || $close_on_error) {
      $this->Close();
    }

    return $rval;
  }

  /**
  * Método responsável por formatar os parâmetros de envio do e-mail
  *
  */


  public function Recipient($to) {

    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Chamando o método Recipient() sem estar conectado");
      return false;
    }

    fputs($this->smtp_conn,"RCPT TO:<" . $to . ">" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250 && $code != 251) {
      $this->error =
        array("error" => "RCPT não aceito pelo servidor",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }


  /**
  * Método responsável por limpar a conexão que foi estabelecida
  *
  */

  public function Reset() {

    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Chamando o método Reset() sem estar conectado");
      return false;
    }

    fputs($this->smtp_conn,"RSET" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "RSET failed",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    return true;
  }
  
  /**
  * Método responsável por enviar o e-mail
  *
  */
  
  public function Send($from) {

    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Chamando o método Send() sem estar conectado");
      return false;
    }

    fputs($this->smtp_conn,"SEND FROM:" . $from . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "SEND não aceito pelo servidor",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
  * Método responsável desabilita o SMTP
  *
  */

  public function Turn() {

    $this->error = array("error" => "Desabilita o SMTP implementado");
    if($this->do_debug >= 1) {
      echo "SMTP -> NOTICE: " . $this->error["error"] . $this->CRLF;
    }
    return false;
  }

  /**
  * Método responsável verificar se o endereço está correto
  *
  */	

  public function Verify($name) {

    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Chamando o Verify() sem estar conectado");
      return false;
    }

    fputs($this->smtp_conn,"VRFY " . $name . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250 && $code != 251) {
      $this->error =
        array("error" => "VRFY verificação não para o nome '$name'",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return $rply;
  }
  
  /**
  * Método responsável por obter parte do texto do e-mail
  *
  */
  
  private function get_lines() {
    $data = "";
    while($str = @fgets($this->smtp_conn,515)) {
      if($this->do_debug >= 4) {
        echo "SMTP -> get_lines(): \$data was \"$data\"" .
                 $this->CRLF;
        echo "SMTP -> get_lines(): \$str is \"$str\"" .
                 $this->CRLF;
      }
      $data .= $str;
      if($this->do_debug >= 4) {
        echo "SMTP -> get_lines(): \$data is \"$data\"" . $this->CRLF;
      }
      if(substr($str,3,1) == " ") { break; }
    }
    return $data;
  }

}

?>