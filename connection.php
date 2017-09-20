<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 7/25/2017
 * Time: 10:53 PM
 */
class database
{
    public static $db = NULL;
    private function __construct(){}
    private function __clone(){}

    public static function getPDOobject()
    {
        if (!isset(self::$db)) {
            /**
             * edit the variables below to fit your database set up
             * the sql dump files are in 'database/databaseSetup.sql'
             */
            $database = 'OSposts.com';
            $host = 'localhost';
            $user = 'pick';
            $password = 'mysqld7';
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,];
            self::$db = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $user, $password, $options);
        }
        return self::$db;

    }
}