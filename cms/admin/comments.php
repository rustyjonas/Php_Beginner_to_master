
<?php include "includes/admin_header.php";?>

<div id="wrapper">

    <!-- Navigation -->

<?php include "includes/admin_navigation.php"; ?>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            <?php
            if(isset($_GET['source'])){

                $source = $_GET['source'];

            } else {
                $source = '';
            }

            switch($source){

                case 'add_post':
                    include "includes/add_post.php";
                    break;

                case 'edit_post':
                    include "includes/edit_post.php";
                    break;

                case '200':
                    echo "NICE 200";
                    break;

                default:
                    include "includes/view_all_comments.php";
                    break;
            }
            ?>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>

<!-- /#page-wrapper -->



<?php include "includes/admin_footer.php";?>

