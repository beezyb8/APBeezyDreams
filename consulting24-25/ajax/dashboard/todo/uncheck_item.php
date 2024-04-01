<?php 
    define('__CONFIG__', true);
    require_once "../../../../inc/config.php";

    
// CHECK IF USER IS LOGGED IN
    if(isset($_SESSION['user_id'])){
        $return = [];
        // Do nothing
    } else {
        $return = [];
        $return['loco'] = true;
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
// CHECK IF USER IS LOGGED IN

    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userid = (int)$_SESSION['user_id'];
        $todo_id = (int)$_POST['todo_id'];
        $checked =  0;

        $checkPermissionQuery = "SELECT * FROM todolist WHERE todo_id = :todo_id";
        $checkPermissionStmt = $con->prepare($checkPermissionQuery);
        $checkPermissionStmt->bindParam(':todo_id', $todo_id);
        $checkPermissionStmt->execute();
        $firmOwner = $checkPermissionStmt->fetch(PDO::FETCH_ASSOC);
    
        if ($firmOwner['userid'] !=  $userid) {
            // User is not authorized to edit this contact
            $return['loco'] = true;
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }else{
            $checkitem = "UPDATE todolist SET checked = :checked WHERE todo_id = :todo_id";
            $thesql = $con->prepare($checkitem);
            $thesql->bindParam(':todo_id', $todo_id);
            $thesql->bindParam(':checked', $checked, PDO::PARAM_INT);
            $thesql->execute();
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }    
    }
?>