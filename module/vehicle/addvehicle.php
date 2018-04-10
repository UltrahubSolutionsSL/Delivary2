<?php
// Db connection
include_once '../../connection/config.php';
?>

<!doctype html>
<html lang="en">

<head>
   		<title>Add Vehicle</title>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="../../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
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

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

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
	    <li><a href="../vehicle/unLoadVehicle.php"><i class="pe-7s-cloud-download"></i><p>Vehicle Unload</p> </a></li>
	    <li class="active"><a href="../vehicle/addvehicle.php"><i class="pe-7s-cloud-download"></i><p>Add Vehicle</p> </a></li>
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
                    <a class="navbar-brand" href="#">Add Vehicle</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <!--  <li>
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="fa fa-dashboard"></i>
                                  <p class="hidden-lg hidden-md">Dashboard</p>
                              </a>
                          </li> -->

                        <!--
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                            -->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">
                                <!--<p>Account</p> -->
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
<form class="well form-horizontal" action="submitAddVehicle.php" method="post" id="" name="myform">

	<div class="row">
		<div class="col-lg-6">
				<label>Brand : </label><input name="brand" type="text" id="txtBrand" class="form-control" ><br>
		</div>

      <div class="col-lg-6">
      			<label>Model : </label><input name="model" type="text" id="txtModel" class="form-control" ><br>
	  </div>

        <div class="col-lg-6">
            <label>Vehicle Number : </label> <input class="form-control" type="text" placeholder="" id="txtNumber" name="number">
        </div>
	 
    <div class="col-lg-6">
		<label>type : </label> <input class="form-control" type="text" placeholder="" id="txtType" name="type">
	</div></div>
			<br><br>

        <div class="col-lg-3">

        </div>
	<div class="col-lg-4">
		<input type="submit" value="Add" class="btn btn-primary btn-block"  id="btnSubmit">
	</div>
    <div class="col-lg-2">
        <input type="Reset" value="Reset" class="btn btn-danger btn-block">
    </div>

        <div class="col-lg-3">

        </div>

		<hr>


	</form>
	
  <hr>

        <!-------table start-->
        <div class="row col-md-12 col-md-offset-0 custyle">
            <table class="table table-striped custab">
                <thead>

                <tr>

                    <th>Vehicle Brand <input type="text" id="txtSearchByBrand" onKeyUp="txtSearchByNameMC(this)" class="form-control" placeholder="Brand"></th>
                    <th>Vehicle Number <input type="text" id="txtSearchByNumber" onKeyUp="txtSearchByCodeMC(this)" class="form-control" placeholder="Name"></th>
                    <th>Vehicle Model</th>
                    <th>Vehicle Type</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody id = "tblTbody">
                <?php
                include("../../connection/config.php");
                $query3="SELECT * FROM `vehicle`";
                $run3=mysqli_query($conn,$query3);
                while($col=mysqli_fetch_array($run3)){
                    $vid = $col['id'];
                    $vbrand=$col['brand'];
                    $vmodel=$col['model'];
                    $vnumber=$col['number'];
                    $vtype=$col['type'];


                    echo" <tr>
                    <td>$vbrand</td>
                    <td>$vnumber</td>
                    <td>$vmodel</td>
                    <td>$vtype</td>
                   <td class='text-center'><a class='btn btn-info btn-xs' href='VehicleUpdate.php?vbrand=$vbrand&vnumber=$vnumber&vmodel=$vmodel&vtype=$vtype&vid=$vid'><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='vehicledel.php?id=$vid' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>
              </tr> " ;
                }
                ?>
                </tbody>

            </table>
        </div>

        <!------table End-->
    </div>
	</div>
    </div>
</div>


</body>
<script>

    function txtSearchByNameMC(txtSearchByBrand){

        var searchText = txtSearchByBrand.value.toLowerCase();
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

    function txtSearchByCodeMC(txtSearchByNumber){

        var searchText = txtSearchByNumber.value.toLowerCase();
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




</script>

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
</html>

<!--form-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script src="../../assets/js/index.js"></script>


</html>
