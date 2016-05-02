<?php

namespace system\helper\keyGenerator;
/**
 * Interface IKeyGenerator which handles  the generation of keys
 * @package system\helper\keyGenerator
 */
interface  IKeyGenerator {

    /**
     * Returns a new key
     * @return mixed
     */
    public function getKey();

}