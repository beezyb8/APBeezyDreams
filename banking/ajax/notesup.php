<?php 
    define('__CONFIG__', true);
    require_once "../../inc/config.php";

    if(isset($_SESSION['user_id'])){
        $return = [];
        // Do nothing
    } else {
        $return = [];
        $return['loco'] = true;
    }
    
    header('Content-Type: application/json');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $notes = (string)$_POST['newnotes'];
        $contactid = (int)$_POST['contactid'];
        $sqlupdatenotes = "UPDATE contacts SET notes = :notes WHERE contacts.contact_id = :contact_id";
        $updatetxt = $con->prepare($sqlupdatenotes);
        $updatetxt->bindParam(':contact_id', $contactid);
        $updatetxt->bindParam(':notes', $notes);
        $updatetxt->execute();

        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>