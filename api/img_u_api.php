<?php
/*
    echo $_FILES['file']['name'];
    echo "\n";
    echo $_FILES['file']['type'];
    echo "\n";
    echo $_FILES['file']['tmp_name'];
    echo "\n";
    echo $_FILES['file']['error'];
    echo "\n";
    echo $_FILES['file']['size'];
    echo "\n";
    substr( hash('sha256',uniqid(time())),0,10);
   
    $location='upload/'.substr( hash('sha256',uniqid(time())),0,10).'_'.$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
*/
if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
    
    if($_FILES['file']['type']=='image/jpeg' || $_FILES['file']['type']=='image/png'){
         $location='upload/'.substr( hash('sha256',uniqid(time())),0,10).'_'.$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
     $datainfo=array();
   
     $datainfo["location_name"]=$location;
     $datainfo["type"]=$_FILES['file']['type'];
     $datainfo["tmp_name"]=$_FILES['file']['tmp_name'];
     $datainfo["size"]=$_FILES['file']['size'];
    
 
    echo('{"state":true,"message":"檔案上傳成功","datainfo":'.json_encode( $datainfo).'}');


    }else{
        echo('{"state":false,"message":"檔案格式錯誤(jpg or png)"}');
    };

}else{
    echo('{"state":false,"message":"檔案不存在"}');
}
   
   
  
?>