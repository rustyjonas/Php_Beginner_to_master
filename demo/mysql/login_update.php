
<?php
    include 'functions.php';
    updateTable();

    include "includes/header.php";
?>

<div class="container">
    <div class="col-xs-6">
        <h1 class="text-center">Update</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <select name="id" id="" class="form-control">
                    <?php
                        showAllData();
                    ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="UPDATE">
        </form>
    </div>
</div>
<?php include "includes/footer.php";?>
