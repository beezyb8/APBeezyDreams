<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    header('Content-Type: application/json');
    Page::ForceLogin();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $coldchecker = (int)$_POST['coldcheck'];
        $contactid = (int)$_POST['contactid'];

        $sqlfilter = "UPDATE contacts SET coldemail = :coldemail WHERE contact_id = :contact_id";
        $networkdata = $con->prepare($sqlfilter);
        $networkdata->bindParam(':contact_id', $contactid, PDO::PARAM_INT);
        $networkdata->bindParam(':coldemail', $coldchecker, PDO::PARAM_INT);
        $networkdata->execute();

        $sqlfilter2 = "SELECT * FROM contacts WHERE contact_id = :contact_id";
        $networkdata = $con->prepare($sqlfilter2);
        $networkdata->bindParam(':contact_id', $contactid, PDO::PARAM_INT);
        $networkdata->execute();
        $return['thiscontact'] = $networkdata->fetch(PDO::FETCH_ASSOC);
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>