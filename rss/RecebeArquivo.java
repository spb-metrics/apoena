import apoena.start.*;

public class RecebeArquivo {

	private static final long serialVersionUID = 1L;
	
	private ObterArquivosRSS receberArquivo = new ObterArquivosRSS();

	
	public RecebeArquivo(String nome){

	   receberArquivo.lerArquivoRSS(nome);

	}
	
	public static void main(String[] args) {
		
		new RecebeArquivo(args[0]);
		
	}

}


