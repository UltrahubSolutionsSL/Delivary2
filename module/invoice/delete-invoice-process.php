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
$invoice_no = $_GET['invoice_no'];

$sql = "DELETE FROM invoice_bill WHERE i_b_id = '$invoice_no';";
$result = mysqli_query($conn, $sql);
?>

<!--Alert and redirect-->
<script language="javascript" type="text/javascript">
    <?php
    if ($result) {
    ?>
    alert("Invoice successfully deleted.");
    <?php
    } else {
    ?>
    alert("Failed to delete Invoice. Please try again later.");
    <?php
    }
    ?>
    window.location.href = 'invoice-management.php';
</script>