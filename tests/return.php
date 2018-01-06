<?php

require_once getcwd() . "/../class.log.php";
$log = new Log('../logs/log.txt');
$log->log('=========== return.php');

$sale_id = $_GET['sale_id'];

$log->log(print_r($_GET, true));

echo "<h4>Your payment is being processed. Thank you!</h4>";
echo "<small>Sale ID: $sale_id.</small>";
