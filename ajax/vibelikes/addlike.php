<?php 
    define('__CONFIG__', true);
    require_once "../../inc/config.php";
    Page::ForceLogin();
    header('Content-Type: application/json');


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];
        
        $newlike = (int)$_SESSION['user_id'];
        $postid = (int)$_POST['postid'];
        
        $fetchlikes = "SELECT likes FROM thevibe WHERE postid = :postid";
        $theselikes = $con->prepare($fetchlikes);
        $theselikes->bindParam(':postid', $postid, PDO::PARAM_INT);
        $theselikes->execute();
        $row = $theselikes->fetch(PDO::FETCH_ASSOC);
        $numbers_string = $row['likes'];
        
        if (!empty($numbers_string)) {
            $numbers_string .= ',' . $newlike;
        } else {
            $numbers_string = $newlike;
        }
        
        $update_likes = "UPDATE thevibe SET likes = :numbers_string WHERE postid = :postid";
        $newlikes = $con->prepare($update_likes);
        $newlikes->bindParam(':numbers_string', $numbers_string, PDO::PARAM_STR);
        $newlikes->bindParam(':postid', $postid, PDO::PARAM_INT);
        $newlikes->execute();
        
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
        
                //No LONGER JSON!
        //$addlikesql = "UPDATE thevibe SET likes = JSON_ARRAY_APPEND(likes, '$', :newlike) WHERE postid = :postid";
        //$addlike = $con->prepare($addlikesql);
        //$addlike->bindParam(':newlike', $newlike, PDO::PARAM_INT);
        //$addlike->bindParam(':postid', $postid, PDO::PARAM_INT);
        //$addlike->execute();
    }
?>