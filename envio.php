<?php
/* //////////////////////////////////////////////////////////
///
///
/// ENVIO DA NOTA FISCAL - AO EXECUTAR A FUNÇÃO ELE 
/// RETORNARÁ OK OU ERRO OCORRIDO
/// Consulte o PDF fornecido pela MGM Tributação para 
///
/// Faz autenticação e chama o webservice de envio
/// Utilize primeiro o webservice de homologação
///
///
*///////////////////////////////////////////////////////////
require_once('lib/nusoap.php');

//endereço do webservice - HOMOLOGAÇÃO
$wsdl = "http://www.mgmtributacao.com.br/issqn/wservice/wsnfe_teste_homologacao.php?wsdl";

//endereço do webservice - PRODUÇÃO
//$wsdl = "http://www.mgmtributacao.com.br/issqn/wservice/wsnfeenvia.php?wsdl";
 
//aqui criamos o objeto cliente do webservice
$client = new nusoap_client($wsdl, 'wsdl');
 
//obtém erro do webservice  
$err = $client->getError();
if ($err) {
	//exibe o erro
	echo '<h2>Erro no webservice</h2>' . $err;
   exit();
}
 
//chama a função para consultar, passando os parâmetros solicitados pelo sistema
$result = $client->call('EnvNfe', array(
'usuario'=>'000000', //seu usuario do sistema issn - 6 digitos
'pass'=>'000000', //sua senha do sistema issn - 6 digitos
'usr'=>'00.000.000/0001-00', // cnpj da sua empresa (vinculado ao usuario)
'prf'=>'00.000.000/0001-00', //cnpj da sua prefeitura
'ctr'=>'00001', //seu numero de controle - único - que sera usado para consulta da nota
'cnpj'=>'00.000.000/0001-00', //cnpj do destinatário
'cnpjn'=>'RAZAO SOCIAL LTDA', //razao social ou nome destinatario
'ie'=>'', //inscricao estadual / rg
'im'=>'', //inscricao municipal
'lgr'=>'Alameda Sempre Verde', //logradouro
'num'=>'000', //numero
'cpl'=>'', //complemento
'bai'=>'Centro', //bairro
'cid'=>'Sao Paulo', //cidade
'est'=>'SP', //estado
'cep'=>'00000000', //cep
'fon'=>'000000000000', //telefone
'mail'=>'', //email
'dat'=>'21/09/2015', //data de emissao da nota
'f1n'=>'9451', //numero da sua fatura de serviços  - você que define etc...
'f1d'=>'25/09/2015', //vencimento da fatura de serviços
'f1v'=>'30.90', //valor da fatura
'item1'=>'52.00', //Código do item de serviço 1 - consulte o sistema para saber seu código
'aliq1'=>'2.00', //aliquota do ISS - consulte o sistema para saber sua aliquota
'val1'=>'30.90', //valor do servico
'loc'=>'0000', //localidade - informe 0000 pra serviço prestado no local ou o código do município (veja tabela de códigos com a prefeitura)
'ret'=>'NAO', //se tem imposto retido
'txt'=>'SERVICOS', //descricao do serviço prestado 
'val'=>'30.90', //valor total da nota
'valtrib'=>'30.90', //valor tributável
'iss'=>'0.61', //valor do imposto iss
'issret'=>'0.00', //valor retido - se tiver imposto retido
/////////////esse abaixo para optantes pelo SIMPLES NACIONAL são obrigatórios:
'iteser1'=>'52.00', //Código do item de serviço 1 (Optante pelo Simples Nacional)
'alqser1'=>'2.00', //Alíquota do item de serviço 1 (Optante pelo Simples Nacional)
'valser1'=>'30.90', //Valor Item Serviço 1 (Optante pelo Simples Nacional)
'ssrecbr'=>'20000.00', //Total faturado nos últimos 12 meses - formato float
'ssanexo'=>'ANEXO III', //Anexo do SIMPLES ao qual a empresa se encaixa
'ssdtini'=>'13/09/2013'	//Data de início das atividades da empresa
));

//esse é o resultado do comando, retorna array para você extrair os dados e usar como preferir - RETORNA OK se tudo estiver certo ou o erro
print_r($result); 

//echo '<h2>Request</h2><pre>' . $client->request. '</pre>'; ///printa a solicitação
//echo '<h2>Response</h2><pre>' . $client->response. '</pre>'; ///printa a resposta
//echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>'; //debug da consulta
?>
