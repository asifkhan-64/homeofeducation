<?php
    include('../_stream/config.php');
    session_start();
    if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    include('../_partials/header.php');

    if ($userRole === '1') {}else {echo "<script>window.location.href = 'accessDenied.php'</script>";}
?>

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title">Users</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Users List</h4>
                       
                        <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th class="text-center"> <i class="fa fa-edit"></i>
                                    <!-- <th class="text-center"> <i class="fa fa-envelop"></i> -->
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $retUsers = mysqli_query($connect, "SELECT * FROM `login_user`");

                                $iteration = 1;

                                while ($rowUsers = mysqli_fetch_assoc($retUsers)) {
                                    echo '
                                    <tr>
                                        <td>'.$iteration++.'</td>
                                        <td>'.$rowUsers['name'].'</td>
                                        <td>'.$rowUsers['email'].'</td>
                                        <td>'.$rowUsers['contact'].'</td>';

                                        if ($rowUsers['user_role'] === '1') {
                                            echo '<td>Admin</td>';    
                                        }elseif ($rowUsers['user_role'] === '2') {
                                            echo '<td>Front Desk</td>';    
                                        }elseif ($rowUsers['user_role'] === '3') {
                                            echo '<td>Expense Desk</td>';    
                                        }

                                        if ($rowUsers['status'] === '1') {
                                            echo '<td>Active</td>';    
                                        }elseif ($rowUsers['status'] === '0') {
                                            echo '<td>De-Active</td>';    
                                        }

                                        echo '
                                        <td class="text-center"><a href="user_edit.php?id='.$rowUsers['id'].'" type="button" class="btn text-white btn-warning waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
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