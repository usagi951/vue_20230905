<?php
require_once "dbtools.php";
$link= create_connect();
$dbname = "id21296178_sample01";



// username: $("#username").val(),
// password: $("#password").val(),
// nickname: $("#nickname").val(),
// email: $("#email").val(),
// age: $("#age").val(),
// gender: $("#gender").val(),
// Total:$("#total").val(),
// Level:$("#level").val()

if (isset($_POST['password']) && isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['gender'])) {

    $p_id = $_POST['id'];
    $p_password =substr(md5($_POST['password']),0,5).substr(md5($_POST['password']),-5,5);
    $p_nickname = $_POST['nickname'];
    $p_email = $_POST['email'];
    $p_age = $_POST['age'];
    $p_gender = $_POST['gender'];

    if ($p_password != "" && $p_nickname != "" && $p_email != "" && $p_age != "" && $p_gender != "") {

       

        $sql = "UPDATE member SET Password='$p_password', Nickname='$p_nickname', Email='$p_email', Age='$p_age', Gender='$p_gender' WHERE ID=' $p_id'";

       
            if (execute_sql($link, $dbname, $sql)) {
                echo ('{"state":true,"message":"更新成功"}');
            } else {
                echo ('{"state":false,"message":"更新失敗"}');
            }
            mysqli_close($link);
        } else {
            echo ('{"state":true,"message":"欄位不允許空白"}');
        }
    } else {
        echo ('{"state":true,"message":"欄位錯誤"}');
    }
