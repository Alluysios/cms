<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">


        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author: Alluysios Arriba</small>
                        </h1>

                        <div class="col-xs-6">
                        <?php createCategoryRow(); ?>

                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="cat-title">Add Category Title</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="create" value="Add Category">
                                </div>

                            </form>

                        <?php

                            if(isset($_GET['edit'])) {
                                include  "includes/update_categories.php";
                            }

                        ?>

                            
                        </div> <!-- Add category form -->
    
                        <div class="col-xs-6">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php showAllCategory(); ?>
                                    <?php deleteCategoryRow(); ?>

                                </tbody>
                            </table>

                        </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "includes/admin_footer.php" ?>

