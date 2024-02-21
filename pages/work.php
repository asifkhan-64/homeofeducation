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
        $client_permitduration  = $_POST['client_permitduration'];
        $client_amountfig       = $_POST['client_amountfig'];
        $client_amountwords     = $_POST['client_amountwords'];
        $client_advance         = $_POST['client_advance'];
        $client_remaining       = $_POST['client_remaining'];
        $client_processtime     = $_POST['client_processtime'];
        $client_workstatus      = $_POST['client_workstatus'];
        $client_cnic            = $_POST['client_cnic'];
        $client_visit           = $_POST['client_visit'];
        $witness_name           = $_POST['witness_name'];
        $witness_fname          = $_POST['witness_fname'];
        $witness_cnic           = $_POST['witness_cnic'];


        $insertQuery = mysqli_query($connect, "INSERT INTO `work_client`(
            `client_name`,
             `client_guardian`,
              `client_address`,
               `client_contact`,
                `client_passportno`,
                 `client_passportexpiry`,
                  `client_country`,
                   `client_permitduration`,
                    `client_amountfig`,
                     `client_amountwords`,
                      `client_advance`,
                       `client_remaining`,
                        `client_processtime`,
                         `client_workstatus`,
                          `u_id`,
                           `client_cnic`,
                            `client_visit`,
                             `witness_name`,
                              `witness_fname`,
                                `witness_cnic`
            ) VALUES (
                '$client_name',
                 '$client_guardian',
                  '$client_address',
                   '$client_contact',
                    '$client_passportno',
                     '$client_passportexpiry',
                      '$client_country',
                       '$client_permitduration',
                        '$client_amountfig',
                         '$client_amountwords',
                          '$client_advance',
                           '$client_remaining',
                            '$client_processtime',
                             '$client_workstatus',
                              '$u_id',
                               '$client_cnic',
                                '$client_visit',
                                '$witness_name',
                                 '$witness_fname',
                                  '$witness_cnic'
            )");
        if (!$insertQuery) {
            $error = 
            '<div class="alert alert-dark" role="alert">
                Client Not Added! Try again!
            </div>';
        }else {
            header("LOCATION: client_list.php");
        }
    }


    include('../_partials/header.php');

    if ($userRole === '2') {}else {echo "<script>window.location.href = 'accessDenied.php'</script>";}

?>

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title">Client (Work Permit Agreement)</h5>
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

                                <label for="example-text-input" class="col-sm-2 col-form-label">Work Country</label>
                                <div class="col-sm-4">
                                        <?php
                                            $getCountries = mysqli_query($connect, "SELECT * FROM `countries`");
                                            $optCountries = '<select required name="client_country" class="form-control visit" required="">';
                                                
                                                while ($rowCountries = mysqli_fetch_assoc($getCountries)) {
                                                    $optCountries.= '<option value='.$rowCountries['c_id'].'>'.$rowCountries['country_name'].'</option>';
                                                }
                                                $optCountries.= "</select>";
                                            echo $optCountries;
                                        ?>
                                </div>
                            </div>

                            <hr />

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Dubai Visit</label>
                                <div class="col-sm-4">
                                    <select required name="client_visit" class="form-control status" required="">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Permit Duration</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e 3 Years" type="text" value="" id="example-text-input" name="client_permitduration" required="">
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
                                <label for="example-text-input" class="col-sm-2 col-form-label">Advance Payment</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e Pound 15000" type="text" value="" id="example-text-input" name="client_advance" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Remaining Payment</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e Fifteen Thousand Pounds" type="text" value="" id="example-text-input" name="client_remaining" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Processing Time</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e 3 Months" type="text" value="" id="example-text-input" name="client_processtime" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Work Status</label>
                                <div class="col-sm-4">
                                    <select required name="client_workstatus" class="form-control status" id="selectField" required="">
                                        <option value="0">Without Work</option>
                                        <option value="1">With Work</option>
                                    </select>
                                </div>
                            </div>

                            <hr />

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Witness Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="Witness Name" type="text" value="" id="example-text-input" name="witness_name" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Witness F/Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="Witness Name" type="text" value="" id="example-text-input" name="witness_fname" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Witness CNIC No</label>
                                <div class="col-sm-4">
                                    <input class="form-control cnic_witness" data-inputmask="'mask': '99999-9999999-9'"  placeholder="xxxxx-xxxxxxx-x" type="text" value="" id="example-text-input" name="witness_cnic" required="">
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

<script type="text/javascript">
$('.visit').select2({
  placeholder: 'Select an option',
  allowClear:true
  
});
</script>

    <script>
        // Get the input element and the display element
        const textInput = document.getElementById('textInput');
        const textDisplay = document.getElementById('textDisplay');
        const textDisplaySecond = document.getElementById('textDisplaySecond');
        const textDisplayThird = document.getElementById('textDisplayThird');
        const textDisplayFourth = document.getElementById('textDisplayFourth');

        // Add keyup event listener to the input element
        textInput.addEventListener('keyup', function() {
        // Get the text value from the input
        const text = textInput.value;
        // Update the text content of the display element
        textDisplay.textContent = text;
        textDisplaySecond.textContent = text;
        textDisplayThird.textContent = text;
        textDisplayFourth.textContent = text;
        });
    </script>


    <script>
        // Get the input element and the display element
        const textInputFigs = document.getElementById('textInputFigs');
        const textDisplayFigs = document.getElementById('textDisplayFigs'); 

        // Add keyup event listener to the input element
        textInputFigs.addEventListener('keyup', function() {
        // Get the text value from the input
        const textAnother = textInputFigs.value;
        // Update the text content of the display element
        textDisplayFigs.textContent = textAnother;
        });
    </script>


    <script>
        // Get the input element and the display element
        const textInputWords = document.getElementById('textInputWords');
        const textDisplayWords = document.getElementById('textDisplayWords'); 

        // Add keyup event listener to the input element
        textInputWords.addEventListener('keyup', function() {
        // Get the text value from the input
        const textAnotherOther = textInputWords.value;
        // Update the text content of the display element
        textDisplayWords.textContent = textAnotherOther;
        });
    </script>

  <script>
    // Get the select element and the paragraph element
    const selectField = document.getElementById('selectField');
    const selectedOptionText = document.getElementById('selectedOptionText');

    // Add change event listener to the select element
    selectField.addEventListener('change', function() {
      // Get the selected option element
      const selectedOption = selectField.options[selectField.selectedIndex];
      // Get the text content of the selected option
      const selectedText = selectedOption.textContent;
      // Update the text content of the paragraph element
      selectedOptionText.textContent = selectedText;
      selectedOptionTextSecond.textContent = selectedText;
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
        <script>
            $(":input").inputmask();
    </script>
</body>

</html>