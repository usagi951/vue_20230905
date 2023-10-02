<?php
if (isset($_POST["member_id"])) {
    if ($_POST["member_id"] != "") {
        $p_member_id = $_POST["member_id"];

        require_once "dbtools.php";
        $conn = create_connect();
        $sql = "SELECT * FROM cart WHERE Member_id = '$p_member_id'";
        
        $result = execute_sql($conn, $dbname, $sql);

        if (mysqli_num_rows($result) > 0) {
            $mydata = array();
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['Pay'] == 'Y') {
                    $mydata[] = $row;
                }
            }
            if (!empty($mydata)) {
                echo '{"state" : true, "message" : "消費紀錄取得成功", "data" : ' . json_encode($mydata) . '}';
            } else {
                echo '{"state" : false, "message" : "無符合條件的消費紀錄"}';
            }
        } else {
            echo '{"state" : false, "message" : "無符合條件的消費紀錄"}';
        }
    } else {
        echo '{"state" : false, "message" : "欄位不允許空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位錯誤"}';
}
?>