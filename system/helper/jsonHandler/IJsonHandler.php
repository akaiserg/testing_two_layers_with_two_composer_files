<?php

namespace system\helper\jsonHandler;

/**
 * Interface IJsonHandler which  handles the json format
 * @package system\helper\jsonHandler
 */
interface IJsonHandler {

    /**
     * Converts to  json
     * @param $aData
     * @return mixed
     */
    public function jsonEncode($aData);

    /**
     * Converts from json  to  php variable
     * @param $sData
     * @param bool $bAssoc
     * @return mixed
     */
    public function jsonDecode($sData, $bAssoc=true);
}