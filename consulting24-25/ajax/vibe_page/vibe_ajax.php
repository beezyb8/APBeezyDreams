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
    
        $userid = (int)$_SESSION['user_id'];
        $validate = 1;
        $industry = 2;
        $newindustry = 5;
        $orderkey = (int)$_POST['order_key'];
        
        if($orderkey == 1){
            $getvibes = "SELECT * FROM thevibe WHERE (industry = :industry1 OR industry = :industry2) AND validate = :validate ORDER BY postdate_added DESC";
            $vibesdata = $con->prepare($getvibes);
            $vibesdata->bindParam(':industry1', $industry, PDO::PARAM_INT);
            $vibesdata->bindParam(':industry2', $newindustry, PDO::PARAM_INT); 
            $vibesdata->bindParam(':validate', $validate, PDO::PARAM_INT);
            $vibesdata->execute();
            if($vibesdata->rowCount() >= 1){
                $return['isvibes'] = true;
            } else {
                $return['isvibes'] = false;
            }
            $return['userid'] = $userid;
            $return['vibe'] = $vibesdata->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }
    }
?>