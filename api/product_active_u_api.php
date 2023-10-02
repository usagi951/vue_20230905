<?php
require_once "dbtools.php";
$link = create_connect();
// $dbname = "sample01";

if (isset($_POST['id'])&&isset($_POST['active']) ) {

    $p_id = $_POST['id'];
    $p_active = $_POST['active'];
    
    if ($p_id != "" && $p_active != "" ) {
        
        $sql = "UPDATE product SET Active='$p_active' WHERE Id=' $p_id'";
        
        if (execute_sql($link, $dbname, $sql)) {
            echo ('{"state":true,"message":"商品狀態更改成功"}');
        } else {
            echo ('{"state":false,"message":"商品狀態更改失敗"}');
        }
        mysqli_close($link);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}

