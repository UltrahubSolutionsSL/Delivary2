<?php
include_once '../../connection/config.php';
$id = $_POST['vid'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$number = $_POST['number'];
$type = $_POST['type'];

$sql = "UPDATE `vehicle` SET `brand`='$brand',`model`='$model',`number`='$number',`type`='$type' WHERE id = '$id'";

mysqli_query($conn,$sql);

header("Location: addvehicle.php");


?>
