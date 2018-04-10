<?php
include_once '../../connection/config.php';
include_once '../../include/methods.php';






$json = $_POST['jsonValue'];
$repname = $_POST['repname'];
$date = date("Y-m-d");
$route = $_POST['route'];
$vehicle = $_POST['vehicle'];





$someArray = json_decode($json, true);
$sizeArray = sizeof($someArray);



for($i=0; $i<$sizeArray; $i++){

    $itemName = $someArray[$i]["itemName"];
    $itemCode = $someArray[$i]["itemCode"];
    $qty = $someArray[$i]["qty"];
    $stk = $someArray[$i]["stk"];
    $qtty = $someArray[$i]["qtty"];



    $sqlToAdd = "UPDATE `stock` SET `quantity`='$stk' WHERE `item_name` = '$itemName';";

    $sqlToAddNewTable =
"INSERT INTO `daily_unload`(`rep_name`, `date`, `route`, `vehicle_no`, `item_no`, `item_name`, `systemqty`, `actualqty`) 
VALUES ('$repname','$date', '$route', '$vehicle', '$itemCode','$itemName','$qtty','$qty')";

    $sqlToDelete = "DELETE FROM `daily` WHERE  `item_name` = '$itemName' AND rep_name = '$repname';";




    $result = mysqli_query($conn, $sqlToAdd);
    $result2 = mysqli_query($conn,$sqlToAddNewTable);
    $result3 = mysqli_query($conn, $sqlToDelete);

   
}

?>



<script language="javascript" type="text/javascript">
    <?php
    if ($sqlToAdd && $sqlToDelete && $sqlToAddNewTable) {
    ?>
    alert("Action successfully performed.");
    <?php
    } else {
    ?>
    alert("Failed to perform action. Please try again later. <?php echo mysqli_error($conn); ?>");
    <?php
    }
    ?>
    window.location.href = 'unLoadVehicle.php';
</script>
