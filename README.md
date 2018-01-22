# nfsepenapolis

*** Código PHP para integração via webservice ao sistema ISS Online fornecido pela empresa MGM Tributação, para emissão de NFS-e (Nota Fiscal de Serviços Eletrônica) ***

Como usuário do serviço, disponibilizo esse código para auxiliar quem necessita integrar seu script ou sistema em PHP ao webservice da MGM Tributação, utilizando a classe NuSOAP.

Os arquivos contém exemplos funcionais de envio, consulta para obter link da nota gerada e consulta para obter o XML completo da nota gerada.

Arquivos:

- envio.php: contém exemplo para envio/gereção de nota fiscal
- consulta.php: contém exemplo para consulta/obtenção do link (url) da nota fiscal gerada
- consultaxml.php: contém exemplo para consulta/obtenção do xml completo da nota fiscal gerada

ATENÇÃO!
- É requerida a classe NuSOAP, assim você precisará baixar o NuSOAP em http://sourceforge.net/projects/nusoap/ e colocar os arquivos na pasta /lib  ou alterar a pasta ou o include, se preferir.

OBS: Os arquivos possuem instruções sobre os campos necessários. Recomendo utilizar o layout do webservice fornecido pela MGM Tributação (faça o download no sistema da prefeitura da sua cidade), para auxiliar no processo e preenchimento dos campos. 


INFORMAÇÕES IMPORTANTES:

- Antes de colocar o seu script para funcionar em ambiente de produção, é fundamental testar no ambiente de homologação. Somente após homologar, coloque em produção, pois evita-se a geração de notas com problemas de consistência.

- Para colocar seu script em produção, entre em contato com o departamento de rendas da sua prefeitura e solicite a liberação/ativação do webservice para o seu usuário.

- Em caso de dúvidas, entre em contato comigo pelo email alvijr@gmail.com.

///////////////////////////////////////////////////////

////ATUALIZAÇÃO FEITA EM 18/01/2018

A partir de janeiro/2018 será necessário informar 3 novos campos no envio da nota fiscal:

ssrecbr - Total faturado nos últimos 12 meses

ssanexo - Anexo  (em qual anexo a sua empresa se encaixa, ANEXO III, IV ou v)

ssdtini - Dada de início das atividades

...no formato:

'ssrecbr'=>"00.00",
'ssanexo'=>'ANEXO III',
'ssdtini'=>'dd/mm/aaaa'

Consulte seu contador para saber em qual anexo a sua empresa se encaixa. 

//////////////////////////////////////////////////////
