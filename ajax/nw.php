<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    header('Content-Type: application/json');
    Page::ForceLogin();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $usercontactid = (int)$_SESSION['user_id'];
        $bank = (string)$_POST['bank'];

        $sqlfilter = "SELECT * FROM contacts WHERE user_contactid = :user_contactid AND bank = :bank";
        $networkdata = $con->prepare($sqlfilter);
        $networkdata->bindParam('user_contactid', $usercontactid);
        $networkdata->bindParam('bank', $bank);
        $networkdata->execute();
        if($networkdata->rowCount() == 1){
            $return['istherecontact'] = true;
        } else {
            $return['istherecontact'] = false;
        }
        $return['contacts'] = $networkdata->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>