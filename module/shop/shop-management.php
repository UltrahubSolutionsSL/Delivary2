<?php
// Db connection
include_once '../../connection/config.php';
include_once '../../include/methods.php';

// Get the type of the request: add / update
if (isset($_GET['shop_no'])) {
    $update = true;
    $shop_no = $_GET['shop_no'];
    // Fetch the corresponding record from Db
    $sql = "SELECT shop_name, shop_no, location, owner, comment, shop_contact FROM shops WHERE shop_no = '$shop_no'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $shop_name = $row['shop_name'];
    $shop_location = $row['location'];
    $shop_number = $_GET['shop_no'];
	$shop_contact = $row['shop_contact'];
    $shop_owner = $row['owner'];
    $comment = $row['comment'];
} else {
    $update = false;
}


// Load shops from Db
$sql = "SELECT route_id,shop_name, shop_no, location, owner, comment, shop_contact FROM shops;";
$result = mysqli_query($conn, $sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
// Load routes from Db
$sql_routes = "SELECT id, route FROM route";
$routes = mysqli_query($conn, $sql_routes);

// Fetch shop number from Db
$sqlToFetchShopNo = "SHOW TABLE STATUS LIKE 'shops';";
$shop_no = mysqli_query($conn, $sqlToFetchShopNo)->fetch_assoc()['Auto_increment'];
?>

<!doctype html>
<html lang="en">
<head>
    <noscript><h3> You must have JavaScript enabled. </h3>
        <meta HTTP-EQUIV="refresh" content=0;url="../javascriptNotEnabled.php"></noscript>
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
<body class="menu-on-left">

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="../../assets/img/sidebar-5.jpg">

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


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

            <li class="active">
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
                    <a class="navbar-brand" href="#">Location Management</a>
                </div>

                <!--Log Out Process Starts-->
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
                <!--Log Out Process End-->

            </div>
        </nav>

        <!--form start-->
        <form class="well form-horizontal" action="add-shop-process.php" method="post" id="shop_form">
            <fieldset>

                <!-- Form Name -->
                <legend>Add New Shop</legend>

                <!-- Hidden field to distinguish between add and update -->
                <input type="hidden" name="update" value="<?php echo $update; ?>">
                <input type="hidden" name="old_shop_number" value="<?php echo $shop_no; ?>">

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Route</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tree-conifer"></i></span>
                            <select name="route_id" id="route_id" onchange="CheckOther(this.value);"
                                    class="form-control" required="required">
                                <option disabled="disabled" selected="selected">Select route</option>
                                <?php while ($rows = mysqli_fetch_array($routes)) { ?>
                                    <option value="<?php echo $rows['id']; ?>"
                                            class="round default-width-input"><?php echo $rows['route']; ?></option>
                                <?php } ?>
                                <option value="">Other</option>
                            </select>
                        </div>
                        <input id="new_route" name="new_route" placeholder="Type new route" class="form-control"
                               type="text" style="visibility: hidden">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Shop Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tree-conifer"></i></span>
                            <input name="shop_name" placeholder="Type Shop Name" class="form-control" type="text"
                                   required="required"
                                   value="<?php echo $shop_name; ?>">
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Shop number</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-asterisk"></i>
                            </span>
                            <input name="shop_number" class="form-control" type="number" required="required"
                                   value="<?php echo $shop_no; ?>" readonly="readonly">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Location Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-tasks"></i>
                            </span>
                            <textarea class="form-control" name="shop_location" placeholder="Type Place Location">
                                <?php echo $shop_location; ?>
                            </textarea>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label class="col-md-4 control-label">Contact No.</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                            <input name="shop_contact" class="form-control" type="text" placeholder="Type Contact Number"
                                   value="<?php echo $shop_contact; ?>">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Owner Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
                            <input name="shop_owner" class="form-control" type="text" placeholder="Type owner name"
                                   value="<?php echo $shop_owner; ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Comment</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
                            <textarea class="form-control" name="comment" placeholder="Type comment">
                                <?php echo $comment; ?>
                            </textarea>
                        </div>
                    </div>
                </div>

                <!--user add-->

                <!-- Success message -->
                <div class="alert alert-success" role="alert" id="success_message">Success <i
                            class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you
                    shortly.
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-warning">Send <span
                                    class="glyphicon glyphicon-send"></span></button>
                    </div>

                    <div class="col-md-2">
                        <button type="reset" class="btn btn-danger center-block">Reset</button>
                    </div>
                </div>

            </fieldset>
        </form>

        <!--form start-->
        <!--table start-->
        <div class="row col-md-12 col-md-offset-0 custyle">
            <table class="table table-striped custab">
                <thead>
                <tr>
                    <th hidden="hidden">Route ID</th>
                    <th>Shop Name  <input type="text" id="txtSearchByName" onKeyUp="txtSearchByNameMC(this)" class="form-control" placeholder="Search Shop By Name"> </th>
                    <th>Shop ID <input type="text" id="txtSearchByCode" onKeyUp="txtSearchByCodeMC(this)" class="form-control" placeholder="Search Shop By Shop Code"></th>
                    <th>Location Name <input type="text" id="txtSearchByLocatin" onKeyUp="txtSearchByLocationMC(this)" class="form-control" placeholder="Search Shop By Shop Location"></th>
                    <th>Owner Name <input type="text" id="txtSearchByOwner" onKeyUp="txtSearchByOwnerMC(this)" class="form-control" placeholder="Search Shop By Shop Owner"></th>
                    <th>Comment </th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                </thead>
				<tbody id="tblTbody">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr><td hidden="hidden"><?php echo $row['route_id']; ?></td>
                        <td><?php echo $row['shop_name']; ?></td>
                        <td><?php echo $row['shop_no']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['owner']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td><?php echo $row['shop_contact']; ?></td>
                        <td class="text-center">
                            <a class='btn btn-info btn-xs' href="shop-update.php?shop_no=<?php echo $row['shop_no']; ?>&shop_name=<?php echo $row['shop_name']; ?>&location=<?php echo $row['location'];?>&contact=<?php echo $row['shop_contact'];?>&comment=<?php echo $row['comment'];?>&owner=<?php echo $row['owner'];?>&select_route=<?php echo $row['route_id'];?>">
                                <span class="glyphicon glyphicon-edit"></span> Edit
                            </a>
                            <a onClick="return confirmDelete()"
                               href="delete-shop-process.php?shop_no=<?php echo $row['shop_no'] ?>"
                               class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-remove"></span> Del
                            </a>
                        </td>
                    </tr>
                   
                    <?php
                }
                ?>
 </tbody>
            </table>
        </div>

        <!--table End-->


        <!--footer Start-->
        <!--footer End-->


    </div>
