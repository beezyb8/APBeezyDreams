<?php 
    define('__CONFIG__', true);
    require_once "../../../../inc/config.php";
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
        $userid = (int)$_SESSION['user_id'];

        $user_input = (string)$_POST['user_input'];

        $add_todo_item = "INSERT INTO todolist(userid, user_input) VALUES(:userid, :user_input)";
        $throwitin = $con->prepare($add_todo_item);
        $throwitin ->bindParam(':userid', $userid, PDO::PARAM_INT);
        $throwitin ->bindParam(':user_input', $user_input, PDO::PARAM_STR);
        $throwitin->execute();
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>