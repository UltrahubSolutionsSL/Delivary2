<?php
session_start();
$usertype = $_SESSION['role_id'];
$repname = $_SESSION['f_name']." ". $_SESSION['l_name'];
/**
 * Created by IntelliJ IDEA.
 * User: UltraHub Solutions Pvt. Ltd.
 * Date: 3/3/18
 * Time: 11:30 AM
 */
// Db connection
include_once '../../connection/config.php';
$asAtdate = date("Y/m/d");
// Load the list of invoices from Db
$sqlToLoadInvoices = "SELECT invoice_id, issue_no, vehicle_no, shop_no, shop_name, driver_name, date, time, i_b_id, total, pay_amount, payment, balance, route_id FROM invoice INNER JOIN invoice_bill ON invoice_id = i_b_id";
$invoices = mysqli_query($conn, $sqlToLoadInvoices);

// Load the list of item available in the stock from Db
$sqlToLoadItems = "SELECT * FROM stock";
$items = mysqli_query($conn, $sqlToLoadItems);

$sqlToFillTable = "SELECT DISTINCT `item_no`,`item_name`,`vehicle_no`,`route`,`date`,`rep_name`,`price`,`qty` FROM daily WHERE `date` = '$asAtdate' && `rep_name` = '$repname' && `item_name`!='Deleted'; ";
$fromDaily = mysqli_query($conn, $sqlToFillTable);

// Load the list of routes from Db
$sqlToLoadRoutes = "SELECT id, route FROM route";
$routes = mysqli_query($conn, $sqlToLoadRoutes);

// Load the list of drivers from Db
$sqlToLoadDrivers = "SELECT first_name, last_name, nic, vehicle_no FROM drivers";
$drivers = mysqli_query($conn, $sqlToLoadDrivers);

// Load the list of shops from Db
$sqlToLoadShops = "SELECT shop_name, shop_no, comment FROM shops";
$shops = mysqli_query($conn, $sqlToLoadShops);

// Fetch invoice Id (= issue number)
$sqlToFetchInvoiceId = "SHOW TABLE STATUS LIKE 'invoice';";
$invoiceId = mysqli_query($conn, $sqlToFetchInvoiceId)->fetch_assoc()['Auto_increment'];



//Select route and vehicle number
$sqlToVehicleNo = "select DISTINCT `route`, `vehicle_no` from daily WHERE `date` = '$asAtdate' AND `rep_name` = '$repname'";
$vehicleno = mysqli_query($conn, $sqlToVehicleNo);


?>


<!doctype html>
<html lang="en">
<head>
	 <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="../../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="../../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>


    <!-----------form---->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
            type="text/javascript"></script>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
    <link rel='stylesheet prefetch'
          href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>
    <link href="../../assets/css/style.css" rel="stylesheet"/>
    <!-----------form-->
    <link href="../../assets/css/table.css" rel="stylesheet"/>
    
    

    
    
</head>
<body class="container-fluid menu-on-left">
<noscript><h3> You must have JavaScript enabled. </h3>
    <meta HTTP-EQUIV="refresh" content=0;url="../javascriptNotEnabled.php"></noscript>
