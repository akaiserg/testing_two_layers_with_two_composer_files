<?php

namespace system\activity\activities;
/**
 * Interface IActivity   which  implements each  activity
 * @package system\activity\activities
 */
interface IActivity {

    /**
     * Method calls  fot the clients to get  the result
     * @param null $aData
     * @return mixed
     */
    public function getResult( $aData=null);

}