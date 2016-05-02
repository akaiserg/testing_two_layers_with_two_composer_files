<?php

namespace system\activity\activities;
use system\store;

/**
 * Class InfoPerson which  returns a person by their id
 * @package system\activity\activities
 */
class InfoPerson implements  IActivity {

    /**
     * The store
     * @var \system\store\IStoreFile
     */
    private $oStore;

    /**
     * Constructor
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
    public function getResult( $sKey=null){

        return $this->storeGetData($sKey);

    }


    /**
     * Returns a person from the store
     * @param $sKey
     * @return mixed
     * @throws \Exception
     */
    private function storeGetData($sKey){

        try{
            return $this->oStore->get($sKey);
        }catch(\Exception $e){
            throw $e;
        }

    }

}