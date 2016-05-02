<?php


/**
 * @api {post} /createPerson Creates a new person
 * @apiVersion 0.1.0
 * @apiName createPerson
 * @apiGroup PersonAdministration
 * @apiPermission localhost
 *
 * @apiDescription creates a new person

 *
 * @apiParam {String}   address       The address.
 * @apiParam {Number}   age           The age.
 * @apiParam {String}   lastName      Last name of the person.
 * @apiParam {String}   name          Name of the person.
 *
 * @apiParamExample {json} Request-Example:
 * {"data": {"address": "address", "age": "31", "lastName": "lName", "name": "name"}}
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {"state":1,"key":"1re545421"}
 *
 * @apiError ValidationError   one or more  fields  have errors
 *
 * @apiErrorExample Response (example):
 *     HTTP/1.1 200 OK
 *     {"state":-1,"msj":"error"}
 *
 * @apiError NoAccessRight  only  local requests are accepted
 *
 * @apiErrorExample Response (example):
 *     HTTP/1.1 401 Not Authenticated
 *     {"state":-1,"msg":"This ip (192.168.1.2) doesn't have access."}
 *
 *
 *
 */
$app->post('/createPerson', function ($request, $response, $args) use($generalContainer,$middlewareContainer,$oSystemHandler)   {

    if($response->getStatusCode()==200){
        $response->withHeader('Content-Type', 'application/json');
        try{
            $response->write($oSystemHandler->getResult("CreatePerson",$request->getParam("data")));
        }catch(\Exception $e){
            echo $oSystemHandler->setErrorReturn($e->getMessage());
        }
    }

})->add(function ($request, $response, $next) use ($middlewareContainer) {
        $middlewareIp = $middlewareContainer['ipMiddleware'];
        return $middlewareIp($request, $response, $next);
    });



/**
 * @api {get} /person/:key/   returns  a person by key
 * @apiVersion 0.1.0
 * @apiName person
 * @apiGroup PersonAdministration
 * @apiPermission localhost
 *
 * @apiParam {String} key  The key or od of the person
 *
 * @apiDescription Returns the  information of one person by their key or id
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {"state":1,"data":{"address": "address", "age": "31", "lastName": "lName", "name": "name"}}
 *
 * @apiError ValidationError   one or more  fields  have errors
 *
 * @apiErrorExample Response (example):
 *     HTTP/1.1 200 OK
 *     {"state":-1,"msj":"error"}
 *
 * @apiError NoAccessRight  only  local requests are accepted
 *
 * @apiErrorExample Response (example):
 *     HTTP/1.1 401 Not Authenticated
 *     {"state":-1,"msg":"This ip (192.168.1.2) doesn't have access."}
 *
 *
 *
 */
$app->get('/person/{key}', function ($request, $response, $args) use($generalContainer,$middlewareContainer,$oSystemHandler)   {

    if($response->getStatusCode()==200){
        $response->withHeader('Content-Type', 'application/json');
        try{
            $response->write($oSystemHandler->getResult("InfoPerson",$request->getAttribute("key")));
        }catch(\Exception $e){
            echo $oSystemHandler->setErrorReturn($e->getMessage());
        }
    }

})->add(function ($request, $response, $next) use ($middlewareContainer) {
        $middlewareIp = $middlewareContainer['ipMiddleware'];
        return $middlewareIp($request, $response, $next);
    });



/**
 * @api {delete} /deletePerson/:key/   deletes  a person by key
 * @apiVersion 0.1.0
 * @apiName deletePerson
 * @apiGroup PersonAdministration
 * @apiPermission localhost
 *
 * @apiDescription deletes the  information of one person by their key or id
 *
 * @apiParam {String} key  The key or od of the person
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {"state":1,"data":null}
 *
 * @apiError ValidationError   one or more  fields  have errors
 *
 * @apiErrorExample Response (example):
 *     HTTP/1.1 200 OK
 *     {"state":-1,"msj":"error"}
 *
 * @apiError NoAccessRight  only  local requests are accepted
 *
 * @apiErrorExample Response (example):
 *     HTTP/1.1 401 Not Authenticated
 *     {"state":-1,"msg":"This ip (192.168.1.2) doesn't have access."}
 *
 *
 *
 */
$app->delete('/deletePerson/{key}', function ($request, $response, $args) use($generalContainer,$middlewareContainer,$oSystemHandler)   {

    if($response->getStatusCode()==200){
        $response->withHeader('Content-Type', 'application/json');
        try{
            $response->write($oSystemHandler->getResult("DeletePerson",$request->getAttribute("key")));
        }catch(\Exception $e){
            echo $oSystemHandler->setErrorReturn($e->getMessage());
        }
    }

})->add(function ($request, $response, $next) use ($middlewareContainer) {
        $middlewareIp = $middlewareContainer['ipMiddleware'];
        return $middlewareIp($request, $response, $next);
    });




/**
 * @api {put} /updatePerson/:key/ update the data of a person
 * @apiVersion 0.1.0
 * @apiName updatePerson
 * @apiGroup PersonAdministration
 * @apiPermission localhost
 *
 * @apiParam {String } key person's unique ID.

 * @apiDescription  updates the information of  a person  that exists in the store  by the key
 *
 * @apiParam {String}   address       The address.
 * @apiParam {Number}   age           The age.
 * @apiParam {String}   lastName      Last name of the person.
 * @apiParam {String}   name          Name of the person.
 *
 * @apiParamExample {json} Request-Example:
 * {"data": {"address": "address", "age": "31", "lastName": "lName", "name": "name"}}
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {"state":1,"data":{"key":"6ef3ea03a1aeb917d4e8656aa609013d"}}
 *
 * @apiError ValidationError   one or more  fields  have errors
 *
 * @apiErrorExample Response (example):
 *     HTTP/1.1 200 OK
 *     {"state":-1,"msj":"error"}
 *
 * @apiError NoAccessRight  only  local requests are accepted
 *
 * @apiErrorExample Response (example):
 *     HTTP/1.1 401 Not Authenticated
 *     {"state":-1,"msg":"This ip (192.168.1.2) doesn't have access."}
 *
 *
 *
 */
$app->put('/updatePerson/{key}', function ($request, $response, $args) use($generalContainer,$middlewareContainer,$oSystemHandler)   {

    if($response->getStatusCode()==200){
        $response->withHeader('Content-Type', 'application/json');
        try{
            $aData=Array();
            $aData["key"]=$request->getAttribute("key");
            $aData["data"]=$request->getParam("data");
            $response->write($oSystemHandler->getResult("UpdatePerson",$aData));
        }catch(\Exception $e){
            echo $oSystemHandler->setErrorReturn($e->getMessage());
        }
    }

})->add(function ($request, $response, $next) use ($middlewareContainer) {
        $middlewareIp = $middlewareContainer['ipMiddleware'];
        return $middlewareIp($request, $response, $next);
    });
