<?php 
    define('__CONFIG__', true);
    require_once "../../../inc/config.php";

    
// CHECK IF USER IS LOGGED IN
    if(isset($_SESSION['user_id'])){
        $return = [];
        // Do nothing
    } else {
        $return = [];
        $return['loco'] = true;
    }
// CHECK IF USER IS LOGGED IN

    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userid = (int)$_SESSION['user_id'];
        $app_id = (int)$_POST['app_id'];
        
        $checkPermissionQuery = "SELECT * FROM con_apps WHERE app_id = :app_id";
        $checkPermissionStmt = $con->prepare($checkPermissionQuery);
        $checkPermissionStmt->bindParam(':app_id', $app_id);
        $checkPermissionStmt->execute();
        $appOwner = $checkPermissionStmt->fetch(PDO::FETCH_ASSOC);
    
        if ($appOwner['userid'] !=  $userid) {
            // User is not authorized to edit this contact
            $return['loco'] = true;
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }else{
            $sqlpullapp = "SELECT * FROM con_apps WHERE app_id = :app_id";
            $appdata = $con->prepare($sqlpullapp);
            $appdata->bindParam(':app_id', $app_id);
            $appdata->execute();
            $appResult = $appdata->fetch(PDO::FETCH_ASSOC);
            $firm_id_name = strtolower($appResult['firm_name']);
            $characters_to_remove = array(" ", "&", ".", "#", "/", "@", "$", "?", "*", "^", "]", "[", "(", ")", "+", "=", "{", "}", "|", ";", ":", "'", "!", "~", "`", "%", ",", "<", ">", "_", "-", '"');
            $firm_id_name = str_replace($characters_to_remove, '', $firm_id_name);
            $firmidlistarray_apps = ['mckinsey','bostonconsultinggroup','deloitte','kpmg','baincompany','pwc','strategy','ey','eyp','fticonsulting','zs','boozallen','oliverwyman','clearviewhcp','accenture','westmonroe','lek','treacycompany','rolandberger','cornerstone'];
            if (in_array($firm_id_name, $firmidlistarray_apps)) {
            } else {
                $firm_id_name = "default_logo";
            }
            $return['app']= $appResult;
            $return['app']['firm_id_name'] = $firm_id_name; 
            echo json_encode($return, JSON_PRETTY_PRINT); exit;
        }    
    }
?>