<?php 
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }
    include('../_partials/header.php');

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

    // $countedWards = mysqli_query($connect, "SELECT COUNT(*) AS countedWards FROM `wards`");
    // $fetch_countedAllWards = mysqli_fetch_assoc($countedWards);
    // $Wards = $fetch_countedAllWards['countedWards'];

    // $countedTechnologies = mysqli_query($connect, "SELECT COUNT(*) AS countedTechnologies FROM `technology`");
    // $fetch_countedTechnologies = mysqli_fetch_assoc($countedTechnologies);
    // $Tech = $fetch_countedTechnologies['countedTechnologies'];
    
    // $countedStudents = mysqli_query($connect, "SELECT COUNT(*) AS countedStudents FROM `students`");
    // $fetch_countedStudents = mysqli_fetch_assoc($countedStudents);
    // $Std = $fetch_countedStudents['countedStudents'];


    // $approvedProducts = mysqli_query($connect, "SELECT COUNT(*) AS approvedProducts FROM `stock_add` WHERE mobile_status = '1' AND mobile_imei = '1'");
    // $fetch_approvedProducts = mysqli_fetch_assoc($approvedProducts);
    // $approved = $fetch_approvedProducts['approvedProducts'];

    // $nonApprovedProducts = mysqli_query($connect, "SELECT COUNT(*) AS nonApprovedProducts FROM `stock_add` WHERE mobile_status = '1' AND mobile_imei = '2'");
    // $fetch_nonApprovedProducts = mysqli_fetch_assoc($nonApprovedProducts);
    // $nonApproved = $fetch_nonApprovedProducts['nonApprovedProducts'];

    // $imeiChange = mysqli_query($connect, "SELECT COUNT(*) AS imeiChange FROM `stock_add` WHERE mobile_status = '1' AND mobile_imei = '3'");
    // $fetch_imeiChange = mysqli_fetch_assoc($imeiChange);
    // $changeProducts = $fetch_imeiChange['imeiChange'];

?>

        <div class="page-content-wrapper ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="page-title">Dashboard</h5>
                    </div>
                </div>

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

  