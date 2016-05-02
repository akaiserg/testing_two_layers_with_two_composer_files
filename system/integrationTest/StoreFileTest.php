<?php

use system\store;

use Desarrolla2\Cache;
use Desarrolla2\Cache\Adapter;


require_once"util/Files.php";
class StoreFileTest extends PHPUnit_Framework_TestCase {

     private $oCache;
     private $oJson;
     private  static $sPath=null;


    /**
     *called before the test functions will be executed
     *this function is defined in PHPUnit_TestCase and overwritten
     *here
     */
    function setUp() {

        self::$sPath= getcwd().'\test\\'.'tmp2_php_local';
        $adapter = new Adapter\File(self::$sPath);
        $adapter->setOption('ttl', 5600);
        $this->oCache=new Cache\Cache($adapter);
        $this->oJson= new \system\helper\jsonHandler\JsonHandler();

    }






    /**
     * called after the test functions are executed
    * this function is defined in PHPUnit_TestCase and overwritten
    * here
     */
    public static function   tearDownAfterClass() {

        delTree( self::$sPath);

    }


    /**
     * @test
     */
    public function checkUnknownKeyGet() {

        $oStoreFile= new  store\StoreFile($this->oCache,$this->oJson);
        $date = new DateTime();
        $mValue=$oStoreFile->get($date->format("U"));
        $this->assertNull($mValue,"The value must be null");


    }


    /**
     * @test
     */
    public function checkdSetValue() {

     $oStoreFile= new  store\StoreFile($this->oCache,$this->oJson);
     $aData=array();
     $aData[0]["a"]=1;
     $aData[0]["b"]=2;
     $oStoreFile->set("key",$aData);
     $aKeys=$oStoreFile->getAllKey();
     $this->assertEquals($aKeys[0],"key","The first key  saved must be key ");

    }


    /**
     * @test
     */
    public function checkGetValue() {

        $oStoreFile= new  store\StoreFile($this->oCache,$this->oJson);
        $aData=$oStoreFile->get("key");
        $this->assertEquals($aData[0]["a"],1,"The first key  saved must be key ");

    }


    /**
     * @test
     */
    public function checkDeleteValue() {

        $oStoreFile= new  store\StoreFile($this->oCache,$this->oJson);
        $oStoreFile->delete("key");
        $this->assertEquals($oStoreFile->get("key"),null,"The returned value must be null");

    }


    /**
     * @test
     */
    public function checkGetKeys() {

        $oStoreFile= new  store\StoreFile($this->oCache,$this->oJson);
        $aData=array();
        $aData[0]["a"]=1;
        $aData[0]["b"]=2;
        $oStoreFile->set("key",$aData);
        $aKeys=$oStoreFile->getAllKey();
        $this->assertEquals($aKeys[0],"key","The first key  saved must be key ");
        $aData2=array();
        $aData2[0]["a"]=1;
        $aData2[0]["b"]=2;
        $oStoreFile->set("key2",$aData2);
        $aKeys=$oStoreFile->getAllKey();
        $this->assertEquals($aKeys[0],"key","The first key  saved must be key ");
        $this->assertEquals($aKeys[1],"key2","The first key  saved must be key ");
        $oStoreFile->delete("key");
        $aKeys=$oStoreFile->getAllKey();
        // same position inside the array
        $this->assertEquals($aKeys[1],"key2","The first key  saved must be key ");
        $this->assertEquals(isset($aKeys[0]),false,"The value must be false ");

    }

}