<?php

require_once "dbtools.php";
$conn = create_connect();
// $dbname = "sample01";



if (isset($_POST['id'])) {


    $p_id = $_POST['id'];

    //$p_password = $_POST['password'];//第一層加密md5()  第二層加密 substr(字串,索引,取幾個)
  
    if ($p_id!="") {
        
        $sql = "SELECT * FROM member WHERE ID=' $p_id'";
        $result=execute_sql($conn,$dbname,$sql);
        $data=mysqli_fetch_assoc($result);
        
        if (mysqli_num_rows($result)==1) {
            echo ('{"state":true,"message":"單名會員資料取得成功","data":'.json_encode($data).'}');
        } else {
            echo ('{"state":false,"message":"單名會員資料取得失敗"}');
        }
        mysqli_close($conn);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}
?>
