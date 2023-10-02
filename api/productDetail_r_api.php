<?php
require_once "dbtools.php";
$conn = create_connect();
// $dbname = "sample01";

if (isset($_POST['id'])) {

    $p_id = $_POST['id'];
    
    if ($p_id != "") {
        
        $sql = "SELECT * FROM product WHERE Id=' $p_id'";
        $result = execute_sql($conn, $dbname, $sql);
        if (mysqli_num_rows($result)==1) {
            $data=$row=mysqli_fetch_assoc($result);
          
            
           echo('{"state":true,"message":"商品資料取得成功","data":'.json_encode($data).'}');
         
        } else {
            echo('{"state":false,"message":"查無商品資料"}');
        }
       
        mysqli_close($conn);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}
?>