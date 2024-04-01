<?php
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    header('Content-Type: application/json');
    $return = [];
    $notegrab = "SELECT * FROM banknotes WHERE userid = 64 AND bankname = 'William Blair'";
    $grabbanknotes = $con->prepare($notegrab);
    $grabbanknotes->execute();
    $return['this'] = $grabbanknotes->fetch(PDO::FETCH_ASSOC);
    echo json_encode($return, JSON_PRETTY_PRINT); exit;
?>
