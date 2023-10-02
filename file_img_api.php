<?php
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

   
   
  
?>