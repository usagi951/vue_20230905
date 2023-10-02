<?php
require_once "dbtools.php";
$link = create_connect();
// $dbname = "sample01";

if (isset($_POST['id'])&&isset($_POST['type']) ) {

    $p_id = $_POST['id'];
    $p_type = $_POST['type'];
    
    if ($p_id != "" && $p_type != "" ) {
        
        $sql = "UPDATE productType SET Type='$p_type' WHERE Id=' $p_id'";
        
        if (execute_sql($link, $dbname, $sql)) {
            echo ('{"state":true,"message":"產品類別更新成功"}');
        } else {
            echo ('{"state":false,"message":"產品類別更新失敗"}');
        }
        mysqli_close($link);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}

