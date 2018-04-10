<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
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


    <style>


    </style>


</head>
<body class="menu-on-left">
<noscript><h3> You must have JavaScript enabled. </h3>
    <meta HTTP-EQUIV="refresh" content=0;url="../javascriptNotEnabled.php"></noscript>


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
            <li  class="active">
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
                    <a class="navbar-brand" href="#">Representative Management</a>
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
        <!--main body start-->


        <!----------form-->
        <form class="well form-horizontal" action=" " method="post" id="contact_form">
            <fieldset>

                <!-- Form Name -->
                <legend>Add Representatives</legend>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">First Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="first_name" placeholder="Type First Name" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Last Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="last_name" placeholder="Type Last Name" class="form-control" type="text">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Phone</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="phone" placeholder="Phone Number" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <?php
                include("../../connection/config.php");

                $sqlToFetchloginNo = "SHOW TABLE STATUS LIKE 'login';";
                $l_id = mysqli_query($conn, $sqlToFetchloginNo)->fetch_assoc()['Auto_increment'];
                ?>
                
                 
                   
                    
                            <input name="loginId" placeholder="Phone Number" class="form-control" type="hidden" value="<?php echo $l_id; ?>">
                       
                


                <div class="form-group">
                    <label class="col-md-4 control-label">Address</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" name="Address" placeholder="Type Home Address"></textarea>
                        </div>
                    </div>
                </div>

                <!-----user add---->
                <div class="form-group">
                    <label class="col-md-4 control-label">User Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
                            <input name="User_name" placeholder="Type User name" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-certificate"></i></span>
                            <input name="PASSWORD" placeholder="Type Password" class="form-control" type="password">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">NIC</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close"></i></span>
                            <input name="NIC" placeholder="Type NIC" class="form-control" type="text">
                        </div>
                    </div>
                </div>


                            <input name="Vehical_Number" placeholder="Type Vehicle Number" class="form-control" type="hidden">


                <!-------user add--->

                <!-- Success message -->
              <!--  <div class="alert alert-success" role="alert" id="success_message">Success <i
                            class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you
                    shortly.
                </div> -->

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-warning" name="btn1">Send <span
                                    class="glyphicon glyphicon-send"></span></button>
                    </div>
                    
                    <div class="col-md-2">             
            <button type="reset" class="btn btn-danger center-block">Reset</button>
            </div>
                </div>
                
                

            </fieldset>
        </form>
        <!---------form End-->
<?php
include("../../connection/config.php");

if(isset($_POST['btn1'])){
$fristName=$_POST['first_name'];
$lastName=$_POST['last_name'];
$phone=$_POST['phone'];
$address=$_POST['Address'];
$userName=$_POST['User_name'];
$password=$_POST['PASSWORD'];
$nic=$_POST['NIC'];
$vehicalNum=$_POST['Vehical_Number'];
$login_id = $_POST['loginId'];

$query="INSERT INTO `drivers`(`first_name`, `last_name`, `phone`, `address`, `nic`, `vehicle_no`, `login_id`) VALUES ('$fristName', '$lastName','$phone','$address','$nic','$vehicalNum','$login_id')";
$query2 = "INSERT INTO `login`(`userName`, `password`, `role_id`) VALUES ('$userName','$password',2)";

$run2=mysqli_query($conn,$query2);
$run=mysqli_query($conn,$query);
if($run){

    echo"<div class='alert alert-success' role='alert' id='success_message'>Success <i
    class='glyphicon glyphicon-thumbs-up'></i> Thanks for contacting us, we will get back to you
   shortly.
</div>";
}else{

    echo"<script>alert('insert problem!!')</script>";
}


}
?>
        <!-------table start-->
        <div class="row col-md-12 col-md-offset-0 custyle">
            <table class="table table-striped custab">
                <thead>

                <tr>
                    
                    <th>Frist Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                   
                    <th>NIC</th>
                 
                    <th>Action</th>
                </tr>
                </thead>

               <!-------------------->
               <?php
               include("../../connection/config.php");
               $query1="SELECT * FROM `drivers`";
               $run1=mysqli_query($conn,$query1);
               while($colum=mysqli_fetch_assoc($run1)){

                $fristName=$colum['first_name'];
                $lastName=$colum['last_name'];
                $phone=$colum['phone'];
                $address=$colum['address'];
             
                $nic=$colum['nic'];
               



               
               echo "<tr>
                    
                    <td>$fristName</td>
                    <td>$lastName</td>
                    <td>$phone</td>
                    <td>$address</td>
                   
                    <td>$nic</td>
                    
                    <td class='text-center'><a class='btn btn-info btn-xs' href= 'update_driver_info.php?fname=$fristName&lname=$lastName&phone=$phone&addr=$address&nic=$nic&vnum=$vehicalNum'>
                    <span
                                    class='glyphicon glyphicon-edit'></span> Edit</a> <a href='../driver/driver_info_delete.php?nic=$nic'
                            class='btn btn-danger btn-xs'>
                                                                                         <span
                                    class='glyphicon glyphicon-remove'></span> Del</a>
                                    </td>
                </tr>";
            }
                ?>
               
                
            </table>
        </div>

        <!------table End-->


        <!--fotter Satr-->
        <!--footer end-->

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
<!--form-->>>>>>>