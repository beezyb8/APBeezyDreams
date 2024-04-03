<?php 
    define('__CONFIG__', true);
    require_once "../../../inc/config.php";


    if($_SERVER['REQUEST_METHOD']=='POST'){
        header('Content-Type: application/json');
        $return = [];

        $email = $_POST['email'];
        $accesstoken = $_POST['accesstoken'];
        $password = "Relationship";


        $user_found = User::Find($email, true);

        if($user_found) {
            // User exists
            $user_id = (int) $user_found['user_id'];
            $hash = $user_found['password'];

            if(password_verify($password, $hash)){
                //User is in
                session_start();
                $_SESSION['user_id'] = $user_id;
                $expire = time() + (60 *  60  *  24 * 7);
                setcookie('PHPSESSID', session_id(), $expire, '/');
                
                $atsql = "UPDATE users SET accesstoken = :accesstoken WHERE user_id = :user_id";
                $fixat = $con->prepare($atsql);
                $fixat->bindParam('accesstoken', $accesstoken, PDO::PARAM_STR);
                $fixat->bindParam('user_id', $user_id);
                $fixat->execute();
                            
                $usersql = "SELECT * FROM users WHERE user_id = :user_id";
                $userinfo = $con->prepare($usersql);
                $userinfo->bindParam('user_id', $user_id);
                $userinfo->execute();
                $user = $userinfo->fetch(PDO::FETCH_ASSOC);
                if($user['industry'] == 1){
                    $return['redirect'] = '../dashboard.php';
                }elseif($user['industry'] == 2){
                    $return['redirect'] = '../consulting/consulting.dashboard.php';
                }elseif($user['industry'] == 3){
                    $return['redirect'] = '../banking23-24/banking.dashboard.php';
                }elseif($user['industry'] == 4){
                    $return['redirect'] = '../banking23-24/banking.dashboard.php';
                }elseif($user['industry'] == 5){
                    $return['redirect'] = '../consulting24-25/consulting.dashboard.php';
                }
                
//HERE THE LOGIN REDIRECTS TO DASHBOARD, INSTEAD PUT INTO CONSULTING DASHBOARD BASED ON AN INDUSTRY KEY
//Once I send into consulting folder, I can just keep them there!
                

            } else {
                //Invalid User
                $return['error'] = "Invalid Credentials, try again or email brandonbehar@mylegup.co";
            }
        } else {
            echo json_encode($return, JSON_PRETTY_PRINT); exit;

        }

//make sure user dne
//make sure user can and is added
//return the proper information back to JS to redirect

        echo json_encode($return, JSON_PRETTY_PRINT); exit;

    } else {
        exit('INVALID URL');
    }
?>