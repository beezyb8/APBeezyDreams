<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    header('Content-Type: application/json');
    Page::ForceLogin();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $allData = $_POST['allData'];
        $i = 1;
        foreach($allData as $key=>$value){
            $sql = "UPDATE bankorder SET display_order=".$i." WHERE rowid=".$value;
            $updateit = $con->prepare($sql);
            $updateit->execute();
            $i++;
        }
    }
?>