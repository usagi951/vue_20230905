<?php
require_once "dbtools.php";
$conn = create_connect();
// $dbname = "sample01";

if (isset($_POST['level'])&&isset($_POST['member_id'])) 
{
    $p_level = $_POST['level'];
    $p_member_id = $_POST['member_id'];
    if ( $p_member_id != ""&& $p_level!="") 
    {
        
        $sql = "UPDATE member SET Level = '$p_level' WHERE ID = '$p_member_id';";
        $result=execute_sql($conn,$dbname,$sql);  
        mysqli_close($conn);
        echo('{"state":true,"message":"會員等級提升"}');
    } 
    else 
    {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} 
else{
    echo ('{"state":true,"message":"欄位錯誤"}');
} 
?>
