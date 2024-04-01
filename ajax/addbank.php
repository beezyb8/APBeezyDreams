<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    Page::ForceLogin();


    if($_SERVER['REQUEST_METHOD']=='POST'){
        header('Content-Type: application/json');
        $return = [];

        $user_id = (int)$_SESSION['user_id'];
        $bank = (string)$_POST['bank'];
        $bankid = (string)$_POST['bankid'];
        $displayorder = (string)$_POST['displayrank'];
        $notes = "";
        $bankfixedforand = str_replace("&","&amp;",$bank);
        $bankfixedforand = str_replace("'","",$bankfixedforand);
        $bankfixedforand = str_replace('"',"",$bankfixedforand);
        $bank = str_replace("'","",$bank);
        $bank = str_replace('"',"",$bank);
        $checked = 1;
        


// Make insert chill, not working with special chars!, links back to addbank.js
        $sql = "INSERT INTO bankorder(display_order, bank_name, bankid, userid, checked) VALUES(:display_order, :bank, :bankid, :userid, :checked)";
        $insertbank = $con->prepare($sql);
        $insertbank -> bindParam(':display_order', $displayorder, PDO::PARAM_INT);
        $insertbank -> bindParam(':bank', $bank, PDO::PARAM_STR);
        $insertbank -> bindParam(':bankid', $bankid, PDO::PARAM_STR);
        $insertbank -> bindParam(':userid', $user_id, PDO::PARAM_INT);
        $insertbank -> bindParam(':checked', $checked, PDO::PARAM_INT);
        $insertbank->execute();

        $notessql = "INSERT INTO banknotes(notestxt, bankname, userid) VALUES(:notestxt, :bankname, :userid)";
        $createbanknotes = $con->prepare($notessql);
        $createbanknotes -> bindParam(':notestxt', $notes, PDO::PARAM_STR);
        $createbanknotes -> bindParam(':bankname', $bankfixedforand, PDO::PARAM_STR);
        $createbanknotes -> bindParam(':userid', $user_id, PDO::PARAM_INT);
        $createbanknotes->execute();

        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }

