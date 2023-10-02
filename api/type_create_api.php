<?php
require_once "dbtools.php";
$conn = create_connect();
// $dbname = "sample01";

if (isset($_POST['type'])&&isset($_POST['active'])) {

  
    $p_type = $_POST['type'];
    $p_active = $_POST['active'];

    if ($p_type != "" && $p_active != "" ) {
        
  

        $sql="INSERT INTO `productType` ( `Type`, `Active`) VALUES ('$p_type', '$p_active')";

        if (execute_sql($conn, $dbname, $sql)) {
            echo ('{"state":true,"message":"類別新增成功"}');
        } else {
            echo ('{"state":false,"message":"類別新增失敗"}');
        }
        mysqli_close($conn);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}
