<?php
require_once "dbtools.php";
$conn = create_connect();
// $dbname = "sample01";

if (isset($_POST['total'])&&isset($_POST['member_id'])) {
    $p_total = $_POST['total'];
    $p_member_id = $_POST['member_id'];
    if ( $p_member_id != ""&& $p_total!="") {
        
        $sql="SELECT Total FROM member WHERE ID='$p_member_id'";
        $result=execute_sql($conn,$dbname,$sql);
       
        if (mysqli_num_rows($result)==1) {
            $data=mysqli_fetch_assoc($result);
            $total=$data['Total'];
            $total+=$p_total;
            $sql = "UPDATE member SET Total='$total' WHERE ID=' $p_member_id'";
            if(execute_sql($conn,$dbname,$sql)){
                echo('{"state":true,"message":"累積消費更新成功","data":"'.$total.'"}');
            }
            
         
        } else {
            echo('{"state":false,"message":"查無會員"}');
        }
       
        mysqli_close($conn);

        //$sql = "UPDATE member SET total='$p_total' WHERE ID=' $p_member_id'";
        


    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}

