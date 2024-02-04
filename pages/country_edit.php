<?php
    include('../_stream/config.php');
    session_start();
    if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $alreadyAdded = '';
    $added = '';
    $error= '';

    $id = $_GET['id'];
    $getQuery = mysqli_query($connect, "SELECT * FROM countries WHERE c_id = '$id'");
    $fetch_getQuery = mysqli_fetch_assoc($getQuery);

    if (isset($_POST['addCountry'])) {
        $countryName = $_POST['countryName'];
        $id = $_POST['id'];

        $countQuery = mysqli_query($connect, "SELECT COUNT(*)AS countedCountries FROM countries WHERE country_name = '$countryName'");
        $fetch_countQuery = mysqli_fetch_assoc($countQuery);


        if ($fetch_countQuery['countedCountries'] == 0) {
            $updateQuery = mysqli_query($connect, "UPDATE countries SET country_name = '$countryName' WHERE c_id = '$id'");
            if (!$updateQuery) {
                $error = 
                '<div class="alert alert-dark" role="alert">
                    Not Added! Try again!
                </div>';
            }else {
                // $added = '
                // <div class="alert alert-primary" role="alert">
                //     Country Added!
                // </div>';
                header("LOCATION: countries_list.php");
            }
        }else {
            $alreadyAdded = 
            '<div class="alert alert-dark" role="alert">
                Country "'. $countryName .'" Already Added!
            </div>';
        }
    }


    include('../_partials/header.php');
?>

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title">Edit Country</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Country Name</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <input class="form-control" placeholder="Country Name" type="text" value="<?php echo $fetch_getQuery['country_name'] ?>" id="example-text-input" name="countryName" required="">
                                </div>
                            </div><hr>
                            <div class="form-group row">
                                <!-- <label for="example-password-input" class="col-sm-2 col-form-label"></label> -->
                                <div class="col-sm-12" align="right">
                                    <?php include('../_partials/cancel.php') ?>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="addCountry">Update Country</button>
                                </div>
                            </div>
                        </form>
                        <h5 align="center"><?php echo $error ?></h5>
                        <h5 align="center"><?php echo $added ?></h5>
                        <h5 align="center"><?php echo $alreadyAdded ?></h5>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div><!-- container fluid -->
</div> <!-- Page content Wrapper -->
</div> <!-- content -->
<?php include('../_partials/footer.php') ?>
</div>
<!-- End Right content here -->
</div>
<!-- END wrapper -->
<!-- jQuery  -->
<?php include('../_partials/jquery.php') ?>
<!-- Required datatable js -->
<?php include('../_partials/datatable.php') ?>
<!-- Datatable init js -->
<?php include('../_partials/datatableInit.php') ?>
<!-- Buttons examples -->
<?php include('../_partials/buttons.php') ?>
<!-- App js -->
<?php include('../_partials/app.php') ?>
<!-- Responsive examples -->
<?php include('../_partials/responsive.php') ?>
<!-- Sweet-Alert  -->
<?php include('../_partials/sweetalert.php') ?>
</body>

</html>