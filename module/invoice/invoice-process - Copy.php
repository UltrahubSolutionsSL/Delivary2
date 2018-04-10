<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nishen Peiris
 * Date: 3/3/18
 * Time: 11:30 AM
 */
// Db connection
include_once '../../connection/config.php';

// Retrieve data from the post request
$invoice_id = $_POST['invoice_id'];
$issue_no = $_POST['issue_no'];
//$order_no = $_POST['order_no'];
$vehicle_no = $_POST['vehicle_no'];
$shop_no = $_POST['shop_number'];
$shop_name = $_POST['shop_name'];
$driver_name = $_POST['driver_name'];
$date = $_POST['date'];
$time = $_POST['time'];
$route_id = $_POST['route'];
$total = $_POST['total'];
$discount = $_POST['name_discount'];
//$dis_amount = $_POST['dis_amount'];
//$pay_amount = $_POST['payment'];
$payment = $_POST['payment'];
$balance = $_POST['balance'];

$paymentmethod = $_POST['paymentmethod'];
$paymenttype = $_POST['paymenttype'];
$bank = $_POST['bank'];
$chequeno= $_POST['chequeno'];
//$chequedate = $_POST['chequedate'];
$comment = $_POST['comment'];



$sql1 = "INSERT INTO `invoice`(`issue_no`,`vehicle_no`, `shop_no`, `shop_name`, `driver_name`, `date`,`time`,`route_id`,`type`) 
VALUES ('$issue_no','$vehicle_no','$shop_no','$shop_name','$driver_name','$date','$time','$route_id','$paymenttype');";

//$sql2 = "INSERT INTO invoice_bill (i_b_id, total, payment, balance) VALUES ('$invoice_id', $total, $payment, $balance);";

$sql2 = "INSERT INTO `payment`(`date`, `invoiceno`, `paymenytype`, `paymentmethod`, `billamount`, `paymentamount`, `balance`, `chequeno`, `bank`, `status`, `comment`,`shop_name`,`shop_no`,`rep_name`) VALUES 
('$date','$invoice_id','$paymenttype','$paymentmethod','$total','$payment','$balance','$chequeno','$bank','active','$comment','$shop_name','$shop_no','$driver_name')";

$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

$json = $_POST['jsonValue'];
$json2 = $_POST['jsonValue2'];




$someArray = json_decode($json, true);
  // print_r($someArray);        // Dump all data of the Array

  $sizeArray = sizeof($someArray);
  
  //echo "<h1>" .$someArray[i].name. "</h1>"; // Access Array data>



  for($i=0; $i<$sizeArray; $i++){

 $itemName = $someArray[$i]["name"];
 $itemPrice = $someArray[$i]["price"];
 $itemQty = $someArray[$i]["qty"];
 $itemTotal = $someArray[$i]["total"];
 $itemCode = $someArray[$i]["code"];
 $itemAveQty = $someArray[$i]["availableQty"];
 $itemRemain = $someArray[$i]["remaining"];

   $result3 = mysqli_query($conn, "INSERT INTO `invoiceitem`(`invoiceno`,`product`, `quantity`, `price`, `code`, `total`) VALUES
('$invoice_id','$itemName','$itemQty','$itemPrice','$itemCode','$itemTotal')");


  }

$someArray2 = json_decode($json2,true);

$sizeArray2 = sizeof($someArray2);

for ($j=0; $j<$sizeArray2; $j++){

    $retName = $someArray2[$j]['retName'];
    $retPrice = $someArray2[$j]['retPrice'];
    $retQty = $someArray2[$j]['retQty'];
    $retTotal = $someArray2[$j]['retTotal'];
    $retCode = $someArray2[$j]['retCode'];
    $ReturnType = $someArray2[$j]['ReturnType'];

    if ($ReturnType=="expire"){

        $sqlToExpire = "INSERT INTO `returnexpire`
(`invoiceno`, `item_name`, `item_no`, `qty`, `date`, `rep_name`, `price`, `route`, `shop_name`)
            VALUES ('$invoice_id','$retName','$retCode','$retQty','$date','$driver_name','$retPrice','$route_id'
            ,'$shop_name');";

        $query1 = mysqli_query($conn,$sqlToExpire);
        echo mysqli_error($conn);
    }

    if ($ReturnType=="non expire"){
        $sqlToNonExpire = "INSERT INTO `returnitem`
(`invoiceno`, `item_name`, `item_no`, `qty`, `price`, `rep_name`, `shop_name`, `route`, `date`)
 VALUES ('$invoice_id','$retName','$retCode','$retQty','$retPrice','$driver_name','$shop_name','$route_id','$date');";

        $query2 = mysqli_query($conn,$sqlToNonExpire);

        $itemRemain2 = $itemRemain + $retQty;

        $result4 = mysqli_query($conn,"UPDATE `daily` SET `qty`='$itemRemain2' WHERE `rep_name`='$driver_name' AND `date`='$date' AND `item_no`='$itemCode'");


    }
}


?>

<!--Alert and redirect-->
<script language="javascript" type="text/javascript">
    <?php
    if ($result1 and $result3 and $result2 and $result4) {
    ?>
    alert("Action successfully performed.");
    <?php
    } else if (!$result4) {
    ?>
    alert("Failed to perform INSERT INTO invoice. Please try again later. <?php echo mysqli_error($conn); ?>");
    <?php
    } else {
    ?>
    alert("Failed to perform INSERT INTO invoice_bill. Please try again later. <?php echo mysqli_error($conn); ?>");
    <?php
    }
    ?>
    //window.location.href = 'invoice-management.php';
</script>