<?php
session_start();


include("../../connection/config.php");  
        $id=$_POST['invoiceno'];
        $rep_name= $_SESSION['f_name']." ". $_SESSION['l_name'];
        
         $payment=$_POST['paymentamount'];
         $newbalance=$_POST['newbalance'];
         $newpaid=$_POST['newpaid'];
         $paymentmethod = $_POST['paymentmethod'];
         $comment = $_POST['comment'];
         $chequeno = $_POST['chequeno'];
         $date = $_POST['date'];
         echo $rep_name;


$query2="UPDATE `payment` SET `paymentamount`='$newpaid',`balance`='$newbalance' WHERE `invoiceno`='$id';";

$query = "INSERT INTO `daily_payment`(`rep_name`, `invoiceno`, `paymentmethod`, `paymentamount`, `balance`, `date`, `chequeno`, `comment`) VALUES ('$rep_name','$id', '$paymentmethod','$payment','$newbalance','".$date."','$chequeno','$comment')";


         $run = mysqli_query($conn,$query);
         $run2=mysqli_query($conn,$query2);
echo mysqli_error($conn);
         if($run2 && $run){
            echo "<div class='alert alert-success' role='alert' id='success_message'>Success <i class='glyphicon glyphicon-thumbs-up'></i> Update OK!!.</div>";
            echo "<meta http-equiv='refresh' content='0.1,url=payment.php'>";




        }
        ?>