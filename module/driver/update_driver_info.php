<?php
// Validate the credentials of the current user
//if (!isset($_SESSION['roleName'])) {
  //  header('/index.php'); // user not logged-in
//}

//if ($_SESSION['roleName'] == 'driver') {
  //  header('/index.php'); // user not authorized
//}
?>

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
<body>

<noscript><h3> You must have JavaScript enabled. </h3>
    <meta HTTP-EQUIV="refresh" content=0;url="../javascriptNotEnabled.php"></noscript>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <h3>UltraHub Delivery Management System</h3>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="driver-management.php">
                        <i class="pe-7s-user"></i>  <!------- pe-7s-graph-------------->
                        <p>Representatives</p>
                    </a>
                </li>
                <li>
                    <a href="../stock/stock-management.php">              <!------- pe-7s-user-------------->
                        <i class="pe-7s-graph"></i>
                        <p>Stock</p>
                    </a>
                </li>

                <li>
                    <a href="../invoice/invoice-management.php">
                        <i class="pe-7s-note2"></i>
                        <p>Invoice</p>
                    </a>
                </li>

                <li>
                    <a href="../shop/shop-management.php">
                        <i class="pe-7s-home"></i>
                        <p>Shopes</p>
                    </a>
                </li>
                <!---------------------------------->
                <li>
                    <a href="../report/reports.html">
                        <i class="pe-7s-id"></i>
                        <p>Reports</p>
                    </a>
                </li>

                <li>
                    <a href="backups.html">
                        <i class="pe-7s-back-2"></i>
                        <p>Backups</p>
                    </a>
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
                    <a class="navbar-brand" href="#"><!--type here--></a>
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
        <!--main body start-->


        <!----------form-->
        <form class="well form-horizontal" action=" " method="post" id="contact_form">
            <fieldset>

                <!-- Form Name -->
                <legend>Update Representatives</legend>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">First Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="first_name"  class="form-control" type="text" value="<?php echo $_GET['fname'];          ?>">
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Last Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="last_name"  class="form-control" type="text" value="<?php echo $_GET['lname'];          ?>">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Phone</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="phone"  class="form-control" type="text" value="<?php echo $_GET['phone']; ?>">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Address</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input class="form-control" name="Address" value="<?php echo $_GET['addr']; ?>">
                        </div>
                    </div>
                </div>

                <!-----user add---->
                <div class="form-group">
                    <label class="col-md-4 control-label">User Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
                            <input name="User_name"  class="form-control" type="text" value="<?php echo $_GET['un']; ?>" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-certificate"></i></span>
                            <input name="PASSWORD"  class="form-control" type="password" value="<?php echo $_GET['pass']; ?>">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">NIC</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close"></i></span>
                            <input name="NIC"  class="form-control" type="text" value="<?php echo $_GET['nic']; ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Vehical Number</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-plane"></i></span>
                            <input name="Vehical_Number"  class="form-control" type="text"value="<?php echo $_GET['vnum']; ?>">
                        </div>
                    </div>
                </div>


                <!-------user add--->

                <!-- Success message -->
              <!--  <div class="alert alert-success" role="alert" id="success_message">Success <i
                            class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you
                    shortly.
                </div> -->

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" name="btn1">UPDATE <span
                                    class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>

            </fieldset>
        </form>

        <?php
include("../../connection/config.php");

if(isset($_POST['btn1'])){
$nic=$_POST['NIC'];    
$fristName=$_POST['first_name'];
$lastName=$_POST['last_name'];
$phone=$_POST['phone'];
$address=$_POST['Address'];
$userName=$_POST['User_name'];
$password=$_POST['PASSWORD'];

$vehicalNum=$_POST['Vehical_Number'];

$query2="UPDATE `drivers` SET `first_name` = '$fristName', `last_name` = '$lastName', `phone` = '$phone', `address` = '$address', `vehicle_no` = '$vehicalNum', `username` = '$userName', `password` = '$password' WHERE `drivers`.`nic` = '$nic'";
$run2=mysqli_query($conn,$query2);
if($run2){

    echo "<meta http-equiv='refresh' content='0.001,url=../driver/driver-management.php'>";
   // header("location:../driver/driver-management.php");
    echo"<div class='alert alert-success' role='alert' id='success_message'>Success <i
    class='glyphicon glyphicon-thumbs-up'></i> Thanks for contacting us, we will get back to you
   shortly.
</div>";
}else{

    echo"<script>alert('Update problem!!')</script>";
}


}
?>


        <!--fotter Satr-->
        <!--footer end-->

    </div>
</div>


</body>


<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-gift',
            message: "Welcome to <b>Admin UNITE</b>"

        }, {
            type: 'info',
            timer: 4000
        });

    });
</script>

<!--form-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script src="../../assets/js/index.js"></script>
<!--form-->


</html>

