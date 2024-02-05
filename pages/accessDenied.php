<?php
    include('../_stream/config.php');
    session_start();
    if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    include('../_partials/header.php');
?>
<style>
#blink_text{	
  animation-name:blink;
  width:100%;
  animation-duration:2s;
  animation-timing-function:ease-in;
  animation-iteration-count:Infinite;
  }

@keyframes blink{
  0%{color:red;}
  50%{color:white;}
  100%{color:red;}
  }
</style>

<div class="page-content-wrapper ">
    <div class="container-fluid py-5">
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body text-center">
                        <h3 id="blink_text" align="center">Access Denied!</h3>
                        <img src="../assets/1000.png" class="img img-responsive" width="25%" alt="">
                       <h3>You don't have access to this module!</h3> <hr />
                       <h3>Thank You</h3>
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
</body>

</html>