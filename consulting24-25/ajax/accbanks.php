<?php 
    define('__CONFIG__', true);
    require_once "../../inc/config.php";
    
// CHECK IF USER IS LOGGED IN
    if(isset($_SESSION['user_id'])){
        // Do nothing
    } else {
        $return = [];
        $return['loco'] = true;
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
// CHECK IF USER IS LOGGED IN

    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $check = (int)$_POST['check'];
        $uq_id = (int)$_POST['uq_id'];

        $sqlup = "UPDATE ibfirms SET checked = :checked WHERE uq_id = :uq_id";
        $checked = $con->prepare($sqlup);
        $checked->bindParam(':uq_id', $uq_id, PDO::PARAM_INT);
        $checked->bindValue(':checked', $check, PDO::PARAM_INT);
        $checked->execute();
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>