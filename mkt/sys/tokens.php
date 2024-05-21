<?php
$__AUTH__ = "Bearer APP_USR-5056284625992718-010720-8f3ef5796104ab4ed6dd46bda8cc493c-50812775";
$__KEY__  = "APP_USR-7fb9bd3b-0834-4195-8c52-2c22ba74253c";

// BANCO DE DADOS
define('LOG_DB_PASSWORD', 'Easycodex123#$#$');
define('LOG_DB_USER', 'u752370168_dpaymkt');
define('LOG_DB_LOCAL', 'localhost');

// SHA512
define('TOKEN_KEY', 'f13f1e383e914462e9b5663ad86976031588373ef63bae1cf8846fcacd4dbc71a2d2b7944a480f57c037a8f9b8caef5d006d6cb010cd9f13a5272badeb2f6565🔥');

function encrypt($string) {
  $counter = 0;
  $encrypted = "";
  for ($i = 0; $i < strlen($string); $i++) {
    if ($counter % 64 == 0) {
      $hash = hash('sha512', TOKEN_KEY . $counter, true);
    }
    $block = ord($hash[$counter % 64]);
    $xor = $block ^ ord($string[$i]);
    $encrypted .= chr($xor);
    $counter++;
  }
  return base64_encode($encrypted);
}

function decrypt($string) {
  $string = base64_decode($string);
  $counter = 0;
  $decrypted = "";
  for ($i = 0; $i < strlen($string); $i++) {
    if ($counter % 64 == 0) {
      $hash = hash('sha512', TOKEN_KEY . $counter, true);
    }
    $block = ord($hash[$counter % 64]);
    $xor = $block ^ ord($string[$i]);
    $decrypted .= chr($xor);
    $counter++;
  }
  return $decrypted;
}