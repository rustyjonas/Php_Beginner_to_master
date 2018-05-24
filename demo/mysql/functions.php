<?php

include 'db.php';

function createRows(){
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);

    $query =  "INSERT INTO users (username,password) VALUES ('$username','$password')";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query failed ');
    }else{
        echo "Registered";
    }
}


function readRows(){
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die('Query failed ' . mysqli_error());
    }
    while($row = mysqli_fetch_assoc($result)){
        print_r($row);
    }
}

function showAllData(){
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection,$query);

    if(!$result){
        die('Query failed ' . mysqli_error());
    }

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}

function updateTable(){
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("QUERY FAILED" . mysqli_error());
    }else{
        echo "Updated";
    }
}

function deleteRowS(){
    global $connection;
    $id = $_POST['id'];
    $query = "DELETE FROM users WHERE id = '$id'";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("QUERY FAILED" . mysqli_error());
    }else{
        echo "Deleted";
    }
}
