<?php

namespace system\helper\jsonHandler;

/**
 * Class JsonHandler which implements  the json handler
 * @package system\helper\jsonHandler
 */
class JsonHandler implements  IJsonHandler {


    /**
     * @inherit
     * {@inherit}
     * {@inheritdoc}
     */
    public function jsonEncode( $aData){

        return json_encode($aData);

    }

    /**
     * @inherit
     * {@inherit}
     * {@inheritdoc}
     */
    public function jsonDecode($sData, $bAssoc=true){

        return json_decode($sData,$bAssoc);

    }

}