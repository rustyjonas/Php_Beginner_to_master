
<?php

if(isset($_GET['p_id'])){
    $p_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = {$p_id}";
$select_posts_by_id = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_user = $row['post_user'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
    }

    if(isset($_POST['update_post'])){
        $post_user = $_POST['post_user'];
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];

        move_uploaded_file($post_image_temp, "../image/$post_image");

        if(empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = {$p_id}";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_image)){

                $post_image = $row['post_image'];
            }
        }
        $query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = '{$post_category_id}',
                  post_date = now(), post_user = '{$post_user}', post_status = '{$post_status}',
                  post_tags= '{$post_tags}', post_content = '{$post_content}', post_image = '{$post_image}' 
                  WHERE post_id = '{$post_id}'";

        $update_post = mysqli_query($connection,$query);

        confirmQuery($update_post);

        echo "<p class='bg-success'>Post Update. <a href='../post.php?p_id={$p_id}'> View Post </a> or <a href='posts.php'> Edit More Posts </a>  </p>";

    }

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome To Admin
                    <Small>Author</Small>
                </h1>

                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" value="<?php echo $post_title; ?>" name="post_title">
                    </div>

                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select name="post_category" id="post_category">
                            <?php
                            $query = "SELECT * FROM categories";
                            $select_categories= mysqli_query($connection,$query);

                            confirmQuery($select_categories);

                            while($row = mysqli_fetch_assoc($select_categories)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];

                                if($cat_id == $post_category_id){

                                    echo "<option selected value='{$cat_id}'>{$cat_title}</option>";

                                } else{
                                    echo "<option value='{$cat_id}'>{$cat_title}</option>";

                                }

                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="users">Users: </label>
                        <select name="post_user" id="">

                            <?php echo "<option value='{$post_user}'>{$post_user}</option>";?>

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

<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="title">Post Author</label>-->
<!--                        <input type="text" name="post_author" value="--><?php //echo $post_author; ?><!--" class="form-control">-->
<!--                    </div>-->

                    <div class="form-group">
                        <select name="post_status" id="">

                            <option value="<?php echo $post_status;?>"><?php echo $post_status; ?></option>

                            <?php
                            if($post_status === 'Published'){

                                echo "<option value='Draft'>Draft</option>";

                            } else {

                                echo "<option value='Published'>Publish</option>";

                            }

                            ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="post_tags">Post Tags</label>
                        <input type="text" name="post_tags" value="<?php echo $post_tags; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <img width="100" src="image/<?php echo$post_image;?>" alt="">
                        <input type="file" name="image">
                    </div>

                    <div class="form-group">
                        <label for="post_content">Post Content</label>
                        <textarea name="post_content" class="form-control" id="" cols="30" rows="10">
            <?php echo $post_content; ?>
        </textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="update_post" class="btn btn-primary" value="Update Post">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>