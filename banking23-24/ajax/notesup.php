<?php 
    define('__CONFIG__', true);
    require_once "../../inc/config.php";

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
        $notes = (string)$_POST['newnotes'];
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
        
            $sqlupdatenotes = "UPDATE contacts SET notes = :notes WHERE contacts.contact_id = :contact_id";
            $updatetxt = $con->prepare($sqlupdatenotes);
            $updatetxt->bindParam(':contact_id', $contactid);
            $updatetxt->bindParam(':notes', $notes);
            $updatetxt->execute();
    
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }
    }
?>