<?php

use system\activity\activities;

use Desarrolla2\Cache;
use Desarrolla2\Cache\Adapter;
use system\store;

require_once"util/Files.php";

class CreatePersonTest extends PHPUnit_Framework_TestCase {

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
        $sClassName='system\activity\activities\CreatePerson';
        $oCreatePerson= new  activities\CreatePerson($this->getStubIKeyGenerator(),self::$oStoreFile);
        $this->assertInstanceOf($sInterfaceName,$oCreatePerson," The instance is not of ".$sInterfaceName);
        $this->assertInstanceOf($sClassName,$oCreatePerson," The instance is not of ".$sClassName);

    }


    /**
     * @test
     */
    public function addNewPerson() {

        $oCreatePerson= new  activities\CreatePerson($this->getStubIKeyGenerator(),self::$oStoreFile);
        $aData=array();
        $aData["name"]="name";
        $aData["lastName"]="last name";
        $aData["age"]="23";
        $aPersonId=$oCreatePerson->getResult($aData);
        $this->assertEquals($aPersonId["key"],"key_stub","The returned value must be 1");

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