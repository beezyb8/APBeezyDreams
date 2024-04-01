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

        $thankyoucheck = (int)$_POST['thankyoucheck'];
        $contactid = (int)$_POST['contactid'];

        $sqlfilter = "UPDATE contacts SET thankyou = :thankyou WHERE contact_id = :contact_id";
        $networkdata = $con->prepare($sqlfilter);
        $networkdata->bindParam(':contact_id', $contactid, PDO::PARAM_INT);
        $networkdata->bindParam(':thankyou', $thankyoucheck, PDO::PARAM_INT);
        $networkdata->execute();

        $sqlfilter2 = "SELECT * FROM contacts WHERE contact_id = :contact_id";
        $networkdata = $con->prepare($sqlfilter2);
        $networkdata->bindParam(':contact_id', $contactid, PDO::PARAM_INT);
        $networkdata->execute();
        $return['thiscontact'] = $networkdata->fetch(PDO::FETCH_ASSOC);
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>