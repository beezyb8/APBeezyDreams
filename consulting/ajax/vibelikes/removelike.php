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
        $postid = (int)$_POST['postid'];
        $userid = (int)$_SESSION['user_id'];
        
        
        $fetchlikes = "SELECT likes FROM thevibe WHERE postid = :postid";
        $theselikes = $con->prepare($fetchlikes);
        $theselikes->bindParam(':postid', $postid, PDO::PARAM_INT);
        $theselikes->execute();
        $row = $theselikes->fetch(PDO::FETCH_ASSOC);
        $numbers_string = $row['likes'];
        
        $numbers_array = explode(',', $numbers_string);
        $index = array_search($userid, $numbers_array);
        if ($index !== false) {
            unset($numbers_array[$index]);
        }
        $numbers_string = implode(',', $numbers_array);

        $update_likes = "UPDATE thevibe SET likes = :numbers_string WHERE postid = :postid";
        $newlikes = $con->prepare($update_likes);
        $newlikes->bindParam(':numbers_string', $numbers_string, PDO::PARAM_STR);
        $newlikes->bindParam(':postid', $postid, PDO::PARAM_INT);
        $newlikes->execute();
        
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>