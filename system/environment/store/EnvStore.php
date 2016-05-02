<?php

namespace system\environment;

/**
 * Gets the parameters  needed for the store.  These parameters are gotten from  .env
 * Class EnvStore
 * @package system\environment
 */
class EnvStore extends Env {

    /**
     * Returns the parameters of the  store
     * @param null $pathEnv
     * @return array
     * @throws \Exception|Exception
     */
    public function getParams($pathEnv=null){

        try{
            $this->getParamsEnv($pathEnv);
            $this->oDotEnv->required(['STORE_PATH', 'STORE_TTL']);
        }catch(Exception $e){
            throw $e;
        }
        return [
            'path' => getenv('STORE_PATH'),
            'ttl' => getenv('STORE_TTL')
        ];

    }

}