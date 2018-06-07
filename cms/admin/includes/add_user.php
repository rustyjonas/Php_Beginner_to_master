<?php include "../includes/db.php";?>

<?php
if(isset($_POST['create_user'])){

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');

    move_uploaded_file($post_image_temp, "image/$post_image");


    $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, 
                post_content, post_tags, post_status) VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),
              '{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

    $add_post_query = mysqli_query($connection,$query);

    confirmQuery($add_post_query);
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
            <?php
            $query = "SELECT * FROM users";
            $select_users = mysqli_query($connection,$query);

            confirmQuery($select_users);

            while($row = mysqli_fetch_assoc($select_users)){
                $user_id = $row['user_id'];
                $user_role = $row['user_role'];

                echo "<option value='$user_id'>{$user_role}</option>";
            }
            ?>

        </select>

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
        <input type="submit" name="create_user" class="btn btn-primary" value="Add User">
    </div>





</form>

