<?php
    include('../_stream/config.php');
    session_start();
    if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $dateFrom = $_GET['dateFrom'];
    $dateTo = $_GET['dateTo'];




    include('../_partials/header.php');
?>
<style type="text/css">
    body, td {
        color: black;
    }
    
    table {
        font-size: 12px !important;
    }

    /* .teext {
        font-size: 10px !important;
    } */
    
    /* .listViewClass {
        font-size: 10px !important;
        margin-top: -5px;
        margin-bottom: -5px;
    } */

    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto; line-height: 0.00000000001 !important }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
    
    /*.table-responsive {*/
    /*    line-height: 3px;*/
    /*}*/
</style>

<div class="page-content-wrapper " >
    <div class="container-fluid"><br>
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title d-inline">Expense Print</h5>
                <a type="button" href="#" id="printButton" class="btn btn-success waves-effect waves-light float-right btn-lg mb-3"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
        <!-- end row -->
        
        <div class="row" id="printElement">
            <div class="col-12">
                <p align="center" style="font-size: 14px !important; line-height: 0.6rem !important; line-height: 0.6rem !important; margin-bottom: 0.1rem;"><b>Home of Education Consultant, Swat.</b></p>
                <hr />
                <div class="row">
                    
                    <div class="col-md-12 text-right">
                        <b>
                            <p style="font-size: 12px !important;">Date: 
                                <?php
                                    echo $dateFrom . " <b> / </b>" . $dateTo;
                                ?>
                            </p>
                        </b>
                    </div>
                </div>

                <!-- <div class="card-body"> -->
                    <table id="datatables" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Expense Description</th>
                                <th>Expense Date</th>
                                <th>Expense Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $query = mysqli_query($connect, "SELECT * FROM expenses WHERE expense_date BETWEEN '$dateFrom' AND '$dateTo'");                            
                            $iteration = 1;

                            $totalAmount = 0;

                            while ($rowExpense = mysqli_fetch_assoc($query)) {
                                echo '
                                    <tr>
                                        <td>'.$iteration++.'.</td>
                                        <td>'.$rowExpense['expense_desc'].'</td>
                                        <td>'.$rowExpense['expense_date'].'</td>
                                        <td>Rs. '.$rowExpense['expense_amount'].'</td>
                                    </tr>
                                    ';

                                    $amount = $rowExpense['expense_amount'];
                                    $amountExpenseAll = $totalAmount + $amount;
                                }

                                echo '
                                    <tr style="border-top: 2px solid black">
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><b>Total: </b></td>
                                        <td><b>Rs. '.$amountExpenseAll.'</b></td>
                                    </tr>
                                ';


                            ?>
                        </tbody>
                    </table>
                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
</div>
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
</html>