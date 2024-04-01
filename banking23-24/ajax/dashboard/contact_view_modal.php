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
        $contactid = (int)$_POST['contactid'];
        
        $checkPermissionQuery = "SELECT * FROM contacts WHERE contact_id = :contact_id";
        $checkPermissionStmt = $con->prepare($checkPermissionQuery);
        $checkPermissionStmt->bindParam(':contact_id', $contactid);
        $checkPermissionStmt->execute();
        $contactOwner = $checkPermissionStmt->fetch(PDO::FETCH_ASSOC);
    
        if ($contactOwner['user_contactid'] !=  $userid) {
            // User is not authorized to edit this contact
            $return['loco'] = true;
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }else{
            $sqlpullcontact = "SELECT * FROM contacts WHERE contact_id = :contact_id";
            $contactdata = $con->prepare($sqlpullcontact);
            $contactdata->bindParam(':contact_id', $contactid);
            $contactdata->execute();
            $return['contact']= $contactdata->fetch(PDO::FETCH_ASSOC);
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }    
    }
?>