<?php 
if(!defined('__CONFIG__')) {
    exit('404 Gateway Error, email brandonbehar@mylegup.co and inform about error');
} 

class User {

    private $con;

    public $user_id;
    public $email;
    public $reg_time;

    public function __construct(int $user_id){
        $this->con=DB::getConnection();

        $user_id = (int)$user_id;
        

        $user = $this->con->prepare("SELECT user_id, email, reg_date FROM users WHERE user_id = :user_id LIMIT 1");
        $user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $user->execute();

        if($user->rowCount() == 1){
            $user = $user->fetch(PDO::FETCH_OBJ);

            $this->email        =(string)$user->email;
            $this->user_id      =(int)$user->user_id;
            $this->reg_date     =(string)$user->reg_date;
        } else {
            header("Location: /logout.php"); exit;
        }

}



    public static function Find($email, $return_assoc = false) {
        $con = DB::getConnection();

        $email = (string)$email;

        $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if($return_assoc){
            return $findUser->fetch(PDO::FETCH_ASSOC);
        }

        $user_found = (boolean) $findUser->rowCount();
        return $user_found;
    }
}