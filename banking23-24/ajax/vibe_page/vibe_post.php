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
        $posttitle = (string)$_POST['posttitle'];
        $postsubject = (string)$_POST['postsubject'];
        $postbank = (string)$_POST['postbank'];
        $postdate = (string)$_POST['postdate'];
        $posttext = (string)$_POST['posttext'];
        
        $usersql = "SELECT * FROM users WHERE user_id = :user_id";
        $userinfo = $con->prepare($usersql);
        $userinfo->bindParam(':user_id', $userid, PDO::PARAM_INT);
        $userinfo->execute();
        $user = $userinfo->fetch(PDO::FETCH_ASSOC);
        $postschool = $user['school'];
        $postindustry = $user['industry'];
        if($postindustry == 4){
            $postindustry = 3;
        }else{
        }

        
        


        $newpost = "INSERT INTO thevibe(userid, postbank, posttitle, postsubject, postdate, posttext, postschool, industry) VALUES(:userid, :postbank, :posttitle, :postsubject, :postdate, :posttext, :postschool, :industry)";
        $subpost = $con->prepare($newpost);
        $subpost -> bindParam(':userid', $userid, PDO::PARAM_INT);
        $subpost -> bindParam(':postbank', $postbank, PDO::PARAM_STR);
        $subpost -> bindParam(':posttitle', $posttitle, PDO::PARAM_STR);
        $subpost -> bindParam(':postsubject', $postsubject, PDO::PARAM_STR);
        $subpost -> bindParam(':postdate', $postdate, PDO::PARAM_STR);
        $subpost -> bindParam(':posttext', $posttext, PDO::PARAM_STR);
        $subpost -> bindParam(':postschool', $postschool, PDO::PARAM_STR);
        $subpost -> bindParam(':industry', $postindustry, PDO::PARAM_INT);
        $subpost->execute();
        
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>