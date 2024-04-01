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
        $postid = (int)$_POST['postid'];
        $reply = (string)$_POST['reply'];

        $newreply = "INSERT INTO vibe_reply(reply, postid, userid) VALUES(:reply, :postid, :userid)";
        $reply_up = $con->prepare($newreply);
        $reply_up -> bindParam(':reply', $reply, PDO::PARAM_STR);
        $reply_up -> bindParam(':postid', $postid, PDO::PARAM_INT);
        $reply_up -> bindParam(':userid', $userid, PDO::PARAM_INT);
        $reply_up->execute();
        
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>