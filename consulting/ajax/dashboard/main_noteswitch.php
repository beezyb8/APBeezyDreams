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
        $uq_id = (string)$_POST['uq_id'];

        $notegrab = "SELECT * FROM confirms WHERE userid = :userid AND uq_id = :uq_id";
        $grabnotes = $con->prepare($notegrab);
        $grabnotes->bindParam(':userid', $userid, PDO::PARAM_INT);
        $grabnotes->bindParam(':uq_id', $uq_id, PDO::PARAM_INT);
        $grabnotes->execute();
        $return['notes']= $grabnotes->fetch(PDO::FETCH_ASSOC);

        $appgrab = "SELECT * FROM con_apps WHERE userid = :userid AND uq_id = :uq_id";
        $grabapps = $con->prepare($appgrab);
        $grabapps->bindParam(':userid', $userid, PDO::PARAM_INT);
        $grabapps->bindParam(':uq_id', $uq_id, PDO::PARAM_INT);
        $grabapps->execute();
        $return['apps']= $grabapps->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>
