import apoena.start.*;

public class GerarClipping {
 
	
   private ObterArquivosRSS 	receberArquivo 	= new ObterArquivosRSS();
	

   public GerarClipping() {

      receberArquivo.gerarClipping();

   }
	
	
   public static void main(String[] args){
		
      new GerarClipping();
   }
}
