<?php

namespace system\environment;

use Dotenv;

/**
 * Class Env which  obtains  the params of the environment
 * @package system\environment
 */
class Env {

    /**
     *
     * @var
     */
    protected $oDotEnv;

    /**
     * Get an instance of the class  which handles the  parameters of  the system
     * @param $pathEnv
     * @throws \Exception|Exception
     */
    protected function getParamsEnv($pathEnv) {

        try {
            $this->oDotEnv= new Dotenv\Dotenv($this->setDefaultPath($pathEnv));
            $this->oDotEnv->load();
           // $this->oDotEnv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS','DB_DRIVER','DB_CHARSET']);
        } catch (Exception $e) {
            throw $e;
        }

    }

    /**
     * Checks if the path is null then the default path is given
     * @param $pathEnv
     * @return string
     */
    private function setDefaultPath($pathEnv){

        if($pathEnv==null){
            // default path
            $pathEnv=dirname(__DIR__);
        }
        return $pathEnv;

    }

}