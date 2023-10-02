<?php
require_once "dbtools.php";
$conn=create_connect();
// $dbname="sample01";

if(isset($_POST["uid"])){
    $p_uid=$_POST["uid"];
 

    if($p_uid!=""){
        $sql="SELECT * FROM member WHERE Uid01='$p_uid'" ;
        $result=execute_sql($conn,$dbname,$sql);
        
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            json_encode($data);
            echo('{"state":true,"message":"uid驗證成功",
                "data":'.json_encode($data).'}');
        }else{
            echo('{"state":false,"message":"uid驗證失敗"}');
        }

      
    }else{
        echo('{"state":false,"message":"欄位不可空白"}');
    }
}else{
    echo('{"state":false,"message":"欄位錯誤"}');
}
?>