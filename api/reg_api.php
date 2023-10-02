<?php
require_once "dbtools.php";
$link = create_connect();
// $dbname = "sample01";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST['gender']) && isset($_POST['age'])) {

    $p_username = $_POST['username'];
    //$p_password = $_POST['password'];//第一層加密md5()  第二層加密 substr(字串,索引,取幾個)
    $p_password =substr(md5($_POST['password']),0,5).substr(md5($_POST['password']),-5,5);
    $p_nickname = $_POST['nickname'];
    $p_email = $_POST['email'];
    $p_gender = $_POST['gender'];
    $p_age = $_POST['age'];
    if ($p_username != "" && $p_password != "" && $p_nickname != "" && $p_email != "" && $p_gender != "" && $p_age != "") {
        
        //$sql = "INSERT INTO member (Username,Password,Nickname,Email,Gender,Age,Rank) VALUES('$p_username','$p_password','$p_nickname','$p_email','$p_gender','$p_age','B')";

        $sql="INSERT INTO `member` (`Username`, `Password`, `Nickname`, `Email`, `Gender`, `Age`, `Uid01`, `UserState`, `Level`, `Total`) VALUES ('$p_username', '$p_password', '$p_nickname', '$p_email', '$p_gender', '$p_age', NULL, 'true', 'C', '0');";

        if (execute_sql($link, $dbname, $sql)) {
            echo ('{"state":true,"message":"註冊成功"}');
        } else {
            echo ('{"state":false,"message":"註冊失敗"}');
        }
        mysqli_close($link);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}
