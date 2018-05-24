<?php
$connection = mysqli_connect('localhost','root','','loginapp');

if(!$connection){
    die("Database connection failed") . mysqli_error($connection);
}else{
    echo "We are connected";
}
