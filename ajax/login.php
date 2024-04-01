<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";


    if($_SERVER['REQUEST_METHOD']=='POST'){
        header('Content-Type: application/json');
        $return = [];

        $email = $_POST['email'];
        $password = $_POST['password'];


        $user_found = User::Find($email, true);

        if($user_found) {
            // User exists
            $user_id = (int) $user_found['user_id'];
            $hash = $user_found['password'];

            if(password_verify($password, $hash)){
                //User is in
                session_start();
                $_SESSION['user_id'] = $user_id;
                
                
//HERE THE LOGIN REDIRECTS TO DASHBOARD, INSTEAD PUT INTO CONSULTING DASHBOARD BASED ON AN INDUSTRY KEY
//Once I send into consulting folder, I can just keep them there!
                
                $return['redirect'] = '../dashboard.php';

            } else {
                //Invalid User
                $return['error'] = "Invalid Credentials, try again or email brandonbehar@mylegup.co";
            }
        } else {
            $return['error'] = "You do not have an account registered with this email address.";

        }

//make sure user dne
//make sure user can and is added
//return the proper information back to JS to redirect

        echo json_encode($return, JSON_PRETTY_PRINT); exit;

    } else {
        exit('INVALID URL');
    }
?>