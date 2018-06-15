<?php include "../includes/db.php";?>

<?php
    if(isset($_POST['create_post'])){

        $post_title = $_POST['title'];
        $post_user = $_POST['user'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');

        move_uploaded_file($post_image_temp, "image/$post_image");


        $query = "INSERT INTO posts (post_category_id, post_title, post_user, post_date, post_image, 
                post_content, post_tags, post_status) VALUES ({$post_category_id},'{$post_title}', '{$post_user}', now(),
              '{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

        $add_post_query = mysqli_query($connection,$query);

        $the_post_id =  mysqli_insert_id($connection);

        confirmQuery($add_post_query);



        echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'> View Post </a> or <a href='posts.php'> Edit More Posts </a>  </p>";

    }
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome To Admin
                    <small>Author</small>
                </h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>


                    <div class="form-group">
                        <label for="category">Category: </label>
                        <select name="post_category" id="post_category">
                            <?php
                            $query = "SELECT * FROM categories";
                            $select_categories= mysqli_query($connection,$query);

                            confirmQuery($select_categories);

                            while($row = mysqli_fetch_assoc($select_categories)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];

                                echo "<option value='{$cat_id}'>{$cat_title}</option>";

                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="users">Users: </label>
                        <select name="user" id="">
                            <?php
                            $users_query = "SELECT * FROM users";
                            $select_users = mysqli_query($connection,$users_query);

                            confirmQuery($select_users);

                            while($row = mysqli_fetch_assoc($select_users)) {
                                $username = $row['username'];

                                echo "<option value='{$username}'>{$username}</option>";

                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="post_tags">Post Tags</label>
                        <input type="text" name="post_tags" class="form-control">
                    </div>

                    <div class="form-group">
                        <select name="post_status" id="">
                            <option value="Draft">Select Options</option>
                            <option value="Published">Publish</option>
                            <option value="Draft">Draft</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="post_image">Post Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="form-group">
                        <label for="post_content">Post Content</label>
                        <textarea name="post_content" class="form-control" id="body" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

