<?php
session_start();
$loggedDate =  date("Y-m-d");
$loggedUser = $_SESSION['f_name']." ". $_SESSION['l_name'];
// Db connection
include_once '../../connection/config.php';
include_once '../../include/methods.php';
// Load routes from Db
$sql_routes = "SELECT * FROM daily WHERE date = '$loggedDate' AND rep_name = '$loggedUser'";
$routes = mysqli_query($conn, $sql_routes);

while ($a = mysqli_fetch_array($routes)) {

    $routeName = $a['route'];
}


$sqlToInvoiceNumber = "SELECT * FROM `invoice` WHERE `route_id`='$routeName' AND `type`='credit'";
$invoices = mysqli_query($conn,$sqlToInvoiceNumber);



//die;
?>


<!doctype html>
<html lang="en">

<head>
   		<title>Payment</title>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <meta name="viewport" content="width=device-width"/>
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../../assets/css/animate.min.css" rel="stylesheet"/>
    <link href="../../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="../../assets/css/demo.css" rel="stylesheet"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <link href="../../assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
     type="text/javascript"></script>
    <link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet prefetch"
          href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css">
    <link href="../../assets/css/style.css" rel="stylesheet"/>
    <link href="../../assets/css/table.css" rel="stylesheet"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../assets/js/chartist.min.js"></script>
	<script src="../../assets/js/bootstrap-notify.js"></script>
<!--	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
	<script src="../../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
	<script src="../../assets/js/demo.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
	<script src="../../assets/js/index.js"></script>
</head>

<body class="menu-on-left">
<noscript><h3> You must have JavaScript enabled. </h3>
    <meta HTTP-EQUIV="refresh" content=0;url="../javascriptNotEnabled.php"></noscript>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
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

            <li>
                <a href="../invoice/invoice-management.php"><i class="pe-7s-note2"></i><p>Invoice</p></a>
            </li>

                <li class="active">
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
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Payment</a>
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
<br>
        <div class="container-fluid">
