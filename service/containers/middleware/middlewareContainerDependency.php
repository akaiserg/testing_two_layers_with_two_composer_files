<?php

// DIC configuration
$middlewareContainer = $app->getContainer();


/** Middleware to handle  the IP authentication,   it's allowed  just connection from local (127.0.0.1)
 *
 * @param $c the same container
 * @return callable
 */
$middlewareContainer["ipMiddleware"] = function ($c) use ($oSystemHandler) {
    return function ($request, $response, $next) use ($c,$oSystemHandler) {

        $ipAddress = $request->getAttribute('ip_address');
        $aIps=array("::1","127.0.0.1","localhost");
        if (in_array($ipAddress, $aIps)) {
            // encontrado
        }else{
            $response = $response->withStatus(401);
            $response = $response->withHeader('Content-Type', 'application/json');
            $response = $response->write($oSystemHandler->setErrorReturn ("This ip (".$ipAddress.") doesn't have access."));
        }
        return $next($request, $response);


    };

};
