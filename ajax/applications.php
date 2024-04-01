<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    header('Content-Type: application/json');
    Page::ForceLogin();


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $link = (string)$_POST['link'];
        $notesid = (int)$_POST['notesid'];
        $date = date('Y-m-d', strtotime($_POST['date']));

        $sqlupdateapp = "UPDATE banknotes SET applink = :applink, appdate = :appdate WHERE banknotes.notesid = :notesid";
        $updateapps = $con->prepare($sqlupdateapp);
        $updateapps->bindParam(':notesid', $notesid);
        $updateapps->bindParam(':applink', $link);
        $updateapps->bindParam(':appdate', $date);
        $updateapps->execute();
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>