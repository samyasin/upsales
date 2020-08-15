<?php 
include('connection.php');

$id = $_GET['id'];

$query = "delete from admin where admin_id = $id";

mysqli_query($conn,$query);

header("location:manage_admin.php");