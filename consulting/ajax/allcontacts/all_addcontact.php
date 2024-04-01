<?php 
    define('__CONFIG__', true);
    require_once "../../../inc/config.php";
    header('Content-Type: application/json');

// CHECK IF USER IS LOGGED IN
    if(isset($_SESSION['user_id'])){
        // Do nothing
    } else {
        $return = [];
        $return['loco'] = true;
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
// CHECK IF USER IS LOGGED IN


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $usercontactid = (int)$_SESSION['user_id'];
        $contactname = (string)$_POST['contactname'];
        $notes = '';
        $bank = (string)$_POST['bank'];
        $orderkey = (string)$_POST['orderkey'];


        $addsql = "INSERT INTO contacts(user_contactid, contact_name, notes, bank) VALUES(:user_contactid, :contact_name, :notes, :bank)";
        $addcontact = $con->prepare($addsql);
        $addcontact -> bindParam(':user_contactid', $usercontactid, PDO::PARAM_INT);
        $addcontact -> bindParam(':contact_name', $contactname, PDO::PARAM_STR);
        $addcontact -> bindParam(':notes', $notes, PDO::PARAM_STR);
        $addcontact -> bindParam(':bank', $bank, PDO::PARAM_STR);
        $addcontact->execute();
        $return['orderkey'] = $orderkey;
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>