<?php
include("../../connection/config.php");  
        $id=$_POST['shop_number'];
        
        
         $shop_name=$_POST['shop_name'];
         $loc=$_POST['shop_location'];
         $rou=$_POST['route_id'];
         $cntct=$_POST['shop_contact'];
         $own=$_POST['shop_owner'];
         $comm=$_POST['comment'];



$query2="UPDATE `shops` SET `shop_name`='$shop_name',`shop_no`='$id',`location`='$loc',`owner`='$own',`comment`='$comm',`shop_contact`='$cntct',`route_id`='$rou' WHERE shop_no='$id'";



         $run2=mysqli_query($conn,$query2);
         
         if($run2){
            echo "<div class='alert alert-success' role='alert' id='success_message'>Success <i class='glyphicon glyphicon-thumbs-up'></i> Update OK!!.</div>";
            echo "<meta http-equiv='refresh' content='0.1,url=shop-management.php'>";
         
           


        }
        ?>