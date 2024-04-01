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

        $uq_id = (int)$_POST['uq_id'];
        $firm_name = (string)$_POST['firm_name'];
        $app_name = (string)$_POST['app_name'];
        $applink = (string)$_POST['applink'];
        $applocation = (string)$_POST['applocation'];
        $appdate = date('Y-m-d', strtotime($_POST['appdate']));

        $add_app = "INSERT INTO con_apps(userid, uq_id, firm_name, app_name, applink, appdate, applocation) VALUES(:userid, :uq_id, :firm_name, :app_name, :applink, :appdate, :applocation)";
        $application_up = $con->prepare($add_app);
        $application_up ->bindParam(':userid', $userid);
        $application_up ->bindParam(':uq_id', $uq_id);
        $application_up ->bindParam(':firm_name', $firm_name);
        $application_up ->bindParam(':app_name', $app_name);
        $application_up -> bindParam(':applink', $applink);
        $application_up->bindParam(':appdate', $appdate);
        $application_up->bindParam(':applocation', $applocation);
        $application_up->execute();
        
        $appgrab = "SELECT * FROM con_apps WHERE userid = :userid ORDER BY appdate ASC";
        $grabapps = $con->prepare($appgrab);
        $grabapps->bindParam(':userid', $userid, PDO::PARAM_INT);
        $grabapps->execute();
        $return['apps']= $grabapps->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>