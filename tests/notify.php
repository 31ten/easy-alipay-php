<?php

require_once getcwd() . "/../Alipay.php";
require_once getcwd() . "/../class.log.php";

$log = new Log('../logs/log.txt');

$tid = $_POST['out_trade_no'];
$tno = $_POST['trade_no'];
$total_amount = $_POST['total_fee']; // don't forget to substract Alipay Transaction fee
$alipay = new Alipay();

// @todo: Verify system transaction ID hasn't been used by looking it up in your DB.

$log->log('=========== ANSWER FROM ALIPAY SERVER (POST notify.php)');

try {
    if ($alipay->verifyPayment($_POST) === false) // Transaction isn't complete
    {
        $log->log('$alipay->verifyPayment($_POST) =' + $alipay->verifyPayment($_POST) + " => Unable to verify payment.");
        echo "Unable to verify payment.";
        return false;
    }
} catch (Exception $e) { // Connection error
    echo $e->getMessage();
    $log->log('=== Connection error :');
    $log->log($e->getMessage())
    return false;
} catch (AlipayException $e) { // Hash or invalid transaction error
    echo $e->getMessage();
    $log->log('=== Hash or invalid transaction error :');
    $log->log($e->getMessage())
    return false;
}

// @todo: Update the transaction in your DB and add funds for the user
