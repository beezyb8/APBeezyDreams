<?php 
    define('__CONFIG__', true);
    require_once "../../../inc/config.php";

    if(isset($_SESSION['user_id'])){
        $return = [];
        // Do nothing
    } else {
        $return = [];
        $return['loco'] = true;
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
    
    header('Content-Type: application/json');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userid = (int)$_SESSION['user_id'];
        $uq_id = (int)$_POST['uq_id'];
        $favorite = 1;
        
        $checkPermissionQuery = "SELECT * FROM ibfirms WHERE uq_id = :uq_id";
        $checkPermissionStmt = $con->prepare($checkPermissionQuery);
        $checkPermissionStmt->bindParam(':uq_id', $uq_id);
        $checkPermissionStmt->execute();
        $firmOwner = $checkPermissionStmt->fetch(PDO::FETCH_ASSOC);
    
        if ($firmOwner['userid'] !=  $userid) {
            // User is not authorized to edit firm
            $return['loco'] = true;
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }else{
        
            $sqlupdatestar = "UPDATE ibfirms SET favorite = :favorite WHERE uq_id = :uq_id";
            $updatestar = $con->prepare($sqlupdatestar);
            $updatestar->bindParam(':uq_id', $uq_id);
            $updatestar->bindValue(':favorite', $favorite, PDO::PARAM_INT);
            $updatestar->execute();
    
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }
    }
?>