<?php
require_once "dbtools.php";
$link = create_connect();
// $dbname = "sample01";

if (isset($_POST['id'])&& isset($_POST['userstate'])) {

    $p_id = $_POST['id'];
    $p_userstate = $_POST['userstate'];
 
    if ($p_id!="" &&  $p_userstate!="") {
        
        $sql = "UPDATE member SET  UserState='$p_userstate' WHERE ID=' $p_id'";
        

        if (execute_sql($link, $dbname, $sql)) {
            echo ('{"state":true,"message":"狀態更新成功"}');
        } else {
            echo ('{"state":false,"message":"狀態更新失敗"}');
        }
        mysqli_close($link);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}
