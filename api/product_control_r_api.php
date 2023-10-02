<?php
require_once "dbtools.php";
$conn = create_connect();
// $dbname = "sample01";


$sql = "SELECT * FROM product";
$result = execute_sql($conn, $dbname, $sql);
if (mysqli_num_rows($result) >0) {
    $data=array();
    while($row=mysqli_fetch_assoc($result)){
        $data[]=$row;
    }
    
   echo('{"state":true,"message":"商品資料取得成功","data":'.json_encode($data).'}');
 
} else {
    echo('{"state":false,"message":"查無會員資料"}');
}
mysqli_close($conn);
?>
