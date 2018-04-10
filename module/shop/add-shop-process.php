<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nishen Peiris
 * Date: 3/2/18
 * Time: 6:30 PM
 */
// Db connection
include_once '../../connection/config.php';

// Retrieve data from the post request
$shop_name = $_POST['shop_name'];
$shop_location = $_POST['shop_location'];
$shop_number = $_POST['shop_number'];
$shop_owner = $_POST['shop_owner'];
$comment = $_POST['comment'];
$route_id = $_POST['route_id'];
$new_route = $_POST['new_route'];
$update = $_POST['update'];
$shop_contact=$_POST['shop_contact'];// distinguish between add and update

if (!$update) {
    // If the route is a new route, then add if first to the route relation
    if ($new_route != '') {
        $sql_insert_into_route = "INSERT INTO route (route) VALUES ('$new_route');";
        $result = mysqli_query($conn, $sql_insert_into_route);
        if (!$result) {
            ?>
            <script language="javascript" type="text/javascript">
                alert("Failed to perform action. Please try again later. <?php echo mysqli_error($conn); ?>");
            </script>
            <?php
        }
        $route_id = mysqli_insert_id($conn);
    }
    $sql = "INSERT INTO shops VALUES  ('$shop_name','$shop_number', '$shop_location', '$shop_owner', '$comment','$shop_contact', $route_id);";
} else {
    $old_shop_number = $_POST['old_shop_number'];
    $sql = "UPDATE shops SET shop_name = '$shop_name', shop_no = '$shop_number', location = '$shop_location', owner = '$shop_owner', comment = '$comment', shop_contact = '$shop_contact', route_id = $route_id WHERE shop_no = '$old_shop_number';";
}
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
    alert("Failed to perform action. Please try again later. <?php echo mysqli_error($conn); ?>");
    <?php
    }
    ?>
    window.location.href = 'shop-management.php';
</script>