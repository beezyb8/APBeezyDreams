<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    header('Content-Type: application/json');
    Page::ForceLogin();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $notestxt = strval($_POST['newnotes']);
        $notesid = (int)$_POST['notesid'];
        $sqlupdatenotes = "UPDATE banknotes SET notestxt = :notestxt WHERE banknotes.notesid = :notesid";
        $updatetxt = $con->prepare($sqlupdatenotes);
        $updatetxt->bindParam(':notesid', $notesid);
        $updatetxt->bindParam(':notestxt', $notestxt);
        $updatetxt->execute();
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
?>