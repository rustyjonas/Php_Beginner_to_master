<?php include "includes/db.php";?>
    <!-- Header -->
<?php include "includes/header.php"; ?>


    <!-- Navigation -->
<?php include "includes/navigation.php" ;?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                if(isset($_GET['p_id'])){

                    $the_post_id = $_GET['p_id'];
                    $the_post_user = $_GET['user'];

                }
                $query = "SELECT * FROM posts WHERE post_user = '{$the_post_user}'";
                $select_all_posts_query = mysqli_query($connection,$query);


                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

                    ?>

                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                      All post by <?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <hr>
                    <img width="100" class="img-responsive" src="admin/image/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <hr>

                <?php }


                ?>

            </div>


    <!-- Blog Sidebar Widgets Column -->

<?php include "includes/sidebar.php";?>

        </div>
    <!-- /.row -->


    <hr>
    <!-- Footer -->
<?php include "includes/footer.php"; ?>

    </div>
