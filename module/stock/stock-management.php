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
<body class="menu-on-left">
<noscript><h3> You must have JavaScript enabled. </h3>
    <meta HTTP-EQUIV="refresh" content=0;url="../javascriptNotEnabled.php"></noscript>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="../../assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    <div class="sidebar-wrapper">
        <div class="logo">
           <h3>Stock Managment System</h3> 
        </div>

         <ul class="nav">
            <li>
                <a href="../profile/profile-management.php"><i class="pe-7s-user"></i> <p>Profile</p></a>
            </li>
            <li>
                <a href="../driver/driver-management.php"><i class="pe-7s-users"></i> <p>representative</p></a>
            </li>
            <li class="active">
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Stock</a>
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

<!--form start-->
<form class="well form-horizontal" action=" " method="post"  >
        <fieldset>
        
        <!-- Form Name -->
        <legend>Add Stocks</legend>
        
        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Item Name</label>
          <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-tree-conifer"></i></span>
          <input  name="i_name" placeholder="item Name" class="form-control"  type="text">
           <div id="search">
	</div>
            </div>
          </div>
        </div>
        
        <!-- Text input-->
        
        <div class="form-group">
          <label class="col-md-4 control-label" >Item Code</label> 
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
          <input name="i_code" placeholder="Item Name" class="form-control"  type="text">
            </div>
          </div>
        </div>
        
       
          
        <div class="form-group">
          <label class="col-md-4 control-label">Description</label>
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                    <textarea class="form-control" name="comment" placeholder="Type your Description"></textarea>
          </div>
          </div>
        </div>

       
       <div class="form-group">
            <label class="col-md-4 control-label" >Expire Date</label> 
              <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
            <input name="exd" class="form-control"  type="date">
              </div>
            </div>
          </div>
      
          <div class="form-group">
                <label class="col-md-4 control-label">Quantity</label>  
                <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
                <input  name="qut" placeholder="type your quantity" class="form-control"  type="number">
                  </div>
                </div>
              </div>



              <div class="form-group">
                    <label class="col-md-4 control-label">Price</label>  
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                    <input  name="pr" placeholder="type your price" class="form-control"  type="text">
                      </div>
                    </div>
                  </div>

             



<!-------user add--->
        
        <!-- Success message -->
        <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>
        
        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-4">
            <button type="submit" class="btn btn-warning" name="btn2" >Send <span class="glyphicon glyphicon-send"></span></button>
          </div>
        </div>
        
        </fieldset>
        </form>           

          <?php
          include("../../connection/config.php");
          if(isset($_POST['btn2'])){
          $iname=$_POST['i_name'];
          $icode=$_POST['i_code'];
          $des=$_POST['comment'];
          $exd=$_POST['exd'];
          $quan=$_POST['qut'];
          $pri=$_POST['pr'];

          $query="INSERT INTO `stock` (`item_name`, `item_code`, `description`, `expire_date`, `quantity`, `price`) VALUES ('$iname', '$icode', '$des', '$exd', '$quan', '$pri')";
          $run=mysqli_query($conn,$query);
          if($run){

              echo"<script>alert('insert ok!!')</script>";
          }else{
            echo"<script>alert('insert fail!!')</script>";

          }





          }
          ?>
<!--form start-->
  <!-------table start-->
<div class="row col-md-12 col-md-offset-0 custyle">
        <table class="table table-striped custab">
        <thead>
        
            <tr>

                <th>Item Name <input type="text" id="txtSearchByName" onKeyUp="txtSearchByNameMC(this)" class="form-control" placeholder="Search Item By Name"></th>
                <th>Item Code <input type="text" id="txtSearchByCode" onKeyUp="txtSearchByCodeMC(this)" class="form-control" placeholder="Search Item By Item Code"></th>
                <th>Description</th>
                <th>Expire Date</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
           <tbody id = "tblTbody">
            <?php
            include("../../connection/config.php");
            $query3="SELECT * FROM `stock`";
            $run3=mysqli_query($conn,$query3);
            while($col=mysqli_fetch_array($run3)){
            $iname=$col['item_name'];
            $icode=$col['item_code'];
            $des=$col['description'];
            $exp=$col['expire_date'];
            $quan=$col['quantity'];
            $pri=$col['price'];


               echo" <tr>
                    <td>$iname</td>
                    <td>$icode</td>
                    <td>$des</td>
                    <td>$exp</td>
                    <td>$quan</td>
                    <td>$pri</td>
                    <td class='text-center'><a class='btn btn-info btn-xs' href='StockUpdate.php?iname=$iname&icode=$icode&des=$des&exp=$exp&quan=$quan&pri=$pri'><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='stockdel.php?id=$icode' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>
                </tr> " ;
            }
            ?>
			</tbody>

        </table>
        </div>
    


    </div>
</div>


</body>

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


<script>

    function txtSearchByNameMC(txtSearchByName){
			
        	var searchText = txtSearchByName.value.toLowerCase();
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

	function txtSearchByCodeMC(txtSearchByCode){
			
        	var searchText = txtSearchByCode.value.toLowerCase();
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

