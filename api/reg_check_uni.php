<?php
require_once "dbtools.php";
$conn=create_connect();
// $dbname="sample01";


if(isset($_POST["username"])){
    $p_username=$_POST["username"];
    if($p_username!=""){
        $sql="SELECT Username FROM member WHERE Username='$p_username'" ;
        $result=execute_sql($conn,$dbname,$sql);
        if(mysqli_num_rows($result)==0){
            echo('{"state":true,"message":"帳號可使用"}');
        }else{
            echo('{"state":false,"message":"帳號已存在，無法使用"}');
        }
    }else{
        echo('{"state":false,"message":"欄位不可空白"}');
    }
}else{
    echo('{"state":false,"message":"欄位錯誤"}');
}
?>