<?php
require_once "dbtools.php";
$conn=create_connect();
// $dbname="sample01";

if(isset($_POST["id"])&&isset($_POST["pwd"])){
    
 
    if($_POST["id"]!=""&&$_POST["pwd"]!=""){

        $p_id=$_POST["id"];
        $p_pwd=substr(md5($_POST["pwd"]),0,5).substr(md5($_POST["pwd"]),-5,5);

        $sql="SELECT * FROM member WHERE id='$p_id' AND Password ='$p_pwd'" ;
        $result=execute_sql($conn,$dbname,$sql);
        
        if(mysqli_num_rows($result)==1){
     
            echo('{"state":true,"message":"原密碼正確"}');
           
        }else{
            echo('{"state":false,"message":"原密碼錯誤"}');
        }
    }else{
        echo('{"state":false,"message":"未輸入原密碼"}');
    }
}else{
    echo('{"state":false,"message":"欄位錯誤"}');
}
?>