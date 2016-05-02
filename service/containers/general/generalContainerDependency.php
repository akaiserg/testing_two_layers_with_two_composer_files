<?php

// DIC configuration
$generalContainer = $app->getContainer();


/**
 * Handles the  urls, when a  url which has not been declared is called  this returns a json with the error
 * @param $c the same container
 * @return callable
 */
$generalContainer["notFoundHandler"] = function ($c) use ($oSystemHandler) {
    return function ($request, $response) use ($c,$oSystemHandler) {
        return $c['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'application/json')
            ->write($oSystemHandler->setErrorReturn("Page not found."));
    };

};

