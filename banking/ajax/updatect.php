<?php 
    define('__CONFIG__', true);
    require_once "../../inc/config.php";
    
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

        $newname = (string)$_POST['contactname'];
        $contactid = (int)$_POST['contactid'];
        $usercontactid = (int)$_SESSION['user_id'];
        $bank = (string)$_POST['bank'];


        $sqlupdatectname = "UPDATE contacts SET contact_name = :contact_name WHERE contacts.contact_id = :contact_id";
        $updatename = $con->prepare($sqlupdatectname);
        $updatename->bindParam(':contact_id', $contactid);
        $updatename->bindParam(':contact_name', $newname);
        $updatename->execute();

        $sqlfilter = "SELECT * FROM contacts WHERE user_contactid = :user_contactid AND bank = :bank";
        $networkdata = $con->prepare($sqlfilter);
        $networkdata->bindParam('user_contactid', $usercontactid);
        $networkdata->bindParam('bank', $bank);
        $networkdata->execute();
        $return['contacts'] = $networkdata->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>