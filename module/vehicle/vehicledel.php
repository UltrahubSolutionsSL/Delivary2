<?php
include("../../connection/config.php");
$id=$_GET['id'];
$query="DELETE FROM `vehicle` WHERE `vehicle`.`id` = '$id'";
$run=mysqli_query($conn,$query);
if($run){
   echo "<script>alert('Are you Sure??')</script>";
    echo "<meta http-equiv='refresh' content='0.1,url=addvehicle.php'>";
}







?>