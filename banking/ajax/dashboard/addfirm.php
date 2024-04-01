<?php 
    define('__CONFIG__', true);
    require_once "../../../inc/config.php";
    
    
// CHECK IF USER IS LOGGED IN
// Don't need
// CHECK IF USER IS LOGGED IN

    header('Content-Type: application/json');
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        header('Content-Type: application/json');
        $return = [];

        $userid = (int)$_SESSION['user_id'];
        $firm = (string)$_POST['firm'];
        $firmid = (string)$_POST['firmid'];
        $displayorder = (string)$_POST['displayrank'];
        $checked = 1;
        


// Make insert chill, not working with special chars!, links back to addbank.js
        $sql = "INSERT INTO ibfirms(display_order, firm, firmid, userid, checked) VALUES(:display_order, :firm, :firmid, :userid, :checked)";
        $insertbank = $con->prepare($sql);
        $insertbank -> bindParam(':display_order', $displayorder, PDO::PARAM_INT);
        $insertbank -> bindParam(':firm', $firm, PDO::PARAM_STR);
        $insertbank -> bindParam(':firmid', $firmid, PDO::PARAM_STR);
        $insertbank -> bindParam(':userid', $userid, PDO::PARAM_INT);
        $insertbank -> bindParam(':checked', $checked, PDO::PARAM_INT);
        $insertbank->execute();

        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }

