<?php

include 'db.php';
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

function updateData($username,$password,$id){
    global $connection;
    $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("QUERY FAILED" . mysqli_error());
    }
}