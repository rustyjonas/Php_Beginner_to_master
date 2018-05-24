
<?php

    include 'db.php';
    include 'functions.php';

    if(isset($_POST['submit'])){
        updateTable();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="col-xs-6">
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

</body>
