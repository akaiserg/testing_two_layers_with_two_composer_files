<?php

namespace system\activity\activities;
use system\store;

/**
 * Class DeletePerson which delete a person from the store
 * @package system\activity\activities
 */
class DeletePerson implements  IActivity {

    /**
     * The store
     * @var \system\store\IStoreFile
     */
    private $oStore;

    /**
     * Cosntructor
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

        return $this->storeDeleteData($sKey);

    }

    /**
     * Deletes  a person from the store
     * @param $sKey
     * @return mixed
     * @throws \Exception
     */
    private function storeDeleteData($sKey){

        try{
            return $this->oStore->delete($sKey);
        }catch(\Exception $e){
            throw $e;
        }

    }

}