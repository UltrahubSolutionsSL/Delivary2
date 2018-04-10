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
<?php
include("../../connection/config.php");    // Load routes from Db

?>
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
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Payment Management</a>
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
        <form class="well form-horizontal" action="payment-update-process.php" method="post" id="shop_form">
            <fieldset>

                <!-- Form Name -->
                <legend>Add Payment</legend>

                <!-- Hidden field to distinguish between add and update -->
                <!-- <input type="hidden" name="update" value="<?php echo $update; ?>"> -->
             <!--    <input type="hidden" name="old_shop_number" value="<?php echo $shop_no; ?>">
 -->
                <!-- Text input-->





                <div class="form-group">
                    <label class="col-md-4 control-label">Shop Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tree-conifer"></i></span>
                            <input name="shopname" placeholder="Type Shop Name" class="form-control" type="text"
                                   required="required"
                                   value="<?php echo $_GET['shopname']; ?>" readonly>
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Invoice number</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-asterisk"></i>
                            </span>
                            <input name="invoiceno" class="form-control" type="number" required="required"
                                   value="<?php echo $_GET['invoice']; ?>" readonly="readonly">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Rep Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-tasks"></i>
                            </span>
                            <input name="repname" class="form-control" type="text" placeholder="Type owner name"
                                   value="<?php echo $_GET['repname'];?>" readonly>


                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Total Amount</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                            <input name="total" class="form-control" type="text" placeholder="Type Contact Number"
                                   value="<?php echo $_GET['total'];?>" readonly>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Paid Amount</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
                            <input name="payment" id="payment" class="form-control" type="text" placeholder="Type owner name"
                                   value="<?php echo $_GET['payment'];?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" >Balance</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
                            <input name="balance" id="balance" class="form-control" type="text" placeholder="Type owner name"
                                   value="<?php echo abs($_GET['balance']);?>" readonly>


                        </div>
                    </div>
                </div>
                <input type="text" value="<?php echo date("Y-m-d")?>" name="date">
                <div class="form-group">
                    <label class="col-md-4 control-label" >Payment Method</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
                            <select class="form-control" name="paymentmethod" id="paymentmethod" onchange="paymentMethodMC(this.value)">
                                <option value="" disabled selected>Select A Payment Method</option>
                                <option value="cash">Cash</option>
                                <option value="cheque">Cheque</option></select>


                        </div>
                    </div>
                </div>


                <div class="form-group" id="chequeNo" style="display: none">
                    <label class="col-md-4 control-label">Cheque No</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
                            <input name="chequeno"  class="form-control" id="" type="number" placeholder="Add Cheque Number">


                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Payment Amount</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
                            <input name="paymentamount" onkeyup="paymentAmountMC()" class="form-control" id="paymentAmount" type="number" placeholder="Add payment amount">


                        </div>
                    </div>
                </div>

                <div class="form-group" style="display: none">
                    <label class="col-md-4 control-label">New Balance</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
                            <input name="newbalance" class="form-control" id="newBalance" type="number" placeholder="" readonly>


                        </div>
                    </div>
                </div>

                <div class="form-group" style="display:none;">
                    <label class="col-md-4 control-label">New paid</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
                            <input name="newpaid" class="form-control" id="newPaid" type="number" placeholder="" readonly>


                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Comment</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
                            <input name="comment" class="form-control" id="comment" type="text" placeholder="Add a comment" >


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
                        <button type="submit" class="btn btn-warning" id="btn4">Update <span
                                    class="glyphicon glyphicon-send"></span></button>
                    </div>


                </div>

            </fieldset>
        </form>

        <!--form start-->



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

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>

<script>

   function paymentAmountMC() {

       var a = document.getElementById("paymentAmount").value - document.getElementById("balance").value;
       document.getElementById("newBalance").value = Math.abs(a);
//window.alert(a);

       var b = parseInt(document.getElementById("paymentAmount").value) + parseInt(document.getElementById("payment").value);
       document.getElementById("newPaid").value = Math.abs(b) ;

       if(parseInt(document.getElementById("balance").value)<parseInt(document.getElementById("paymentAmount").value)){

           document.getElementById("paymentAmount").style.backgroundColor="pink";

           btn4.setAttribute("Disabled","Disabled");

       }

       else {

           document.getElementById("paymentAmount").style.backgroundColor="white";

           btn4.removeAttribute("Disabled");

       }
   }

   function paymentMethodMC(x) {

       if (x=="cash"){

           document.getElementById("chequeNo").style.display="none";
       }
       if(x=="cheque"){
           document.getElementById("chequeNo").style.display="block";

       }   }

</script>





</html>
<!--form-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script src="../../assets/js/index.js"></script>
<!--form-->
