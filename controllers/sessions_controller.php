<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/7/2017
 * Time: 10:49 PM
 */
session_start();

class sessions
{
    static function setSessionValues($sessionValues)
    {
        /**
         *    loop through the array and create session variables for each of them
         *      the function takes an associative array
         **/

        foreach ($sessionValues as $name => $value) {
            $_SESSION[$name] = $value;
        }
    }

    static function trackSession($sessionValue)
    {
        /**
         * checks that a session is set
         */

        if (isset($_SESSION[$sessionValue])) {
            return true;
        } else {
            return false;
        }
    }

    static function getSessionValue($session)
    {
        /**
         * gets the value of a session if its set
         */
        if (isset($_SESSION[$session])) {
            return $_SESSION[$session];
        }
    }

    static function unsetSessions($sessions)
    {
//    loop through the array to destroy all the sessions

        foreach ($sessions as $session) {
            if (isset($_SESSION[$session])) {
                session_unset($session);
            }
        }
    }

    static function destroySessions()
    {
//    destroy the set sessions
        session_destroy();
    }
}