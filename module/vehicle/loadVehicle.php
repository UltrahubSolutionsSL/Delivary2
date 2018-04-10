<?php
session_start();
// Db connection
include_once '../../connection/config.php';
include_once '../../include/methods.php';
// Load routes from Db
$sql_routes = "SELECT id, route FROM route";
$routes = mysqli_query($conn, $sql_routes);
//Load Items from DB
$sql_items = "SELECT item_name, quantity ,price, item_code FROM stock";
$items = mysqli_query($conn, $sql_items);
//Load vehicles from DB
$sql_vehicle = "select `id`,`number` from vehicle";
$vehicles = mysqli_query($conn,$sql_vehicle);
//Load drivers from DB
$sql_driver = "select `nic`,`first_name`,`last_name` from drivers ";
$drivers = mysqli_query($conn,$sql_driver);
?>


<!doctype html>
<html lang="en">

<head>
   		<title>Daily Route Selection</title>
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

<body class="container-fluid menu-on-left">

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

            <li id="invoice">
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


            <li  id="vehicle"><a href="../vehicle/loadVehicle.php"><i class="pe-7s-car"></i><p>Vehicle</p> </a>
            
            
	<ul id="ulVehicle">
        <li class="active"><a href="../vehicle/loadVehicle.php"><i class="pe-7s-cloud-upload"></i><p>Vehicle Load</p> </a></li>
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
                    <a class="navbar-brand" href="#">Vehicle Load Management</a>
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
<form class="well form-horizontal" action="submitLoadVehicle.php" method="post" id="" name="myform">

	<div class="row">
		<div class="col-lg-5">
				<label>Date : </label><input name="date" type="text" id="date" class="form-control" value="<?php echo date("Y/m/d");?>" readonly><br>
		</div>

	
		<div class="col-lg-5">
            <label> Representative : </label>
            <select name="rep_name" id="driver_id" onchange="CheckOther(this.value)" class="form-control" required>
                <option disabled="disabled" selected="selected">Select Representative</option>
                <?php while ($rows = mysqli_fetch_array($drivers)) { ?>
                    <option value="<?php echo $rows['first_name'].' '. $rows['last_name']; ?>"
                            class="round default-width-input"><?php echo $rows['first_name'].' '. $rows['last_name']; ?></option>
                <?php } ?>
            </select><br>
		</div>

	</div>
	
