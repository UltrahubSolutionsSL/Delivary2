<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nishen Peiris
 * Date: 3/18/18
 * Time: 2:19 PM
 */
// Db connection
include_once '../../connection/config.php';

// Retrieve data from the post request
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$id = $_POST['l_id'];

if ($password != $re_password) {
    ?>
    <script language="javascript" type="text/javascript">
        alert("There passwords don't match. Please try again?");
        window.location.href = "profile-management.php";
    </Script>
    <?php
}

$sql = "UPDATE login SET password = '$password' WHERE l_id = '$id'";

$result = mysqli_query($conn, $sql);
?>

<!--Alert and redirect-->
<script language="javascript" type="text/javascript">
    <?php
    if ($result) {
    ?>
    alert("Password reset succeeded.");
    <?php
    } else {
    ?>
    alert("Failed to perform action. Please try again later. <?php echo mysqli_error($conn); ?>");
    <?php
    }
    ?>
    window.location.href = 'profile-management.php';
</script>