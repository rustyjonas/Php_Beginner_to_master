
<?php include "includes/admin_header.php";?>



<div id="wrapper">


    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin
                        <small>Author</small>
                    </h1>


                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="user_firstname">Firstname</label>
                            <input type="text" value="<?php echo $user_firstname?>" class="form-control" name="user_firstname">
                        </div>

                        <div class="form-group">
                            <label for="user_lastname">Lastname</label>
                            <input type="text" value="<?php echo $user_lastname?>" class="form-control" name="user_lastname">
                        </div>

                        <div class="form-group">
                            <select name="user_role" id="">
                                <?php
                                echo "<option value='$user_role'>$user_role</option>";

                                if($user_role == 'Admin'){
                                    echo "<option value='Subscriber'>Subscriber</option>";
                                } else {
                                    echo "<option value='Admin'>Admin</option>";
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="user_image"></label>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input value="<?php echo $username?>" type="text" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="text" value="<?php echo $user_email?>" class="form-control" name="user_email">
                        </div>

                        <div class="form-group">
                            <label for="user_password">Password</label>
                            <input type="password" class="form-control" value="<?php echo $user_password?>" name="user_password">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="edit_user" class="btn btn-primary" value="Update User">
                        </div>

                    </form>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>



    <!-- /#page-wrapper -->


    <?php include "includes/admin_footer.php";?>
