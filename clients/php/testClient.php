<?php

require_once "vendor/autoload.php";
//$response = Unirest\Request::post("http://mockbin.com/request", $headers, $body);

define("URL","{url}/service/public/");
$headers = array("Accept" => "application/json","Content-Type"=>"application/json");


$dtoValidation= array();
$dtoValidation["address"]="test";
$dtoValidation["age"]="45";
$dtoValidation["lastName"]="test";
$dtoValidation["name"]= "test";
$aFinal["data"]=$dtoValidation;
$body= json_encode($aFinal);


$response = Unirest\Request::post(URL."createPerson", $headers, $body);
echo "<pre>";
echo $response->code."<br>";        // HTTP Status code
//print_r($response->headers);     // Headers
print_r($response->body);        // Parsed body

echo $response->body->state."<br>";
echo $response->body->data->key."<br>";
echo $response->raw_body."<br>";
print_r(json_decode($response->raw_body,true));    // Unparsed body