<?php
/**
 * Created by IntelliJ IDEA.
 * User: UltraHub Solutions Pvt. Ltd.
 * Date: 3/3/18
 * Time: 11:30 AM
 */
// Db connection
include_once '../../connection/config.php';

// Load the list of invoices from Db
$sqlToLoadInvoices = "SELECT invoice_id, issue_no, vehicle_no, shop_no, shop_name, driver_name, date, time, i_b_id, total, pay_amount, payment, balance, route_id FROM invoice INNER JOIN invoice_bill ON invoice_id = i_b_id";
$invoices = mysqli_query($conn, $sqlToLoadInvoices);

// Load the list of item available in the stock from Db
$sqlToLoadItems = "SELECT * FROM stock";
$items = mysqli_query($conn, $sqlToLoadItems);

// Load the list of routes from Db
$sqlToLoadRoutes = "SELECT id, route FROM route";
$routes = mysqli_query($conn, $sqlToLoadRoutes);

// Load the list of drivers from Db
$sqlToLoadDrivers = "SELECT first_name, last_name, nic, vehicle_no FROM drivers";
$drivers = mysqli_query($conn, $sqlToLoadDrivers);

// Load the list of shops from Db
$sqlToLoadShops = "SELECT shop_name, shop_no FROM shops";
$shops = mysqli_query($conn, $sqlToLoadShops);