</div>


</body>

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

</html>
<!--form-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script src="../../assets/js/index.js"></script>
<!--form-->

<script type="text/javascript">
    // to display text box when select other option
    function CheckOther(val) {
        var element = document.getElementById('new_route');
        if (val == '')
            element.style.visibility = 'visible';
        else
            element.style.visibility = 'hidden';
    }
	
	function txtSearchByNameMC(txtSearchByName){
			
        	var searchText = txtSearchByName.value.toLowerCase();
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

	function txtSearchByCodeMC(txtSearchByCode){
			
        	var searchText = txtSearchByCode.value.toLowerCase();
			//window.alert(searchText);
			
        	var tbody = document.getElementById('tblTbody');
			
        	var rows = tbody.children;
        	        	for(var i=0; i<rows.length; i++){
        	        		var row = rows[i];
        	        		var cells = row.children;
        	        		var namecell = cells[2];
        	        		var name = namecell.innerHTML.toLowerCase();
        	        		if(name.search(searchText)==-1){
        	        			row.style.display='none';
        	        		}else{
        	        			row.style.display='table-row';
        	        		}
        	        	}
        }
	function txtSearchByLocationMC(txtSearchByLocation){
			
        	var searchText = txtSearchByLocation.value.toLowerCase();
			//window.alert(searchText);
			
        	var tbody = document.getElementById('tblTbody');
			
        	var rows = tbody.children;
        	        	for(var i=0; i<rows.length; i++){
        	        		var row = rows[i];
        	        		var cells = row.children;
        	        		var namecell = cells[3];
        	        		var name = namecell.innerHTML.toLowerCase();
        	        		if(name.search(searchText)==-1){
        	        			row.style.display='none';
        	        		}else{
        	        			row.style.display='table-row';
        	        		}
        	        	}
        }
	function txtSearchByOwnerMC(txtSearchByOwner){
			
        	var searchText = txtSearchByOwner.value.toLowerCase();
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
	
</script>