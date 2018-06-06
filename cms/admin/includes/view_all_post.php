<div id="page-wrapper" style="padding-top:3em;">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome To Admin
                    <small>Author</small>
                </h1>

                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Date</th>
                    </tr>
                    </thead>

                    <tbody>

                    <tr>
                        <td>10</td>
                        <td>Edwin Diaz</td>
                        <td>Bootstrap framework</td>
                        <td>Bootstrap</td>
                        <td>Status</td>
                        <td>Image</td>
                        <td>Tags</td>
                        <td>Comments</td>
                        <td>Date</td>
                    </tr>
                    </tbody>
                    <?php

                    $query = "SELECT * FROM posts";
                    $select_posts = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_posts)){
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_date = $row['post_date'];

                        echo "<td>$post_id</td>";
                        echo "<td>$post_author</td>";
                        echo "<td>$post_title</td>";
                        echo "<td>$post_category_id</td>";
                        echo "<td>$post_status</td>";
                        echo "<td><img width='100' class='img-responsive' src='image/$post_image' alt='images'></td>";
                        echo "<td>$post_tags</td>";
                        echo "<td>$post_comment_count</td>";
                        echo "<td>$post_date</td>";
                        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";

                        echo "</tr>";
                    }
                    ?>

                </table>


                <?php
                if(isset($_GET['delete'])){

                    $post_id = $_GET['delete'];
                    $query = "DELETE FROM posts WHERE post_id = {$post_id}";
                    $delete_post_query = mysqli_query($connection,$query);

                    header("location: posts.php");

                }

                ?>
            </div>
        </div>
    </div>