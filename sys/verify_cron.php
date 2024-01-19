<?php
include"./conexao.php";

$queryPendings = mysqli_query($conexao, "select * from payment_pix where status='pending'") or die("Erro ao procurar dados");

$idPendings = array();

while($dados = mysqli_fetch_array($queryPendings)){
    $idPay = $dados['pay_id'];
    array_push($idPendings, $idPay);
}

for($i = 0; $i < count($idPendings); $i++){
    $pay_id  = $idPendings[$i];

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.mercadopago.com/v1/payments/$pay_id",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        // TESTES ->
        // 'Authorization: Bearer TEST-5056284625992718-010720-0ed75a2e6c7caf2596f0d792490b4134-50812775',
        // 'Public-Key: TEST-8442b5ef-d877-4ecf-a391-1ca734da9d21',
        // REAL ->
        'Authorization: Bearer APP_USR-5056284625992718-010720-8f3ef5796104ab4ed6dd46bda8cc493c-50812775',
        'Public-Key: APP_USR-7fb9bd3b-0834-4195-8c52-2c22ba74253c',
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);
    $res = json_decode($response);
    curl_close($curl);

    $status = $res->status;
    $pay_id = $res->id;

    $status_res = $status == "approved" ? true : false;

    if($status_res){
        $q = mysqli_query($conexao, "update payment_pix set status='$status' where pay_id='$pay_id'") or die("erro ao atualizar $status");
    }
    sleep(5);
}

echo json_encode($idPendings);


