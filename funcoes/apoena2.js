//Software Apoena construído para gerar clippings de notícias.>
//Copyright (C) <2008>  <Banco do Brasil>
//	   
//Este programa é software livre; você pode redistribuí-lo e/ou
//modificá-lo sob os termos da Licença Pública Geral GNU, conforme
//publicada pela Free Software Foundation; tanto a versão 2 da
//Licença como qualquer versão mais nova.
//			
//Este programa é distribuído na expectativa de ser útil, mas SEM
//QUALQUER GARANTIA; sem mesmo a garantia implícita de
//COMERCIALIZAÇÃO ou de ADEQUAÇÃO A QUALQUER PROPÓSITO EM
//PARTICULAR. Consulte a Licença Pública Geral GNU para obter mais
//detalhes.
//			 
//Este programa está nomeado como apoena.java e possui 332
//linhas de código. 
			 
//Você deve ter recebido uma cópia da Licença Pública Geral GNU
//junto com este programa; se não, escreva para a Free Software
//Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
//02111-1307, USA
			    
//Contato: accrvianna@bb.com.br (Antônio Carlos C. R. Vianna - desenvolverdor do projeto)
//		   j.mar.rap@gmail.com (José Marcelo P. de Araujo - desenvolverdor do projeto)


function processaMurcha1(){
     	
	document.form.action="processamentoControle.php?Submit=murcha";
	document.form.submit();
}
function processaMurcha2(){
     	
	document.form.action="processamentoControle.php?Submit=murcha2";
	document.form.submit();
}
function processaRestaura(){
     	
	document.form.action="processamentoControle.php?Submit=restaura";
	document.form.submit();
}
function processaGera(){
     	
	document.form.action="processamentoControle.php?Submit=gerar";
	document.form.submit();
}
function processaProcessa(){
     	
	document.form.action="processamentoControle.php?Submit=processar";
	document.form.submit();
}
function processaProcessaNoticia(){
     	
	document.form.action="processamentoControle.php?Submit=InserirNoticia";
	document.form.submit();
}
function processaMineracao(){
     	
	document.form.action="estatisticaControle.php?Submit=consultar";
	document.form.submit();
}
