<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php include "admin/functions.php"; ?>

<?php

$verified = false;

    if(!isset($_GET['email']) && !isset($_GET['token'])){

        redirect('index');


    }

//
//$email = 'rusty.letmaku28@gmail.com';
//
//$token = 'f81d3ad9f6a24d31b73cc6783b9b404bbecab1dba3e01b04dec323104a59dfe7a1a49f0c65165d02754833500f9c075beb30';

if($stmt = mysqli_prepare($connection, 'SELECT username, user_email, token FROM users WHERE token = ?')){

    mysqli_stmt_bind_param($stmt, "s", $_GET['token']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $username, $user_email, $token);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

//    if($_GET['token'] !== $token || $_GET['email'] !== $user_email){
//
//        redirect('index');
//
//    }

    if(isset($_POST['password']) && isset($_POST['confirmPassword'])){

        if($_POST['password'] === $_POST['confirmPassword']){

            $password = $_POST['password'];

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));


            if($stmt = mysqli_prepare($connection, "UPDATE users SET token = '', user_password = '{$hashedPassword}' WHERE user_email = ?")){

                mysqli_stmt_bind_param($stmt,"s", $_GET['email']);
                mysqli_stmt_execute($stmt);
                if(mysqli_stmt_affected_rows($stmt) >= 1){

                    redirect("includes/login.php");

                }

                mysqli_stmt_close($stmt);

                $verified = true;


            };



        }

    }

}


?>



<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

    <?php if(!$verified): ?>

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


    <h3><i class="fa fa-lock fa-4x"></i></h3>
    <h2 class="text-center">Reset Password</h2>
    <p>You can reset your password here.</p>
    <div class="panel-body">

        <form id="register-form" role="form" autocomplete="off" class="form" method="post">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                    <input id="password" name="password" placeholder="Enter Password" class="form-control"  type="password">
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                <input id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" class="form-control"  type="password">
            </div>

            <div class="form-group">
                <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
            </div>
        </form>

    </div><!-- Body-->


</div>
</div>
</div>
</div>
</div>
</div>

    <?php else: ?>

    <?php redirect('includes/login.php')?>

    <?php endif;?>

<hr>

<?php include "includes/footer.php";?>

</div> <!-- /.container -->

