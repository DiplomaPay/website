<?php
include"./conexao.php";

header('Content-Type: application/json; charset=utf-8');

$queryPendings = mysqli_query($conexao, "select * from payment_pix where status='pending'") or die("Erro ao procurar dados");

$idPendings = array();

if(mysqli_num_rows($queryPendings) > 0){

    while($dados = mysqli_fetch_array($queryPendings)){
        $idPay = array($dados['pay_id'], $dados['iduser']);
        array_push($idPendings, $idPay);
    }

    for($i = 0; $i < count($idPendings); $i++){
        $pay_iduser  = $idPendings[$i][1];
        $pay_id  = $idPendings[$i][0];

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
        $pay_ammount = $res->transaction_amount;

        $status_res = $status == "approved" ? true : false;

        if($status_res){
            $queryUser = mysqli_query($conexao, "select * from users where id='$pay_iduser'");

            if(mysqli_num_rows($queryUser) > 0){
                $email = mysqli_fetch_assoc($queryUser)['email'];

                $to = $email;
                $subject = "Pagamento confirmado - $pay_id";

                $message = "
                <html>
                    <head>
                        <title>Pagamento confirmado - $pay_id</title>
                        <style>
                            body { font-family: Arial, sans-serif; }
                        </style>
                    </head>
                    <body>
                        <div style='background-color:#269C72; color:white; text-align:center; padding: 5px; border-radius: 5px'>
                            <h2 style='color:white;'>DiplomaPay</h2>
                        </div>
                        <div style='text-align:center; padding: 5px'>
                            <h3 style='color:black;'>Pagamento confirmado - $pay_id</h3>
                            <h1 style='color:black;'>R$$pay_ammount</h1>
                            <h4 style='color:black;'>Seu pagamento foi confirmado!</h4>  
                            <p style='color:black; font-size: 12px'>Todos os direitos reservados - DiplomaPay 2024</p>
                        </div>
                    </body>
                </html>
                ";

                $sendEmail = mail($to, $subject, $message, implode("\r\n", $__HEADERS__));
            }

            $q = mysqli_query($conexao, "update payment_pix set status='$status' where pay_id='$pay_id'") or die("erro ao atualizar $status");
        }
        sleep(3);
    }

    echo json_encode($idPendings);
}