<div class="row">
  		<div class="col-lg-5">
	  			<label> Route : </label>

                <select name="route" id="route_id" onchange="CheckOther(this.value)" class="form-control" required>
                		<option disabled="disabled" selected="selected">Select route</option>
                			<?php while ($rows = mysqli_fetch_array($routes)) { ?>
               		 	<option value="<?php echo $rows['route']; ?>"
                 		class="round default-width-input"><?php echo $rows['route']; ?></option>
               	 	<?php } ?>
                 	</select>
  
	  </div>
             <div class="col-lg-5">
	  <label> Vehicle Number : </label>
	  <select name="vehicle_no" class="form-control" id="vehicle_no">
          <option disabled="disabled" selected="selected">Select Vehicle</option>
          <?php while ($rows = mysqli_fetch_array($vehicles)) { ?>
              <option value="<?php echo $rows['number']; ?>"
                      class="round default-width-input"><?php echo $rows['number']; ?></option>
          <?php } ?>
	  </select>
	  </div>
     
           
         </div> <br><br> <hr>
         
         
         
         <div class="row" align="center">
	<h3 align="center">Load Items</h3>							  
		
		<table class="table" id="tbl2">
		 <thead>
		 <tr>
			 <th>Item Name</th>
			 <th>Item Price</th>
			 <th>Available Qty</th>
			 <th>Qty</th>
			 <th>Total Price</th>
			 
			 <th>Add</th>
			 <th hidden="hidden"  >Remain</th>
			 <th hidden="hidden" >Item Code</th>
			 
		</tr>
		 </thead>
	   <tbody id="tbody2">
		   <?php
            $i = 0;
                while ($row = mysqli_fetch_assoc($items)) {
     $i++;

                    ?>
           
                    	<tr>
                        <td><?php echo $row['item_name']; ?></td>
                        
                        <td><?php echo $row['price']; ?></td>
                        
                        <td><?php echo $row['quantity']; ?></td>
                        
						<td><input onKeyUp="txtQtyKU(this)" type="text" name="txtQty" size="10px"/></td>
						
						<td><input type="text" id="" size="10px" readonly></td>								
						
						<td> 
					<input type="button" value="Add" class="btn btn-primary" onclick="btnSubmitMC(this)"> </td>
							
                   <td hidden><input  type="text"  readonly size="10px"/></td>
                         <td hidden><?php echo $row['item_code']; ?></td>    <?php } ?>           
                    </tr>
			</tbody>
			 </table>
		
		
		
		</div>
		<hr>

    
		<h3 align="center"> Item List</h3>
		
	        
  <table class="table" id="tbl1">
    <thead>
      <tr>
        <th>Item Name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Action</th>
		 <th hidden>Remain</th>
		  <th hidden>Item Code</th>
		  <th hidden>Item Price</th>
		  
		
      </tr>
    </thead>
    <tbody id="tbody">
 
    </tbody>
		</table>
		

	<div align="center">
 <input type="button" value="Confirm" class="btn btn-default" align="center" onClick="btnProcessMC()" > 
	</div>	
			 <input type="text" name="jsonValue" id="txtjsonValue" hidden>
   
	</form>
	
  <hr>


	</div>
	</div>
    </div>
</div>

<input type="hidden" value="<?php echo $_SESSION['role_name']?>" id="txtusertype" readonly>
</body>

<script>
window.addEventListener("load",initialize); 	
window.addEventListener("load", init);
	
valid="lightgreen"; 
invalid="pink";
initial="white";
var rowCount = 1;
invoiceItems =[];

function initialize(){
	
	

}		

    

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


function btnSubmitMC(x){
	
		var tr  =  document.createElement('tr');
		var td  =  document.createElement('td');
		var td1 =  document.createElement('td');
		var td2 =  document.createElement('td');
		var td3 =  document.createElement('td');
		var td4 =  document.createElement('td');
		var td5 =  document.createElement('td');
		var td6 =  document.createElement('td');
	
	
	
		var btnDelete =  document.createElement('button');
		 btnDelete.setAttribute("type","button");
		
		var qty = "qty"+rowCount;
		var price = "price"+rowCount;
		var deleteRow = "deleteRow" +rowCount;	
		var itemName = "itemName" + rowCount;
		var remain = "remain"+rowCount;
		var itemCode = "itemCode"+rowCount;
		var priceItem = "priceItem"+rowCount;
		
	
		tr.appendChild(td);
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		tr.appendChild(td4);
		tr.appendChild(td5);
		tr.appendChild(td6);
		
		
		td3.appendChild(btnDelete);	
		tbody.appendChild(tr);


	var a = x.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
	
	var b = x.parentElement.previousElementSibling.previousElementSibling.lastChild.value;
	
	var c = x.parentElement.previousElementSibling.lastChild.value;
	
	var d = x.parentElement.nextElementSibling.lastChild.value;
	
	var e = x.parentElement.nextElementSibling.nextElementSibling.innerHTML;
	
	var f = x.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;

	
	td.innerHTML=a;
	td1.innerHTML=b;
	td2.innerHTML=c;
	td4.innerHTML=d;
	td5.innerHTML=e;
	td6.innerHTML=f;

	
	setAttributes(td,td1,td2,td3,td4,td5,td6,btnDelete,qty,deleteRow,rowCount,itemName,price,remain,itemCode,priceItem);
				
	
rowCount++;

x.value = "Added"
}
		
