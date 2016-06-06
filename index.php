<?PHP
header("content-type: text/html; charset=utf-8");
?>

<?PHP 
/*
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
 
    Você deve ter recebido uma cópia da Licença Pública Geral GNU
    junto com este programa; se não, escreva para a Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
    02111-1307, USA
    
    Contato: accrvianna@bb.com.br (Antônio Carlos C. R. Vianna - Análista responsável pelo projeto)
*/

//session_start();
//session_destroy();

//session_register("acao");

$acao="";

require('Smarty.class.php');

$smarty = new smarty;

// OS TEMPLATES
// $smarty->template_dir = $_SERVER['DOCUMENT_ROOT']."/templates/";

//ONDE O ENGINE VAI ESCREVER OS ARQUIVOS COMPILADOS EM CACHE
// $smarty->compile_dir = $_SERVER['DOCUMENT_ROOT']."/templates_c/";

//ARQUIVOS DE CONFIGURAO DO TEMPLATES
// $smarty->config_dir = $_SERVER['DOCUMENT_ROOT']."/configs/";

//CACHE DOS ARQUIVOS COMPILADOS
// $smarty->cache_dir = $_SERVER['DOCUMENT_ROOT']."/cache/";

//SE ESTIVER FALSE, TODA REQUISIO VAI SER COMPILADA
// $smarty->compile_check = true;

//TELA DE DEBUG HABILITADA
// $smarty->debugging = true;


//require('documentoControle.php');

require('inicio.php');

?>
