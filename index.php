<?php

require_once("require/funciones.basicas.php");
$hubVerifyToken = 'TOKEN123456abcd';

if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
  echo $_REQUEST['hub_challenge'];
  exit;
}

// handle bot's anwser
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// para ver la informacion que llega
//file_put_contents("fb.txt", $input);
//$data = json_decode(file_get_contents('fb.txt'), true);

webhook($data);
