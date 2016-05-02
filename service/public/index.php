<?php

// API documentation

require '../vendor/autoload.php';


$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ]
];


// Instance of Slim
$app = new Slim\App($configuration);


// Definition of the header
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept,token");
header("Access-Control-Allow-Methods: 'GET','POST','PUT','DELETE','OPTIONS'");
header("Content-Type: application/json");

// util
/*****
httpd.conf

<Directory "C:\xampp\htdocs\xampp\xampp\GitHub\simpleProject\api\public">
    AllowOverride All
</Directory>
//display_errors = Off php.ini
 */


$checkProxyHeaders = false; // Note: Never trust the IP address for security processes!
$trustedProxies = ['10.0.0.1', '10.0.0.2']; // Note: Never trust the IP address for security processes!
$app->add(new RKA\Middleware\IpAddress($checkProxyHeaders, $trustedProxies));


// definition of the class which handles  the communication with the system layer
$oSystemHandler= new service\utils\systemHandler\SystemHandler();


//$generalContainer
require_once '../containers/general/generalContainerDependency.php';
//$middlewareContainer
require_once '../containers/middleware/middlewareContainerDependency.php';




// loads the routes dynamically
$aListFiles= scandir(".");
foreach($aListFiles as $sKey=>$sValue){
    $aParts=explode(".",$sValue);
    if(substr($aParts[0], -6)=="Routes"){
        require_once "".$sValue."";
    }
}

// Starts the application
$app->run();