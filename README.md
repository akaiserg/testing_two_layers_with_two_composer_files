# Testing  two-layer communication with two composer files



The idea of this test is  to try to  have two layers completely  separated. Most of  php applications use  just one composer file for the whole system but sometimes  can  be complicated  to  decouple  your layers if   two layers  share one or more libraries. In java, for instance,  you can have maven modules where each module has its own  group of libraries and the lower layers act like a library for the upper ones.


As to  the example  the  next pic shows  the way   the layers are  defined.


![Layers](https://raw.githubusercontent.com/akaiserg/testing_two_layers_with_two_composer_files/master/Layers.jpg)


## Service layer


The first layer uses   <b>[Slim](http://www.slimframework.com/)</b> to publish  the information from the lower layer.  Here,  there is a middleware which  only allows    connections from  localhost and  just one class  can communicate  with the lower layer.

Besides in order to document the API, this layer uses notations of <b>[Apidoc](http://apidocjs.com/)</b> library.


## System layer


The second one uses  <b>[desarrolla2/Cache](https://github.com/desarrolla2/Cache)</b> to keep the information and  <b>[vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)</b> to handle the configurations.


The important point here is   to know  how to  handle  the   well known  line  <b>require_once "/vendor/autoload.php"; </b> because the root  starts  on the first layer, so  to solve this  when  the  first layer calls the second one   it's neccesary  that the called  class has the  autolad.php, in this case it's the factory class. Besides because the  folders are different  the lower layer  needs that  the autoload.php file   has the following format:

```php
require_once realpath(__DIR__ . DIRECTORY_SEPARATOR . '../')."/vendor/autoload.php";});
```



Finally there is  the  integration test folder which has the  tests of the  system layer.


```php
phpunit.bat -c path\\unitTest.xml 
```
