<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nishen Peiris
 * Date: 3/2/18
 * Time: 6:30 PM
 */
// Db connection
include_once '../../connection/config.php';

// Retrieve data from the get request
$shop_no = $_GET['shop_no'];

$sql = "DELETE FROM shops WHERE shop_no = '$shop_no';";
$result = mysqli_query($conn, $sql);
?>

<!--Alert and redirect-->
<script language="javascript" type="text/javascript">
    <?php
    if ($result) {
    ?>
    alert("Shop successfully deleted.");
    <?php
    } else {
    ?>
    alert("Failed to delete shop. Please try again later.");
    <?php
    }
    ?>
    window.location.href = 'shop-management.php';
</script>