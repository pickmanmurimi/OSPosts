<?php

/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/14/2017
 * Time: 3:52 PM
 */
class stringst
{
    /**
     * split strings
     * put the string into an array
     */

    static function splitTags($String,$delimeter){
        $tags = explode("$delimeter",$String);

        return $tags;

    }

}