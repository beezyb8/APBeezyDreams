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
        $applocation = (string)$_POST['location'];
        $date = date('Y-m-d', strtotime($_POST['date']));
        
        $getuq = "SELECT * FROM ibfirms WHERE userid = :userid AND firm = :firm";
        $grabuq = $con->prepare($getuq);
        $grabuq->bindParam(':userid', $userid, PDO::PARAM_INT);
        $grabuq->bindParam(':firm', $firm_name, PDO::PARAM_STR);
        $grabuq->execute();
        if ($row = $grabuq->fetch(PDO::FETCH_ASSOC)) {
            $uq_id = $row['uq_id'];
        } else {
            $return['loco'] = true;
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }

        $add_app = "INSERT INTO ib_apps(userid, uq_id, firm_name, app_name, applink, appdate, applocation) VALUES(:userid, :uq_id, :firm_name, :app_name, :applink, :appdate, :applocation)";
        $application_up = $con->prepare($add_app);
        $application_up ->bindParam(':userid', $userid);
        $application_up ->bindParam(':uq_id', $uq_id);
        $application_up ->bindParam(':firm_name', $firm_name);
        $application_up ->bindParam(':app_name', $app_name);
        $application_up -> bindParam(':applink', $link);
        $application_up->bindParam(':appdate', $date);
        $application_up->bindParam(':applocation', $applocation);
        $application_up->execute();
        
        $appgrab = "SELECT * FROM ib_apps WHERE userid = :userid ORDER BY appdate ASC";
        $grabapps = $con->prepare($appgrab);
        $grabapps->bindParam(':userid', $userid, PDO::PARAM_INT);
        $grabapps->execute();
        $return['apps']= $grabapps->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>