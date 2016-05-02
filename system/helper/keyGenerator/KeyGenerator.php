<?php

namespace system\helper\keyGenerator;

/**
 * Class KeyGenerator which  generates keys
 * @package system\helper\keyGenerator
 */
class KeyGenerator implements IKeyGenerator {

    /**
     * @inherit
     * {@inherit}
     * {@inheritdoc}
     */
    public function getKey(){

        return md5(microtime().rand());

    }

}