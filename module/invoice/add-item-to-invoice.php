<?php
// Db connection
include_once '../../connection/config.php';

// Initialize variables
$i_i_id = $item_name = $current_price = $ava_quantity = $description = $expire_date = $quantity = $price = "";

// Get data from the get request
$i_i_id = $_GET['i_i_id'];
$item_name = $_GET['item_name'];
$current_price = $_GET['current_price'];
$ava_quantity = $_GET['ava_quantity'];
$description = $_GET['description'];
$expire_date = $_GET['expire_date'];
$quantity = $_GET['quantity'];
$price = $_GET['price'];

// Insert into the Db
$sql = "INSERT INTO invoice_item VALUES ('$i_i_id', '$item_name', $current_price, $ava_quantity, '$description', '$expire_date', $quantity, $price)";
$result = mysqli_query($conn, $sql);
?>


<!--Alert and redirect-->
<script language="javascript" type="text/javascript">
    <?php
    if ($result) {
    ?>
    alert("Action successfully performed.");
    <?php
    } else {
    ?>
    alert("Failed to perform action. Please try again later.");
    <?php
    }
    ?>
    window.location.href = 'shop-management.php';
</script>
