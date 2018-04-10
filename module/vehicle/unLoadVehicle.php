<?php

include_once '../../connection/config.php';
include_once '../../include/methods.php';

$sql_drivers = "SELECT * FROM drivers;";


$drivers = mysqli_query($conn , $sql_drivers);

?>

<script>

 <?php

 $stock = mysqli_query($conn, $sql_loadStock);

 ?>


</script>



<!doctype html>
<html lang="en">
<head>   <title>Daily Stock Unload</title>
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

            <li>
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
	    <li class="active"><a href="../vehicle/unLoadVehicle.php"><i class="pe-7s-cloud-download"></i><p>Vehicle Unload</p> </a></li>
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
                    <a class="navbar-brand" href="#">Vehicle Unload Management</a>
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
 
		<h3 align="center"> Vehicle Unload </h3>
		<br>
        <div id="rslt"> </div>
<div class="container"></div><form name="myform3" method="post" action="submitUnloadVehicle2.php">
        <label>Select A Representative</label>

        <select name="rep_name" id="driver_id" onchange="repName(this.value)" class="form-control" required>

            <option disabled="disabled" selected="selected" value="0" >Select Representative</option>

            <?php while ($rows = mysqli_fetch_array($drivers)) { ?>

                <option value="<?php echo $rows['first_name'].' '. $rows['last_name']; ?>"
                        class="round default-width-input">

                    <?php echo $rows['first_name'].' '. $rows['last_name']; ?></option>
            <?php } ?><input type="text" name="RepName" id="txtRepName" readonly hidden>
        </select>

            <input type="button" class="btn btn-default" value="Confirm" onclick="btnLoadMc()">
        </form>

    </div>





	</body>


</html>
<script>



    var rowCount = 1;
    stockItems = [];

    function correct(x) {

        var tr  =  document.createElement('tr');
        var td  =  document.createElement('td');
        var td1 =  document.createElement('td');
        var td2 =  document.createElement('td');
        var td3 =  document.createElement('td');

        tr.appendChild(td);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);

        tbody2.appendChild(tr);

        td.innerHTML = x.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
        td1.innerHTML = x.parentElement.previousElementSibling.previousElementSibling.innerHTML;
        td2.innerHTML = x.parentElement.previousElementSibling.lastChild.value;
        td3.innerHTML = parseInt(x.parentElement.nextElementSibling.innerHTML)+parseInt(td2.innerHTML);


        var itemName = "itemName"+rowCount;
        var itemCode = "itemCode"+rowCount;
        var qty = "qty"+rowCount;
        var stk = "stk"+rowCount;

        setAttribute(td,td1,td2,td3,itemName,itemCode,qty,stk);

        rowCount++;

        var cell = x.parentNode;
        var row = cell.parentNode;
        var tbody = row.parentNode;
        tbody.removeChild(row);

    }

    function setAttribute(td,td1,td2,td3,itemName,itemCode,qty,stk) {

        td.setAttribute("id", itemName);
        td1.setAttribute("id", itemCode);
        td2.setAttribute("id", qty);
        td3.setAttribute("id", stk);
        td3.setAttribute("style", "display:none");

    }

    function btnProcessMC(){

        var y = tbody2.childElementCount;

        for (i=1; i<=y; i++){


            var itemName = document.getElementById("itemName"+i).innerHTML;
            var	itemCode = document.getElementById("itemCode"+i).innerHTML;
            var qty = document.getElementById("qty"+i).innerHTML;
            var stk = document.getElementById("stk"+i).innerHTML;


            var stock = new Object();
            stock.itemName = itemName;
            stock.itemCode = itemCode;
            stock.qty = qty;
            stock.stk = stk;


            stockItems.push(stock);
        }
        txtjsonValue.value = JSON.stringify(stockItems);
        document.myform2.submit();
    }


    function repName(x) { <?php

        mysqli_data_seek($drivers, 0); // set the pointer back to the beginning
        while ($rows = $drivers->fetch_assoc()) {
        ?>
        if (x == "<?php echo $rows['first_name'].' '. $rows['last_name']; ?>") {

            txtRepName.value = x;

        }
        <?php
        }
        ?>
    }
function btnLoadMc() {
        var d_id = document.getElementById("driver_id").value;

        if(d_id != 0) { //window.alert(d_id);

document.myform3.submit();
}

else{
    window.alert("Please Select a Representative");
}

}
</script>
<!--   Core JS Files   -->
<script src="../../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>

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