<!--<form class="well form-horizontal" action="" method="post" id="" name="myform">-->
<!---->
<!--	<div class="row">-->
<!--		<div class="col-lg-5">-->
<!--				<label>Date : </label><input name="date" type="text" required="required" id="date" class="form-control" value="--><?php //echo date("Y/m/d");?><!--" readonly><br>-->
<!--		</div>-->
<!---->
<!--	-->
<!--		<div class="col-lg-5">-->
<!--            <label> Representative : </label>-->
<!--            <select name="rep_name"  id="driver_id" onchange="CheckOther(this.value)" class="form-control" required="required">-->
<!--                <option disabled="disabled" selected="selected">Select Representative</option>-->
<!--                --><?php //while ($rows = mysqli_fetch_array($drivers)) { ?>
<!--                    <option value="--><?php //echo $rows['first_name'].' '. $rows['last_name']; ?><!--"-->
<!--                            class="round default-width-input">--><?php //echo $rows['first_name'].' '. $rows['last_name']; ?><!--</option>-->
<!--                --><?php //} ?>
<!--            </select><br>-->
<!--		</div>-->
<!---->
<!--	</div>-->
<!--	-->
<!--<div class="row">-->
<!--  		<div class="col-lg-5">-->
<!--	  			<label> Route : </label>-->
<!---->
<!--                <select name="route" id="route_id" onchange="CheckOther(this.value)" class="form-control" required="required">-->
<!--                		<option disabled="disabled" selected="selected">Select route</option>-->
<!--                			--><?php //while ($rows = mysqli_fetch_array($routes)) { ?>
<!--               		 	<option value="--><?php //echo $rows['route']; ?><!--"-->
<!--                 		class="round default-width-input">--><?php //echo $rows['route']; ?><!--</option>-->
<!--               	 	--><?php //} ?>
<!--                 	</select>-->
<!--  -->
<!--	  </div>-->
<!--             <div class="col-lg-5">-->
<!--	  <label> Vehicle Number : </label>-->
<!--	  <select name="vehicle_no" class="form-control" id="vehicle_no" required="required">-->
<!--          <option disabled="disabled" selected="selected">Select Vehicle</option>-->
<!--          --><?php //while ($rows = mysqli_fetch_array($vehicles)) { ?>
<!--              <option value="--><?php //echo $rows['number']; ?><!--"-->
<!--                      class="round default-width-input">--><?php //echo $rows['number']; ?><!--</option>-->
<!--          --><?php //} ?>
<!--	  </select>-->
<!--	  </div>-->
<!--     -->
<!--           -->
<!--         </div> <br><br> <hr>-->
         
         
         
         <div class="row" align="center">
	<h3 align="center">Credit Invoices</h3>
		
		<table class="table" id="tbl2">
		 <thead>
		 <tr>
			 <th>Shop Name <input type="text" id="txtSearchByShopName" onKeyUp="txtSearchByShopNameMC(this)" class="form-control" placeholder="Search By Shop Name"></th>
			 <th>Invoice Number <input type="text" id="txtSearchByInvoiceNo" onKeyUp="txtSearchByInvoiceNoMC(this)" class="form-control" placeholder="Search by Invoice No"></th>
             <th>Invoice Date</th>
			 <th>Invoice Total</th>
			 <th>Total Payments</th>
			 <th>Balance</th>
             <th>RepName</th>
			 
			 <th>Add</th>
			 <th hidden="hidden"  >Remain</th>
			 <th hidden="hidden" >Item Code</th>
			 
		</tr>
		 </thead>
	   <tbody id="tblTbody">


		   <?php
            $i = 0;

           while ($invoice = mysqli_fetch_array($invoices)){

               $invoiceNo = $invoice['invoice_id'];
               $sqlToPayment = "SELECT * FROM `payment` WHERE `invoiceno` = '$invoiceNo' AND`status`='active'
AND `balance`<> 0";

               $creditBills = mysqli_query($conn,$sqlToPayment);

           while ($row = mysqli_fetch_assoc($creditBills)) {
           $i++;

           ?>

           <tr>
               <td><?php echo $row['shop_name']; ?></td>

               <td><?php echo $row['invoiceno']; ?></td>

               <td><?php echo $row['date']; ?></td>

               <td><?php echo $row['billamount']; ?></td>



               <td><?php echo $row['paymentamount']; ?></td>

               <td style="color: #ff0000"><?php echo abs($row['balance']); ?></td>

               <td><?php echo $row['rep_name']; ?></td>

               <td>
                  <a href="addpayment.php?shopname=<?php echo $row['shop_name']; ?>&invoice=<?php echo $row['invoiceno']; ?>
&total=<?php echo $row['billamount'];?>&payment=<?php echo $row['paymentamount'];?>&repname=<?php echo $row['rep_name'];?>
&balance=<?php echo $row['balance'];?>"><button class="btn btn-primary">Payment</button></a> </td>

               <td hidden><input  type="text"  readonly size="10px"/></td>
               <td hidden><?php echo $row['item_code']; ?></td>    <?php } ?> <?php } ?>




                    </tr>
			</tbody>
			 </table>
		
		
		
		</div>
		<hr>

    

   
<!--	</form>-->
	
  <hr>


	</div>
	</div>
    </div>
</div>

</div>
</body>
<script>

    function txtSearchByInvoiceNoMC(txtSearchByInvoiceNo){

        var searchText = txtSearchByInvoiceNo.value.toLowerCase();
        //window.alert(searchText);

        var tbody = document.getElementById('tblTbody');

        var rows = tbody.children;
        for(var i=0; i<rows.length; i++){
            var row = rows[i];
            var cells = row.children;
            var namecell = cells[1];
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
            var namecell = cells[0];
            var name = namecell.innerHTML.toLowerCase();
            if(name.search(searchText)==-1){
                row.style.display='none';
            }else{
                row.style.display='table-row';
            }
        }
    }


</script>

</html>
