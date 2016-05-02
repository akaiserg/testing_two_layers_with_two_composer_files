<?php

namespace system\factory;
require_once realpath(__DIR__ . DIRECTORY_SEPARATOR . '../')."/vendor/autoload.php";
use Desarrolla2\Cache;
use Desarrolla2\Cache\Adapter;
use system\helper\keyGenerator;
use system\helper\jsonHandler;
use system\helper\reflection;
use system\store;
use system\environment;

/**
 * Class FactorySystem which is the  entry point for the system layer
 * @package system\factory
 */
abstract  class FactorySystem {

    /**
     * Returns the instance of a class of the system layer. It's needed to pass the class name ir order to get the instance
     * @param $sNameClass
     * @return null|object
     * @throws \Exception|Exception
     */
    public static final  function getInstance($sNameClass){

        $aMapDependencies= array();
        $aMapDependencies['system\helper\keyGenerator\IKeyGenerator']=&self::getKeyGenerator();
        $aMapDependencies['system\store\IStoreFile']=&self::getStoreFile(self::getStoreCache(self::getInfoEnvironment()),self::getJsonHandler());
        $sActivityName="system\\activity\\activities\\".$sNameClass;
        $oReflection= new reflection\ResolverByReflection(new reflection\resolveInterfaceByName\ResolveInterfaceByNameFirstLetter(),$aMapDependencies);
        try{
            return $oReflection->getInstanceOf($sActivityName);
        }catch(Exception $e){
            throw $e;
        }

    }

    /**
     * Returns the   instance of the specif class  that implements the contract IStoreFile
     * @param $oCache
     * @param $oJson
     * @return store\StoreFile
     */
    private static function getStoreFile($oCache,$oJson){

       return new  store\StoreFile($oCache,$oJson);

     }

    /**
     * Returns the   instance of the specif class  that implements the contract IKeyGenerator
     * @return keyGenerator\KeyGenerator
     */
    private static function getKeyGenerator(){

      return  new keyGenerator\KeyGenerator();


    }

    /**
     *  Returns the handler of cache
     * @param $oEnv
     * @return Cache\Cache
     */
    private static function getStoreCache($oEnv){

         $aParam=$oEnv->getParams();
         $adapter = new Adapter\File($aParam["path"]);
         $adapter->setOption('ttl', $aParam["ttl"]);
         return new Cache\Cache($adapter);

     }

    /**
     * Returns the   instance of the specif class  that implements the contract IJsonHandler
     * @return jsonHandler\JsonHandler
     */
    private static function getJsonHandler(){

         return  new jsonHandler\JsonHandler();

     }


    /**
     * Returns  the  object which has the environments variables
     * @return environment\EnvStore
     */
    private static function getInfoEnvironment(){

         return  new  environment\EnvStore();

     }

}