<?php 
    include('../_stream/config.php');

    session_start();
    if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }


    $userNotUpdated = '';

    if (isset($_POST['addUser'])) {
        $name = $_POST['editName'];
        $email = $_POST['editEmail'];
        $password = $_POST['editPassword'];
        $contact = $_POST['edit_contact'];
        $role = $_POST['user_role'];

        $countQuery = mysqli_query($connect, "SELECT COUNT(*) AS countedUser FROM login_user WHERE `email` = '$email'");
        $fetch_countQuery = mysqli_fetch_assoc($countQuery);

        if ($fetch_countQuery['countedUser'] > 0) {
            $userNotUpdated = '<hr /><div class="alert alert-danger">User already added!</div>';
        }else {
            $addUser = mysqli_query($connect, "INSERT INTO login_user(`name`, `password`, `email`, `contact`, `user_role`)VALUES('$name', '$password', '$email', '$contact', '$role')");
            if (!$addUser) {
                $userNotUpdated = "<hr /><div class='alert alert-danger'>Failed to add a new user. Try Again!</div>";
            }else {
                header("LOCATION: user_list.php");
            }
        }
    }

    include('../_partials/header.php');

    if ($userRole === '1') {}else {echo "<script>window.location.href = 'accessDenied.php'</script>";}
?>
                <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="float-right page-breadcrumb">
                                    </div>
                                    <h5 class="page-title">Add User</h5>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <!-- <h4 class="mt-0 header-title">Heading</h4> -->
                                            <!-- <p class="text-muted m-b-30 font-14">Example Text</p> -->
            								<form method="POST">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="editName" placeholder="Name" required type="text" id="example-text-input">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-2 col-form-label">Contact</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" name="edit_contact" placeholder="Contact"  required id="example-email-input">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="editEmail" type="email" placeholder="Name@example.com" required id="example-email-input">
                                                </div>
                                            </div>

                                        
                                            <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="editPassword" id="pass2" class="form-control" required placeholder="Password"/>
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Role</label>
                                                    <div class="col-sm-10">
                                                        <select name="user_role" class="form-control comp" required>
                                                            <option value="1">Admin</option>
                                                            <option value="2">Front Desk</option>
                                                            <option value="3">Expense Desk</option>
                                                        </select>
                                                    </div>
                                            </div>

                                            <hr>

                                            <div class="form-group row">
                                                <label for="example-password-input" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                            <?php include '../_partials/cancel.php'; ?>
                                             <button type="submit" name="addUser" class="btn btn-primary waves-effect waves-light">Add User Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                        <h3 align="center"><?php echo $userNotUpdated ?></h3>
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
       

        <!-- App js -->
        <?php include('../_partials/app.php') ?>
        
        <script>
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

        <script type="text/javascript" src="../assets/js/select2.min.js"></script>
        <script type="text/javascript">
        $('.comp').select2({
            placeholder: 'Select an option',
            allowClear:true
        });
        </script>
    </body>
</html>