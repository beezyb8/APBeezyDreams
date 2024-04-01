<?php 
    define('__CONFIG__', true);
    require_once "../../inc/config.php";
    
    if(isset($_SESSION['user_id'])){
        // Do nothing
    } else {
        $return = [];
        $return['loco'] = true;
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
    
    header('Content-Type: application/json');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $allData = $_POST['allData'];
        $i = 1;
        foreach($allData as $key=>$value){
            $sql = "UPDATE confirms SET display_order=".$i." WHERE uq_id=".$value;
            $updateit = $con->prepare($sql);
            $updateit->execute();
            $i++;
        }
    }
?>