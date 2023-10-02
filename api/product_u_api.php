<?php
require_once "dbtools.php";
$link = create_connect();
// $dbname = "sample01";

if (isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['type'])&&isset($_POST['price']) ) {

    $p_id = $_POST['id'];
    $p_price = $_POST['price'];
    $p_name = $_POST['name'];
    $p_type = $_POST['type'];
    
    if ($p_id != "" && $p_type != ""&& $p_name != ""&& $p_price != "" ) {
        
        $sql = "UPDATE product SET Type='$p_type',Price='$p_price',Name='$p_name' WHERE Id=' $p_id'";
        
        if (execute_sql($link, $dbname, $sql)) {
            echo ('{"state":true,"message":"產品更改成功"}');
        } else {
            echo ('{"state":false,"message":"產品更改失敗"}');
        }
        mysqli_close($link);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}

