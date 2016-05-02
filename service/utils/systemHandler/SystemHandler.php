<?php

namespace service\utils\systemHandler;
use system\factory;

/**
 * Class SystemHandler  which   connects with the layer system
 * @package service\utils\systemHandler
 */
class SystemHandler {

    /**
     * constructor
     */
    public function __construct(){

    }

    /**
     * Returns  the result  to the client in json
     * @param $sNameService
     * @param null $aData
     * @return string
     */
    public function getResult($sNameService, $aData=null){

        $aReturn=array();
        try{
            $aReturn["state"]=1;
            $oHandler=(object)factory\FactorySystem::getInstance($sNameService);
            $aReturn["data"]=$oHandler->getResult($aData);
            return json_encode($aReturn);
        }catch(Exception $e){
            return $this->setErrorReturn($e->getMessage());
        }

    }

    /**
     * Returns the message when an error occurs
     * @param $sMessage
     * @return string
     */
    public function setErrorReturn($sMessage){

        $aReturn=array();
        $aReturn["state"]=-1;
        $aReturn["msg"]=$sMessage;
        $aReturn["data"]=null;
        return json_encode($aReturn);

    }


}