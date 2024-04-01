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

        $sqlfilter = "SELECT * FROM contacts WHERE user_contactid = :user_contactid";
        $networkdata = $con->prepare($sqlfilter);
        $networkdata->bindParam('user_contactid', $usercontactid);
        $networkdata->execute();
        $contactlist = $networkdata->fetchAll(PDO::FETCH_ASSOC);
        
            
        $reverse_fororder = array_reverse($contactlist);
            
        $return['contacts'] = $reverse_fororder;
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?> 
      