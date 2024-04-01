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
    }
// CHECK IF USER IS LOGGED IN

    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userid = (int)$_SESSION['user_id'];
        $app_id = (int)$_POST['app_id'];
        
        $checkPermissionQuery = "SELECT * FROM con_apps WHERE app_id = :app_id";
        $checkPermissionStmt = $con->prepare($checkPermissionQuery);
        $checkPermissionStmt->bindParam(':app_id', $app_id);
        $checkPermissionStmt->execute();
        $appOwner = $checkPermissionStmt->fetch(PDO::FETCH_ASSOC);
    
        if ($appOwner['userid'] !=  $userid) {
            // User is not authorized to edit this contact
            $return['loco'] = true;
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }else{
            $deleteapp = "DELETE FROM con_apps WHERE con_apps.app_id = :app_id";
            $deletedapp = $con->prepare($deleteapp);
            $deletedapp->bindParam(':app_id', $app_id);
            $deletedapp->execute();
            
            $appgrab = "SELECT * FROM con_apps WHERE userid = :userid ORDER BY appdate ASC";
            $grabapps = $con->prepare($appgrab);
            $grabapps->bindParam(':userid', $userid, PDO::PARAM_INT);
            $grabapps->execute();
            $return['apps']= $grabapps->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }    
    }
?>