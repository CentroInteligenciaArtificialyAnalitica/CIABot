<?php

require_once("../require/funciones.basicas.php");
$hubVerifyToken = 'TOKEN123456abcd';

if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
  echo $_REQUEST['hub_challenge'];
  exit;
}

// handle bot's anwser
$input = json_decode(file_get_contents('php://input'), true);

webhook($input);
