<?php
require_once "vendor/autoload.php";

//User configuration:
//you can get this from the nexmo website.
$apt_key = "PUT YOUR API KEY HERE"
$api_secret = "PUT YOUR API SECRET HERE";  

//end of user configuration

$numf= $argv[1];
$numt= $argv[2];
$text= $argv[3];
$time= $argv[4];


$timeint = (int)$time;

sleep($timeint);


$client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic($apt_key, $api_secret));
$message = $client->message()->send([
'type' => 'unicode',
'to' => (string)$numt,
'from' => (string)$numf,
'text' => html_entity_decode($text),
]);

echo $text;

?>
