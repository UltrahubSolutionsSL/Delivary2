<?php


$json = $_POST['jsonValue'];

$someArray = json_decode($json, true);
  print_r($someArray);        // Dump all data of the Array

  $sizeArray = sizeof($someArray);
  
  //echo "<h1>" .$someArray[i].name. "</h1>"; // Access Array data>


  for($i=0; $i<$sizeArray; $i++){

 $itemName = $someArray[$i]["name"];
 $itemPrice = $someArray[$i]["price"];
 $itemQty = $someArray[$i]["qty"];
 $itemTotal = $someArray[$i]["total"];
 $itemCode = $someArray[$i]["code"]; 

mysqli_query($conn, "INSERT INTO `sales`(`item_code`, `item_name`, `item_qty`, `item_price`, `item_total`, `invoice_id`) VALUES ('".$itemCode."','".$itemName."','".$itemPrice."','".$itemQty."','".$itemTotal."','".$invoice_id."'))"
  );}




?>