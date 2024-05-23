<?php

// FUNÇÕES

function endCode($msg, $status){
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array("mensagem"=>$msg, "response"=>$status));
    exit;
}

function urlAmigavel($string) {
    $string = mb_strtolower($string, 'UTF-8');
    $string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    $string = preg_replace('/-+/', '-', $string);
    $string = trim($string, '-');
    return $string;
}

function setNoXss($string) {
    $string = preg_replace('/[^A-Za-zÀ-ÿ0-9\s,\-#\/().]+/', ' ', $string);
    $string = strtolower($string);
    return encrypt($string);
}


function setString($string){
    $string = preg_replace('/[^A-Za-zÀ-ÿ]+/', ' ', $string);
    $string = strtolower($string);
    return encrypt($string);
}


function setEmail($string){
    $string = filter_var($string, FILTER_VALIDATE_EMAIL);
    $string = strtolower($string);
    return encrypt($string);
}

function setNum($string){
    $string = preg_replace('/[^0-9]+/', '', $string);
    return encrypt($string);
}

function setArray($array, $type){
    foreach($array as &$item){
        $item = $type($item);
    }
    return $array;
}

function checkMissing($array){
    for($i = 0; $i < count($array); $i++){
        $item = decrypt($array[$i]);
        if(!$item or $item == "" or $item == " "){
            endCode("Algum dado está faltando. #$i", false);
        }
    }
}


function cantLog($__EMAIL__){
    if($__EMAIL__){
        header("Location: $__URL__");
        exit;
    }
}

function justLog($__EMAIL__, $__TYPE__, $type){
    if($__TYPE__ < $type or !$__EMAIL__){
        endCode("Sem permissão", false);
        exit;
    }
}


function requireLevel($__TYPE__, $type){
    if($__TYPE__ < $type or !$__TYPE__){
        return false;
    }
    return true;
}

function uniqueLevel($__TYPE__, $type){
    if($__TYPE__ != $type){
        return false;
    }
    return true;
}

function scapeString($__CONEXAO__, $string){
    $string = mysqli_real_escape_string($__CONEXAO__, $string);
    return $string;
}

function stopUserExist($__CONEXAO__, $email, $cpf){
    $tryConnect = mysqli_query($__CONEXAO__, "select id from users where email='$email'") or die("erro select");

    if(mysqli_num_rows($tryConnect) > 0){
        endCode("Email já está em uso", false);
        exit;
    }

    $tryConnect = mysqli_query($__CONEXAO__, "select id from users where cpf='$cpf' and cpf!=''") or die("erro select");

    if(mysqli_num_rows($tryConnect) > 0){
        endCode("CPF já está em uso", false);
        exit;
    }

}

function stopUserExistnt($__CONEXAO__, $string){
    $tryConnect = mysqli_query($__CONEXAO__, "select * from users where email='$string'") or die("erro select");

    if(mysqli_num_rows($tryConnect) < 1){
        return true;
    }
}

function setCpf($cpf) {
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

    if (strlen($cpf) != 11) {
        return false;
    }

    if (preg_match('/(\d)\1{10}/', $cpf)) {
        endCode("O cpf informado está incorreto.", false);
    }

    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            endCode("O cpf informado está incorreto.", false);
        }
    }
    if(strlen($cpf) == 10){
        $cpf = "0"."$cpf";
    }
    return encrypt($cpf);
}

function getHora($milissegundos) {
    $segundos = $milissegundos / 1000;
    $minutos = floor($segundos / 60);
    $horas = floor($minutos / 60);
    $minutos = $minutos % 60;

    return str_pad($horas, 2, '0', STR_PAD_LEFT) . ':' . str_pad($minutos, 2, '0', STR_PAD_LEFT);
}

function converterHora($time){
    $time = decrypt($time);
    $time = date("H:i", ($time / 1000 + 10800 ));//10800 = +3h timezone
    return $time;
}
// types user
// type 1 - Aluno
// type 2 - Professor
// type 3 - Admin

function salvarImg($__CONEXAO__, $__TIME__, $__CODE__, $image, $caminho){
    $caminho = "../$caminho";
    if($image){
        if (!file_exists($caminho)) {
            if (!mkdir($caminho, 0777, true)) {
                endCode("Erro ao criar o diretório", false);
                return;
            }
        }

        $parts = explode(',', $image);
        if (count($parts) !== 2) {
            endCode("Código de imagem inválido", false);
            return;
        }

        $formatPart = $parts[0];
        $imageData = base64_decode($parts[1]);

        if ($imageData === false) {
            endCode("Decodificação de base64 falhou", false);
            return;
        }

        $format = str_replace(['data:image/', ';base64'], '', $formatPart);
        if (!in_array($format, ['jpeg', 'jpg', 'gif', 'png'])) {
            endCode("Formato de imagem inválido", false);
            return;
        }

        if ($format === 'jpeg') {
            $format = 'jpg';
        }

        $novoNome   = "l$__TIME__$__CODE__.$format";
        $completo = "$caminho/$novoNome";
        $novoNomeEnc = encrypt($novoNome);

        // Verifique se a imagem é PNG e processe-a de acordo
        if ($format === 'png') {
            $im = imagecreatefromstring($imageData);
            imagesavealpha($im, true);
            imagepng($im, $completo);
            imagedestroy($im);
        } else {
            if (!file_put_contents($completo, $imageData)) {
                endCode("Erro ao salvar imagem", false);
            }
        }
    }
    return $novoNomeEnc;
}

function pixPay($ammount, $__AUTH__, $__KEY__){

    $curl = curl_init();

    $data = array(
        'transaction_amount' => $ammount,
        'description' => "[diplomapay.com][mkt][pix] - Diplomapay",
        'payment_method_id' => "pix",
        'payer' => [
        'email' => "mkt-dp@gmail.com",
        'first_name' => "DP Pagamento MKT",
        ]
    );

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.mercadopago.com/v1/payments',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array(
        "Authorization: $__AUTH__",
        "Public-Key: $__KEY__",
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);
    $res = json_decode($response);
    // endCode($res, false);
    curl_close($curl);

    $pay_id = $res->id;
    $status = $res->status;
    $pay_code = $res->point_of_interaction->transaction_data->qr_code;
    $pay_code_img = $res->point_of_interaction->transaction_data->qr_code_base64;
    $pay_ammount = $res->transaction_amount;

    if($pay_code){
        $obj = array("status_pix" => "$status", "pix_id" => $pay_id, "code_pix" => "$pay_code", "ammount_pix" => $ammount, "img64" => "$pay_code_img");
        return array($obj, true);
    }

    return array(array($res), false);
}