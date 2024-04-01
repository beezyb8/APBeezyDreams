<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";


    if($_SERVER['REQUEST_METHOD']=='POST'){
        header('Content-Type: application/json');
        $return = [];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $mcheck = $_POST['mcheck'];
        $school = $_POST['school'];
        $grade = $_POST['grade'];
        $major = $_POST['major'];


        $user_found = User::Find($email);

        if($user_found) {
            // User exists
            $return['error'] = "There is already an account registered with this email, email support@mylegup.co";
            $return['is_logged_in'] = false;
        } else {
            // User DNE, make account
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $adduser = $con->prepare("INSERT INTO users(email, password, name, school, grade, major, mcheck) VALUES(LOWER(:email), :password, :name, :school, :grade, :major, :mcheck)");
            $adduser -> bindParam(':email', $email, PDO::PARAM_STR);
            $adduser -> bindParam(':password', $password, PDO::PARAM_STR);
            $adduser -> bindParam(':name', $name, PDO::PARAM_STR);
            $adduser -> bindParam(':school', $school, PDO::PARAM_STR);
            $adduser -> bindParam(':grade', $grade, PDO::PARAM_STR);
            $adduser -> bindParam(':major', $major, PDO::PARAM_STR);
            $adduser -> bindParam(':mcheck', $mcheck, PDO::PARAM_STR);
            $adduser->execute();

            $user_id = $con->lastInsertId();

            $_SESSION['user_id'] = (int) $user_id;
            
//Start of Banking Specific, Based on answer to industry register to a completely different table!
            
            $notes = "";
            $checked = 1;

            $banks = array("Allen & Co", "Bank of America","Barclays","BMO","Centerview","Citigroup", "Credit Suisse", "Cowen", "Evercore","Financo","Goldman Sachs","Greenhill","Guggenheim","Houlihan Lokey","Jefferies","JP Morgan","Lazard","Macquarie","Mizuho","Moelis","Morgan Stanley","M. Klein & Co","Perella Weinberg","PJT","Raine","RBC","Rothschild","Solomon Partners","UBS","William Blair");
            // $banksid = array("rothschild", "moelis","allen", "bofa","barclays","bmo","centerview","citi", "creditsuisse", "cowen", "deutsche", "evercore","financo","goldman","greenhill","guggenheim","houlihan","jefferies","jpm","lazard","liontree","macquarie","mizuho","morganstanley","mklein","perella","piper","pjt","qatalyst","raine","rbc","solomon","ubs","williamblair");
            $i = 1;
            foreach($banks as $value){

                $sql = "INSERT INTO bankorder(display_order, bank_name, bankid, userid, checked) VALUES(:display_order, :bank, :bankid, :userid, :checked)";
                $createtable = $con->prepare($sql);
                $createtable -> bindParam(':display_order', $i, PDO::PARAM_INT);
                $createtable -> bindParam(':bank', $value, PDO::PARAM_STR);
                $bankid = strtolower($value);
                $bankid = str_replace(" ","",$bankid);
                $bankid = str_replace("&","",$bankid);
                $bankid = str_replace(".","",$bankid);
                $createtable -> bindParam(':bankid', $bankid, PDO::PARAM_STR);
                $createtable -> bindParam(':userid', $user_id, PDO::PARAM_INT);
                $createtable -> bindParam(':checked', $checked, PDO::PARAM_INT);
                $createtable->execute();
                
                $i++;
            }
            
            $banked = array("Allen &amp; Co", "Bank of America","Barclays","BMO","Centerview","Citigroup", "Credit Suisse", "Cowen", "Evercore","Financo","Goldman Sachs","Greenhill","Guggenheim","Houlihan Lokey","Jefferies","JP Morgan","Lazard","Macquarie","Mizuho","Moelis","Morgan Stanley","M. Klein &amp; Co","Perella Weinberg","PJT","Raine","RBC","Rothschild","Solomon Partners","UBS","William Blair");
            foreach($banked as $value){
                $notessql = "INSERT INTO banknotes(notestxt, bankname, userid) VALUES(:notestxt, :bankname, :userid)";
                $createbanknotes = $con->prepare($notessql);
                $createbanknotes -> bindParam(':notestxt', $notes, PDO::PARAM_STR);
                $createbanknotes -> bindParam(':bankname', $value, PDO::PARAM_STR);
                $createbanknotes -> bindParam(':userid', $user_id, PDO::PARAM_INT);
                $createbanknotes->execute();
            }
            
            //the login.php?msgeloginbro is just a push to the dashboard

            $return['redirect'] = '../login.php?message=loginbro';
            $return['is_logged_in'] = true;
        
//END OF BANKING SPECIFIC


    //the login.php?msgeloginbro is just a push to the dashboard. Create a diff redirect to the consulting dashboard.

        }

        echo json_encode($return, JSON_PRETTY_PRINT); exit;

    } else {
        exit('INVALID URL');
    }
?>