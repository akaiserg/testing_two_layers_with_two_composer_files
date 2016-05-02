# Help


```json
In order to consume the APi, it is needed to install [unirest](http://unirest.io/php.html)

	{
		"require-dev": {
			"mashape/unirest-php": "2.*"
		}
	}
```	

Example:
	
```php
$headers = array("Accept" => "application/json","Content-Type"=>"application/json");

$aInfo= array();
$aInfo["address"]="address";
$aInfo["age"]="45";
$aInfo["lastName"]="last name";
$aInfo["name"]= "name";
$aFinal["data"]=$aInfo;
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

```