// Fetch invoice Id (= issue number)
$sqlToFetchInvoiceId = "SHOW TABLE STATUS LIKE 'invoice';";
$invoiceId = mysqli_query($conn, $sqlToFetchInvoiceId)->fetch_assoc()['Auto_increment'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="../../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!------------------------------------------select ---------------->

        <script src="../../assests/src/jquery.min.js"></script>

    <script src='../../assests/src/jquery-customselect.js'></script>
    <link href='../../assests/src/jquery-customselect.css' rel='stylesheet' />    

    <!------------------------------------------select end ---------------->

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
    <!--   Core JS Files   -->
<script src="../../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
</head>
<body class="menu-on-left">

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="../../assets/img/sidebar-5.jpg">


        <div class="sidebar-wrapper">
            <div class="logo">
                <h3>UltraHub Delivery Management System</h3>
            </div>

            <ul class="nav">
            <li>
                <a href="../profile/profile-management.php"><i class="pe-7s-user"></i> <p>Profile</p></a>
            </li>
            <li>
                <a href="../driver/driver-management.php"><i class="pe-7s-users"></i> <p>representative</p></a>
            </li>
            <li>
                <a href="../stock/stock-management.php"> <i class="pe-7s-graph"></i><p>Stock</p></a>
            </li>

            <li class="active">
                <a href="../invoice/invoice-management.php"><i class="pe-7s-note2"></i><p>Invoice</p></a>
            </li>

                <li>
                    <a href="../payment/payment.php"><i class="pe-7s-cash"></i><p>Payments</p></a>
                </li>

            <li>
                <a href="../shop/shop-management.php"><i class="pe-7s-home"></i><p>Shops</p></a>
            </li>

                <li>
                <a href="../route/route-management.php"><i class="pe-7s-shuffle"></i><p>Routes</p></a>
            </li>


            <li><a href="../vehicle/loadVehicle.php"><i class="pe-7s-car"></i><p>Vehicle</p> </a>
            
            
	<ul>
        <li><a href="../vehicle/loadVehicle.php"><i class="pe-7s-cloud-upload"></i><p>Vehicle Load</p> </a></li>
	    <li><a href="../vehicle/unLoadVehicle.php"><i class="pe-7s-cloud-download"></i><p>Vehicle Unload</p> </a></li>
	    <li><a href="../vehicle/addvehicle.php"><i class="pe-7s-cloud-download"></i><p>Add Vehicle</p> </a></li>
    </ul>
			</li>
                <li>
                    <a href="../report/reports.html"><i class="pe-7s-id"></i><p>Reports</p></a>
                </li>
                <li>
                    <a href="../backup/backup-management.php"><i class="pe-7s-back-2"></i><p>Backup</p></a>
                </li>

        </ul>
        </div>
    </div>

    <div class="main-panel">
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
                    <a class="navbar-brand" href="#">Invoice</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <!--Log Out Process Starts-->
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="route">Route</label>
                        <select id="route_id" name="route_id" required="required" class="form-control custom-select">
                            <option selected="selected" disabled="disabled">Select route</option>
                            <?php
                            // List of suppliers
                            while ($route = $routes->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $route['id']; ?>"
                                        class='form-control'><?php echo $route['route']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <script>
      $(function() {
        $("#route_id").customselect();
      });
      </script>

                    </div>
                </div>
            </div>

            <!-- Driver & vehicle number -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="phone">Representative</label>
                        <select id="driver_nic" name="driver_nic" required="required" class="form-control custom-select "
                                onchange="driverSelected(this.value)">
                            <option selected="selected" disabled="disabled">Select Representative</option>
                            <?php
                            // List of drivers
                            while ($driver = $drivers->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $driver['nic']; ?>"
                                        class='form-control'><?php echo $driver['first_name'] . " " . $driver['last_name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                        <script>
      $(function() {
        $("#driver_nic").customselect();
      });
      </script>
                        <input type="hidden" id="driver_name" name="driver_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="company">Vehicle No</label>
                        <input id="vehicle_no" name="vehicle_no" type="text" class="form-control" readonly="readonly">
                    </div>
                </div>
            </div>

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
                         <script>
      $(function() {
        $("#shop_number").customselect();
      });
      </script>

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

            <!------------------------------------------------------------ Item details ------------------------------------------------------------>
            <h3 class="text-center">Item Details</h3>
            <!-- Item name & current price -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="first">Item Name</label>
                        <select id="item_code" name="item_code" required="required" class="form-control custom-select"
                                onchange="itemSelected()" >
                                
                            <option value="" disabled="disabled" selected="selected">Select item</option>
                            <?php
                            // List of suppliers
                            while ($item = $items->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $item['item_code']; ?>"
                                        class='form-control'><?php echo $item['item_name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                         <script>
      $(function() {
        $("#item_code").customselect();
      });
      </script>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last">Current Price</label>
                        <input id="price" name="price" type="number" class="form-control" placeholder="Current price"
                               readonly="readonly">
                    </div>
                </div>
            </div>
<input id="txtItemID"  type="hidden" class="form-control" readonly="readonly">
            <!-- Available quantity $ description -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="company">Available Quantity</label>
                        <input type="number" class="form-control" placeholder="Available Quantity" id="quantity"
                               name="quantity" readonly="readonly">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Description</label>
                        <input type="text" class="form-control" placeholder="Current Description" id="description"
                               name="description"
                               readonly="readonly">
                    </div>
                </div>
            </div>

          <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="email">Expire Date</label>
                        <input type="date" class="form-control" id="expire_date" name="expire_date"
                               placeholder="Item expire date" readonly="readonly">
                    </div>
                </div>
            </div>
           

            <!-- Quantity & price -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp; <label for="email">Quantity</label>
                        <input type="number" id="sale_quantity" name="sale_quantity" class="form-control"
                               placeholder="Type the quantity" onKeyUp="calculateTotal()" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Price</label>
                        <input type="number" min="0" step="0.01" id="sale_price" name="sale_price" class="form-control"
                               placeholder="Type the price" onKeyUp="calculateTotal()">
                    </div>
                </div>
            </div>
            
            
            <!-------------------------------------------------------Invoice table---------------------------------->
            
<!--
				<div class="row" align="center">
					<form class="form-group">
					<div class="col-lg-3">
						<label>Item Name : </label><input class="form-control" type="text" placeholder="Type Item Name Here" id="txtItemName"> <br><br>
						</div>
						<div class="col-lg-3">
						<label>Item price : </label><input class="form-control" type="text" placeholder="Type Item Price Here" id="txtItemPrice"> <br><br>
						</div><div class="col-lg-3">
						<label>Qty : </label><input class="form-control" type="text" placeholder="Qty" id="txtQty"> <br><br>
						</div>
						<div class="col-lg-3">
						<input class="btn btn-default" type="button" id="btnSubmit" value="Submit">
						</div>
						</form>

					</div>
-->
				<br>
                <div class="col-lg-4">
                        
                        </div>
				<div class="col-lg-4">
						<input class="btn btn-primary btn-block" type="button" id="btnSubmit" value="Add to Invoice">
						</div>
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
						  </tr>
						</thead>
						<tbody id="tbody">
						</tbody>
					  </table>
					  <div align="right">
						<label>Discount / Return : </label> <input type="text" id="txtDiscount" align="right" onKeyUp="discount()"><br><br>
						<label>Total : </label> <input type="text" disabled id="txtTotal" align="right">
						</div>

						<input type="hidden" name="jsonValue" id="txtjsonValue">


					</div>

            
            
            
             <!-------------------------------------------------------Invoice table end---------------------------------->

            <!------------------------------------------------------------ Payment details ------------------------------------------------------------>
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
            </div>

            <!-- Payment & balance -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Payment</label>
                        <input type="number" min="0" step="0.01" id="payment" name="payment" class="form-control"
                               placeholder="The total payment" onkeyup="calculateBalance(this.value)" required>
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
                <div class="col-md-2">
                    <button type="button" class="btn btn-warning" name="btn1" onclick="btnProcessMC()">Send <span
                                class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>
            <div class="col-md-2">
                <button type="reset" class="btn btn-danger center-block">Reset</button>
            </div>

        </form>

        <!------------------------------------------------------------ Data ------------------------------------------------------------>
        <div class="row col-md-12 col-md-offset-0 custyle">
            <table class="table table-striped custab">
                <thead>
                <tr>
                    <th>Invoice No</th>
                    <th>Issue No</th>
                    <th>Order No</th>
                    <th>Vehicle No</th>
                    <th>Shop No</th>
                    <th>Driver</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Balance</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($invoices)) {
                    ?>
                    <tr>
                        <td><?php echo $row['invoice_id']; ?></td>
                        <td><?php echo $row['issue_no']; ?></td>
                        <td><?php echo $row['order_no']; ?></td>
                        <td><?php echo $row['vehicle_no']; ?></td>
                        <td><?php echo $row['shop_no'] . $row['shop_name']; ?></td>
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
                ?>
            </table>
        </div>
    </div>
</div>

</body>



</html>

<script>
    /*
     * Load the additional details of the selected item
     */
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

    /*
     * Load the vehicle number of the selected driver
     */
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

    /*
    * Load the shop number of the selected shop
    */
    function shopSelected(shopNo) {
        <?php
        mysqli_data_seek($shops, 0); // set the pointer back to the beginning
        while ($row = $shops->fetch_assoc()) {
        ?>
        if (shopNo == "<?php echo $row['shop_no']; ?>") {
            document.getElementById("shop_number_field").value = "<?php echo $row["shop_no"]; ?>";
            document.getElementById("shop_name").value = "<?php echo $row["shop_name"]; ?>";
        }
        <?php
        }
        ?>
    }

    /*
     * Calculate the total
     */
    function calculateTotal() {
        document.getElementById("sale_price").value = (document.getElementById("sale_quantity").value) * (document.getElementById("price").value);
    }

    /*
     * Calculate balance
     */
    function calculateBalance() {
        document.getElementById("balance").value = document.getElementById("payment").value - document.getElementById("total").value;
    }
	
	//invoice table
	
	window.addEventListener("load",initialize);
		
		
		function initialize(){

		btnSubmit.addEventListener("click" , btnSubmitMC);
		invoiceItems =[];
	
		}
		
		var rowCount = 1;
		
		
		function btnSubmitMC(){
	
		var tr  =  document.createElement('tr');
        var td5  =  document.createElement('td');
		var td  =  document.createElement('td');
		var td1 =  document.createElement('td');
		var td2 =  document.createElement('input');
		var td3 =  document.createElement('td');
		var td4 =  document.createElement('td');
			
		var btnDelete =  document.createElement('button');	
		
        tr.appendChild(td5);	
		tr.appendChild(td);
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		tr.appendChild(td4);

		td4.appendChild(btnDelete);	
		tbody.appendChild(tr);
			
		td.innerHTML= (item_code.options[item_code.selectedIndex].text);
		td1.innerHTML= price.value;
		td2.value= sale_quantity.value;
        td5.innerHTML = document.getElementById ("txtItemID").value;    
			
		
		var itemPrice = "itemPrice"+rowCount;
		var qty = "qty"+rowCount;
		var total = "total"+rowCount;
		var deleteRow = "deleteRow" +rowCount;	
		var nameItem = "nameItem"+rowCount;
        var codeItem = "codeItem"+rowCount;

		
		
		setAttribute(td,td1,td2,td3,td5,btnDelete,itemPrice,qty,total,deleteRow,rowCount,nameItem,codeItem);
				
		calculation(itemPrice,rowCount,qty,total);
		
		
		fillTable();
		
			rowCount++;
		
			//document.getElementById('total').value = document.getElementById('txtTotal').value;
			
		}
		
function setAttribute(td,td1,td2,td3,td5,btnDelete,itemPrice,qty,total,deleteRow,rowCount,nameItem,codeItem){
        
		td.setAttribute("id",nameItem);
		td1.setAttribute("id",itemPrice);	
		td2.setAttribute("id",qty);	
		td2.setAttribute("type","number");	
		td2.setAttribute("name", "tableQty");
		td2.setAttribute("onkeyup", "btnEditMC(this)");
		td3.setAttribute("id",total);
		td3.setAttribute("name", "tot");
		td5.setAttribute("id",codeItem);
        btnDelete.setAttribute("id", deleteRow);
		btnDelete.innerHTML= "remove";
		btnDelete.setAttribute("onClick", "btnDeleteMC(this)");
        
		}
		
function calculation(itemPrice,rowCount,qty,total){
	
	var a = document.getElementById("itemPrice"+rowCount).innerHTML;
	var b = document.getElementById("qty"+rowCount).value;
			
		
		var c = a * b;	
		document.getElementById("total"+rowCount).innerHTML = c;

	
}		
		
		function btnEditMC(y){
			
			var rowCount = tbody.childElementCount;
			
			k = y.getAttribute('id');
			m = y.previousSibling.getAttribute('id');
			l = y.nextSibling.getAttribute('id');
		
			var a = document.getElementById(m).innerHTML;
			var b = document.getElementById(k).value;

			var c = a * b;	
			document.getElementById(l).innerHTML = c;
			
			
			fillTable();
			
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
		

		function btnDeleteMC(x){
			
		var confirm = window.confirm("Are You want to delete this Item?");
			
			if(confirm==true){
				
				cell=x.parentNode; 
			  row =cell.parentNode ; 
			  tbody1 = row.parentNode ; 
			tbody1.removeChild(row);
		
			fillTable();
			}
			
		}
		
	function	discount(){
		
		fillTable();
	}

		
	function btnProcessMC(){
		
		var y = tbody.childElementCount;

for (i=1; i<=y; i++){
	//var y=1;
	var nameItemValue = document.getElementById("nameItem"+i).innerHTML;
		//window.alert(nameItemValue);
		priceItem = document.getElementById("itemPrice"+i).innerHTML;
		qtyItem = document.getElementById("qty"+i).value;
		totalItem = document.getElementById("total"+i).innerHTML;
        codeItem = document.getElementById("codeItem"+i).innerHTML;
		//y++;
	console.log(i);
		var item = new Object();
		item.name = nameItemValue;
		item.price = priceItem;
		item.qty = qtyItem;
		item.total = totalItem;
        item.code = codeItem;

		invoiceItems.push(item);}



		//console.log(invoiceItems);
	
    txtjsonValue.value = JSON.stringify(invoiceItems);
	document.myform.submit();
}
  

    } 
	
	
</script>