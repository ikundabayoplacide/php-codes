<?php

// to connect with database

$conn =mysqli_connect('localhost','placide','Rwandanziza@100','rwandanziza');
// check connection

if(!$conn){
    echo 'connection erro:'.mysqli_connect_error();
}




?>