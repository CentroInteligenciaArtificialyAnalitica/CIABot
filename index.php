<?php

require_once("require/funciones.basicas.php");
$hubVerifyToken = 'TOKEN123456abcd';

if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
  echo $_REQUEST['hub_challenge'];
  exit;
}

// handle bot's anwser
$input = json_decode(file_get_contents('php://input'), true);

//file_put_contents("fb.txt", file_get_contents("php://input"));
//$input = json_decode(file_get_contents('fb.txt'), true);

webhook($input);
//echo "fin del programa";
//print_r($input);
