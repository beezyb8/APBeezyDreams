<?php 
    define('__CONFIG__', true);
    require_once "../../../inc/config.php";
    
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
        
        $newlike = (int)$_SESSION['user_id'];
        $replyid = (int)$_POST['replyid'];
        
        $fetchlikes = "SELECT likes FROM vibe_reply WHERE replyid = :replyid";
        $theselikes = $con->prepare($fetchlikes);
        $theselikes->bindParam(':replyid', $replyid, PDO::PARAM_INT);
        $theselikes->execute();
        $row = $theselikes->fetch(PDO::FETCH_ASSOC);
        $numbers_string = $row['likes'];
        
        if (!empty($numbers_string)) {
            $numbers_string .= ',' . $newlike;
        } else {
            $numbers_string = $newlike;
        }
        
        $update_likes = "UPDATE vibe_reply SET likes = :numbers_string WHERE replyid = :replyid";
        $newlikes = $con->prepare($update_likes);
        $newlikes->bindParam(':numbers_string', $numbers_string, PDO::PARAM_STR);
        $newlikes->bindParam(':replyid', $replyid, PDO::PARAM_INT);
        $newlikes->execute();
        
        echo json_encode($return, JSON_PRETTY_PRINT); exit;

    }
?>