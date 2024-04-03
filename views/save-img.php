<?php  
    $image      =  $_FILES['_file']['name'];
    $thumbnail  = date('YmdHis') .'-'. $image;
    $path    = '../image/'.$thumbnail;
    move_uploaded_file($_FILES['_file']['tmp_name'],$path);
    echo $thumbnail;

