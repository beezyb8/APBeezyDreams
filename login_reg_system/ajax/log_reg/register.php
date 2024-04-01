<?php 
    define('__CONFIG__', true);
    require_once "../../../inc/config.php";


    if($_SERVER['REQUEST_METHOD']=='POST'){
        header('Content-Type: application/json');
        $return = [];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $mcheck = $_POST['mcheck'];
        $school = $_POST['school'];
        $club = $_POST['club'];
        $industry = (int)$_POST['industry'];
        $grade = $_POST['grade'];
        $major = $_POST['major'];
        $remember = $_POST['remember'];


        $user_found = User::Find($email);

        if($user_found) {
            // User exists
            $return['error'] = "There is already an account registered with this email, email support@mylegup.co";
            $return['is_logged_in'] = false;
        } else {
            // User DNE, make account
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $adduser = $con->prepare("INSERT INTO users(email, password, name, school, grade, major, mcheck, industry, club, remember) VALUES(LOWER(:email), :password, :name, :school, :grade, :major, :mcheck, :industry, :club, :remember)");
            $adduser -> bindParam(':email', $email, PDO::PARAM_STR);
            $adduser -> bindParam(':password', $password, PDO::PARAM_STR);
            $adduser -> bindParam(':name', $name, PDO::PARAM_STR);
            $adduser -> bindParam(':school', $school, PDO::PARAM_STR);
            $adduser -> bindParam(':club', $club, PDO::PARAM_STR);
            $adduser -> bindParam(':grade', $grade, PDO::PARAM_STR);
            $adduser -> bindParam(':major', $major, PDO::PARAM_STR);
            $adduser -> bindParam(':mcheck', $mcheck, PDO::PARAM_STR);
            $adduser -> bindParam(':industry', $industry, PDO::PARAM_INT);
            $adduser -> bindParam(':remember', $remember, PDO::PARAM_INT);
            $adduser->execute();

            $user_id = $con->lastInsertId();

            $_SESSION['user_id'] = (int) $user_id;
            if($remember == 1){
                // Set session cookie to expire in three months
                $expire = time() + (60 * 60 * 24 * 7 * 12);
                setcookie('PHPSESSID', session_id(), $expire, '/');
            } else{}
            

            if($industry==1){

                $notes = "";
                $checked = 1;
    
                $banks = array("Allen & Co", "Bank of America","Barclays","BMO","Centerview","Citigroup", "Credit Suisse", "Cowen", "Evercore","Financo","Goldman Sachs","Greenhill","Guggenheim","Houlihan Lokey","Jefferies","JP Morgan","Lazard","Macquarie","Mizuho","Moelis","Morgan Stanley","M. Klein & Co","Perella Weinberg","PJT","Raine","RBC","Rothschild","Solomon Partners","UBS","William Blair");
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
    
                $return['redirect'] = '../../dashboard.php';
                $return['is_logged_in'] = true;
        
//END OF BANKING SPECIFIC
            } elseif ($industry==2){
//Start of Consulting Specific

                $checked = 1;
    
    
// Create Firms List
                $firms = array("McKinsey", "Boston Consulting Group","Deloitte","KPMG","Bain & Company","PwC", "Strategy&", "EY", "EYP","FTI Consulting","ZS","Booz Allen","Oliver Wyman","ClearView HCP","Accenture","West Monroe","LEK","Treacy & Company","Roland Berger","Cornerstone");
                $i = 1;
                foreach($firms as $value){
    
                    $sql = "INSERT INTO confirms(display_order, firm, firmid, userid, checked) VALUES(:display_order, :firm, :firmid, :userid, :checked)";
                    $createtable = $con->prepare($sql);
                    $createtable -> bindParam(':display_order', $i, PDO::PARAM_INT);
                    $createtable -> bindParam(':firm', $value, PDO::PARAM_STR);
                    $firmid = strtolower($value);
                    $firmid = str_replace(" ","",$firmid);
                    $firmid = str_replace("&","",$firmid);
                    $firmid = str_replace(".","",$firmid);
                    $createtable -> bindParam(':firmid', $firmid, PDO::PARAM_STR);
                    $createtable -> bindParam(':userid', $user_id, PDO::PARAM_INT);
                    $createtable -> bindParam(':checked', $checked, PDO::PARAM_INT);
                    $createtable->execute();
                    
                    $i++;
                }
                
                
                $return['redirect'] = '../../consulting/consulting.dashboard.php';
                $return['is_logged_in'] = true;
            
            } elseif ($industry==4){
                
//Start of Consulting Specific

                $checked = 1;
    
    
// Create Firms List
                $firms = array("McKinsey", "Boston Consulting Group","Deloitte","KPMG","Bain & Company","PwC", "Strategy&", "EY", "EYP","FTI Consulting","ZS","Booz Allen","Oliver Wyman","ClearView HCP","Accenture","West Monroe","LEK","Treacy & Company","Roland Berger","Cornerstone");
                $i = 1;
                foreach($firms as $value){
    
                    $sql = "INSERT INTO confirms(display_order, firm, firmid, userid, checked) VALUES(:display_order, :firm, :firmid, :userid, :checked)";
                    $createtable = $con->prepare($sql);
                    $createtable -> bindParam(':display_order', $i, PDO::PARAM_INT);
                    $createtable -> bindParam(':firm', $value, PDO::PARAM_STR);
                    $firmid = strtolower($value);
                    $firmid = str_replace(" ","",$firmid);
                    $firmid = str_replace("&","",$firmid);
                    $firmid = str_replace(".","",$firmid);
                    $createtable -> bindParam(':firmid', $firmid, PDO::PARAM_STR);
                    $createtable -> bindParam(':userid', $user_id, PDO::PARAM_INT);
                    $createtable -> bindParam(':checked', $checked, PDO::PARAM_INT);
                    $createtable->execute();
                    
                    $i++;
                }
//Start of New Banking

                $checked = 1;
    
    
// Create Firms List
                $firms = array("Allen & Co", "Baird", "Bank of America","Barclays","BMO","Centerview","Citigroup","Deutsche Bank", "Ducera Partners", "Evercore","Financo","FT Partners","Goldman Sachs", "Gordan Dyal", "Greenhill","Guggenheim","Houlihan Lokey","Jefferies","JP Morgan","Lazard","Lincoln","Lion Tree","Macquarie","Mizuho","Moelis","Morgan Stanley","M. Klein & Co","Perella Weinberg","Piper Sandler", "PJT","Raine","RBC","Rothschild & Co","Solomon Partners", "Stifel", "Stout", "TD Cowen", "UBS","Wells Fargo", "William Blair");
                $i = 1;
                foreach($firms as $value){
    
                    $sql = "INSERT INTO ibfirms(display_order, firm, firmid, userid, checked) VALUES(:display_order, :firm, :firmid, :userid, :checked)";
                    $createtable = $con->prepare($sql);
                    $createtable -> bindParam(':display_order', $i, PDO::PARAM_INT);
                    $createtable -> bindParam(':firm', $value, PDO::PARAM_STR);
                    $firmid = strtolower($value);
                    $firmid = str_replace(" ","",$firmid);
                    $firmid = str_replace("&","",$firmid);
                    $firmid = str_replace(".","",$firmid);
                    $createtable -> bindParam(':firmid', $firmid, PDO::PARAM_STR);
                    $createtable -> bindParam(':userid', $user_id, PDO::PARAM_INT);
                    $createtable -> bindParam(':checked', $checked, PDO::PARAM_INT);
                    $createtable->execute();
                    
                    $i++;
                }
                
                
                $return['redirect'] = '../../banking23-24/banking.dashboard.php';
                $return['is_logged_in'] = true;
            }
            elseif ($industry==5){
                
//Start of Consulting Specific

                $checked = 1;
    
    
// Create Firms List
                $firms = array("McKinsey", "Boston Consulting Group","Deloitte","KPMG","Bain & Company","PwC", "Strategy&", "EY", "EYP","FTI Consulting","ZS","Booz Allen","Oliver Wyman","ClearView HCP","Accenture","West Monroe","LEK","Treacy & Company","Roland Berger","Cornerstone");
                $i = 1;
                foreach($firms as $value){
    
                    $sql = "INSERT INTO confirms(display_order, firm, firmid, userid, checked) VALUES(:display_order, :firm, :firmid, :userid, :checked)";
                    $createtable = $con->prepare($sql);
                    $createtable -> bindParam(':display_order', $i, PDO::PARAM_INT);
                    $createtable -> bindParam(':firm', $value, PDO::PARAM_STR);
                    $firmid = strtolower($value);
                    $firmid = str_replace(" ","",$firmid);
                    $firmid = str_replace("&","",$firmid);
                    $firmid = str_replace(".","",$firmid);
                    $createtable -> bindParam(':firmid', $firmid, PDO::PARAM_STR);
                    $createtable -> bindParam(':userid', $user_id, PDO::PARAM_INT);
                    $createtable -> bindParam(':checked', $checked, PDO::PARAM_INT);
                    $createtable->execute();
                    
                    $i++;
                }
//Start of New Banking

                $checked = 1;
    
    
// Create Firms List
                $firms = array("Allen & Co", "Baird", "Bank of America","Barclays","BMO","Centerview","Citigroup","Deutsche Bank", "Ducera Partners", "Evercore","Financo","FT Partners","Goldman Sachs", "Gordan Dyal", "Greenhill","Guggenheim","Houlihan Lokey","Jefferies","JP Morgan","Lazard","Lincoln","Lion Tree","Macquarie","Mizuho","Moelis","Morgan Stanley","M. Klein & Co","Perella Weinberg","Piper Sandler", "PJT","Raine","RBC","Rothschild & Co","Solomon Partners", "Stifel", "Stout", "TD Cowen", "UBS","Wells Fargo", "William Blair");
                $i = 1;
                foreach($firms as $value){
    
                    $sql = "INSERT INTO ibfirms(display_order, firm, firmid, userid, checked) VALUES(:display_order, :firm, :firmid, :userid, :checked)";
                    $createtable = $con->prepare($sql);
                    $createtable -> bindParam(':display_order', $i, PDO::PARAM_INT);
                    $createtable -> bindParam(':firm', $value, PDO::PARAM_STR);
                    $firmid = strtolower($value);
                    $firmid = str_replace(" ","",$firmid);
                    $firmid = str_replace("&","",$firmid);
                    $firmid = str_replace(".","",$firmid);
                    $createtable -> bindParam(':firmid', $firmid, PDO::PARAM_STR);
                    $createtable -> bindParam(':userid', $user_id, PDO::PARAM_INT);
                    $createtable -> bindParam(':checked', $checked, PDO::PARAM_INT);
                    $createtable->execute();
                    
                    $i++;
                }
                
                
                $return['redirect'] = '../../consulting24-25/consulting.dashboard.php';
                $return['is_logged_in'] = true;
            }
//END OF CONSULTING SPECIFIC
        }
            
        echo json_encode($return, JSON_PRETTY_PRINT); exit;

    } else {
        exit('INVALID URL');
    }
?>