<?php

namespace system\store;

/**
 * Interface IStoreFile which defines how to handle the store
 * @package system\store
 */
Interface IStoreFile {

    /**
     * Returns a value  by its key
     * @param $sKey
     * @return mixed
     */
    public function get($sKey);

    /**
     * Sets a new value with a  new key
     * @param $sKey
     * @param $sValue
     * @return mixed
     */
    public function set($sKey, $sValue);

    /**
     * Deletes a value from the store
     * @param $sKey
     * @return mixed
     */
    public function delete($sKey);

    /**
     * Updates a value by the key
     * @param $sKey
     * @param $sValue
     * @return mixed
     */
    public function update($sKey,$sValue);

    /**
     * returns all the key already saved
     * @return mixed
     */
    public function getAllKey();

}