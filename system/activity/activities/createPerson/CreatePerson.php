<?php

namespace system\activity\activities;

use system\helper\keyGenerator;
use system\store;

/**
 * Class CreatePerson which creates a person  inside the store
 * @package system\activity\activities
 */
class CreatePerson implements  IActivity {

    /**
     * generator of keys
     * @var \system\helper\keyGenerator\IKeyGenerator
     */
    private $oKeyGenerator;

    /**
     * The store
     * @var \system\store\IStoreFile
     */
    private $oStore;

    /**
     * Cosntructor of the class
     * @param keyGenerator\IKeyGenerator $oKeyGenerator
     * @param store\IStoreFile $oStore
     */
    public function __construct(keyGenerator\IKeyGenerator $oKeyGenerator,store\IStoreFile $oStore){

        $this->oKeyGenerator=$oKeyGenerator;
        $this->oStore=$oStore;

    }

    /**
     * @inherit
     * {@inherit}
     * {@inheritdoc}
     */
    public function getResult( $aData=null){

        $sKey=$this->oKeyGenerator->getKey();
        $this->storeData($sKey,$aData);
        $aReturn=array();
        $aReturn["key"]=$sKey;
        return $aReturn;

    }

    /**
     * Saves the person inside the store
     * @param $sKey
     * @param $aData
     * @throws \Exception
     */
    private function storeData($sKey, $aData){

        try{
            $this->oStore->set($sKey,$aData);
        }catch(\Exception $e){
            throw $e;
        }

    }

}