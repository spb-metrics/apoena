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
			 j.mar.rap@gmail.com (José Marcelo P. de Araujo - desenvolverdor do projeto)
 */
 
session_start();

require_once 'includes/config.php';
require_once 'configs/.connect.php';

if(!isset ($smarty)){
	require('Smarty.class.php');
}

	$res = new TCon;
	$res->abreconexao;
	
	/*
	 * Método responsável por controlar
	 * as ações iniciais do objeto Clipping.  
	 * Utiliza o parâmetro acaoClipping para indicar
	 * a atividade referente ao Objeto Clipping 
	 * que será inicializado pelo sistema.
	 */
	
	function form(){
 	  
		require_once '.usuarioDao.php';
		require_once '.grupoUsuarioDao.php';
		require_once '.clippingDao.php';
		require_once '.emailDao.php';
		
		
   		$smarty = new Smarty;

	  	$smarty->assign('php_self',$_SERVER['PHP_SELF']);
	  
	  	$usuario 		= new Usuario();
	  	$grupoUsuario	= new GrupoUsuario();
	  	$clipping 		= new Clipping();
	  	$email 			= new Email();
	  	
	  	
	  	$acaoClipping = $_GET['acaoClipping'];
	  	
	  	switch ($acaoClipping){
		
	  		case 1:
	  		
	  			$email->consultarEmail(); 
	    		
	    		$smarty->assign('codConfiguracao',$email->codConfiguracao);
	  			$smarty->assign('email',$email->e_mail);
	  		
	  			$clipping->consultarClipping();
	  				
	  			$smarty->assign('codClipping',$clipping->codClipping);
	  			$smarty->assign('nomeClipping',$clipping->nomeClipping);
	  			$smarty->assign('arquivo',$clipping->arquivo);
	  			
	  			
	  			$grupoUsuario->consultarGrupoUsuario();
	    		
	    		$smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
	   			$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
	   			$smarty->assign('descricaoGrupoUsuario',$grupoUsuario->descricaoGrupoUsuario);
	  			
	  			$usuario->consultarUsuario();
	    		
	    		$smarty->assign('codUsuario',$usuario->codUsuario);
	   			$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
	   			$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
	   			$smarty->assign('e_mail',$usuario->e_mail);
	  		
	  			
	    		$smarty->display('mensagemEmail.tpl');
	    	break;
	    	case 2:
	  			
	    		$email->consultarEmail(); 
	    		
	    		$smarty->assign('codConfiguracao',$email->codConfiguracao);
	  			$smarty->assign('e_mail',$email->e_mail);
	  			
	  			$smarty->display('alteraEmail.tpl');
	  		
	  		break;
	    	case 3:
	  			
	    		$email->consultarEmail(); 
	    		
	    		$smarty->assign('codConfig',$email->codConfiguracao);
	  			$smarty->assign('email',$email->e_mail);
	  			$smarty->assign('host',$email->host);
	  			$smarty->assign('porta',$email->porta);
	  			
	  			$smarty->display('consultaEmail.tpl');
	  		
	  		break;
	    	case 4:

	    		$email->consultarEmail(); 
	    		
	    		$smarty->assign('codConfiguracao',$email->codConfiguracao);
	  			$smarty->assign('e_mail',$email->e_mail);
	    	
	    	
	    		$smarty->display('deletaEmail.tpl');
	  		
	  		break;
	  		case 5:
	  		
	  			$smarty->display('cadastroEmail.tpl');
	  		
	  		break;
	  		case 6:
	  		
	  			$clipping->consultaClippingResumo();
	  				
	  			$smarty->assign('codClipping',$clipping->codClipping);
	  			$smarty->assign('nomeClipping',$clipping->nomeClipping);
	  			$smarty->assign('arquivo',$clipping->arquivo);
	  			
	  			
	  			$smarty->display('mergeClipping.tpl');
	  		break ;
	  		case 7:
	  		
	  			$clipping->consultaClippingResumo();
	  				
	  			$smarty->assign('codClipping',$clipping->codClipping);
	  			$smarty->assign('nomeClipping',$clipping->nomeClipping);
	  			$smarty->assign('arquivo',$clipping->arquivo);
	  			
	  			
	  			$smarty->display('consultaClipping.tpl');

	  		break;
	  		
	  		default:
	    	break;
		}
	  	
	  	
	}
	
	
	
	/*
	 * Método responsável por obter
	 * os e_mails e arquivosClipping de acordo 
	 * com os respectivos códigos selecionados
	 */
	
	
	function formatarEmail(){
		
	   	require_once '.clippingDao.php';
	   	require_once '.usuarioDao.php';
	   	require_once '.emailDao.php';
	   	require_once '.grupoUsuarioDao.php';
	  
	  	$smarty = new Smarty;
     
	  	$clipping 		= new Clipping();
	  	$usuario  		= new Usuario();
	  	$email 			= new Email();
	  	$grupoUsuario	= new GrupoUsuario();
	  

		if(isset($_POST['itemEmail']) && isset($_POST['itensClipping']) || isset($_POST['itensUsuario']) || isset($_POST['itensGrupoUsuario'])){	
	    
			$emailSelecionado 		= $_POST['itemEmail'];
			$clippingSelecionados 	= $_POST['itensClipping'];
			$gruposUsuarios			= $_POST['itensGrupoUsuario'];
			$usuarioSelecionados 	= $_POST['itensUsuario'];
			
	    	for($i=0; $i<sizeof($clippingSelecionados); $i++) {
	
	    		$clipping->consultarClp($clippingSelecionados[$i]);
			}
			
			for($j=0; $j<sizeof($usuarioSelecionados); $j++) {
	
	    		$usuario->consultarEmailUsuario($usuarioSelecionados[$j]);
			}
			
			for($m=0; $m<sizeof($gruposUsuarios); $m++) {
	
	    		$grupoUsuario->consultarUsuarioGrupo($gruposUsuarios[$m]);
			}

			// junto os arrays usuario e grupo de usuarios
			$arrayEmailUnico = array_merge($usuario->e_mail,$grupoUsuario->emailUsuario);
			
			//remove os valores repitidos
			$arrayEmailLimpo = array_unique($arrayEmailUnico);

			//chamada do método que envia os emails
	  		enviarEmailFree($clipping->arquivo, $arrayEmailLimpo, $emailSelecionado);
	  		
	  		
			
	    }else{
	    
	    	$email->consultarEmail(); 
	    		
    		$smarty->assign('codConfiguracao',$email->codConfiguracao);
  			$smarty->assign('email',$email->e_mail);
  		
  			$clipping->consultarClipping();
  				
  			$smarty->assign('codClipping',$clipping->codClipping);
  			$smarty->assign('nomeClipping',$clipping->nomeClipping);
  			$smarty->assign('arquivo',$clipping->arquivo);
  			
  			$grupoUsuario->consultarGrupoUsuario();
	    		
	    	$smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
	   		$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
	   		$smarty->assign('descricaoGrupoUsuario',$grupoUsuario->descricaoGrupoUsuario);
  			
  			$usuario->consultarUsuario();
    		
    		$smarty->assign('codUsuario',$usuario->codUsuario);
   			$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
   			$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
   			$smarty->assign('e_mail',$usuario->e_mail);
	    
	    	$smarty->assign('resultado','branco');
	    	$smarty->assign('campo','branco');
	    	
	    	$smarty->display('mensagemEmail.tpl');
	    }	
		
	}
	
	
	
	/*
	 * Método responśavel por enviar os emails  
	 * com os clippings selecionados pelo usuário 
	 *
	 * Recebe um parãmetro chamado E_mail e a pagina html do Clipping  
	 * 
	 */
	
	function enviarEmailFree($arrayCLP, $arrayUSU, $codigoEmail){
		
		//versão para a suiteTelecentro
		//require_once('libs/phpMailer_v2.3/class.phpmailer.php');
		//require_once('libs/phpMailer_v2.3/class.smtp.php');
		
		require_once 'ApoenaEmail.php';
		require_once 'smtp.php';
		
		require_once '.clippingDao.php';
	   	require_once '.usuarioDao.php';
	  	require_once '.emailDao.php';
	  	require_once '.grupoUsuarioDao.php';
	   	
	  	$smarty = new Smarty;
     
	  	$clipping 		= new Clipping();
	  	$usuario  		= new Usuario();
	  	$email 			= new Email();
	  	$grupoUsuario	= new GrupoUsuario();
	  	
	  	$email->consultarEmailCodigo($codigoEmail);
	  	
	  	$emailApoena 	= $email->e_mail[0];
	  	$host			= $email->host[0];
	  	$porta 			= $email->porta[0];
	  	$auth			= TRUE;
	  	$username		= $email->login[0];
	  	$password		= $email->senha[0];
	  	
	  	
	  	$mail = new ApoenaEmail(); //instância da classe que abre a conexão com a internet
	  	
	  	
	  	for($i=0; $i<sizeof($arrayUSU); $i++) {
		
			$mail->AddAddress($arrayUSU[$i],""); //email de destino
		}
		
		
		for($u=0; $u<sizeof($arrayCLP); $u++) {

			$mail->Host = $host; //seu servidor SMTP
			$mail->SMTPAuth = true; // 'true' para autenticação
			$mail->Username = $username; // usuário de SMTP
			$mail->Password = $password; // senha de SMTP
			$mail->Port = $porta;
			$mail->From = $emailApoena;
			$mail->FromName = "Apoena";
			$mail->Subject = "Clipping do Apoena";

			$mail->WordWrap = 50; // Definição de quebra de linha
			$mail->E_HTML(true); // envio como HTML se 'true'
			
			$mail->Body = "$arrayCLP[$u]";
			
			$result = $mail->Envia();
				
		}		
			

				if (!$result) {
					
					$email 		= new Email();
			 
				 	$email->consultarEmail(); 
	    		
		    		$smarty->assign('codConfiguracao',$email->codConfiguracao);
		  			$smarty->assign('email',$email->e_mail);	
				
					$clipping->consultarClipping();
			  				
		  			$smarty->assign('codClipping',$clipping->codClipping);
		  			$smarty->assign('nomeClipping',$clipping->nomeClipping);
		  			$smarty->assign('arquivoClipping',$clipping->arquivo);
		  		
		 			$grupoUsuario->consultarGrupoUsuario();
			    		
			    	$smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
			   		$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
			   		$smarty->assign('descricaoGrupoUsuario',$grupoUsuario->descricaoGrupoUsuario);
		  		
		  		
		  			$usuario->consultarUsuario();
		    		
		    		$smarty->assign('codUsuario',$usuario->codUsuario);
		   			$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
		   			$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
		   			$smarty->assign('e_mail',$usuario->e_mail);	
							
				  	$smarty->assign('resultado', $mail->ErrorInfo);

					$smarty->display('mensagemEmail.tpl');
					
				}else{
					
					$email = new Email();
					 
				 	$email->consultarEmail(); 
			    		
		    		$smarty->assign('codConfiguracao',$email->codConfiguracao);
		  			$smarty->assign('email',$email->e_mail);	
				 
				 	$clipping->consultarClipping();
			  				
		  			$smarty->assign('codClipping',$clipping->codClipping);
		  			$smarty->assign('nomeClipping',$clipping->nomeClipping);
		  			$smarty->assign('dataClipping',$clipping->dataAtualizacao);
		  			$smarty->assign('arquivoClipping',$clipping->arquivo);
		  		
		  			$grupoUsuario->consultarGrupoUsuario();
			    		
			    	$smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
			   		$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
			   		$smarty->assign('descricaoGrupoUsuario',$grupoUsuario->descricaoGrupoUsuario);
		  		
		  			$usuario->consultarUsuario();
		    		
		    		$smarty->assign('codUsuario',$usuario->codUsuario);
		   			$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
		   			$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
		   			$smarty->assign('e_mail',$usuario->e_mail);
				 	
				 	$smarty->assign('resultado', "ok");
		 	  
		 	  		$smarty->display('mensagemEmail.tpl');
				}
			
	}	
	
	
	/*
	 * Método responśavel por enviar os emails  
	 * com os clippings selecionados pelo usuário 
	 *
	 * OBS: ESTE MÉTODO NÃO ESTÁ SENDO UTILIZADO POR NÃO SER TRATAR DE UM CÓDIGO CARACTERIZADO COMO SOFTWARE LIVRE
	 * 
	 * Recebe um parãmetro chamado E_mail e a pagina html do Clipping  
	 * 
	 */
	
	function enviarEmailNãoSoftwareLivre($arrayCLP, $arrayUSU, $codigoEmail){
		
		//versão para a suiteTelecentro
		require_once 'libs/pear/Mail.php';
		require_once 'libs/pear/Mail/mime.php';
		
		//versão para o Debian lenny
		//require_once 'Mail.php';
		//require_once 'Mail/mime.php';
		
		
		require_once '.clippingDao.php';
	   	require_once '.usuarioDao.php';
	  	require_once '.emailDao.php';
	  	require_once '.grupoUsuarioDao.php';
	   	
	  	$smarty = new Smarty;
     
	  	$clipping 		= new Clipping();
	  	$usuario  		= new Usuario();
	  	$email 			= new Email();
	  	$grupoUsuario	= new GrupoUsuario();
	  	
	  	
	  	$email->consultarEmailCodigo($codigoEmail);
	  	
	  	$emailApoena 	= $email->e_mail[0];
	  	$host			= $email->host[0];
	  	$porta 			= $email->porta[0];
	  	$auth			= TRUE;
	  	$username		= $email->login[0];
	  	$password		= $email->senha[0];
	  	
	  	
		for($i=0; $i<sizeof($arrayUSU); $i++) {
		
			for($u=0; $u<sizeof($arrayCLP); $u++) {
				 
				$text = 'Apoena Clipping';
				
				$crlf = "\n";
				
				$mime = new Mail_mime($crlf);
				
				
				$mime->setTXTBody($text);
				$mime->setHTMLBody($arrayCLP[$u]);
				
				$body = $mime->get();

				$headers['From'] =  "Apoena <".$emailApoena.">";
				$headers['To'] = 'j.mar.rap@gmail.com';
				$headers['Cc'] = 'j.mar.rap@gmail.com';
				$headers['Bcc'] = 'j.mar.rap@gmail.com';
				$headers['Subject'] = 'Clipping do Apoena';
				
				
				$headers = $mime->headers($headers);
				
				$params['host'] = $host;
				$params['port'] = $porta;
				$params['auth'] = TRUE;
				$params['username'] = $username;
				$params['password'] = $password;
				
				 
				$mail_object =& Mail::factory('smtp', $params);
				
				$mail = $mail_object->send($arrayUSU[$i], $headers, $body);
	
			}
		}
				
		
		if (PEAR::isError($mail)) {
			
			$email = new Email();
		 
		 	$email->consultarEmail(); 
	    		
    		$smarty->assign('codConfiguracao',$email->codConfiguracao);
  			$smarty->assign('email',$email->e_mail);	
		
			$clipping->consultarClipping();
	  				
  			$smarty->assign('codClipping',$clipping->codClipping);
  			$smarty->assign('nomeClipping',$clipping->nomeClipping);
  			$smarty->assign('arquivoClipping',$clipping->arquivo);
  		
  			$grupoUsuario->consultarGrupoUsuario();
	    		
	    	$smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
	   		$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
	   		$smarty->assign('descricaoGrupoUsuario',$grupoUsuario->descricaoGrupoUsuario);
  		
  		
  			$usuario->consultarUsuario();
    		
    		$smarty->assign('codUsuario',$usuario->codUsuario);
   			$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
   			$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
   			$smarty->assign('e_mail',$usuario->e_mail);	
		
					
		  	$smarty->assign('resultado',$mail->getMessage());
		  	
		  	$smarty->display('mensagemEmail.tpl');
		 
		 } else {
		 	
			$email = new Email();
		 
		 	$email->consultarEmail(); 
	    		
    		$smarty->assign('codConfiguracao',$email->codConfiguracao);
  			$smarty->assign('email',$email->e_mail);	
		 
		 	$clipping->consultarClipping();
	  				
  			$smarty->assign('codClipping',$clipping->codClipping);
  			$smarty->assign('nomeClipping',$clipping->nomeClipping);
  			$smarty->assign('dataClipping',$clipping->dataAtualizacao);
  			$smarty->assign('arquivoClipping',$clipping->arquivo);
  		
  			$grupoUsuario->consultarGrupoUsuario();
	    		
	    	$smarty->assign('codGrupoUsuario',$grupoUsuario->codGrupoUsuario);
	   		$smarty->assign('nomeGrupoUsuario',$grupoUsuario->nomeGrupoUsuario);
	   		$smarty->assign('descricaoGrupoUsuario',$grupoUsuario->descricaoGrupoUsuario);
  		
  			$usuario->consultarUsuario();
    		
    		$smarty->assign('codUsuario',$usuario->codUsuario);
   			$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
   			$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
   			$smarty->assign('e_mail',$usuario->e_mail);
		 	
		 	$smarty->assign('resultado', "ok");
	  		$smarty->display('mensagemEmail.tpl');
		 }	
		 
	
	}
	
	
	
	
	/*
	 * Método responsável por mostrar os resultados 
	 * dos clipping
	 */
	
	function mostrarClipping () {
				
		require_once '.clippingDao.php';
	   	require_once '.usuarioDao.php';
	  	require_once '.emailDao.php';
	   	
	  	$smarty = new Smarty;
     
	  	$clipping 	= new Clipping();
	  	$usuario  	= new Usuario();
	  	$email 		= new Email();		
				
	  	
		//if para obter os clippings selecionados
	  	if(isset($_POST['itensClipping'])){                 
	  					 
			$clippingSelecionados = $_POST['itensClipping'];
			
	    	for($i=0; $i<sizeof($clippingSelecionados); $i++) {
	
				$clipping->consultarResumoClp($clippingSelecionados[$i]);
			}
			
			$smarty->assign('totalResumo', $clipping->total);
			$smarty->assign('codigoResumo', $clipping->codClipping);
			$smarty->assign('nomeResumoClipping', $clipping->nomeClipping);
			$smarty->assign('arquivoResumoClipping',$clipping->arquivo);
		
			$smarty->display('clipping.tpl');
			
			
	    }else{
	    
			$email->consultarEmail(); 
	    		
    		$smarty->assign('codConfiguracao',$email->codConfiguracao);
  			$smarty->assign('email',$email->e_mail);
  		
  			$clipping->consultarClipping();
  				
  			$smarty->assign('codClipping',$clipping->codClipping);
  			$smarty->assign('nomeClipping',$clipping->nomeClipping);
  			$smarty->assign('arquivo',$clipping->arquivo);
  			
  			$usuario->consultarUsuario();
    		
    		$smarty->assign('codUsuario',$usuario->codUsuario);
   			$smarty->assign('nomeTipoUsuario',$usuario->nomeTipoUsuario);
   			$smarty->assign('nomeUsuario',$usuario->nomeUsuario);
   			$smarty->assign('e_mail',$usuario->e_mail);
	    
	    	$smarty->assign('resultado','branco');
	    	$smarty->assign('campo','branco');
	    	
	    	$smarty->display('mensagemEmail.tpl');    
			
	    }
	}
	
	
	/*
	 * Método responsável por inserir os dados do e-mail
	 * da operadora vinculado ao sistema APOENA
	 */
	
	
	function cadastrarEmailSistema(){
	
		require_once '.emailDao.php';
	   	
	   	$smarty = new Smarty;
     
	  	$email = new Email();
	  	
	  	$e_mail = $_POST["emailApoena"];
	  	$host 	= $_POST["host"];
	  	$porta 	= $_POST["porta"];
	  	$auth 	= $_POST["auth"];
	  	$login 	= $_POST["login"];
	  	$senha 	= $_POST["senha"];
	  	
	  	
	  	if($e_mail != "" && $host != "" && $porta != "" && $auth != "" && $login != "" && senha != ""){
	  	
	  		$arrayEmail =array(0 => addslashes($e_mail), 1 => addslashes($host), 2 => addslashes($porta), 3 => $auth, 4 => addslashes($login), 5 => $senha);  
	  	
	  		$email->inserirEmailApoena($arrayEmail);
	  			    
	  		$smarty->assign('operacao',1);
			$smarty->display('cadastroEmail.tpl');
	  		
	  	}else{
	  	
	  		$smarty->assign('operacao',2);
			$smarty->display('cadastroEmail.tpl');
	  	}
	  	
	
	}

	
	
	/*
	 * Método responsável por consulta um email
	 * de acordo com o código da configuração do e-mail 
	 * 
	 */
	
	
	function consultarEmailPorCodigo(){
	
		require_once '.emailDao.php';
	   	
	  	$smarty = new Smarty;
     
	  	$email = new Email();		
				

	  	$codigoConfiguracao = $_GET["codConfiguracao"];
	  	
	  	
	  	$email->consultarEmail(); 
	    		
    	$smarty->assign('codConfiguracao',$email->codConfiguracao);
	  	$smarty->assign('e_mail',$email->e_mail);
	  	
	  	
	  	$email = new Email();
	  	
	  	if($codigoConfiguracao != ""){
	  	
	  		$email->consultarEmailCodigo($codigoConfiguracao);
	  	}
	  	
	  	$smarty->assign('cdConfiguracao', $email->codConfiguracao);
		$smarty->assign('host', $email->host);
		$smarty->assign('porta', $email->porta);
		$smarty->assign('codigoAuth',$email->auth);
		$smarty->assign('email', $email->e_mail);
		$smarty->assign('login',$email->login);
		$smarty->assign('senha',$email->senha);
		
		$smarty->assign('alteracao',1);
		
		
		$smarty->display('alteraEmail.tpl');
	
	}
	
	/*
	 * Método responsável por atualizar os dados da tabela 
	 * CONFIG_EMAIL
	 */
	
	function atualizarEmail(){
	
	
		require_once '.emailDao.php';
	   	
	  	$smarty = new Smarty;
     
	  	$email = new Email();		
				
		$cdConfig	= $_POST["cdConfig"];   	
		$e_mail 	= $_POST["emailApoena"];
	  	$host 		= $_POST["host"];
	  	$porta 		= $_POST["porta"];
	  	$auth 		= $_POST["auth"];
	  	$login 		= $_POST["login"];
	  	$senha 		= $_POST["senha"];
	  	
	  	
	  	if($e_mail != "" && $host != "" && $porta != "" && $auth != "" && $login != "" && $senha != "" && $cdConfig != ""){
	  	
	  		$arrayEmail =array(0 => $cdConfig ,1 => addslashes($e_mail), 2 => addslashes($host), 3 => addslashes($porta), 4 => $auth, 5 => addslashes($login), 6 => $senha);  
	  	
	  		$email->atualizarEmail($arrayEmail);
	  		
	  		$email->consultarEmail(); 
	    		
    		$smarty->assign('codConfiguracao',$email->codConfiguracao);
  			$smarty->assign('e_mail',$email->e_mail);
	  		
	  		$smarty->assign('operacao',1);
    		
	  	}else{
	  		
	  		$email->consultarEmail(); 
	    		
    		$smarty->assign('codConfiguracao',$email->codConfiguracao);
  			$smarty->assign('e_mail',$email->e_mail);
	  	
	  		$smarty->assign('operacao',2);
			
	  	}
	  	
	  	$smarty->display('alteraEmail.tpl');
  		
	}
	
	
	/*
	 * Método responsável por deletar o email do 
	 * sistema APOENA registrado na operadora 
	 * 
	 */
	
	function delatarEmail(){
	
		require_once '.emailDao.php';
	   	
	   	$smarty = new Smarty;
     
	  	$email = new Email();
	  							  	
	  	$codConfiguracao = $_POST["emailConfig"];
	  	
	  		  	
	  	if($codConfiguracao != ""){
	  	
	  		
	  		$email->deletarEmailApoena($codConfiguracao);
	  		
	  		$email = new Email();
	  		
	  		$email->consultarEmail(); 
	    		
	    	$smarty->assign('codConfiguracao',$email->codConfiguracao);
	  		$smarty->assign('e_mail',$email->e_mail);
	  			    
	  		$smarty->assign('operacao',1);
			$smarty->display('deletaEmail.tpl');
	  		
	  	}else{
	  	
	  		$email = new Email();
	  		
	  		$email->consultarEmail(); 
	    		
	    	$smarty->assign('codConfiguracao',$email->codConfiguracao);
	  		$smarty->assign('e_mail',$email->e_mail);
	  	
	  		$smarty->assign('operacao',2);
			$smarty->display('deletaEmail.tpl');
	  	}
	
	}
	
	/*
	 * Método responsável por montar a seleção de documentos
	 * de vários tipos de Fontes, para compor um resumo do clipping
	 * que envolva informações de todos os tipos de Fontes
	 *
	 */
	
	function listarClippingMerge(){
	
		require_once".clippingDao.php";
		
		$clipping 	= new Clipping();
			
		$smarty 	= new Smarty;
		
		$codigoClipping = $_POST['itensClipping'];
		$nomeClipping	= strtoupper($_POST['nomeMergeClipping']);
		
		if($codigoClipping != "" && $nomeClipping != ""){
	  	
	  		for($m=0; $m<sizeof($codigoClipping); $m++) {
	
	    		$clipping->consultarClippings($codigoClipping[$m]);
	    		
			}	
	  	
	  		for($i=0; $i<sizeof($codigoClipping); $i++) {
	
	    		$mergeClipping .= $clipping->arquivo[$i];
	    		
			}	
			
			
	  		$clipping->inserirMergeClipping($nomeClipping, $mergeClipping);
	  	
	  		$smarty->assign('arquivo', $clipping->arquivo);

			$smarty->assign('resultado', 1);
	  	
	  		$smarty->display('clippingMisturados.tpl');
	  		
	  	}else{
	  	
	  		$clipping->consultaClippingResumo();
	  				
	  		$smarty->assign('codClipping',$clipping->codClipping);
	  		$smarty->assign('nomeClipping',$clipping->nomeClipping);
	  		$smarty->assign('arquivo',$clipping->arquivo);
	  		
	  		$smarty->assign('campo', 'branco');
	  			
	  		$smarty->display('mergeClipping.tpl');
	  	}	
	
	}

   	function deletarClipping(){
	
		require_once '.clippingDao.php';

		$smarty = new Smarty;
			
	    $clipping = new Clipping();
	    
	    if(isset($_POST['itensClipping'])){	
	    
			$codigoClipping = $_POST['itensClipping'];
			
	    	for($i=0; $i<sizeof($codigoClipping); $i++) {
	
	    		$clipping->fimClipping($codigoClipping[$i]);
			}
	    }else{
	    
	        $clipping->consultaClippingResumo();
	  		$smarty->assign('codClipping',$clipping->codClipping);
	  		$smarty->assign('nomeClipping',$clipping->nomeClipping);
	  		$smarty->assign('arquivo',$clipping->arquivo);
	  		$smarty->assign('campo', 'branco');
	  		$smarty->display('consultaClipping.tpl');
	      	      
	    }
	 echo "<center> Exclusão processada com sucesso</center>";
	}
	
   	
	function enviarEmailTeste(){
	
		require_once('libs/phpMailer_v2.3/class.phpmailer.php');
		require_once('libs/phpMailer_v2.3/class.smtp.php');
		
		$mail = new PHPMailer();
		
		$mail->IsSMTP(); // send via SMTP
		$mail->Host = "smtp.mail.yahoo.com.br"; //seu servidor SMTP
		$mail->SMTPAuth = true; // 'true' para autenticação
		$mail->Username = "apoenadebian"; // usuário de SMTP
		$mail->Password = "telecentro"; // senha de SMTP
		$mail->Port = "587";
		$mail->From = "apoenadebian@yahoo.com.br";
		$mail->FromName = "apoena";
		
		$mail->AddAddress("j.mar.rap@gmail.com","Marcelo");

		$mail->WordWrap = 50; // Definição de quebra de linha

		$mail->IsHTML(true); // envio como HTML se 'true'
		$mail->Subject = "Assunto da mensagem ";
		$mail->Body = "Conteúdo da mensagem HTML ";
		$mail->AltBody = "Para mensagens somente texto";
		
		if(!$mail->Send()){
		
			echo "Mensagem não enviada!!!";
			echo "Mailer Error: " . $mail->ErrorInfo;
			
		} else {
		
			echo "Mensagem enviada";
		}
		
	}
	
	
	
	/*
	 * Método centralizador das chamados de outros métodos  
	 * que executam atividades referentes ao objeto Clipping
	 * 
	 * Recebe um parãmetro chamado Submit, que indica  
	 * a ação a ser executado pelo sistema 
	 * 
	 */
	
	
	switch ($Submit){
		
	  case "enviar":
	  	formatarEmail();
	  	break;
	  case "mostrar Clipping":
	  	mostrarClipping();
	  	break;
	  case "cadastrar";
	    cadastrarEmailSistema();
	    break;
	  case "consultarEmail";
	  	consultarEmailPorCodigo();
	  	break;
	  case "alterar";
	  	atualizarEmail();
	  	break;
	  case "deletar";
	  	delatarEmail();
	  	break;
	  case "montar merge";	
	  	listarClippingMerge();
	  	break;
	  case "Excluir Clipping";	
	  	deletarClipping();
	  	break;
	  default:
	    form();
	    break;
	}
	
	
?>