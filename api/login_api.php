<?php
require_once "dbtools.php";
$conn=create_connect();
// $dbname="sample01";


if(isset($_POST["username"])&&isset($_POST["password"])){
    $p_username=$_POST["username"];
    $p_password=$_POST["password"];
    $p_password =substr(md5($_POST['password']),0,5).substr(md5($_POST['password']),-5,5);
    if($p_username!=""){
        $sql="SELECT Username,Password FROM member WHERE Username='$p_username' AND Password = '$p_password'" ;
        $result=execute_sql($conn,$dbname,$sql);

       
        if(mysqli_num_rows($result)==1){
           
            //加密產生uid
            $uid=substr(hash("sha256",uniqid(time())),0,10);

            //資料庫更新uid
            $sql="UPDATE member SET Uid01='$uid' WHERE Username='$p_username'";
            if(execute_sql($conn,$dbname,$sql)){
                //ID,Username,Nickname,Email,Gender,Age,Uid01,UserState
                $sql="SELECT * FROM member WHERE Username='$p_username' AND Password = '$p_password'" ;
                $result=execute_sql($conn,$dbname,$sql);
                $data=mysqli_fetch_assoc($result);
                echo('{"state":true,
                       "message":"登入成功",
                       "data":'.json_encode($data).'}');
            }else{
                echo('{"state":false,"message":"uid更新失敗"}');
            }

            
        }else{
            echo('{"state":false,"message":"登入失敗"}');
        }
    }else{
        echo('{"state":false,"message":"欄位不可空白"}');
    }
}else{
    echo('{"state":false,"message":"欄位錯誤"}');
}
?>