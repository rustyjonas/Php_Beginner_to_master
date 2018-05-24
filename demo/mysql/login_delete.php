
<?php

include 'db.php';
include 'functions.php';

if(isset($_POST['submit'])){
    deleteRowS();
}
?>


<?php include "includes/header.php";?>

<div class="container">
    <div class="col-xs-6">
        <h1 class="text-center">Delete</h1>
        <form action="login_delete.php" method="POST">
            <div class="form-group">
                <select name="id" id="" class="form-control">
                    <?php
                    showAllData();
                    ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="DELETE">
        </form>
    </div>
</div>

<?php include "includes/footer.php";?>
