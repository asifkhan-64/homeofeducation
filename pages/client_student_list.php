<?php
    include('../_stream/config.php');
    session_start();
    if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    include('../_partials/header.php');
?>

<style>
    .customBtn {
        transition-property: box-shadow, font-family, font-size;
        transition-duration: 1s;
    }
    .customBtn:hover {
        box-shadow: 3px 3px 3px 3px #ccc;
        transition-duration: 0.5s;
        font-size: 16px;
    }
    </style>

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>

            <div class="col-sm-2 my-4">
                <a href="client_list.php" style="width: 100% !important; padding: 15%;" class="customBtn btn btn-secondary btn-lg">Work</a>
            </div>

            <div class="col-sm-2 my-4">
                <a href="client_student_list.php" style="width: 100% !important; padding: 15%;" class="customBtn btn btn-success btn-lg">Study <i class="fa fa-eye"></i></a>
            </div>

            <div class="col-sm-2 my-4">
                <a href="client_visit_list.php" style="width: 100% !important; padding: 15%;" class="customBtn btn btn-dark btn-lg">Visitors</a>
                <!-- <a href="client_visit_list.php" disabled style="width: 100% !important; padding: 15%;" class="customBtn btn btn-dark btn-lg">Visitors</a> -->
            </div>

            <div class="col-sm-3"></div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Clients List (Study/Student)</h4>
                       
                        <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Guardian</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Country</th>
                                    <th class="text-center"> <i class="fa fa-edit"></i></th>
                                    <th class="text-center"> <i class="fa fa-print"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $retClients = mysqli_query($connect, "SELECT study_client.*, countries.country_name FROM `study_client`
                                INNER JOIN countries ON countries.c_id = study_client.client_country
                                WHERE study_client.u_id = '$signedUserId'");
                                $iteration = 1;

                                while ($rowClients = mysqli_fetch_assoc($retClients)) {
                                    echo '
                                    <tr>
                                        <td>'.$iteration++.'</td>
                                        <td>'.$rowClients['client_name'].'</td>
                                        <td>'.$rowClients['client_guardian'].'</td>
                                        <td>'.$rowClients['client_address'].'</td>
                                        <td>'.$rowClients['client_contact'].'</td>
                                        <td>'.$rowClients['country_name'].'</td>
                                        <td class="text-center"><a href="client_study_edit.php?id='.$rowClients['s_id'].'" type="button" class="btn text-white btn-warning waves-effect waves-light">Edit</a></td>
                                        <td class="text-center"><a href="client_work_agreement.php?id='.$rowClients['s_id'].'" type="button" class="btn text-white btn-success waves-effect waves-light">Agreement</a></td>
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