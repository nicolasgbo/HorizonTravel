<?php
//Simula como se fosse um tempo de processamento (tornando mais real)
sleep(1);

//Gera um resultado aleátorio (0 ou 1)
$status = rand(0, 1) ? 'aprovado' : 'recusado';

//Criando a resposta em JSON com 3 chaves (status, codigo_transacao, mensagem)
$response = [
    'status' => $status, //Aqui pega o resultado do pagamento simulado
    'codigo_transacao' => uniqid('trans_'), //uniqid() é uma função do php que gera "recibos unicos"
    'mensagem' => $status === 'aprovado' //Exibe mensagem de acordo com o status
        ? 'Pagamento realizado com sucesso!' 
        : 'Pagamento recusado.'
];

//Definindo a resposta como JSON 
header('Content-Type: application/json');
echo json_encode($response); //Converte o array $response em uma string JSON e envia de volta
