<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    header('Content-Type: application/json');
    Page::ForceLogin();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $userid = (int)$_SESSION['user_id'];
        $bank = (string)$_POST['bank'];

        $notegrab = "SELECT * FROM banknotes WHERE userid = $userid AND bankname = '$bank'";
        $grabbanknotes = $con->prepare($notegrab);
        $grabbanknotes->execute();
        $return['notes']= $grabbanknotes->fetch(PDO::FETCH_ASSOC);
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>