<input type="hidden" value="<?php echo($usertype) ?>" id="txtLoggedUserType">
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="../../assets/img/sidebar-5.jpg">

    <div class="sidebar-wrapper">
            <div class="logo">
                <h3>UltraHub Delivery Management System</h3>
            </div>

            <ul class="nav">
            <li id="proflile">
                <a href="../profile/profile-management.php"><i class="pe-7s-user"></i> <p>Profile</p></a>
            </li>
            <li id="representative">
                <a href="../driver/driver-management.php"><i class="pe-7s-users"></i> <p>representative</p></a>
            </li>
            <li id="stock">
                <a href="../stock/stock-management.php"> <i class="pe-7s-graph"></i><p>Stock</p></a>
            </li>

            <li class="active" id="invoice">
                <a href="../invoice/invoice-management.php"><i class="pe-7s-note2"></i><p>Invoice</p></a>
            </li>

                <li id="payment">
                    <a href="../payment/payment.php"><i class="pe-7s-cash"></i><p>Payments</p></a>
                </li>

            <li id="shop">
                <a href="../shop/shop-management.php"><i class="pe-7s-home"></i><p>Shops</p></a>
            </li>

                <li id="route">
                <a href="../route/route-management.php"><i class="pe-7s-shuffle"></i><p>Routes</p></a>
            </li>


            <li id="vehicle"><a href="../vehicle/loadVehicle.php"><i class="pe-7s-car"></i><p>Vehicle</p> </a>
            
            
	<ul id="ulVehicle">
        <li><a href="../vehicle/loadVehicle.php"><i class="pe-7s-cloud-upload"></i><p>Vehicle Load</p> </a></li>
	    <li><a href="../vehicle/unLoadVehicle.php"><i class="pe-7s-cloud-download"></i><p>Vehicle Unload</p> </a></li>
	    <li><a href="../vehicle/addvehicle.php"><i class="pe-7s-cloud-download"></i><p>Add Vehicle</p> </a></li>
    </ul>
			</li>
                <li id="report">
                    <a href="../report/reports.html"><i class="pe-7s-id"></i><p>Reports</p></a>
                </li>
                <li id="backup">
                    <a href="../backup/backup-management.php"><i class="pe-7s-back-2"></i><p>Backup</p></a>
                </li>

        </ul>
        </div>
    </div>

    <div class="main-panel">
        <!---------form------------------>


        <!-----------form-------------->


        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Invoice Management</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">

                            </a>
                        </li>

                        <li>
                            <a href="../../logout.php">
                                <button type="button" class="btn btn-danger">Logout</button>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <form name="myform" action="invoice-process.php" method="post" style="padding-left: 15px; padding-right: 15px">
            <!------------------------------------------------------------ Main details ------------------------------------------------------------>
            <h3 class="text-center"> Main Details </h3>
            <!-- Route -->
            <div class="row" style="display: none">
                <div class="col-md-6">


                        <?php
                        while ($vehicle = $vehicleno->fetch_assoc()) { ?>
                        <input class="form-control" type="text" value="<?php echo $vehicle['route'];?>" readonly name="route"><br>
                        <input id="vehicle_no" name="vehicle_no" type="text" class="form-control" readonly="readonly" value="<?php echo $vehicle['vehicle_no'];?>">
                        <?php }?>

                </div>
                  <div class="col-md-6" style="display: none">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="phone">Representative</label>

                        <input type="text" name="driver_name" class="form-control" value="<?php echo $repname; ?>" readonly />

                               

                    </div>
                </div>
            </div>

                          <div class="row">
              


            <!-- Shop name & shop number -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="url">Shop Name</label>
                        <select id="shop_number" name="shop_number" required="required" class="form-control custom-select"
                                onchange="shopSelected(this.value)" >
                            <option selected="selected" disabled="disabled">Select shop</option>
                            <?php
                            // List of shops
                            while ($shop = $shops->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $shop['shop_no']; ?>"
                                        class='form-control'><?php echo $shop['shop_name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                         
    

                        <input type="hidden" id="shop_name" name="shop_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Shop Number</label>
                        <input id="shop_number_field" type="text" class="form-control" readonly="readonly">
                    </div>
                </div>
            </div>

            <!-- Date & time -->
            <div class="row" style="display:none;">
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="email">Date</label>
                        <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d") ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Time</label>
                        <input type="time" class="form-control" name="time"
                               value="<?php $date = date("H:i", strtotime($row['time_d']));
                               echo $date; ?>">
                    </div>
                </div>
            </div>

            <!-- Invoice ID & issue No -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="first">Invoice ID</label>
                        <input id="invoice_id" name="invoice_id" type="text" readonly="readonly" class="form-control"
                               value="<?php echo $invoiceId; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last">Issue No</label>
                        <input id="issue_no" name="issue_no" type="text" readonly="readonly" class="form-control"
                               value="<?php echo $invoiceId; ?>">
                    </div>
                </div>
            </div>
            
            <div class="row">
            	<div class="col-lg-12">
            	<label>Comment</label>
            		<div class="form-group form-group-lg">
						<input id="shop_comment" type="text" readonly class="form-control input-lg"  />
					</div>
				</div>
			</div>
            
<br><br><hr>
            <h3 class="text-center">Item Details</h3>
       
           <table class="table" id="tbl2">
		 <thead>
		 <tr>
			 <th>Item Name <input type="text" id="txtSearchByItmeName" onKeyUp="txtSearchByItemNameMC(this)" class="form-control" placeholder="Search By Item Name"></th>
			 <th>Item Price</th>
			 <th>Available Qty</th>
			 <th>Qty</th>
			 <th>Total Price</th>
			 
			 <th>Add</th>
			 <th hidden >Remain</th>
			 <th hidden>Item Code</th>
		</tr>
		 </thead>
	   <tbody id="tblTbody2">
		   <?php
            $i = 0;
                while ($row = mysqli_fetch_assoc($fromDaily)) {
     $i++;

                    ?>
           
                    	<tr>
                        <td><?php echo $row['item_name']; ?></td>
                        
                        <td><?php echo $row['price']; ?></td>
                        
                        <td><?php echo $row['qty']; ?></td>
                        
						<td><input onKeyUp="txtQtyKU(this)" type="number" name="txtQty" size="10px"/></td>
						
						<td></td>								
						
						<td> 
					<input type="button" value="Add" class="btn btn-default" onclick="btnSubmitMC(this)"> </td>
							
                   <td hidden><input hidden type="number"  readonly size="10px"/></td>
                         <td hidden><?php echo $row['item_no']; ?></td>    <?php } ?>           
                    </tr>
			</tbody>
			 </table>
            
            
  
            

				<br>
                
				
				<br><br>
					<div class="container-fluid">
					  <h2>Invoice</h2>          
					  <table class="table" id="tbl1">
						<thead>
						  <tr>
                            <th>Item Code</th>
							<th>Item Name</th>
							<th>Item Price</th>
							<th>Qty</th>
							<th>Total</th>
							<th>Action</th>
							<th hidden>Available Qty</th>
							<th hidden>Remain</th>
						  </tr>
						</thead>
						<tbody id="tbody">
						</tbody>
					  </table>
					  <div align="right">
						<label>Discount / Return : </label> <input type="text"  name="name_discount" id="txtDiscount" align="right" onKeyUp="discount()"><br><br>
						<label>Total : </label> <input type="text" disabled id="txtTotal" align="right">
						</div>

						


					</div>
                              <br><br>

                              <button type="button" class="btn btn-block btn-primary"  onclick="loadReturnMC()">
                                  <h4 class="text-center">Add Return Items</h4></button>
                            <div class="well" id="returnitem" style="display: none">


                              <table class="table" id="tbl2">
                                  <thead>
                                  <tr>
                                      <th>Item Name
                                          <input type="text" id="txtSearchByItmeName" onKeyUp="txtSearchByItemNameMC(this)" class="form-control" placeholder="Search By Item Name"></th>
                                      <th>Item Price</th>
                                      <th>Qty</th>
                                      <th>Total Price</th>
                                      <th>Return Type</th>
                                      <th>Add</th>
                                      <th>Item Code</th>
                                  </tr>
                                  </thead>
                                  <tbody id="Tbody2">
                                  <?php
                                  $i = 0;
                                  while ($row = mysqli_fetch_assoc($items)) {
                                  $i++;

                                  ?>

                                  <tr>
                                      <td><?php echo $row['item_name']; ?></td>

                                      <td><?php echo $row['price']; ?></td>



                                      <td><input onkeyup="txtQtyKU2(this)" type="number" name="txtQty" size="10px"/></td>

                                      <td></td>
                                      <td><select class="form-control">
                                              <option value="Select return type"disabled selected>Select return type</option>
                                              <option value="expire">Expired</option>
                                              <option value="non expire">Non expire</option>
                                          </select>
                                      </td>

                                      <td>
                                          <input type="button" value="Add" class="btn btn-default" onclick="btnSubmitMC2(this)"> </td>


                                      <td><?php echo $row['item_code']; ?></td>    <?php } ?>
                                  </tr>
                                  </tbody>
                              </table><br><br>
                                <div class="container-fluid">
                                    <h2>Return Invoice</h2>
                                    <table class="table" id="tbl2">
                                        <thead>
                                        <tr>

                                            <th>Item Name</th>
                                            <th>Item Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Return Type</th>
                                            <th>Action</th>
                                            <th>Item Code</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tbody2">
                                        </tbody>
                                    </table>

                                        </div>



                            </div>

                              <br><br>
            <h3 class="text-center">Payment Details</h3>
            <!-- Total -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="first">Total</label>
                        <input type="number" min="0" step="0.01" id="total" name="total" class="form-control"
                               placeholder="Calculated total price" readonly="readonly">
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="first">Payment Method</label>
						<select onChange="btnPayMethod(this.value)"  class="form-control" name="paymentmethod">
							<option value="Select a method" disabled selected>Select a method</option>
                  			<option value="cash">Cash</option>
                   			<option value="cheque">Cheque</option></select>
                    </div>
                </div>
            </div><br>
            <div class="row">
				
            	<div class="col-md-6">
					<label>Payment Type</label>
                   		<select class="form-control" name="paymenttype" onchange="calculateBalance(0)">
                            <option value="" disabled selected>-- Select A Payment Type --</option>
							<option value="full payment">Full Payment</option>
                   			<option value="credit">Credit</option>
					</select>
					</div>
					
           
           		
           		<div class="col-md-6">
           		<div class="col-md-6" id="div3" style="display: none">
					<label for="txtBankName">Bank Name :</label>
          			<input id="txtBankName" class="form-control" type="text" name="bank" value=""/><br>
          			
           			<label for="txtChequeNo">Cheque No :</label>
           			<input id="txtChequeNo" class="form-control" type="number" name="chequeno" value="" /><br>
				</div>
<!--          		<div class="col-md-6" id="div4" style="display: none">		-->
<!--           			<label for="txtDate">Date :</label>-->
<!--           			<input  id="txtDate" class="form-control" type="date" name="chequedate"  /><br>-->
<!--				</div>-->
          			<div class="col-md-6" id="div5">
           			<label  for="txtComment">Comment :</label>
           			<input  id="txtComment" class="form-control" type="text" name="comment"  value=""/><br>
				</div>	
            
            </div>
            
			</div><br>
		
            <!-- Payment & balance -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="payment">Payment</label>
                        <input type="number" min="0" step="0.01" id="payment" name="payment" class="form-control"
                               value = "0" placeholder="The total payment" onkeyup="calculateBalance2(this.value)" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="email">Balance</label>
                        <input type="number" min="0" step="0.01" id="balance" name="balance" class="form-control"
                               placeholder="Balance Payment" readonly="readonly">
                    </div>
                </div>
            </div>

            <!------------------------------------------------------------ Send & reset ------------------------------------------------------------>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-2"><br>
                    <button type="button" class="btn btn-warning" name="btn1" onclick="btnProcessMC()">Send <span
                                class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>
            <div class="col-md-2">
                <button type="reset" class="btn btn-danger center-block">Reset</button>
            </div>
<input type="text" id="txtJsonValue" name="jsonValue" readonly hidden>
<input type="text" id="txtJsonValue2" name="jsonValue2" readonly hidden >
<input type="text" id="tota2" readonly hidden >
        </form>
        
        <br><br><hr>



<div class="row col-md-12 col-md-offset-0 custyle">
            <table class="table table-striped custab">
                <thead>
                <tr>
                    <th>Invoice No <input type="text" id="txtSearchByInvoiceNo" onKeyUp="txtSearchByInvoiceNoMC(this)" class="form-control" placeholder="Search by Invoice No"></th>
                    <th>Issue No</th>
                    <th>Order No</th>
                    <th>Vehicle No</th>
                    <th>Shop No <input type="text" id="txtSearchByShopName" onKeyUp="txtSearchByShopNameMC(this)" class="form-control" placeholder="Search By Shop Name"></th>
                    <th>Driver</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Balance</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id ="tblTbody">
                <?php
                while ($row = mysqli_fetch_array($invoices)) {
                    ?>
                    <tr>
                        <td><?php echo $row['invoice_id']; ?></td>
                        <td><?php echo $row['issue_no']; ?></td>
                        <td><?php echo $row['order_no']; ?></td>
                        <td><?php echo $row['vehicle_no']; ?></td>
                        <td><?php echo $row['shop_name']; ?></td>
                        <td><?php echo $row['driver_name']; ?></td>
                        <td><?php echo $row['date'] . " - " . $row['time']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['payment']; ?></td>
                        <td><?php echo $row['balance']; ?></td>
                        <td class="text-center">
                            <a class='btn btn-info btn-xs'
                               href="shop-management.php?invoice_no=<?php echo $row['invoice_id']; ?>">
                                <span class="glyphicon glyphicon-edit"></span> Edit
                            </a>
                            <a onClick="confirmDelete()"
                               href="delete-invoice-process.php?invoice_no=<?php echo $row['invoice_id'] ?>"
                               class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-remove"></span> Del
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?></tbody>
            </table>
	</div></div>

<input type="hidden" value="<?php echo $_SESSION['role_name']?>" id="txtusertype" readonly>


</body>
<script>
    window.addEventListener("load", init);

    function init() {


        //privillages

        profile = document.getElementById("proflie");
        rep = document.getElementById("representative");
        stock = document.getElementById("stock");
        invoice = document.getElementById("invoice");
        payment = document.getElementById("payment");
        shop = document.getElementById("shop");
        route = document.getElementById("route");
        vehicle = document.getElementById("vehicle");
        ulVehicle = document.getElementById("ulVehicle");
        report = document.getElementById("report");
        backup = document.getElementById("backup");
        usertype = document.getElementById("txtusertype");

        if (usertype.value == "driver"){

            rep.style.display="none";
            stock.style.display="none";
            route.style.display="none";
            vehicle.style.display="none";
            ulVehicle.style.display="none";
            report.style.display="none";
            backup.style.display="none";
        }
    }

</script>

      <script src="../../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->


<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>


</html>
<!--form-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script src="../../assets/js/index.js"></script>
<!--form-->

<script>
		
 
function itemSelected() {
        var itemId = document.getElementById("item_code").value; // Id of the selected item
        <?php
        mysqli_data_seek($items, 0); // set the pointer back to the beginning
        while ($item = $items->fetch_assoc()) {
        ?>
        if (itemId == "<?php echo $item['item_code']; ?>") {
            // customer information fields are loaded with real data
            document.getElementById("description").value = "<?php echo $item['description']; ?>";
            document.getElementById("expire_date").value = "<?php echo $item['expire_date']; ?>";
            document.getElementById("quantity").value = "<?php echo $item['quantity']; ?>";
            document.getElementById("price").value = "<?php echo $item['price']; ?>";
            document.getElementById("txtItemID").value = "<?php echo $item['item_code']; ?>";
        }
        <?php
        }
        ?>
    }

function driverSelected(driverNic) {
        <?php
        mysqli_data_seek($drivers, 0); // set the pointer back to the beginning
        while ($row = $drivers->fetch_assoc()) {
        ?>
        if (driverNic == "<?php echo $row['nic']; ?>") {
            document.getElementById("vehicle_no").value = "<?php echo $row["vehicle_no"]; ?>";
        }
        <?php
        }
        ?>
    }

function shopSelected(shopNo) {
        <?php
        mysqli_data_seek($shops, 0); // set the pointer back to the beginning
        while ($row = $shops->fetch_assoc()) {
        ?>
        if (shopNo == "<?php echo $row['shop_no']; ?>") {
            document.getElementById("shop_number_field").value = "<?php echo $row["shop_no"]; ?>";
            document.getElementById("shop_name").value = "<?php echo $row["shop_name"]; ?>";
			document.getElementById("shop_comment").value = "<?php echo $row["comment"]; ?>";
			
        }
        <?php
        }
        ?>
    }

function calculateTotal() {
        document.getElementById("sale_price").value = (document.getElementById("sale_quantity").value) * (document.getElementById("price").value);
    }

function calculateBalance() {
    
        document.getElementById("balance").value = document.getElementById("payment").value - document.getElementById("total").value;
    
}	

function calculateBalance2(x) {
    
            
        document.getElementById("balance").value = x - document.getElementById("total").value;
    
}
    
	window.addEventListener("load",initialize); 	
	
		valid="lightgreen"; 
		invalid="pink";
		initial="white";
		var rowCount = 1;
		billItems =[];
		returnItems=[];
	
function initialize(){
			var usertype = document.getElementById('txtLoggedUserType').value;
		
		if(usertype!=1){
			
			document.getElementById('ulVehicle').style.display= "none";
			document.getElementById('liVehicle').style.display= "none";
			document.getElementById('liBackup').style.display= "none";
			document.getElementById('liStock').style.display= "none";
			document.getElementById('liDriver').style.display= "none";
			document.getElementById('liReport').style.display= "none";
		}

		btnSubmit.addEventListener("click" , btnSubmitMC(this));


		}		
			
function btnSubmitMC(k){

		var tr  =  document.createElement('tr');
		var td  =  document.createElement('td');
		var td1 =  document.createElement('td');
		var td2 =  document.createElement('td');
		var td3 =  document.createElement('input');
		var td4 =  document.createElement('td');
		var td5  =  document.createElement('td');
		var td6  =  document.createElement('td');
		var td7  =  document.createElement('td');
			
		var btnDelete =  document.createElement('button');	
		btnDelete.setAttribute("type","button");
        	
		tr.appendChild(td);
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		tr.appendChild(td4);
		tr.appendChild(td5);
		tr.appendChild(td6);
		tr.appendChild(td7);
			
		td5.appendChild(btnDelete);
			
		tbody.appendChild(tr);
			
		td.innerHTML= k.parentElement.nextElementSibling.nextElementSibling.innerHTML;
		td1.innerHTML=k.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;	
			
		td2.innerHTML = k.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;	
			
		td3.value = k.parentElement.previousElementSibling.previousElementSibling.lastChild.value;	
		
		td4.innerHTML = td3.value * parseInt(td2.innerHTML);	
			
		td6.innerHTML = k.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
		
		td7.innerHTML = k.parentElement.nextElementSibling.lastChild.value; 

		var itemPrice = "itemPrice"+rowCount;
		var qty = "qty"+rowCount;
		var total = "total"+rowCount;
		var deleteRow = "deleteRow" +rowCount;	
		var nameItem = "nameItem"+rowCount;
        var codeItem = "codeItem"+rowCount;
        var availableQty = "availableQty"+rowCount;
        var remaining = "remaining"+rowCount;

		setAttribute(td,td1,td2,td3,td4,td5,td6,td7,btnDelete,itemPrice,qty,total,deleteRow,rowCount,nameItem,codeItem,availableQty,remaining);
				
		calculation(itemPrice,rowCount,qty,total);

		fillTable();

    	rowCount++;

		}
		
function setAttribute(td,td1,td2,td3,td4,td5,td6,td7,btnDelete,itemPrice,qty,total,deleteRow,rowCount,nameItem,codeItem,availableQty,remaining){
        
		td1.setAttribute("id",nameItem);
		td2.setAttribute("id",itemPrice);	
		td3.setAttribute("id",qty);	
		td3.setAttribute("type","number");	
		td3.setAttribute("name", "tableQty");
		td3.setAttribute("onkeyup", "btnEditMC(this)");
		td4.setAttribute("id",total);
		td4.setAttribute("name", "tot");
		td.setAttribute("id",codeItem);
        btnDelete.setAttribute("id", deleteRow);
		btnDelete.innerHTML= "remove";
		btnDelete.setAttribute("onClick", "btnDeleteMC(this)");
		td6.setAttribute("id",availableQty);
		td7.setAttribute("id",remaining);
		td6.setAttribute("style","display:none");
		td7.setAttribute("style","display:none");
        
		}
		
function calculation(itemPrice,rowCount,qty,total){
	
	var a = document.getElementById("itemPrice"+rowCount).innerHTML;
	var b = document.getElementById("qty"+rowCount).value;
			
		
		var c = a * b;	
		document.getElementById("total"+rowCount).innerHTML = c;

	
}		
		
function btnEditMC(y){
			
			var rowCount = tbody.childElementCount;
			
			var a = parseInt(y.nextSibling.nextSibling.nextSibling.innerHTML);
			var b = y.value;
			
			if(b>a){
			y.setAttribute("style","background-color:pink")}
			else{y.setAttribute("style","background-color:lightgreen")}	
			
			
			y.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML = a-b;
			
			k = y.getAttribute('id');
			m = y.previousSibling.getAttribute('id');
			l = y.nextSibling.getAttribute('id');
			
			

			
			var a = document.getElementById(m).innerHTML;
			var b = document.getElementById(k).value;

			var c = a * b;	
			document.getElementById(l).innerHTML = c;
			
			
			fillTable();
			
		}
	
function txtQtyKU(x){
		
		var l = parseInt(x.parentElement.previousElementSibling.innerHTML);
		
	if(l<x.value){
		var y = x.parentElement.nextElementSibling.nextElementSibling.lastElementChild;
		y.setAttribute("disabled","disabled");
		x.style.background=invalid; 

		}
	else{
		var y = x.parentElement.nextElementSibling.nextElementSibling.lastElementChild;
		y.removeAttribute("disabled");
		x.style.background=valid;
	
		
		var a = (x.value)*(parseInt(x.parentElement.previousElementSibling.previousElementSibling.innerHTML));
		
		x.parentElement.nextElementSibling.innerHTML = a;
		
		var b = (parseInt(x.parentElement.previousElementSibling.innerHTML))-x.value;
		x.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.lastChild.value=b;
	
		
	}
	
	
}

function fillTable(){
					
	
		    var arr = document.getElementsByName('tot');
    		var total=0;
    		for(var i=0;i<arr.length;i++){
        		if(parseInt(arr[i].innerHTML))
					total += parseInt(arr[i].innerHTML);
				
    }		
    		
			var discount = document.getElementById('txtDiscount').value;
			total = total - discount;	
				
				document.getElementById('txtTotal').value = total;
					
			document.getElementById('total').value = document.getElementById('txtTotal').value;
			
		}
		
function btnDeleteMC(x){var confirm = window.confirm("Are You want to delete this Item?");
			
			if(confirm==true){
				
			cell=x.parentNode;
            row =cell.parentNode ;
            tbody1 = row.parentNode ;

            cell.previousElementSibling.innerHTML = "0";
            cell.previousElementSibling.previousElementSibling.innerHTML = "0";
            cell.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML = "0";
            cell.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML = "Deleted";
            
            cell.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML = "0";
            
            cell.nextElementSibling.innerHTML = "0";
            cell.nextElementSibling.nextElementSibling.innerHTML = "0";
            

            row.setAttribute("style","display:none");
		
			fillTable();
			}
			
		}
		
		function btnDeleteMC2(x){var confirm = window.confirm("Are You want to delete this Item?");
			
			if(confirm==true){
				
				cell=x.parentNode; 
			  row =cell.parentNode ; 
			  tbody1 = row.parentNode ; 
			  
		    cell.previousElementSibling.innerHTML = "0";
		    
            cell.previousElementSibling.previousElementSibling.innerHTML = "0";
            
            cell.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML = "0";
            
            cell.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML = "0";
            
            cell.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML = "Deleted";
            
            cell.nextElementSibling.innerHTML = "0";
            
            
            

            row.setAttribute("style","display:none");
		
			fillTable();
			}
			
		}
		
function discount(){
		
		fillTable();
	}
		
function btnProcessMC(){
		
		var y = tbody.childElementCount;

for (i=1; i<=y; i++){
	//var y=1;
	var nameItemValue = document.getElementById("nameItem"+i).innerHTML;
		priceItem = document.getElementById("itemPrice"+i).innerHTML;
		qtyItem = document.getElementById("qty"+i).value;
		totalItem = document.getElementById("total"+i).innerHTML;
        codeItem = document.getElementById("codeItem"+i).innerHTML;
        availableQty = document.getElementById("availableQty"+i).innerHTML;
        remaining = document.getElementById("remaining"+i).innerHTML;

	console.log(i);
		var item = new Object();
		item.name = nameItemValue;
		item.price = priceItem;
		item.qty = qtyItem;
		item.total = totalItem;
        item.code = codeItem;
		item.availableQty = availableQty;
		item.remaining = remaining;

		billItems.push(item);}

    var z = tbody2.childElementCount;
    for (q=1; q<=z; q++){

        var ItemName = document.getElementById("ItemName"+q).innerHTML;

        var ItemPrice = document.getElementById("ItemPrice"+q).innerHTML;
        var Qty = document.getElementById("Qty"+q).value;
        var Total = document.getElementById("Total"+q).innerHTML;
        var ItemCode = document.getElementById("ItemCode"+q).innerHTML;
        var ReturnType = document.getElementById("ReturnType"+q).innerHTML;

        var retItems = new Object();
        retItems.retName = ItemName;
        retItems.retPrice = ItemPrice;
        retItems.retQty = Qty;
        retItems.retTotal = Total;
        retItems.retCode = ItemCode;
        retItems.ReturnType = ReturnType;

        returnItems.push(retItems);



    }

    txtJsonValue.value = JSON.stringify(billItems);
    txtJsonValue2.value = JSON.stringify(returnItems);
	document.myform.submit();
}
  
function txtSearchByInvoiceNoMC(txtSearchByInvoiceNo){

        var searchText = txtSearchByInvoiceNo.value.toLowerCase();
        //window.alert(searchText);

        var tbody = document.getElementById('tblTbody');

        var rows = tbody.children;
        for(var i=0; i<rows.length; i++){
            var row = rows[i];
            var cells = row.children;
            var namecell = cells[0];
            var name = namecell.innerHTML.toLowerCase();
            if(name.search(searchText)==-1){
                row.style.display='none';
            }else{
                row.style.display='table-row';
            }
        }
    }
     
function txtSearchByShopNameMC(txtSearchByShopName){

        var searchText = txtSearchByShopName.value.toLowerCase();
        //window.alert(searchText);

        var tbody = document.getElementById('tblTbody');

        var rows = tbody.children;
        for(var i=0; i<rows.length; i++){
            var row = rows[i];
            var cells = row.children;
            var namecell = cells[4];
            var name = namecell.innerHTML.toLowerCase();
            if(name.search(searchText)==-1){
                row.style.display='none';
            }else{
                row.style.display='table-row';
            }
        }
    }
	
function btnPayMethod(x){
		
		if(x=="cash"){
			div5.removeAttribute("style");	
			
			div3.setAttribute("style","display:none");


		}
		if(x=="cheque"){
						div3.removeAttribute("style");	

						div5.removeAttribute("style");
		}


}

function txtSearchByItemNameMC(txtSearchByItemName){

        var searchText = txtSearchByItemName.value.toLowerCase();
        //window.alert(searchText);

        var tbody2 = document.getElementById('Tbody2');

        var rows = tbody2.children;
        for(var i=0; i<rows.length; i++){
            var row = rows[i];
            var cells = row.children;
            var namecell = cells[0];
            var name = namecell.innerHTML.toLowerCase();
            if(name.search(searchText)==-1){
                row.style.display='none';
            }else{
                row.style.display='table-row';
            }
        }
    }

function loadReturnMC() {



        var x = document.getElementById("returnitem");
        if (x.style.display == "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

        var RowCount = 1;
function btnSubmitMC2(k) {

    var m = k.parentElement.previousElementSibling.lastElementChild.value;
    var n = k.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.lastElementChild.value;
        if(m=="Select return type"){
        alert("Please select return type");
    }
    else {
        var tr = document.createElement('tr');
        var tdd = document.createElement('td');
        var tdd1 = document.createElement('td');
        var tdd3 = document.createElement('td');
        var tdd2 = document.createElement('input');
        var tdd4 = document.createElement('td');
        var tdd5 = document.createElement('td');
        var tdd6 = document.createElement('td');


        var btnDelete2 = document.createElement('button');
        btnDelete2.setAttribute("type","button");

        tr.appendChild(tdd);
        tr.appendChild(tdd1);
        tr.appendChild(tdd2);
        tr.appendChild(tdd3);
        tr.appendChild(tdd4);
        tr.appendChild(tdd5);
        tr.appendChild(tdd6);


        tdd5.appendChild(btnDelete2);

        tbody2.appendChild(tr);

        tdd.innerHTML = k.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
        tdd1.innerHTML = k.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;

        tdd2.value = k.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.lastChild.value;

        tdd3.innerHTML = k.parentElement.previousElementSibling.previousElementSibling.innerHTML;

        tdd4.innerHTML = k.parentElement.previousElementSibling.lastElementChild.value;

        tdd6.innerHTML = k.parentElement.nextElementSibling.innerHTML;


        var ItemName = "ItemName" + RowCount;
        var ItemPrice = "ItemPrice" + RowCount;
        var Qty = "Qty" + RowCount;
        var Total = "Total" + RowCount;
        var ItemCode = "ItemCode" + RowCount;
        var DeleteRow = "DeleteRow" + RowCount;
        var ReturnType = "ReturnType" + RowCount;


        setAttribute2(btnDelete2, tdd, tdd1, tdd2, tdd3, tdd4, tdd6, ItemName, Qty, Total, ItemPrice, ItemCode, DeleteRow, RowCount, ReturnType);
        RowCount++;

        var y = tbody2.childElementCount;
        var totAmount = 0;
        for (i = 1; i <= y; i++) {

            var totalAmount = parseInt(document.getElementById("Total" + i).innerHTML);

            totAmount += totalAmount;

        }
        txtDiscount.value = totAmount;
            discount()
    }
}

function setAttribute2(btnDelete2,tdd,tdd1,tdd2,tdd3,tdd4,tdd6,ItemName,Qty,Total,ItemPrice,ItemCode,DeleteRow,RowCount,ReturnType){

        tdd.setAttribute("id",ItemName);
        tdd1.setAttribute("id",ItemPrice);
        tdd2.setAttribute("id",Qty);
        tdd2.setAttribute("type","number");
        tdd3.setAttribute("id",Total);
        tdd4.setAttribute("id", ReturnType);
        tdd6.setAttribute("id",ItemCode);
        btnDelete2.setAttribute("id", DeleteRow);
        btnDelete2.innerHTML= "remove";
        btnDelete2.setAttribute("onClick", "btnDeleteMC2(this)");


    }

function txtQtyKU2(x){

            var a = (x.value)*(parseInt(x.parentElement.previousElementSibling.innerHTML));

            x.parentElement.nextElementSibling.innerHTML = a;
    }

</script>

