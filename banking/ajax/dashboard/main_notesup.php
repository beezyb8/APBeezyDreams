<?php 
    define('__CONFIG__', true);
    require_once "../../../inc/config.php";

    
// CHECK IF USER IS LOGGED IN
    if(isset($_SESSION['user_id'])){
        $return = [];
        // Do nothing
    } else {
        $return = [];
        $return['loco'] = true;
    }
// CHECK IF USER IS LOGGED IN

    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $notestxt = strval($_POST['newnotes']);
        $uq_id = (int)$_POST['uq_id'];
        
        $sqlupdatenotes = "UPDATE ibfirms SET notestxt = :notestxt WHERE uq_id = :uq_id";
        $updatetxt = $con->prepare($sqlupdatenotes);
        $updatetxt->bindParam(':uq_id', $uq_id);
        $updatetxt->bindParam(':notestxt', $notestxt);
        $updatetxt->execute();
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>