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


function submeterForm(form1,cdFont,sub){

	document.form1.action = form1 +".php?codTipFonte="+cdFont+"&Submit="+sub;
	
	document.form1.submit();
}

function consultaGrupoUsuario(codGrupoUsuario){

	document.form.action = "grupoUsuarioControle.php?cdGrpUsuario="+codGrupoUsuario+"&Submit=consultarGrupoUsuarioCodigo";
	
	document.form.submit();

}

function alteraGrupo(codGrupoUsuario){

	document.form.action = "grupoUsuarioControle.php?cdGrpUsuario="+codGrupoUsuario+"&Submit=consultarGrupoUsuarioCodigo3" ;

	document.form.submit();

}

function consultaGrupo(codGrupoUsuario){

	document.form.action = "grupoUsuarioControle.php?cdGrpUsuario="+codGrupoUsuario+"&Submit=consultarGrupoUsuarioCodigo3";
	
	document.form.submit();

}


function consultaClpGeral(){

	document.form1.action = "documentoControle.php?Submit=consultarClippingGeral";
	
	document.form1.submit();
}

function submeterFormConsulta(){

	document.form1.action = "fonteControle.php?Submit=pesquisar";
	
	document.form1.submit();
}

function deletaEmail(cdConfg){

	document.form.action = "mensagemControle.php?cdConfig="+cdConfg+"&Submit=deletar";
	
	document.form.submit();
}

function consultaEmail(codConfiguracao){

	document.form.action = "mensagemControle.php?codConfiguracao="+codConfiguracao+"&Submit=consultarEmail";
	
	document.form.submit();
}

function consultaClipping(codOnt){

	document.form1.action="documentoControle.php?codigoOntologia="+codOnt+"&Submit=consultarClipping";
	document.form1.submit();
}

function consultaTipoUsuario(codTipUsuario){

	document.form1.action="tipoUsuarioControle.php?codTipUsu="+codTipUsuario+"&Submit=consultarTipUsuario";
	document.form1.submit();
}


function consultaDocumentoFonte(codigoFonte){

	var palavra = document.form1.palavra.value;

	document.form1.action="documentoControle.php?codigoFont="+codigoFonte+"&plvr="+palavra+"&Submit=consultarDocumentoFonte";
	document.form1.submit();
}

function consultaClp(){

	document.form1.action="documentoControle.php?Submit=consultarClipping";
	document.form1.submit();
}

function gerarClipping(){

	document.form1.action="documentoControle.php?Submit=comporClipping";
	document.form1.submit();
}

function consultaTodosClp(){

	document.form1.action="documentoControle.php?Submit=consultarTodosClipping";
	document.form1.submit();
}

function consultaUsuario(codUsu){

	document.form.action="usuarioControle.php?codigoUsu="+codUsu+"&Submit=consultarUsuario";
	document.form.submit();
}

function consultaHtmlClipping(cdClipping){

	document.form1.action="documentoControle.php?codClipping="+cdClipping+"&Submit=apresentarClipping";
	document.form1.submit();

}

function consultaDocumento(codFonte){

	document.form1.action="fonteControle.php?codFonte="+codFonte+"&Submit=consultarDocFonte";
	document.form1.submit();
	
}

function consultaOntologia(codOnt){

	document.form.action="ontologiaControle.php?cdgOntologia="+codOnt+"&Submit=consultar";
	document.form.submit();
}

function consultaTermo(codOnt){

	document.form.action="thesaurosControle.php?cdOnto="+codOnt+"&Submit=consultar";
	document.form.submit();
} 

function consultaTermoAlterar(codOnt){

	document.form.action="thesaurosControle.php?codigoOnto="+codOnt+"&Submit=consultarAlterar";
	document.form.submit();
}

function consultaTrm(codOnt){

	document.form.action="thesaurosControle.php?cdgOnto="+codOnt+"&Submit=consultarDeletar";
	document.form.submit();
}

function consultaRSS(codRSS){

	document.form.action="rssControle.php?cdRSS="+codRSS+"&Submit=consultarAlterar";
	document.form.submit();
}

function consultaFonte(codFonte){

	document.form.action="fonteControle.php?cdFonte="+codFonte+"&Submit=consultarFonte";
	document.form.submit();
}
		 
function consultaTipoFonte(codTipoFonte){

	document.form.action="tipoFonteControle.php?cdTipoFonte="+codTipoFonte+"&Submit=consultaTipoFonte";
	document.form.submit();
}

