<?php 
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }
    include('../_partials/header.php');

    // Admin Counter

    $countedUser = mysqli_query($connect, "SELECT COUNT(*) AS countedUsers FROM `login_user`");
    $fetch_countedAllUsers = mysqli_fetch_assoc($countedUser);
    $Users = $fetch_countedAllUsers['countedUsers'];

    $countedUserAdmin = mysqli_query($connect, "SELECT COUNT(*) AS countedUserAdmin FROM `login_user` WHERE user_role = '1'");
    $fetch_countedAllAdmin = mysqli_fetch_assoc($countedUserAdmin);
    $Admin = $fetch_countedAllAdmin['countedUserAdmin'];

    $countedUserManagers = mysqli_query($connect, "SELECT COUNT(*) AS countedUserManagers FROM `login_user` WHERE user_role = '2'");
    $fetch_countedAllManagers = mysqli_fetch_assoc($countedUserManagers);
    $Managers = $fetch_countedAllManagers['countedUserManagers'];

    $countedUserExpenses = mysqli_query($connect, "SELECT COUNT(*) AS countedUserExpenses FROM `login_user` WHERE user_role = '3'");
    $fetch_countedAllExpenses = mysqli_fetch_assoc($countedUserExpenses);
    $Expenses = $fetch_countedAllExpenses['countedUserExpenses'];


    $countedCountires = mysqli_query($connect, "SELECT COUNT(*) AS countedCountires FROM `countries`");
    $fetch_countedCountires = mysqli_fetch_assoc($countedCountires);
    $Countries = $fetch_countedCountires['countedCountires'];

    $countedStudents = mysqli_query($connect, "SELECT COUNT(*) AS countedStudents FROM `study_client`");
    $fetch_countedStudents = mysqli_fetch_assoc($countedStudents);
    $Students = $fetch_countedStudents['countedStudents'];

    $countedWorkPermit = mysqli_query($connect, "SELECT COUNT(*) AS countedWorkPermit FROM `work_client`");
    $fetch_countedWorkPermit = mysqli_fetch_assoc($countedWorkPermit);
    $WorkPermit = $fetch_countedWorkPermit['countedWorkPermit'];

    // Front Desk

    $countedStudentsFD = mysqli_query($connect, "SELECT COUNT(*) AS countedStudents FROM `study_client` WHERE u_id = '$signedUserId'");
    $fetch_countedStudentsFD = mysqli_fetch_assoc($countedStudentsFD);
    $StudentsFD = $fetch_countedStudentsFD['countedStudents'];

    $countedWorkPermitFD = mysqli_query($connect, "SELECT COUNT(*) AS countedWorkPermit FROM `work_client` WHERE u_id = '$signedUserId'");
    $fetch_countedWorkPermitFD = mysqli_fetch_assoc($countedWorkPermitFD);
    $WorkPermitFD = $fetch_countedWorkPermitFD['countedWorkPermit'];

    // Expense counter

    date_default_timezone_set("Asia/Karachi");
    $todaysDate = date("Y-m-d");

    $expenseToday = mysqli_query($connect, "SELECT SUM(expense_amount)AS expenseAmount FROM `expenses` WHERE expense_date = '$todaysDate'");
    $fetch_expenseToday = mysqli_fetch_assoc($expenseToday);
    $expenseAmount = $fetch_expenseToday['expenseAmount'];
