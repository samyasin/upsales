<?php 
$conn = mysqli_connect("localhost","root","","upsales");
    if(!$conn){
        die("cannot connect to server");
    }