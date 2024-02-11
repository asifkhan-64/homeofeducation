<?php
    include('../_stream/config.php');
    session_start();
    if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
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
                                    <input class="form-control" placeholder="03xxxxxxxxx" type="number" value="" id="example-text-input" name="client_contact" required="">
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

                            <hr />

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Work Country</label>
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

                                <label for="example-text-input" class="col-sm-2 col-form-label">Permit Duration</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e 3 Years" type="text" value="" id="example-text-input" name="client_amountwords" required="">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Amount in Fig</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e Pound 15000" type="text" value="" id="example-text-input" name="client_amountfig" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Amount in Words</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e Fifteen Thousand Pounds" type="text" value="" id="example-text-input" name="client_amountfigs" required="">
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
                                    <select required name="client_workstatus" class="form-control status" id="selectField">
                                        <option value="0">Without Work</option>
                                        <option value="1">With Work</option>
                                    </select>
                                </div>
                            </div>

                            
                                
                        </form>
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
</body>

</html>