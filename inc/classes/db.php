<?php

if(!defined('__CONFIG__')) {
    exit('404 Gateway Error, email brandonbehar@mylegup.co and inform about error');
}

class DB {

    protected static $con;

    private function __construct() {

        try {

            self::$con = new PDO( 'mysql:charset=utf8mb4;host=localhost;dbname=mylegupc_database', 'mylegupc_beezyb8', 'iamcalvinjohnson');
            self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            self::$con->setAttribute( PDO::ATTR_ERRMODE, false);

        } catch(PDOException $e) {
            echo "If you see this email support@mylegup.co";
            exit;
        }
    }

    public static function getConnection() {

        if (!self::$con) {
            new DB();
        }

        return self::$con;
    }
}

?>