function consultaTipoDocumento(codTipoDocumento){

	document.form.action="tipoDocumentoControle.php?cdTipoDocumento="+codTipoDocumento+"&Submit=consultaTipoDocumento";
	document.form.submit();
}

function consultaFontePorTipoFonte(codTipoFonte){

	document.form.action="fonteControle.php?codigoTipoFonte="+codTipoFonte+"&Submit=consultarFontePorTipoFonte";
	document.form.submit();
}

function processaRodada2(){

	document.form.action="processamentoControle.php?Submit=inserir2";
	document.form.submit();
}



function processaRodada(){

	document.form.action="processamentoControle.php?Submit=inserir";
	document.form.submit();
}


function inserirRSS(){

	document.form.action="rssControle.php?Submit=inserir";
	document.form.submit();
}

function jNumerico(e) {

  	if(document.all){ // Internet Explorer
		var tecla = event.keyCode;
	}else if(document.layers){ // Nestcape
	
		var tecla = e.which;

		if(tecla > 47 && tecla < 58){ // numeros de 0 a 9
			return true;
		}
 	}else{

		if (tecla != 8){ // backspace
			return false;
		}else{
			return true;
		}
 	}
}

    function mascara_data(data){ 
        var mydata = ''; 
        
        mydata = mydata + data; 
        
        if (mydata.length == 2){ 
        
            mydata = mydata + '-';
           	document.forms[0].data.value = mydata;
        } 
        
        if (mydata.length == 5){ 
            mydata = mydata + '-'; 
            document.forms[0].data.value = mydata; 
        } 
                
        if (mydata.length == 10){ 
            verifica_data(); 
        } 
    } 
     
    function verifica_data () { 

      dia = (document.forms[0].data.value.substring(0,2)); 
      mes = (document.forms[0].data.value.substring(3,5)); 
      ano = (document.forms[0].data.value.substring(6,10)); 

      situacao = ""; 
      // verifica o dia valido para cada mes 
      if ((dia < 01)||(dia < 01 || dia > 30) && (  mes == 04 || mes == 06 || mes == 09 || mes == 11 ) || dia > 31) { 
          situacao = "falsa"; 
      } 

      // verifica se o mes e valido 
      if (mes < 01 || mes > 12 ) { 
          situacao = "falsa"; 
      } 

      // verifica se e ano bissexto 
      if (mes == 2 && ( dia < 01 || dia > 29 || ( dia > 28 && (parseInt(ano / 4) != ano / 4)))) { 
          situacao = "falsa"; 
      } 

      if (document.forms[0].data.value == "") { 
          situacao = "falsa"; 
      } 

      if (situacao == "falsa") { 
          alert("Data inválida!"); 
          document.forms[0].data.focus(); 
      } 
    } 

    function mascara_hora(hora){ 
        var myhora = ''; 
        
        myhora = myhora + hora; 
        
        if (myhora.length == 2){ 
            myhora = myhora + ':'; 
            document.forms[0].hora.value = myhora; 
        } 
        
        if (myhora.length == 5){ 
            myhora = myhora + ':'; 
            document.forms[0].hora.value = myhora; 
        }
        
        if (myhora.length == 8){ 
            verifica_hora(); 
        } 
    } 
     
    function verifica_hora(){ 
        hrs = (document.forms[0].hora.value.substring(0,2)); 
        min = (document.forms[0].hora.value.substring(3,5));
        seg = (document.forms[0].hora.value.substring(6,8)); 
         
        situacao = ""; 
        
        // verifica data e hora 
        if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59) || seg < 00 || seg > 59){ 
            situacao = "falsa"; 
        } 
         
        if (document.forms[0].hora.value == "") { 
            situacao = "falsa"; 
        } 

        if (situacao == "falsa") { 
            alert("Hora inválida!"); 
            document.forms[0].hora.focus(); 
        } 
    } 

    function mascaraTelefone(objeto){

	if(objeto.value.length == 0){
     	   objeto.value = '(' + objeto.value;
	}

	if(objeto.value.length == 3){
      	   objeto.value = objeto.value + ')';
	}

	if(objeto.value.length == 8){
     	   objeto.value = objeto.value + '-';
	}
	
	if(objeto.value.length > 10 ){

	   var dados = objeto.value;
	    dados = dados.replace("(","");
	    dados = dados.replace(")","");
	    dados = dados.replace("-","");
 		
	  if ( isNaN(dados)){
	     alert ("O campo deve conter apenas numeros!");
	     objeto.value = "";	
	  }
	}
      
    }

