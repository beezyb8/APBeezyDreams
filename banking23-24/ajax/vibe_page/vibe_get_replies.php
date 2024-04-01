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
    
        $userid = (int)$_SESSION['user_id'];
        $postid = (int)$_POST['postid'];

        $getreplies = "SELECT * FROM vibe_reply WHERE postid = :postid ORDER BY LENGTH(likes) DESC";
        $vibe_reps = $con->prepare($getreplies);
        $vibe_reps->bindParam(':postid', $postid, PDO::PARAM_STR);
        $vibe_reps->execute();
        if($vibe_reps->rowCount() >= 1){
            $return['isreps'] = true;
        } else {
            $return['isreps'] = false;
        }
        $return['userid'] = $userid;
        $return['replies'] = $vibe_reps->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>