<?php
/* //////////////////////////////////////////////////////////
///
///
/// CONSULTA QUE TRAZ SOMENTE O LINK DA NOTA FISCAL.
///
/// Faz autenticação e chama o webservice de consulta
///
///
*///////////////////////////////////////////////////////////
require_once('lib/nusoap.php');

//endereço do webservice de consulta
$wsdl = "http://www.mgmtributacao.com.br/issqn/wservice/wsnfeconsulta.php?wsdl";
 
//aqui cramos o objeto cliente do webservice
$client = new nusoap_client($wsdl, 'wsdl');

//obtém erro do webservice 
$err = $client->getError();
if ($err) {
	//exibe o erro
	echo '<h2>Erro no webservice</h2>' . $err;
	exit();
}
 
//chama a função para consultar, passando os parâmetros solicitados pelo sistema
$result = $client->call('ConsultaNfe', array(
'usuario'=>'000000', //seu usuario do sistema issn - 6 digitos
'pass'=>'000000', //sua senha do sistema issn - 6 digitos
'usr'=>'00.000.000/0001-00', // cnpj da sua empresa (vinculado ao usuario)
'prf'=>'00.000.000/0001-00', //cnpj da sua prefeitura
'ctr'=>'00001', //seu numero de controle - único, que foi passado no envio da nota
'tipo'=>'2' //tipo de consulta - use sempre 2
));

//esse é o resultado do comando, retorna array para você extrair os dados e usar como preferir
print_r($result); 

//echo '<h2>Request</h2><pre>' . $client->request. '</pre>'; ///printa a solicitação
//echo '<h2>Response</h2><pre>' . $client->response. '</pre>'; ///printa a resposta
//echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>'; //debug da consulta
?>
