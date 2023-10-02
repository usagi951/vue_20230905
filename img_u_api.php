<?php
require_once "dbtools.php";
$conn = create_connect();
$dbname = "sample01";


if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['type']) && isset($_POST['active'])) {

    $p_name = $_POST['name'];
    $p_price = $_POST['price'];
    $p_type = $_POST['type'];
    $p_active = $_POST['active'];

    if ($p_name != "" && $p_price != "" && $p_type != "" && $p_active != "") {

        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {


            if ($_FILES['file']['type'] == 'image/jpeg' || $_FILES['file']['type'] == 'image/png') {
                $location = 'img/product/' . substr(hash('sha256', uniqid(time())), 0, 10) . '_' . $_FILES['file']['name'];
                
                move_uploaded_file($_FILES['file']['tmp_name'], $location);
                $datainfo = array();

                $datainfo["location_name"] = $location;
                $datainfo["type"] = $_FILES['file']['type'];
                $datainfo["tmp_name"] = $_FILES['file']['tmp_name'];
                $datainfo["size"] = $_FILES['file']['size'];
                $datainfo["name"] = $_POST['name'];
                $datainfo["price"] = $_POST['price'];
                $datainfo["active"] = $_POST['active'];
                $datainfo["type"] = $_POST['type'];


                $sql="INSERT INTO `product` (`Name`, `Price`,`Type`, `Active`,Img) VALUES ('$p_name','$p_price','$p_type', '$p_active','$location')";

                if (execute_sql($conn, $dbname, $sql)) {
                    echo ('{"state":true,"message":"商品新增成功"}');
                } else {
                    echo ('{"state":false,"message":"商品新增失敗"}');
                }
                mysqli_close($conn);
            } else {
                echo ('{"state":false,"message":"檔案格式錯誤(jpg or png)"}');
            };
        } else {
            echo ('{"state":false,"message":"檔案不存在"}');
        }
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}
