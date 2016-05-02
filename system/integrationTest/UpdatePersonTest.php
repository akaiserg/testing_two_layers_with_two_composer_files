<?php

use system\activity\activities;

use Desarrolla2\Cache;
use Desarrolla2\Cache\Adapter;
use system\store;

require_once"util/Files.php";

class UpdatePersonTest extends PHPUnit_Framework_TestCase {

    private static $sPath;
    private static $oStoreFile;
    private  $oStubIKeyGenerator=null;

    /**
     *called before the test functions will be executed
     *this function is defined in PHPUnit_TestCase and overwritten
     *here
     */
    public static function setUpBeforeClass() {

        self::$sPath= getcwd().'\test\\'.'tmp2_php_local2';
        $adapter = new Adapter\File(self::$sPath);
        $adapter->setOption('ttl', 5600);
        $oCache=new Cache\Cache($adapter);
        $oJson= new \system\helper\jsonHandler\JsonHandler();
        self::$oStoreFile= new  store\StoreFile($oCache,$oJson);

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
    public function checkInstance() {

        $sInterfaceName='system\activity\activities\IActivity';
        $sClassName='system\activity\activities\UpdatePerson';
        $oUpdatePerson= new  activities\UpdatePerson(self::$oStoreFile);
        $this->assertInstanceOf($sInterfaceName,$oUpdatePerson," The instance is not of ".$sInterfaceName);
        $this->assertInstanceOf($sClassName,$oUpdatePerson," The instance is not of ".$sClassName);

    }


    /**
     * @test
     */
    public function updatePerson() {

        $oCreatePerson= new  activities\CreatePerson($this->getStubIKeyGenerator(),self::$oStoreFile);
        $aData=array();
        $aData["name"]="name";
        $aData["lastName"]="last name";
        $aData["age"]="23";
        $aPersonId=$oCreatePerson->getResult($aData);
        $oInfoPerson= new  activities\InfoPerson(self::$oStoreFile);
        $aResult=$oInfoPerson->getResult($aPersonId["key"]);
        $this->assertEquals($aResult["name"],$aData["name"]," The value must be ".$aData["name"]);
        $this->assertEquals($aResult["lastName"], $aData["lastName"]," The value must be ".$aData["lastName"]);
        $this->assertEquals($aResult["age"], $aData["age"]," The value must be ".$aData["age"]);
        $oUpdatePerson= new  activities\UpdatePerson(self::$oStoreFile);
        $aParam=array();
        $aParam["key"]=$aPersonId["key"];
        $aData["name"]=" updated name";
        $aData["lastName"]=" update last name";
        $aParam["data"]=$aData;
        $oUpdatePerson->getResult($aParam);
        $aResultAfterUpdating=$oInfoPerson->getResult($aPersonId["key"]);
        $this->assertEquals($aResultAfterUpdating["name"],$aData["name"]," The value must be ".$aData["name"]);
        $this->assertEquals($aResultAfterUpdating["lastName"], $aData["lastName"]," The value must be ".$aData["lastName"]);
        $this->assertEquals($aResultAfterUpdating["age"], $aData["age"]," The value must be ".$aData["age"]);

    }


    private function getStubIKeyGenerator(){

        if($this->oStubIKeyGenerator ==null){
            $this->oStubIKeyGenerator=$this->getMockBuilder('system\helper\keyGenerator\IKeyGenerator')->disableOriginalConstructor()->getMock();
            $this->oStubIKeyGenerator->method("getKey")->will($this->returnValue("key_stub"));
           // $this->oStubIKeyGenerator->expects($this->once())->method("getKey")->will($this->returnValue("key_stub"));
        }
        return $this->oStubIKeyGenerator;

    }


}