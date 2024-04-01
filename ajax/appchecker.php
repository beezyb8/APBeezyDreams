<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    header('Content-Type: application/json');
    Page::ForceLogin();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $check = (int)$_POST['check'];
        $notesid = (int)$_POST['notesid'];

        $sqlup = "UPDATE banknotes SET applied = :applied WHERE notesid = :notesid";
        $checked = $con->prepare($sqlup);
        $checked->bindParam(':notesid', $notesid, PDO::PARAM_INT);
        $checked->bindValue(':applied', $check, PDO::PARAM_INT);
        $checked->execute();
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>