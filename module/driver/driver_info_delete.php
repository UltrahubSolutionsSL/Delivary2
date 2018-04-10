<?php

include("../../connection/config.php");
$nic=$_GET[nic];

$query="DELETE FROM `drivers` WHERE `nic`='$nic'";
$run=mysqli_query($conn,$query);
if($run){
//echo "<script>alert('OK!!!')<script>";
//header("location:../driver/driver-management.php");
echo "<meta http-equiv='refresh' content='0.001,url=../driver/driver-management.php'>";
}

?>