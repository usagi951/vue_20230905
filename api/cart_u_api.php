<?php
require_once "dbtools.php";
$conn = create_connect();
// $dbname = "sample01";

if (isset($_POST['member_id']) && isset($_POST['total'])) {

    $p_member_id = $_POST['member_id'];
    $p_total = $_POST['total'];

    if ($p_member_id != "" && $p_total != "") {

        $sql = "UPDATE cart SET Pay='Y' WHERE Member_id=' $p_member_id'";

        if (execute_sql($conn, $dbname, $sql)) {
            //echo ('{"state":true,"message":"結帳成功"}');
            $sql = "SELECT Total FROM member WHERE ID='$p_member_id'";
            $result = execute_sql($conn, $dbname, $sql);

            if (mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_assoc($result);
                $total = $data['Total'];
                $total += $p_total;
                $sql = "UPDATE member SET Total='$total' WHERE ID=' $p_member_id'";
                if (execute_sql($conn, $dbname, $sql)) {
                    echo ('{"state":true,"message":"結帳成功，累積消費:","data":"' . $total . '"}');
                }
            } else {
                echo ('{"state":false,"message":"更新消費失敗"}');
            }
        } else {
            echo ('{"state":false,"message":"結帳失敗"}');
        }
        mysqli_close($conn);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}
