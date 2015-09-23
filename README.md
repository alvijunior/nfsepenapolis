# nfsepenapolis

*** Código PHP para integração via webservice ao sistema ISS Online fornecido pela empresa MGM Tributação para emissão de NFS-e (Nota Fiscal de Serviços Eletrônica) ***
**** Alvi Jr ****

Como usuário do serviço, disponibilizo esse código para auxiliar quem necessita integrar seu script ou sistema em PHP ao webservice da MGM Tributação, utilizando a classe NuSOAP.

Os arquivos contém exemplos funcionais de envio, consulta para obter link da nota gerada e consulta para obter o XML completo da nota gerada.

Arquivos:

- envio.php: contém exemplo para envio/gereção de nota fiscal
- consulta.php: contém exemplo para consulta/obtenção do link (url) da nota fiscal gerada
- consultaxml.php: contém exemplo para consulta/obtenção do xml completo da nota fiscal gerada

OBS: Os arquivos possuem instruções sobre os campos necessários. Porém recomendo utilizar o layout do webservice fornecido pela MGM Tributação (faça o download no sistema da prefeitura da sua cidade), para auxiliar no processo e preenchimento dos campos. 


INFORMAÇÕES IMPORTANTES:

- Antes de colocar para funcionar em ambiente de produção, é fundamental testar no ambiente de homologação. Somente após homologar, coloque em produção, pois evita-se a geração de notas com problema de consistência.

- Para colocar seu script em produção, entre em contato com o departamento de rendas da sua prefeitura e solicite a liberação/ativação do webservice para o seu usuário.

- Em caso de dúvidas, entre em contato comigo pelo email alvijr@gmail.com.

///////////////////////////////////////////////////////
