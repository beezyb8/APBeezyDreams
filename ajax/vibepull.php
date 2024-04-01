<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    Page::ForceLogin();
    header('Content-Type: application/json');


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $userid = (int)$_SESSION['user_id'];
        $postbank = (string)$_POST['postbank'];
        $validate = 1;
        
        $getvibes = "SELECT * FROM thevibe WHERE postbank = :postbank AND validate = :validate";
        $vibesdata = $con->prepare($getvibes);
        $vibesdata->bindParam(':postbank', $postbank, PDO::PARAM_STR);
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
?>