import apoena.start.*;

public class GeraEstatistica {

  private ObterArquivosRSS receberArquivo  = new ObterArquivosRSS();

  public GeraEstatistica() {

     receberArquivo.gerarEstatistica();
  }

  public static void main(String[] args){

     new GeraEstatistica();
  }

}

