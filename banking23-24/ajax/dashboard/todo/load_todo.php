<?php 
    define('__CONFIG__', true);
    require_once "../../../../inc/config.php";
// CHECK IF USER IS LOGGED IN
    if(isset($_SESSION['user_id'])){
        // Do nothing
    } else {
        $return = [];
        $return['loco'] = true;
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
// CHECK IF USER IS LOGGED IN
    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];
        $unchecked = 0;
        $checked = 1;
        $userid = (int)$_SESSION['user_id'];

        $tdlgrab = "SELECT * FROM todolist WHERE userid = :userid AND checked = :checked";
        $grablist = $con->prepare($tdlgrab);
        $grablist->bindParam(':userid', $userid, PDO::PARAM_INT);
        $grablist->bindParam(':checked', $checked, PDO::PARAM_INT);
        $grablist->execute();
        $return['checkedtdlitems']= $grablist->fetchAll(PDO::FETCH_ASSOC);
        
        $tdlgrab = "SELECT * FROM todolist WHERE userid = :userid AND checked = :checked";
        $grablist = $con->prepare($tdlgrab);
        $grablist->bindParam(':userid', $userid, PDO::PARAM_INT);
        $grablist->bindParam(':checked', $unchecked, PDO::PARAM_INT);
        $grablist->execute();
        $return['uncheckedtdlitems']= $grablist->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>