<?php
include('header.php');
include('connection.php');

if(isset($_POST['submit'])){
    // get data from Form
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $admin_fullname = $_POST['fullname'];
    
    
    $query = "insert into admin(admin_email,admin_password,fullname) 
              values('$admin_email','$admin_password','$admin_fullname')";
echo $query;
    //mysqli_query($conn,$query);

}
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
                                            <h3 class="text-center title-2">Create New Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                                <input name="admin_email" type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Password</label>
                                                <input name="admin_password" type="password" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Fullname</label>
                                                <input name="fullname" type="text" class="form-control" >
                                            </div>
                                            
                                            
                                            
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                    Create
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row m-t-30">
                            <div class="col-md-12" id="table-data">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Email</th>
                                                <th>Fullname</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query  = "select * from admin";
                                            $result = mysqli_query($conn,$query);
                                            while($admin  = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$admin['admin_id']}</td>";
                                                echo "<td>{$admin['admin_email']}</td>";
                                                echo "<td>{$admin['fullname']}</td>";
                                                echo "<td><a href='edit_admin.php?id={$admin['admin_id']}' class='btn btn-warning'>Edit</a></td>";
                                                echo "<td><a href='delete_admin.php?id={$admin['admin_id']}' class='btn btn-danger'>Delete</a></td>";
                                                echo "</tr>";
                                            }
                                             ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
<?php include('footer.php'); ?>
            
