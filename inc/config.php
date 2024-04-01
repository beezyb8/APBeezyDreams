<?php 
    if(!defined('__CONFIG__')) {
        exit('404 Gateway Error, email brandonbehar@mylegup.co and inform about error');
    }

    //Sessions on
    if(!isset($_SESSION)){
        session_start();
    }
    define('__ALLOWFOOTER__', true);

    include_once "classes/db.php";
    include_once "functions.php";
    include_once "classes/user.php";
    include_once "classes/page.php";
    // include_once "classes/network.php";

    $con = DB::getconnection();
?>