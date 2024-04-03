<?php 
    $connection  =   new mysqli('localhost','root','','php12-1',3308);
    $update_id   =  $_POST['up_id'];
    $name        =  $_POST['up_name'];
    $gender      =  $_POST['up_gender'];
    $image       =  $_POST['up_image'];

    $sql    =  "UPDATE `user` SET `name` = '$name' , `gender` = '$gender' , `image` = '$image' WHERE `id` = '$update_id'";


    $result = $connection -> query($sql);

    if($result){
        echo "OK";
    }