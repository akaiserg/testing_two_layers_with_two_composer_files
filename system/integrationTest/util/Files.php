<?php

/**
 * Deletes a folder with all its content
 * @param $dir
 * @return bool
 */
function delTree($dir){

    if(is_dir($dir)){
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }


}