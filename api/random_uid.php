<?php
    //時間戳記
    echo '時間戳記'.time();
    echo("<br>");
    //符合sql時間格式
    echo date("Y:m:d h:i:s");
    echo("<br>");
    //uniqid
    echo uniqid();
    echo("<br>");
    //uniqid+時間戳記
    echo uniqid(time());
    echo("<br>");
    //hash 雜湊函數   hash(演算法,因子)
    echo hash("md5",time());
    echo("<br>");

    echo hash("sha256",time());
    echo("<br>");

    echo hash("sha512",time());
    echo("<br>");

    //產生安全的uid
    echo("<br>");
    //sha256 + uniqid+時間戳記
    echo hash("sha256",uniqid(time()));
    echo("<br>");
    //sha256 + uniqid+時間戳記+ 節取自串
    echo substr(hash("sha256",uniqid(time())),0,10);
?>