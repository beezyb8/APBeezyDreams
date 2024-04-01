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

            $firmsql = "SELECT * FROM ibfirms WHERE userid = :userid order by display_order";
            $getfirmshit = $con->prepare($firmsql);
            $getfirmshit->bindParam(':userid', $userid);
            $getfirmshit->execute();
            
            $confirmsql = "SELECT * FROM confirms WHERE userid = :userid order by display_order";
            $congetfirmshit = $con->prepare($confirmsql);
            $congetfirmshit->bindParam(':userid', $userid);
            $congetfirmshit->execute();
            
            $usercontactid = (int)$_SESSION['user_id'];
            $sqlfilter = "SELECT * FROM contacts WHERE user_contactid = :user_contactid";
            $networkdata = $con->prepare($sqlfilter);
            $networkdata->bindParam(':user_contactid', $usercontactid);
            $networkdata->execute();
            
            $firmlist = $getfirmshit->fetchAll(PDO::FETCH_ASSOC);
            $confirmlist = $congetfirmshit->fetchAll(PDO::FETCH_ASSOC);
            
                $contact_withkeys = [];
                
                while($contact = $networkdata->fetch(PDO::FETCH_ASSOC)){
                    $contact['firm'] = str_replace("&amp;","&",$contact['bank']);
                    foreach($firmlist as $firm){
                        if($contact['firm'] == $firm['firm']){
                            $contact['orderby'] = $firm['display_order'];
                            $contact['firmname'] = $firm['firm'];
                        }
                    }foreach($confirmlist as $firm){
                        if($contact['firm'] == $firm['firm']){
                            $contact['orderby'] = $firm['display_order']+100;
                            $contact['firmname'] = $firm['firm'];
                        }
                    }
                    array_push($contact_withkeys, $contact);
                }
                
                usort($contact_withkeys, function($a, $b) {
                    return $a['orderby'] <=> $b['orderby'];
                });
                
            $return['contacts'] = $contact_withkeys;
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