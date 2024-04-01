<?php 
    define('__CONFIG__', true);
    require_once "../../inc/config.php";
    header('Content-Type: application/json');
    Page::ForceLogin();


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $userid = (int)$_SESSION['user_id'];
        $orderkey = (int)$_POST['orderkey'];
        if($orderkey==1){

            $banksql = "SELECT * FROM bankorder WHERE userid = :userid order by display_order";
            $getbankshit = $con->prepare($banksql);
            $getbankshit->bindParam(':userid', $userid);
            $getbankshit->execute();
            
            $usercontactid = (int)$_SESSION['user_id'];
            $sqlfilter = "SELECT * FROM contacts WHERE user_contactid = :user_contactid";
            $networkdata = $con->prepare($sqlfilter);
            $networkdata->bindParam(':user_contactid', $usercontactid);
            $networkdata->execute();
            
            $banklist = $getbankshit->fetchAll(PDO::FETCH_ASSOC);
            
                $contact_withkeys = [];
                
                while($contact = $networkdata->fetch(PDO::FETCH_ASSOC)){
                    $contact['bank'] = str_replace("&amp;","&",$contact['bank']);
                    foreach($banklist as $bank){
                        if($contact['bank'] == $bank['bank_name']){
                            $contact['orderkey'] = $bank['display_order'];
                            $contact['bankname'] = $bank['bank_name'];
                        }
                    }
                    array_push($contact_withkeys, $contact);
                }
                
                usort($contact_withkeys, function($a, $b) {
                    return $a['orderkey'] <=> $b['orderkey'];
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