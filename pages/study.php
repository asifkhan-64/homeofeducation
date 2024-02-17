<?php
    include('../_stream/config.php');
    session_start();
    if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $error = '';
    $added = '';
    $alreadyAdded = '';


    if (isset($_POST['addClient'])) {
        $u_id                   = $_POST['u_id'];
        $client_name            = $_POST['client_name'];
        $client_guardian        = $_POST['client_guardian'];
        $client_address         = $_POST['client_address'];
        $client_contact         = $_POST['client_contact'];
        $client_passportno      = $_POST['client_passportno'];
        $client_passportexpiry  = $_POST['client_passportexpiry'];
        $client_country         = $_POST['client_country'];
        $client_amountfig       = $_POST['client_amountfig'];
        $client_amountwords     = $_POST['client_amountwords'];
        $client_advance         = $_POST['client_advance'];
        $client_refund          = $_POST['client_refund'];
        $client_processtime     = $_POST['client_processtime'];
        $client_bankstatement   = $_POST['client_bankstatement'];
        $client_amountafter     = $_POST['client_amountafter'];
        $client_cnic            = $_POST['client_cnic'];
        $client_advancewords            = $_POST['client_advancewords'];


        $insertQuery = mysqli_query($connect, "INSERT INTO `study_client`(
            `client_name`,
             `client_guardian`,
              `client_address`,
               `client_contact`,
                `client_passportno`,
                 `client_passportexpiry`,
                  `client_country`,
                   `client_cnic`,
                    `client_amountfig`,
                     `client_amountwords`,
                      `client_advance`,
                       `client_refund`,
                        `client_processtime`,
                         `client_bankstatement`,
                          `client_amountafter`,
                           `u_id`,
                            `client_advancewords`
            ) VALUES (
                '$client_name',
                 '$client_guardian',
                  '$client_address',
                   '$client_contact',
                    '$client_passportno',
                     '$client_passportexpiry',
                      '$client_country',
                       '$client_cnic',
                        '$client_amountfig',
                         '$client_amountwords',
                          '$client_advance',
                           '$client_refund',
                            '$client_processtime',
                             '$client_bankstatement',
                              '$client_amountafter',
                               '$u_id',
                                '$client_advancewords'
            )");
        if (!$insertQuery) {
            $error = 
            '<div class="alert alert-dark" role="alert">
                Client Not Added! Try again!
            </div>';
        }else {
            header("LOCATION: client_student_list.php");
        }
    }


    include('../_partials/header.php');

    if ($userRole === '2') {}else {echo "<script>window.location.href = 'accessDenied.php'</script>";}

?>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script> -->


<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title">Client (Study Agreement)</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form method="POST">                            
                            <input type="hidden" name="u_id" value="<?php echo $signedUserId ?>">

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Client Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="Client Name" type="text" value="" id="example-text-input" name="client_name" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Guardian Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="Guardian Name" type="text" value="" id="example-text-input" name="client_guardian" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Residence Of</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="Address" type="text" value="" id="example-text-input" name="client_address" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Contact</label>
                                <div class="col-sm-4">
                                    <input class="form-control" maxlength = "12" data-inputmask="'mask': '0399-99999999'" placeholder="03xx-xxxxxxx" type="text" value="" id="example-text-input" name="client_contact" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Passport No.</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="Passport Number" type="text" value="" id="example-text-input" name="client_passportno" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Passport Expiry</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="Expiry Date" type="date" value="" id="example-text-input" name="client_passportexpiry" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">CNIC No</label>
                                <div class="col-sm-4">
                                    <input class="form-control cnic" data-inputmask="'mask': '99999-9999999-9'"  placeholder="xxxxx-xxxxxxx-x" type="text" value="" id="example-text-input" name="client_cnic" required="">
                                </div>
                            </div>

                            <hr />

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Study Country</label>
                                <div class="col-sm-4">
                                        <?php
                                            $getCountries = mysqli_query($connect, "SELECT * FROM `countries`");
                                            $optCountries = '<select required name="client_country" class="form-control comp">';
                                                
                                                while ($rowCountries = mysqli_fetch_assoc($getCountries)) {
                                                    $optCountries.= '<option value='.$rowCountries['c_id'].'>'.$rowCountries['country_name'].'</option>';
                                                }
                                                $optCountries.= "</select>";
                                            echo $optCountries;
                                        ?>
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Processing Time</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e 3 Months" type="text" value="" id="example-text-input" name="client_processtime" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Amount in Fig</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e Pound 15000" type="text" value="" id="example-text-input" name="client_amountfig" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Amount in Words</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e Fifteen Thousand Pounds" type="text" value="" id="example-text-input" name="client_amountwords" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Advance Tuition Fee (Fig)</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e Pound 15000" type="text" value="" id="example-text-input" name="client_advance" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Advance Fee (Words)</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e Fifteen Thousand Pounds" type="text" value="" id="example-text-input" name="client_advancewords" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Refund Days (Refusal)</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e 20 Days in PKR" type="text" value="" id="example-text-input" name="client_refund" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Bank Statement</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="Bank Statement" type="text" value="" id="example-text-input" name="client_bankstatement" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Amount After Visa</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e 1000 Pounds" type="text" value="" id="example-text-input" name="client_amountafter" required="">
                                </div>
                            </div>

                            <hr />

                            <div class="form-group row">
                                <!-- <label for="example-password-input" class="col-sm-2 col-form-label"></label> -->
                                <div class="col-sm-12" align="right">
                                    <?php include('../_partials/cancel.php') ?>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="addClient">Add Client</button>
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

<script type="text/javascript" src="../assets/js/select2.min.js"></script>
<script type="text/javascript">
$('.comp').select2({
  placeholder: 'Select an option',
  allowClear:true
  
});
</script>

<script type="text/javascript">
$('.status').select2({
  placeholder: 'Select an option',
  allowClear:true
  
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script>
        $(":input").inputmask();
   </script>
</body>

</html>