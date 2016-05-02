<?php


namespace system\store;

use Desarrolla2\Cache;
use system\helper\jsonHandler;
use system\helper\keyGenerator;

/**
 * Class StoreFile
 * @package system\store
 */
class StoreFile  implements  IStoreFile{

    /**
     * Cache object
     * @var \Desarrolla2\Cache\CacheInterface
     */
    private $oCache;
    /**
     * Json object
     * @var \system\helper\jsonHandler\IJsonHandler
     */
    private $oJson;
    /**
     * Name of the  main key which has all the key
     * @var string
     */
    private static $MAIN_KEY="__MAIN__KEY__";
    /**
     * The ttl by default
     * @var int
     */
    private static $DEFAULT_TTL= 5000;

    /**
     * returns the main key
     * @return string
     */

    final public static function getMainKey(){

        return self::$MAIN_KEY;

    }

    /**
     * Returns the default ttl
     * @return int
     */
    final public static function getDefaultTtl(){

        return self::$DEFAULT_TTL;

    }

    /**
     * Constructor
     * @param Cache\CacheInterface $oCache
     * @param jsonHandler\IJsonHandler $oJson
     */
    public function __construct(Cache\CacheInterface $oCache,jsonHandler\IJsonHandler $oJson ){

        $this->oJson=$oJson;
        $this->oCache=$oCache;
        $this->checkMainKeyStore();
    }

    /**
     * @inherit
     * {@inherit}
     * {@inheritdoc}
     */
    public function get($sKey){

        $mValue=$this->oCache->get($sKey);
        if($mValue!=null){
            $mValue= $this->jsonDecode($mValue);
        }
        return $mValue;

    }

    /**
     * @inherit
     * {@inherit}
     * {@inheritdoc}
     */
    public function set($sKey, $sValue){

        if($this->checkIfKeyExists($sKey)==false){
            $this->addNewKey($sKey);
        }
        $this->oCache->set($sKey,$this->jsonEncode($sValue),$this::getDefaultTtl());



    }

    /**
     * @inherit
     * {@inherit}
     * {@inheritdoc}
     */
    public function delete($sKey){

        $this->oCache->delete($sKey);
        $this->deleteKeyFromMainList($sKey);

    }

    /**
     * @inherit
     * {@inherit}
     * {@inheritdoc}
     */
    public function getAllKey(){

        return  $this->jsonDecode($this->oCache->get($this::getMainKey()));

    }

    /**
     * @inherit
     * {@inherit}
     * {@inheritdoc}
     */
    public function update($sKey,$aValue){


        $this->oCache->set($sKey,$this->jsonEncode($aValue),$this::getDefaultTtl());

    }

    /**
     * Checks if  a key exist
     * @param $sKey
     * @return mixed
     */
    private function checkIfKeyExists($sKey){

        //var_dump($this->oCache->has($sKey));
        return $this->oCache->has($sKey);

    }


    /**
     * Checks if the main key exist
     */
    private function checkMainKeyStore(){

        if(!$this->checkIfKeyExists($this::getMainKey())){

            $this->setMainKey($this->oJson->jsonEncode(array()));
        }

    }

    /**
     * Sets the main key if it does not exist
     * @param $sDataKeys
     */
    private function setMainKey($sDataKeys){

        $this->oCache->set($this::getMainKey(),$sDataKeys,$this::getDefaultTtl());

    }


    /**
     * Decodes a  json  string
     * @param $sData
     * @return mixed
     */
    private function jsonDecode($sData){


        return $this->oJson->jsonDecode($sData);

    }


    /**
     * Encodes a variable into a json
     * @param $sData
     * @return mixed
     */
    private function jsonEncode($sData){

        return $this->oJson->jsonEncode($sData);

    }

    /**
     * Adds a new key  into  the  main key value
     * @param $sNewKey
     */
    private function addNewKey($sNewKey){

        $sJson=$this->oCache->get($this::getMainKey());
        $aKey=$this->jsonDecode($sJson);
        array_push($aKey,$sNewKey);
        $this->setMainKey($this->jsonEncode($aKey));

    }

    private  function deleteKeyFromMainList($sKey){

        $aKeys= $this->getAllKey();
        unset($aKeys[array_search($sKey, $aKeys)]);
        $this->setMainKey($this->jsonEncode($aKeys));

    }


}