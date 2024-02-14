<?php
    include('../_stream/config.php');

    session_start();
    if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }
    $id = $_GET['id'];

    $WorkClients = mysqli_query($connect, "SELECT work_client.*, countries.country_name FROM `work_client`
                                INNER JOIN countries ON countries.c_id = work_client.client_country WHERE work_client.w_id = '$id'");
    $WorkClientsFetch = mysqli_fetch_assoc($WorkClients);

    include '../_partials/header.php';

?>
<style type="text/css">
    body, td {
        color: black;
    }
    
    table {
        font-size: 13px;
    }

    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }

    p, li {
        font-size: 11px;;
    }
    
    /*.table-responsive {*/
    /*    line-height: 3px;*/
    /*}*/
</style>
<div class="page-content-wrapper " >
    <div class="container-fluid"><br>
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title d-inline">Agreement Print</h5>
                <a type="button" href="#" id="printButton"   class="btn btn-success waves-effect waves-light float-right btn-lg mb-3"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
        <!-- end row -->
        <div class="row" id="printElement">
            <div class="col-12">
                <!-- <div class="card m-b-30" > -->
                    <!-- <div class="card-body" > -->
                        <form method="POST">
                            <div class="row">
                                <div class="col-12" style="margin-top: 22%;">
                                    <div class="invoice-title">
                                        <h6 style="font-size: 90%;" class="m-t-0 text-center">
                                            Agreement
                                        </h6>
                                    </div>

                                    <p>
                                        <b>
                                            This agreement done between HOME OF EDUCATION CONSULTANTS PVT.LTD and Mr. <?php echo $WorkClientsFetch['client_name'] ?> S/O <?php echo $WorkClientsFetch['client_guardian'] ?> Resident of <?php echo $WorkClientsFetch['client_address'] ?> (<?php echo $WorkClientsFetch['client_contact'] ?>).
                                        </b>
                                    </p>

                                    <p style="margin: 0% !important">
                                        <b>Following are the points of agreement for <q><?php echo $WorkClientsFetch['country_name'] ?></q> Work Permit and Application Process.</b>
                                    </p>

                                    <p>
                                        This Application will cost <b>Mr. <?php echo $WorkClientsFetch['client_name'] ?></b> Passport Number: <?php echo $WorkClientsFetch['client_passportno'] ?> Expiry Date: <?php echo $WorkClientsFetch['client_passportexpiry'] ?> an Amount of <?php echo $WorkClientsFetch['client_amountfig'] ?> (<?php echo $WorkClientsFetch['client_amountwords'] ?>).
                                    
                                        <ul>
                                            <li style="margin-top: -2% !important">
                                                The Client agrees to facilitate the process of obtaining a work permit for <b><?php echo $WorkClientsFetch['client_name'] ?></b> in <b><?php echo $WorkClientsFetch['country_name'] ?></b>. 
                                            </li>
                                            
                                            <li>
                                                The work permit allows <b><?php echo $WorkClientsFetch['client_name'] ?></b> to legally work in <b><?php echo $WorkClientsFetch['country_name'] ?></b> for a period of <?php echo $WorkClientsFetch['client_permitduration'] ?>. 
                                            </li>
                                        </ul>
                                    </p>

                                    <p style="margin: 0% !important">
                                        <b>Financial Considerations:</b>
                                    
                                        <ul>
                                            <li>The total cost of the work permit is agreed upon as <?php echo $WorkClientsFetch['client_amountfig'] ?> (<?php echo $WorkClientsFetch['client_amountwords'] ?>).</li>
                                            <li><b><?php echo $WorkClientsFetch['client_name'] ?></b> agrees to pay an initial amount of <?php echo $WorkClientsFetch['client_advance'] ?> as an advance payment before the work permit application process begins.</li>
                                            <li>After the successful acquisition of the work permit, <b><?php echo $WorkClientsFetch['client_name'] ?></b> will pay the remaining amount of <?php echo $WorkClientsFetch['client_remaining'] ?> to the Home of education Consultants. </li>
                                            <li>All payments shall be made in accordance with the payment schedule agreed upon by both parties.</li>
                                        </ul>
                                    </p>

                                    <p style="margin: 0% !important">
                                        <b>Terms and Conditions:</b>
                                    </p>

                                    <?php
                                        $currentDate = $WorkClientsFetch['auto_date'];
                                        $date = substr($currentDate, 0 , 10);
                                    ?>

                                    <!-- <p> -->
                                        <ul style="margin-top: -1;">
                                            <li>
                                                Home of Education Consultants will complete <b>Mr. <?php echo $WorkClientsFetch['client_name'] ?></b> Process in <?php echo $WorkClientsFetch['client_processtime'] ?> from today <?php echo $date ?> to embassy.
                                            </li>

                                            <li>
                                                <b><?php echo $WorkClientsFetch['client_name'] ?></b> understands that the work permit is valid for <?php echo $WorkClientsFetch['client_permitduration'] ?> and does not guarantee employment.
                                            </li>

                                            <li>
                                                The Client will provide reasonable assistance and guidance to <b><?php echo $WorkClientsFetch['client_name'] ?></b> during the work permit application process. 
                                            </li>

                                            <li>
                                                The Client shall not be held responsible for any delays or denials in the work permit issuance caused by factors beyond their control, including but not limited to government regulations or changes in immigration policies. 
                                            </li>

                                            <li>
                                                <b><?php echo $WorkClientsFetch['client_name'] ?></b> agrees to provide all necessary documents and information required for the work permit application process promptly.
                                            </li>

                                            <li>
                                                <b><?php echo $WorkClientsFetch['client_name'] ?></b> acknowledges that the work permit is non-transferable and is exclusively for his personal use.
                                            </li>
                                        </ul>
                                    <!-- </p> -->

                                    <!-- Data Table here -->
                                    <div class="row mt-5">
                                        <div class="col-6">
                                             <p>
                                                <b><?php echo $WorkClientsFetch['client_name'] ?> S/O <b><?php echo $WorkClientsFetch['client_guardian'] ?></b></b>
                                            </p>  
                                            
                                            <p>
                                                <b>
                                                    CNIC No: <?php echo $WorkClientsFetch['client_cnic'] ?>
                                                </b>

                                                <span style="padding-left: 15%;"><b>Signature</b></span>
                                            </p>
                                        </div>
                                        
                                        <div class="col-6 text-right">
                                             <p><b>
                                                HOME OF EDUCATION CONSULTANTS (PVT.LTD)
                                            </b></p>
                                        </div>
                                    </div> <!-- end row -->

                                </div>
                            </div>
                            </form>
                    <!-- </div> -->
                <!-- </div>  -->
            </div> <!-- end row -->
        </div><!-- container fluid -->
    </div> <!-- Page content Wrapper -->
</div> <!-- content -->
<?php include '../_partials/footer.php'?>
</div>
<!-- End Right content here -->
</div>
<!-- END wrapper -->
<!-- jQuery  -->
<?php include '../_partials/jquery.php'?>
<!-- App js -->
<?php include '../_partials/app.php'?>
<?php include '../_partials/datetimepicker.php'?>
<script type="text/javascript" src="../assets/js/select2.min.js"></script>

<script type="text/javascript" src="../assets/print.js"></script>

<script type="text/javascript">
    function print() {
        printJS({
        printable: 'printElement',
        type: 'html',
        targetStyles: ['*']
     })
    }

    document.getElementById('printButton').addEventListener ("click", print);
</script>
</body>
</html>12