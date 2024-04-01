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

        $link = (string)$_POST['link'];
        $app_name = (string)$_POST['name'];
        $firm_name = (string)$_POST['firm_name'];
        $uq_id = (int)$_POST['uq_id'];
        $date = date('Y-m-d', strtotime($_POST['date']));

        $add_app = "INSERT INTO con_apps(userid, uq_id, firm_name, app_name, applink, appdate) VALUES(:userid, :uq_id, :firm_name, :app_name, :applink, :appdate)";
        $application_up = $con->prepare($add_app);
        $application_up ->bindParam(':userid', $userid);
        $application_up ->bindParam(':uq_id', $uq_id);
        $application_up ->bindParam(':firm_name', $firm_name);
        $application_up ->bindParam(':app_name', $app_name);
        $application_up -> bindParam(':applink', $link);
        $application_up->bindParam(':appdate', $date);
        $application_up->execute();
        
        $appgrab = "SELECT * FROM con_apps WHERE userid = :userid AND uq_id = :uq_id";
        $grabapps = $con->prepare($appgrab);
        $grabapps->bindParam(':userid', $userid, PDO::PARAM_INT);
        $grabapps->bindParam(':uq_id', $uq_id, PDO::PARAM_INT);
        $grabapps->execute();
        $return['apps']= $grabapps->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>