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

        $contactid = (int)$_POST['contactid'];
        $newname = (string)$_POST['contactname'];
        $newemail = (string)$_POST['contactemail'];
        $newnumber = (string)$_POST['contactnumber'];
        $newconnection = (string)$_POST['contactconnection'];
        $newnotes = (string)$_POST['contactnotes'];
        $usercontactid = (int)$_SESSION['user_id'];
        
                
        $checkPermissionQuery = "SELECT * FROM contacts WHERE contact_id = :contact_id";
        $checkPermissionStmt = $con->prepare($checkPermissionQuery);
        $checkPermissionStmt->bindParam(':contact_id', $contactid);
        $checkPermissionStmt->execute();
        $contactOwner = $checkPermissionStmt->fetch(PDO::FETCH_ASSOC);
    
        if ($contactOwner['user_contactid'] !=  $usercontactid) {
            // User is not authorized to edit this contact
            $return['loco'] = true;
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }else{
            $sqlupdatectname = "UPDATE contacts SET contact_name = :contact_name, contact_email = :contact_email, contact_number = :contact_number, contact_connection = :contact_connection, notes = :notes WHERE contacts.contact_id = :contact_id";
            $updatename = $con->prepare($sqlupdatectname);
            $updatename->bindParam(':contact_id', $contactid);
            $updatename->bindParam(':contact_name', $newname);
            $updatename->bindParam(':contact_email', $newemail);
            $updatename->bindParam(':contact_number', $newnumber);
            $updatename->bindParam(':contact_connection', $newconnection);
            $updatename->bindParam(':notes', $newnotes);
            $updatename->execute();
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }
    }
?>