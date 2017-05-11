<?php
// parameters

$hubVerifyToken = 'TOKEN123456abcd';
$accessToken = "EAAZADZAmPR0vQBABm5OuPJgG5vcB1Ua8a5YTsfJ9S44FSRRcmowV9V2xpduE9OLBX1WPc1G6ZAZAhxjaZAXeyYEjAuOipRxXjjkARQdFn3UnOjgJXYuBhuOTqd1E1SufrrU4f4p3UQslFkHch5ijXofVqEZCxgc9ZBYvOnnqZBZAV6QZDZD";
// check token at setup
if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
  echo $_REQUEST['hub_challenge'];
  exit;
}
// Guardamos en un arreglo la informacion de input.
$input = json_decode(file_get_contents('php://input'), true);

$senderId = $input['entry'][0]['messaging'][0]['sender']['id'];

$messageText = $input['entry'][0]['messaging'][0]['message']['text'];
$answer = "I don't understand. Ask me 'hi'.";
if($messageText == "hi") {
    $answer = "Hello, welcome to the future ... ";
}
$response = [
    'recipient' => [ 'id' => $senderId ],
    'message' => [ 'text' => $answer ]
];

$data = array(
	'recipient' => array('id'=>$senderId),
	'message' => array('text' => $answer)
);

$options = array(
	'https' => array(
		'method' => 'POST',
		'content' => json_encode($data),
		'header' => 'Content-Type: application/json'
	)
);

$context = stream_context_create($options);

file_get_contents("https://graph.facebook.com/v2.6/me/messages?access_token=$accessToken", false, $context);
