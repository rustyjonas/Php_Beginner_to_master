<?php include "../includes/db.php";?>

<?php

if(isset($_GET['edit_user'])){

    $the_user_id = $_GET['edit_user'];
    echo $the_user_id;
}

if(isset($_POST['edit_user'])){

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

//    move_uploaded_file($post_image_temp, "image/$post_image");

    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, 
              username, user_email, user_password) VALUES ('{$user_firstname}','{$user_lastname}',
              '{$user_role}','{$username}','{$user_email}','{$user_password}')";

    $create_user_query = mysqli_query($connection,$query);

    confirmQuery($create_user_query);
}
?>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <select name="user_role" id="">
            <option value="Subscriber">Select Options</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>

        </select>
    </div>

    <div class="form-group">
        <label for="user_image"></label>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input type="submit" name="edit_user" class="btn btn-primary" value="Edit User">
    </div>





</form>

