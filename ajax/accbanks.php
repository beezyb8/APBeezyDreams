<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    header('Content-Type: application/json');
    Page::ForceLogin();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $check = (int)$_POST['check'];
        $rowid = (int)$_POST['rowid'];

        $sqlup = "UPDATE bankorder SET checked = :checked WHERE rowid = :rowid";
        $checked = $con->prepare($sqlup);
        $checked->bindParam(':rowid', $rowid, PDO::PARAM_INT);
        $checked->bindValue(':checked', $check, PDO::PARAM_INT);
        $checked->execute();
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>