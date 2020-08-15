<?php 
ob_start();
include('header.php');
include('connection.php');

if(isset($_POST['submit'])){
    // get data from Form
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $fullname = $_POST['fullname'];
    
    
    $query = "update admin set admin_email = '$admin_email',
                               admin_password = '$admin_password',
                               fullname = '$fullname'
                               where admin_id = {$_GET['id']}";

    mysqli_query($conn,$query);

    header("location:manage_admin.php");

}

$query  = "select * from admin where admin_id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
$admin  = mysqli_fetch_assoc($result);

 ?>
 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                                <input name="admin_email" type="text" class="form-control" value="<?php echo $admin['admin_email'] ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Password</label>
                                                <input name="admin_password" type="password" class="form-control" value="<?php echo $admin['admin_password'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Fullname</label>
                                                <input name="fullname" type="text" class="form-control" value="<?php echo $admin['fullname'] ?>">
                                            </div>
                                            
                                            
                                            
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                    </div>
                    </div>
                </div>
<?php include('footer.php'); ?>
            
