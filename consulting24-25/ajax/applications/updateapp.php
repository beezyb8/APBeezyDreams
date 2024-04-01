<?php 
    define('__CONFIG__', true);
    require_once "../../../inc/config.php";
    
    if(isset($_SESSION['user_id'])){
        // Do nothing
    } else {
        $return = [];
        $return['loco'] = true;
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
    
    header('Content-Type: application/json');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $app_id = (int)$_POST['app_id'];
        $app_name = (string)$_POST['app_name'];
        $applink = (string)$_POST['applink'];
        $applocation = (string)$_POST['applocation'];
        $appdate = (string)$_POST['appdate'];
        $userid = (int)$_SESSION['user_id'];
        
                
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
            $sqlupdateapp = "UPDATE con_apps SET app_name = :app_name, applink = :applink, applocation = :applocation, appdate = :appdate WHERE ib_apps.app_id = :app_id";
            $updateapp = $con->prepare($sqlupdateapp);
            $updateapp->bindParam(':app_id', $app_id);
            $updateapp->bindParam(':app_name', $app_name);
            $updateapp->bindParam(':applink', $applink);
            $updateapp->bindParam(':applocation', $applocation);
            $updateapp->bindParam(':appdate', $appdate);
            $updateapp->execute();
            
            $appgrab = "SELECT * FROM con_apps WHERE userid = :userid ORDER BY appdate ASC";
            $grabapps = $con->prepare($appgrab);
            $grabapps->bindParam(':userid', $userid, PDO::PARAM_INT);
            $grabapps->execute();
            $return['apps']= $grabapps->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }
    }
?>