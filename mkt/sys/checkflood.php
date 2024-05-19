<?php
$__SREQ = $_SESSION["reqflood"];
$__STIME = $_SESSION["timeflood"];
$__SBAN = $_SESSION["timebanflood"];

$maxTime = 10;
$maxRequest = 30;

if($__STIME){
    if($__STIME < time() - $maxTime and $__SBAN < time()){
        $_SESSION["timeflood"] = time();
        $_SESSION["reqflood"]  = 0;
        return;
    }
    
    $_SESSION["reqflood"] = $__SREQ + 1;
    
    if($__SREQ >= $maxRequest){
        if($__SBAN < time()){
            $_SESSION["timebanflood"] = time() + 20;
        }
        $__REM = $__SBAN - time();
        endCode("Anti flood, aguarde $__REM segundos. ($__SREQ/$maxRequest)", false);
    }
    
    return;
}

if(!$__STIME or !$__SREQ){
    $_SESSION["timeflood"] = time();
    $_SESSION["reqflood"]  = 0;
    return;
}