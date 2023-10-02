<?php
require_once "dbtools.php";
$link = create_connect();
// $dbname = "sample01";

if (isset($_POST['id'])&&isset($_POST['username'])&&isset($_POST['nickname'])&&isset($_POST['email'])) {
    //&&isset($_POST['username'])&&isset($_POST['password'])  && isset($_POST['nickname']) && isset($_POST['email'])
    $p_id = $_POST['id'];
    $p_username = $_POST['username'];
  
    $p_nickname = $_POST['nickname'];
    $p_email = $_POST['email'];
  
    if ($p_username != "" && $p_nickname != "" && $p_email != "" ) {
        
        $sql = "UPDATE member SET Username='$p_username', Nickname='$p_nickname', Email='$p_email' WHERE ID=' $p_id'";
        


        if (execute_sql($link, $dbname, $sql)) {
            echo ('{"state":true,"message":"更新成功"}');
        } else {
            echo ('{"state":false,"message":"更新失敗"}');
        }
        mysqli_close($link);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}

