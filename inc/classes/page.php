<?php
    
    if(!defined('__CONFIG__')) {
        exit('404 Gateway Error, email brandonbehar@mylegup.co and inform about error');
    }
    
    
    class Page{
        static function ForceLogin() {
            if(isset($_SESSION['user_id'])){
                //Acc exists process
            } else {
                //No acccount bail
                header("Location: /index.php");
                exit;
            }
        }
    
        static function ForceToDashboard($con) {
            if(isset($_SESSION['user_id'])) {
        
                $user_id = $_SESSION['user_id'];
                    
                $usersql = "SELECT * FROM users WHERE user_id = :user_id";
                $userinfo = $con->prepare($usersql);
                $userinfo->bindParam('user_id', $user_id);
                $userinfo->execute();
                $user = $userinfo->fetch(PDO::FETCH_ASSOC);
                if($user['industry'] == 1){
                    $location = '/dashboard.php';
                }elseif($user['industry'] == 2){
                    $location = '/consulting/consulting.dashboard.php';
                }elseif($user['industry'] == 3){
                    $location = '/banking23-24/banking.dashboard.php';
                }elseif($user['industry'] == 4){
                    $location = '/banking23-24/banking.dashboard.php';
                }elseif($user['industry'] == 5){
                    $location = '/consulting24-25/consulting.dashboard.php';
                }
                header("Location: ". $location);
                exit;
            } else {
                //User is good
            }
        }
    }
?>