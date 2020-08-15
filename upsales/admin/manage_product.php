<?php
include('header.php');
include('connection.php');

if(isset($_POST['submit'])){

    // upload file 
   // echo '<pre>';
   // print_r($_FILES);
    $image_name = $_FILES['image']['name'];
    $tmp_name   =  $_FILES['image']['tmp_name'];
    $path       = 'images/';

    move_uploaded_file($tmp_name, $path.$image_name);


    // get data from Form
    $pro_name  = $_POST['name'];
    $pro_price = $_POST['price'];
    $pro_desc  = $_POST['desc'];
    $cat_id    = $_POST['cat_id'];
    
    $query = "insert into product(product_name,product_price,product_desc,product_image,cat_id)
            values('$pro_name',$pro_price,'$pro_desc','$image_name',$cat_id)";
echo $query;
    mysqli_query($conn,$query);

}
 ?>
 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Products</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create New Product</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input name="name" type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">image</label>
                                                <input name="image" type="file" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">price</label>
                                                <input name="price" type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">desc</label>
                                                <textarea name="desc"  type="text" class="form-control" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category ID</label>
                                                <input type="text" class="form-control" name="cat_id"> 
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
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query  = "select * from product";
                                            $result = mysqli_query($conn,$query);
                                            while($admin  = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$admin['product_id']}</td>";
                                                echo "<td>{$admin['product_name']}</td>";
                                                echo "<td>{$admin['product_price']}</td>";
                                                echo "<td><img src='images/{$admin['product_image']}' width='100' height='100'></td>";
                                                echo "<td><a href='edit_admin.php?id={$admin['product_id']}' class='btn btn-warning'>Edit</a></td>";
                                                echo "<td><a href='delete_admin.php?id={$admin['product_id']}' class='btn btn-danger'>Delete</a></td>";
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
            
