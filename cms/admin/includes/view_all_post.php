<?php

if(isset($_POST['checkBoxArray'])) {

    foreach ($_POST['checkBoxArray'] as $postValueId) {

        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {

            case "Published":

                $query = "UPDATE posts SET post_status ='{$bulk_options}' WHERE post_id = {$postValueId}";

                $update_to_published_status = mysqli_query($connection, $query);

                confirmQuery($update_to_published_status);
                break;


            case "Draft":
                $query = "UPDATE posts SET post_status ='{$bulk_options}' WHERE post_id = {$postValueId}";

                $update_to_draft_status = mysqli_query($connection, $query);
                confirmQuery($update_to_draft_status);

                break;

            case "Delete":
                $query = "DELETE FROM posts WHERE post_id = {$postValueId}";

                $update_to_delete_status = mysqli_query($connection, $query);

                confirmQuery($update_to_delete_status);

                break;

            case "Clone":
                $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}'";
                $select_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($select_posts_query)) {
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_date = $row['post_date'];
                    $post_author = $row['post_author'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];

                    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) 
                          VALUES('{$post_category_id}','{$post_title}', '{$post_author}','{$post_date}','{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
                    $clone_posts_query = mysqli_query($connection,$query);
                }


                break;
        }

    }
}

?>


<div id="page-wrapper" style="padding-top:3em;">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome To Admin
                    <small>Author</small>
                </h1>
                <form action="" method="post">
                    <table class="table table-bordered table-hover">
                        <div id="bulkOptionsContainer" class="col-xs-4 bulkOptionContainer">

                            <select class="form-control" name="bulk_options" id="">
                                <option value="">Select Options</option>
                                <option value="Published">Publish</option>
                                <option value="Draft">Draft</option>
                                <option value="Delete">Delete</option>
                                <option value="Clone">Clone</option>
                            </select>

                        </div>
                        
                        <div class="col-xs-4">
                            <input type="submit" value="Apply" class="btn btn-success">
                            <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
                        </div>



                        <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAllBoxes"></th>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Date</th>
                            <th>View Post</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Views Post Count</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php

                        $query = "SELECT * FROM posts ORDER BY post_id DESC";
                        $select_posts = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_posts)){
                            $post_id = $row['post_id'];
                            $post_author = $row['post_author'];
                            $post_title = $row['post_title'];
                            $post_category_id = $row['post_category_id'];
                            $post_status = $row['post_status'];
                            $post_image = $row['post_image'];
                            $post_tags = $row['post_tags'];
                            $post_content = $row['post_content'];
                            $post_comment_count = $row['post_comment_count'];
                            $post_date = $row['post_date'];
                            $post_views_count = $row['post_views_count'];

                            echo "<tr>";
                            ?>
                            
                            <td><input name="checkBoxArray[]" type="checkbox" class="checkBoxes" value="<?php echo $post_id;?>"></td>

                            <?php
                            echo "<td>$post_id</td>";
                            echo "<td>$post_author</td>";
                            echo "<td>$post_title</td>";

                            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";

                            $select_categories_id = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_categories_id)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo "<td>{$cat_title}</td>";
                            }
                            echo "<td>$post_status</td>";
                            echo "<td><img width='100' class='img-responsive' src='image/$post_image' alt='images'></td>";
                            echo "<td>$post_content</td>";
                            echo "<td>$post_tags</td>";

                            $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                            $send_comment_query = mysqli_query($connection, $query);

                            $row = mysqli_fetch_array($send_comment_query);
                            $comment_id = $row['comment_id'];
                            $count_comments = mysqli_num_rows($send_comment_query);


                            echo "<td><a href='comment.php?id=$comment_id'>$count_comments</a></td>";

                            echo "<td>$post_date</td>";
                            echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
                            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?')\" href='posts.php?delete={$post_id}'>Delete</a></td>";
                            echo "<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
                <?php
                if(isset($_GET['delete'])){

                    $post_id = $_GET['delete'];
                    $query = "DELETE FROM posts WHERE post_id = {$post_id}";
                    $delete_post_query = mysqli_query($connection,$query);

                    header("location: posts.php");

                }

                if(isset($_GET['reset'])){

                    $the_post_id = $_GET['reset'];
                    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = {$the_post_id}";
                    $reset_query = mysqli_query($connection,$query);

                    header("location: posts.php");

                }

                ?>
            </div>
        </div>
    </div>