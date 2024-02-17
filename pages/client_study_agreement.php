<?php
    include('../_stream/config.php');

    session_start();
    if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }
    $id = $_GET['id'];

    $WorkClients = mysqli_query($connect, "SELECT study_client.*, countries.country_name FROM `study_client`
                                INNER JOIN countries ON countries.c_id = study_client.client_country WHERE study_client.s_id = '$id'");
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

    p, #customIdForLi {
        font-size: 12px;
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
                                        <h6 style="font-size: 100%;" class="m-t-0 text-center">
                                            Agreement <br><br> PAK <img src="../assets/flight.png" width="3%"> <?php echo $WorkClientsFetch['country_name'] ?><br>
                                        </h6>
                                    </div>

                                    <p >
                                        <b>
                                            This agreement done between HOME OF EDUCATION CONSULTANTS PVT.LTD and Mr. <?php echo $WorkClientsFetch['client_name'] ?> S/O <?php echo $WorkClientsFetch['client_guardian'] ?> Resident of <?php echo $WorkClientsFetch['client_address'] ?> (<?php echo $WorkClientsFetch['client_contact'] ?>).
                                        </b>
                                    </p>

                                    <p style="margin: 0% !important">
                                        <b>Following are the points of agreement for <q><?php echo $WorkClientsFetch['country_name'] ?></q> Study Visa Education Admission and Application Process.</b>
                                    </p>

                                    <?php
                                        $currentDate = $WorkClientsFetch['auto_date'];
                                        $date = substr($currentDate, 0 , 10);
                                    ?>

                                    <p>
                                        <ul>
                                            <li id="customIdForLi">
                                                This Application is on done base which will cost <b>Mr. <?php echo $WorkClientsFetch['client_name'] ?></b> Passport Number: <?php echo $WorkClientsFetch['client_passportno'] ?> Expiry Date: <?php echo $WorkClientsFetch['client_passportexpiry'] ?> an Amount of <?php echo $WorkClientsFetch['client_amountfig'] ?> (<?php echo $WorkClientsFetch['client_amountwords'] ?>).
                                            </li>

                                            <li id="customIdForLi">
                                                The client will pay Tuition fee by himself. In cuse of refusal the tuition fees will be refund in <?php echo $WorkClientsFetch['client_refund'] ?>.
                                            </li>
                                            
                                            <li id="customIdForLi">
                                                <b>Mr. <?php echo $WorkClientsFetch['client_name'] ?></b> will pay their tuition fee in Advance <b><?php echo $WorkClientsFetch['client_advance'] ?>/- (<?php echo $WorkClientsFetch['client_advancewords'] ?>)</b> to start his visa Admission and Application process. 
                                            </li>
                                            
                                            <li id="customIdForLi">
                                                Home of Education Consultants will complete <b>Mr. <?php echo $WorkClientsFetch['client_name'] ?></b> Admission in <?php echo $WorkClientsFetch['client_processtime'] ?> from today (<?php echo $date ?>).
                                            </li>

                                            <li id="customIdForLi">
                                                <b>Mr. <?php echo $WorkClientsFetch['client_name'] ?></b> will be responsible for all his academic documents and Bank statement if found fake or bogus. Bank Statement  <?php echo $WorkClientsFetch['client_bankstatement'] ?>
                                            </li>
                                            
                                            <li id="customIdForLi">
                                                Mr. Hazrat Bilal will pay their finger print medical fee & Embassy fees which is non-refundable.
                                            </li>
                                            
                                            <li id="customIdForLi">
                                                The client will pay will pay <?php echo $WorkClientsFetch['client_amountafter'] ?> after visa.
                                            </li>
                                        </ul>
                                    </p>

                                </div>   
                            </div>
                                    <!-- Data Table here -->
                                    <div class="row" style="margin-top: 25%">
                                        <div class="col-6">
                                            <p>
                                                <b><?php echo $WorkClientsFetch['client_name'] ?> S/O <?php echo $WorkClientsFetch['client_guardian'] ?></b>
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