?>

        <div class="page-content-wrapper ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="page-title">Dashboard</h5>
                    </div>
                </div>

                <?php
                if ($userRole === '1') {
                ?>

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color:#DD4B39">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-users float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">All Users</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="font-size: 50px"><?php echo $Users ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color: #00A65A">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Admin</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="  font-size: 50px"><?php echo $Admin ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color:#00C0EF ">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Front Desk</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="font-size: 50px"><?php echo $Managers ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color: #F39C12">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase  mb-0"><Students>Expense Desk</Students></h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style=" font-size: 50px"><?php echo $Expenses  ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color:#DD4B39">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-flag float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Countries</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="font-size: 50px"><?php echo $Countries ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color: #00A65A">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Study Visa</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="  font-size: 50px"><?php echo $Students ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color:#00C0EF ">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Work Permit</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="font-size: 50px"><?php echo $WorkPermit ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color: #F39C12">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase  mb-0"><Students>Visitors Visa</Students></h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style=" font-size: 50px"><?php echo "0";  ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                }else if ($userRole === '2') {
                ?>

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color:#DD4B39">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-flag float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Countries</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="font-size: 50px"><?php echo $Countries ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color: #00A65A">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Study Visa</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="  font-size: 50px"><?php echo $StudentsFD ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color:#00C0EF ">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Work Permit</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="font-size: 50px"><?php echo $WorkPermitFD ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color: #F39C12">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase  mb-0"><Students>Visitors Visa</Students></h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style=" font-size: 50px"><?php echo "0";  ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <div class=" text-center">
                            <h3 align="center">Quick Access!</h3>
                            <hr />
                            <a href="work.php" class="btn btn-dark btn-lg py-4 px-5 m-3" style="font-size: 20px;">Work</a>
                            <a href="study.php" class="btn btn-dark btn-lg py-4 px-5 m-3" style="font-size: 20px;">Study</a>
                            <a href="#" class="btn btn-dark btn-lg py-4 px-5 m-3" style="font-size: 20px;">Visitor</a>
                        </div>
                    </div>
                </div>

                <?php
                }elseif ($userRole === '3') {
                ?>

                <!-- <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color:#DD4B39">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-users float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Countries</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="font-size: 50px"><?php echo $Countries ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color: #00A65A">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Study Visa</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="  font-size: 50px"><?php echo $StudentsFD ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color:#00C0EF ">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Work Permit</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="font-size: 50px"><?php echo $WorkPermitFD ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color: #F39C12">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-user float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase  mb-0"><Students>Visitors Visa</Students></h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style=" font-size: 50px"><?php echo "0";  ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->


                <div class="row">
                    <div class="col-md-6">
                        <div class=" text-center">
                            <!-- <h3 align="center">Quick Access!</h3> -->
                            <!-- <hr /> -->
                            <a href="expense_add.php" class="btn btn-dark btn-lg py-4 px-5 m-3" style="font-size: 20px; width: 50%">Add Expense</a><br>
                            <a href="report_custom.php" class="btn btn-dark btn-lg py-4 px-5 m-3" style="font-size: 20px; width: 50%">Custom Report</a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mini-stat m-b-30" style="background-color:#DD4B39">
                            <div class="p-3  text-white">
                                <div class="mini-stat-icon">
                                    <i class="fa fa-dollar float-right mb-0"></i>
                                </div>
                                <h6 class="text-uppercase mb-0">Today's Expense</h6>
                            </div>
                            <div class="card-body">
                                <div class="pb-4 text-center text-white">
                                    <span style="font-size: 50px">
                                        <?php

                                            if ($expenseAmount === 'NULL' or empty($expenseAmount)) {
                                                echo "Rs. 0";
                                            }else {
                                                echo "Rs. ".$expenseAmount;
                                            }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <?php include '../_partials/footer.php'; ?>

</div>
    <!-- End Right content here -->

</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/modernizr.min.js"></script>
<script src="../assets/js/detect.js"></script>
<script src="../assets/js/fastclick.js"></script>
<script src="../assets/js/jquery.slimscroll.js"></script>
<script src="../assets/js/jquery.blockUI.js"></script>
<script src="../assets/js/waves.js"></script>
<script src="../assets/js/jquery.nicescroll.js"></script>
<script src="../assets/js/jquery.scrollTo.min.js"></script>

<!-- skycons -->
<script src="../assets/plugins/skycons/skycons.min.js"></script>

<!-- skycons -->
<script src="../assets/plugins/peity/jquery.peity.min.js"></script>

<!--Morris Chart-->
<script src="../assets/plugins/morris/morris.min.js"></script>
<script src="../assets/plugins/raphael/raphael-min.js"></script>

<!-- dashboard -->
<script src="../assets/pages/dashboard.js"></script>

<!-- App js -->
<script src="../assets/js/app.js"></script>

<!-- <script>
    $(document).ready(function() {
        var colors = ["#385c78", "#9d302f", "#353535", "#ffec8a", "#1d2341", "#ff8585", "#ffec8a", "#d67223", "#857960"],
        selectedColor = colors[Math.floor(Math.random()*colors.length)]
        header = $("#footerCustomClass");



        header.css("background-color", selectedColor, " !important");
    });
</script> -->

</body>
</html>

  