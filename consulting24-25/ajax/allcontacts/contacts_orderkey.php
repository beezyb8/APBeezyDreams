<?php
    define('__CONFIG__', true);
    require_once "../../../inc/config.php";
    
    
// CHECK IF USER IS LOGGED IN
    if(isset($_SESSION['user_id'])){
        // Do nothing
    } else {
        $return = [];
        $return['loco'] = true;
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
// CHECK IF USER IS LOGGED IN

    header('Content-Type: application/json');


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $userid = (int)$_SESSION['user_id'];
        $orderkey = (int)$_POST['orderkey'];
        if($orderkey==1){
            $favorite = 1;

            $firmsql = "SELECT * FROM confirms WHERE userid = :userid AND favorite = :favorite order by display_order";
            $getfirmshit = $con->prepare($firmsql);
            $getfirmshit->bindParam(':userid', $userid);
            $getfirmshit->bindParam(':favorite', $favorite, PDO::PARAM_INT);
            $getfirmshit->execute();
            
            $favorites_list = $getfirmshit->fetchAll(PDO::FETCH_ASSOC);
        
                
            $return['firms'] = $favorites_list;
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
            
        } elseif ($orderkey==2){
            $usercontactid = (int)$_SESSION['user_id'];
            $sqlfilter = "SELECT * FROM contacts WHERE user_contactid = :user_contactid";
            $networkdata = $con->prepare($sqlfilter);
            $networkdata->bindParam(':user_contactid', $usercontactid);
            $networkdata->execute();
            $contactlist = $networkdata->fetchAll(PDO::FETCH_ASSOC);
            
            $return['contacts'] = $contactlist;
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        } elseif ($orderkey==3){
            $usercontactid = (int)$_SESSION['user_id'];
            $sqlfilter = "SELECT * FROM contacts WHERE user_contactid = :user_contactid";
            $networkdata = $con->prepare($sqlfilter);
            $networkdata->bindParam(':user_contactid', $usercontactid);
            $networkdata->execute();
            $contactlist = $networkdata->fetchAll(PDO::FETCH_ASSOC);
            
            $reverse_fororder = array_reverse($contactlist);
            
            $return['contacts'] = $reverse_fororder;
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }
    }
?>