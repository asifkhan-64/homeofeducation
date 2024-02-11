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
                <h5 class="page-title">Client (Work Permit)</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h3 align="center">Agreement</h3>
                        <hr />
                        <form method="POST">                            
                            <h5 class="py-4"><u>Client Details!</u></h5>
                            
                            <p style="font-size: 16px;">
                                <b>
                                    This agreement done between HOME OF EDUCATION CONSULTANTS PVT.LTD and 
                                    <!-- <br /> -->
                                    <select required name="client_gender" style="margin-top: 15px; border: none; border-bottom: 1px solid blue;">
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Ms">Ms</option>
                                    </select>
                                    
                                    
                                    <input required style="width: 30%; border: none; border-bottom: 1px solid blue;" id="textInput" name="client_name" placeholder="Client Name"> 
                                    
                                    <select required name="client_guardian" style="border: none; border-bottom: 1px solid blue;">
                                        <option value="S/O">S/O</option>
                                        <option value="D/O">D/O</option>
                                        <option value="C/O">C/O</option>
                                    </select>

                                    <input required style="width: 30%; border: none; border-bottom: 1px solid blue;" name="client_guardian" placeholder="Client Guardian"> 

                                    <!-- <br /> -->
                                    
                                    Resident of <input required style="margin-top: 15px; width: 30%; border: none; border-bottom: 1px solid blue;" name="client_address" placeholder="Client Address"> 
                                    KPK Pakistan. <input required style="margin-top: 15px; width: 30%; border: none; border-bottom: 1px solid blue;" name="client_phone" placeholder="03xxxxxxxxx"> 
                                    
                                    <br />

                                </b>
                            </p>

                            <hr />
                            <h5 class="py-4"><u>Permit Details!</u></h5>

                            <p>
                                <b>
                                    Following are the points of agreement for 
                                    <select required name="client_country" id="selectField" style="border: none; border-bottom: 1px solid blue; width: 20%">
                                        <?php
                                            $getCountries = mysqli_query($connect, "SELECT * FROM `countries`");

                                            while ($rowCountries = mysqli_fetch_assoc($getCountries)) {
                                                echo '<option value='.$rowCountries['c_id'].'>'.$rowCountries['country_name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    Work Permit and Application Process.
                                </b>
                            </p>

                            <p>
                                This Application will cost <b><q><span id="textDisplay"></span></q></b> 
                                Passport Number <input required style="margin-top: 15px; width: 15%; border: none; border-bottom: 1px solid blue;" name="client_passport" placeholder="Client Passport No">
                                Expiry Date: <input required style="margin-top: 15px; width: 30%; border: none; border-bottom: 1px solid blue;" name="client_passport_expiry" placeholder="Client Expiry Date" type="date">
                                an Amount of
                                (Amount in Figures)<input id="textInputFigs" required style="margin-top: 15px; width: 15%; border: none; border-bottom: 1px solid blue;" name="client_amount_figs" placeholder="Amount in Figures" type="text">, 
                                (Amount in Words)<input id="textInputWords" required style="margin-top: 15px; width: 50%; border: none; border-bottom: 1px solid blue;" name="client_amount_words" placeholder="Amount in Words" type="text">
                            </p>

                            <p>
                                <ul>
                                    <li>
                                        The Client agrees to facilitate the process of obtaining a work permit for <b><q><span id="textDisplaySecond"></span></q></b>  in <b><q><span id="selectedOptionText"></span></q></b>. 
                                    </li>
                                    
                                    <li>
                                        The work permit allows <b><q><span id="textDisplayThird"></span></q></b> to legally work in <b><q><span id="selectedOptionTextSecond"></span></q></b> for a period of 
                                        <input required style="margin-top: 15px; width: 20%; border: none; border-bottom: 1px solid blue;" name="client_amount_words" placeholder="One, two Etc" type="text"> year. 
                                    </li>
                                </ul>
                            </p>

                            <p class="py-3">
                                <b>Financial Considerations</b>
                            </p>

                            <p>
                                <ul>
                                    <li>
                                        The total cost of the work permit is agreed upon as <b><q><span id="textDisplayFigs"></span></q></b> (<b><q><span id="textDisplayWords"></span></q></b>).
                                    </li>
                                    
                                    <li>
                                        <b><q><span id="textDisplayFourth"></span></q></b> agrees to pay an initial amount of PKR = 600,000 (Six Lack Pakistani Rupees) as an advance payment before the work permit application process begins. 
                                    </li>
                                </ul>
                            </p>

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