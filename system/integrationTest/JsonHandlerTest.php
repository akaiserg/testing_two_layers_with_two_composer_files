<?php

use system\helper\jsonHandler;


class JsonHandlerTest extends PHPUnit_Framework_TestCase {


    private $oJson;

    /**
     *called before the test functions will be executed
     *this function is defined in PHPUnit_TestCase and overwritten
     *here
     */
    function setUp() {

        $this->oJson= new jsonHandler\JsonHandler();

    }

    /**
     * called after the test functions are executed
    * this function is defined in PHPUnit_TestCase and overwritten
    * here
     */
    function tearDown() {

    }


    /**
     * @test
     */
    public function checkInstance() {

        $sClassName='system\helper\jsonHandler\IJsonHandler';
        $this->assertInstanceOf($sClassName,$this->oJson," The instance  doesn't implement ". $sClassName);

    }


    /**
     * @test
     */
    public function convertArrayToJson() {

        $aData= array();
        $aData[0]["test"]="112222";
        $aData[0]["test2"]="222222";
        $sReturn=$this->oJson->jsonEncode($aData);
        $this->assertJsonStringEqualsJsonString($sReturn,json_encode($aData),"json strings are not the same");

    }


    /**
     * @test
     */
    public function convertStringToJson() {

        $sData= "String data";
        $sReturn=$this->oJson->jsonEncode($sData);
        $this->assertJsonStringEqualsJsonString($sReturn,'"'.$sData.'"',"json strings are not the same");

    }

    /**
     * @test
     */
    public function convertNullToJson() {


        $sReturn=$this->oJson->jsonEncode(null);
        $this->assertJsonStringEqualsJsonString($sReturn,'null',"The return was not null");

    }


    /**
     * @test
     */
    public function convertJsonToArray() {

        $sJson='{"Mascott":"ux"}';
        $aReturn=$this->oJson->jsonDecode($sJson);
        $this->assertEquals($aReturn["Mascott"],'ux',"The return was not  an array");

    }


    /**
     * @test
     */
    public function convertJsonToString() {

        $sJson='"Mascott"';
        $return=$this->oJson->jsonDecode($sJson);
        $this->assertEquals($return,'Mascott',"The return was not  a string ");

    }

    /**
     * @test
     */
    public function convertNull() {


        $return=$this->oJson->jsonDecode(null);
        $this->assertEquals($return,null,"The return was not a null");

    }


    /**
     * @test
     */
    public function convertBadJson() {

        $sBadJson='{"Mascott"="ux"}';
        $return=$this->oJson->jsonDecode($sBadJson);
        $this->assertEquals($return,null,"The return must be a null value");

    }

}
