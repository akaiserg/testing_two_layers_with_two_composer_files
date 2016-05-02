<?php

namespace system\activity\activities;
use system\store;

/**
 * Class UpdatePerson which  updates a person of the store
 * @package system\activity\activities
 */
class UpdatePerson implements  IActivity {

    /**
     * The store
     * @var \system\store\IStoreFile
     */
    private $oStore;

    /**
     * The constructor
     * @param store\IStoreFile $oStore
     */
    public function __construct(store\IStoreFile $oStore){

        $this->oStore=$oStore;

    }

    /**
     * @inherit
     * {@inherit}
     * {@inheritdoc}
     */
    public function getResult( $aData=null){

        $this->storeUpdateData($aData["key"],$aData["data"]);
        $aReturn=array();
        $aReturn["key"]=$aData["key"];
        return $aReturn;

    }

    /**
     * Updates  a person by their key
     * @param $sKey
     * @param $aData
     * @throws \Exception
     */
    private function storeUpdateData($sKey,$aData){

        try{
            $this->oStore->update($sKey,$aData);
        }catch(\Exception $e){
            throw $e;
        }

    }

}