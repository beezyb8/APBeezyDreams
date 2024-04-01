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
        $app_id = (int)$_POST['appid'];
        $userid = (int)$_SESSION['user_id'];
        
        
        $fetchlikes = "SELECT applied_str FROM applied WHERE app_id = :app_id";
        $theselikes = $con->prepare($fetchlikes);
        $theselikes->bindParam(':app_id', $app_id, PDO::PARAM_INT);
        $theselikes->execute();
        $row = $theselikes->fetch(PDO::FETCH_ASSOC);
        $numbers_string = $row['applied_str'];
        
        $numbers_array = explode(',', $numbers_string);
        $index = array_search($userid, $numbers_array);
        if ($index !== false) {
            unset($numbers_array[$index]);
        }
        $numbers_string = implode(',', $numbers_array);

        $update_likes = "UPDATE applied SET applied_str = :numbers_string WHERE app_id = :app_id";
        $newlikes = $con->prepare($update_likes);
        $newlikes->bindParam(':numbers_string', $numbers_string, PDO::PARAM_STR);
        $newlikes->bindParam(':app_id', $app_id, PDO::PARAM_INT);
        $newlikes->execute();
        
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>