<?php 
    define('__CONFIG__', true);
    require_once "../../../inc/config.php";

    
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
        $notestxt = strval($_POST['newnotes']);
        $uq_id = (int)$_POST['uq_id'];
        
         
        $checkPermissionQuery = "SELECT * FROM ibfirms WHERE uq_id = :uq_id";
        $checkPermissionStmt = $con->prepare($checkPermissionQuery);
        $checkPermissionStmt->bindParam(':uq_id', $uq_id);
        $checkPermissionStmt->execute();
        $firmOwner = $checkPermissionStmt->fetch(PDO::FETCH_ASSOC);
    
        if ($firmOwner['userid'] !=  $userid) {
            // User is not authorized to edit this contact
            $return['loco'] = true;
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }else{
            $sqlupdatenotes = "UPDATE ibfirms SET notestxt = :notestxt WHERE uq_id = :uq_id";
            $updatetxt = $con->prepare($sqlupdatenotes);
            $updatetxt->bindParam(':uq_id', $uq_id);
            $updatetxt->bindParam(':notestxt', $notestxt);
            $updatetxt->execute();
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }    
    }
?>