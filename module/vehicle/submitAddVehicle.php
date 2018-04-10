<?php
include_once '../../connection/config.php';

$brand = $_POST['brand'];
$model = $_POST['model'];
$number = $_POST['number'];
$type = $_POST['type'];

$sql = "INSERT INTO `vehicle`(`brand`, `model`, `number`, `type`) VALUES ('$brand','$model','$number','$type') ";

mysqli_query($conn,$sql);

header("Location: addvehicle.php");


?>
