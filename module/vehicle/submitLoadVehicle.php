<?php
include_once '../../connection/config.php';
include_once '../../include/methods.php';

$json = $_POST['jsonValue'];

echo $json;
$someArray = json_decode($json, true);
$sizeArray = sizeof($someArray);



 for($i=0; $i<$sizeArray; $i++){
	 
 $itemName = $someArray[$i]["name"];
 $itemQty = $someArray[$i]["qty"];
 //$itemTotal = $someArray[$i]["total"];
 $item_code = $someArray[$i]["itemCode"];
// $itemCode = $someArray[$i]["code"];
     $price = $someArray[$i]["iprice"];

     $remain = $someArray[$i]["remain"];
     echo $remain;

$rep_name = $_POST['rep_name'];
$date = $_POST['date'];
$route = $_POST['route'];
$vehicle_no = $_POST['vehicle_no'];




$sqlToAdd = "INSERT INTO `daily`(rep_name, `date`, route, vehicle_no, item_no, item_name, qty,price)
     VALUES ('$rep_name','$date','$route','$vehicle_no','$item_code','$itemName','$itemQty','$price');";

//('$rep_name','$date', '$time', '$route', '$vehicle_no');";
$result = mysqli_query($conn, $sqlToAdd);

$sqlToUpdate = "UPDATE `stock` SET `quantity` = '$remain' WHERE `item_code` = '$item_code'; ";
$result2 = mysqli_query($conn,$sqlToUpdate);

//$sql2 = "INSERT INTO daily_stock (name, qty,total) VALUES ('".$itemName."','".$itemQty."','".$itemTotal."');";	  
//
//mysqli_query($conn, $sql2 );
	 
 }


$sqlToDeletedItems = "DELETE FROM `daily` WHERE `item_name`='Deleted'";
$resultDeleted = mysqli_query($conn,$sqlToDeletedItems);


?>
<script language="javascript" type="text/javascript">
    <?php
    if ($sqlToAdd) {
    ?>
    alert("Action successfully performed.");
    <?php
    } else {
    ?>
    alert("Failed to perform action. Please try again later. <?php echo mysqli_error($conn); ?>");
    <?php
    }
    ?>
window.location.href = 'loadVehicle.php';
</script>
