<?php 
    define('__CONFIG__', true);
    require_once "../../inc/config.php";
    Page::ForceLogin();
    header('Content-Type: application/json');


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];
        
        $newlike = (int)$_SESSION['user_id'];
        $app_id = (int)$_POST['appid'];
        
        $fetchlikes = "SELECT applied_str FROM applied WHERE app_id = :app_id";
        $theselikes = $con->prepare($fetchlikes);
        $theselikes->bindParam(':app_id', $app_id, PDO::PARAM_INT);
        $theselikes->execute();
        $row = $theselikes->fetch(PDO::FETCH_ASSOC);
        $numbers_string = $row['applied_str'];
        
        if (!empty($numbers_string)) {
            $numbers_string .= ',' . $newlike;
        } else {
            $numbers_string = $newlike;
        }
        
        $update_likes = "UPDATE applied SET applied_str = :numbers_string WHERE app_id = :app_id";
        $newlikes = $con->prepare($update_likes);
        $newlikes->bindParam(':numbers_string', $numbers_string, PDO::PARAM_STR);
        $newlikes->bindParam(':app_id', $app_id, PDO::PARAM_INT);
        $newlikes->execute();
        
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>