<?php
require_once("opciones.php");
// parameters

$hubVerifyToken = 'TOKEN123456abcd';
$accessToken = "EAAZADZAmPR0vQBABm5OuPJgG5vcB1Ua8a5YTsfJ9S44FSRRcmowV9V2xpduE9OLBX1WPc1G6ZAZAhxjaZAXeyYEjAuOipRxXjjkARQdFn3UnOjgJXYuBhuOTqd1E1SufrrU4f4p3UQslFkHch5ijXofVqEZCxgc9ZBYvOnnqZBZAV6QZDZD";
// check token at setup
if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
  echo $_REQUEST['hub_challenge'];
  exit;
}


// handle bot's anwser
$input = json_decode(file_get_contents('php://input'), true);
$senderId = $input['entry'][0]['messaging'][0]['sender']['id'];
$messageText = $input['entry'][0]['messaging'][0]['message']['text'];

// aca colocamos nuestro algoritmo

$answer = "I don't understand. Ask me 'hi'.";
if($messageText == "opcion") {
    $answer = opciones(1);
} else if ($messageText == "hi"){
	$answer = "Welcome to the future ...";
}

// termina nuestro algoritmo

$response = [
    'recipient' => [ 'id' => $senderId ],
    'message' => [ 'text' => $answer ]
];


$ch = curl_init('https://graph.facebook.com/v2.6/me/messages?access_token='.$accessToken);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

if(!empty($input['entry'][0]['messaging'][0]['message'])){
    $result = curl_exec($ch);
    curl_close($ch);
}
//curl_exec($ch);


//based on http://stackoverflow.com/questions/36803518