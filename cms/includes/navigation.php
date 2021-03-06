
<?php include "db.php"; ?>

<?php include "header.php"; ?>

<!--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">-->
    <nav class="navbar navbar-inverse" role="navigation">

    <div class="container">


        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/PHP/Php_Beginner_to_master-U/cms/index.php">CMS Front</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php

                    $query = "SELECT * FROM categories";
                    $select_all_categories = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_categories)){
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        $categoy_class = '';
                        $registration_class = '';


                        $pageName = basename($_SERVER['PHP_SELF']);

                        $registration = 'registration.php';


                        if(isset($_GET['category']) && $_GET['category'] == $cat_id ) {

                            $categoy_class = 'active';

                        } else if($pageName == $registration) {

                            $registration_class = 'active';
                        }

                        echo "<li class='$categoy_class'><a href='/PHP/Php_Beginner_to_master-U/cms/category.php?category={$cat_id}'>{$cat_title}</a></li>";
                    }
                ?>

                <?php if(isLoggedIn()): ?>

                    <li>
                        <a href="admin">Admin</a>
                    </li>

                    <li>
                        <a href="/PHP/Php_Beginner_to_master-U/cms/includes/logout.php">Logout</a>
                    </li>

                <?php else: ?>

                    <li>
                        <a href="/PHP/Php_Beginner_to_master-U/cms/includes/login.php">Login</a>
                    </li>

                <?php endif; ?>



                <li class="<?php echo $registration_class; ?>">
                    <a href="/PHP/Php_Beginner_to_master-U/cms/registration.php">Registration</a>
                </li>

                <li ">
                    <a href="contact">Contact</a>
                </li>

                <?php

                    if(isset($_GET['p_id'])){

                        $the_post_id = $_GET['p_id'];

                        echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";

                    }


                ?>

<!--                <li>-->
<!--                    <a href="#">Contact</a>-->
<!--                </li>-->

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>