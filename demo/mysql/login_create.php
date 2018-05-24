<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = mysqli_connect('localhost','root','','loginapp');

    if($connection){
        echo "We are connected";
    }else{
        die("Database connection failed");
    }

    $query = "INSERT INTO users(username,password) VALUES ('$username','$password')";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Query failed ' . mysqli_error());
    }
//   if($username && $password){
//       echo $username;
//       echo $password;
//   }else{
//       echo "this field cannot be blank";
//   }

}
