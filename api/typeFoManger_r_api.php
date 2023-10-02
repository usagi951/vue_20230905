<?php
require_once "dbtools.php";
$conn = create_connect();
// $dbname = "sample01";


$sql = "SELECT * FROM productType  ORDER BY Id ";
$result = execute_sql($conn, $dbname, $sql);
if (mysqli_num_rows($result) >0) {
    $data=array();
    while($row=mysqli_fetch_assoc($result)){
        $data[]=$row;
    }
    
   echo('{"state":true,"message":"商品類別取得成功","data":'.json_encode($data).'}');
 
} else {
    echo('{"state":false,"message":"商品類別取得失敗"}');
}
mysqli_close($conn);
?>