function setAttributes(td,td1,td2,td3,td4,td5,td6,btnDelete,qty,deleteRow,rowCount,itemName,price,remain,itemCode,priceItem){						
	    td.setAttribute("id",itemName);	
		td1.setAttribute("id",qty);	
		td2.setAttribute("id",price);	
		td4.setAttribute("id",remain);	
		td4.setAttribute("hidden","hidden");	
		td5.setAttribute("id", itemCode);
		td5.setAttribute("hidden", "hidden");
		td6.setAttribute("hidden", "hidden");
		td6.setAttribute("id",priceItem);
																											
																										
		btnDelete.setAttribute("id", deleteRow);
	    btnDelete.setAttribute("class", "btn btn-danger");
		btnDelete.innerHTML= "remove";
		btnDelete.setAttribute("onClick", "btnDeleteMC(this)");	
		}
		
	
		
function btnEditMC(y){
			
			var rowCount = tbody.childElementCount;
			
			k = y.getAttribute('id');
			l = y.nextSibling.getAttribute('id');
		
			var b = document.getElementById(k).value;	
			document.getElementById(l).innerHTML = b;
			
			
		
			
		}
		

		
function btnDeleteMC(x){
			
		var confirm = window.confirm("Are You want to delete this Item?");
			
			if(confirm==true){
				
				  cell=x.parentNode;
            row =cell.parentNode ;
            tbody1 = row.parentNode ;

            cell.previousElementSibling.innerHTML = "0"
            cell.previousElementSibling.previousElementSibling.innerHTML = "0"
            cell.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML = "Deleted"
            cell.nextElementSibling.innerHTML = "0"
            cell.nextElementSibling.nextElementSibling.innerHTML = "0"
            cell.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML = "0"

            row.setAttribute("style","display:none");
		
			
			}
			
		}

function btnProcessMC(){
		
		var y = tbody.childElementCount;

for (i=1; i<=y; i++){

	
	var nameItemValue = document.getElementById("itemName"+i).innerHTML;
	var	qtyItem = document.getElementById("qty"+i).innerHTML;
    var priceItem = document.getElementById("price"+i).innerHTML;
  	var remain = document.getElementById("remain"+i).innerHTML;
	var code = document.getElementById("itemCode"+i).innerHTML;
	var iprice = document.getElementById("priceItem"+i).innerHTML;
	
		var item = new Object();
		item.name = nameItemValue;
		item.qty = qtyItem;
		item.price = priceItem;
		item.remain = remain;
		item.itemCode = code;
		item.iprice = iprice;

			
			invoiceItems.push(item);
		}
	 	txtjsonValue.value = JSON.stringify(invoiceItems);
		document.myform.submit();
		}
	
function itemSelected() {
        var itemId = document.getElementById("txtItemName").value;
	  var itemId2 = document.getElementById("txtItemName").innerHTML; // Id of the selected item
      
	  <?php
        mysqli_data_seek($items, 0); // set the pointer back to the beginning
        while ($item = $items->fetch_assoc()) {
        ?>
        if (itemId == "<?php echo $item['item_code']; ?>") {
            document.getElementById("codeItem").value = "<?php echo $item['item_code']; ?>";
            document.getElementById("codeName").value = "<?php echo $item['item_name']; ?>";
        }
        <?php
        }
        ?>
    }	
	
function txtQtyKU(x){
		var l = parseInt(x.parentElement.previousElementSibling.innerHTML);
		
		
	
	if(l<x.value){
		var y = x.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild;
		y.setAttribute("disabled","disabled");
		x.style.background=invalid; 

		}
	else{
		var y = x.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild;
		y.removeAttribute("disabled");
		x.style.background=valid;
	
	var z = parseInt((x.parentElement.previousElementSibling.previousElementSibling.innerHTML));
		
		x.parentElement.nextElementSibling.lastElementChild.value =(x.value * z);
		
	var remain = parseInt((x.parentElement.previousElementSibling.innerHTML))-(x.value);
		x.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.value = remain;
		
	}

}	

</script>

</html>
