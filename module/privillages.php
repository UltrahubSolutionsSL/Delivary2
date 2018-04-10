session_start();


<input type="hidden" value="<?php echo $_SESSION['role_name']?>" id="txtusertype" readonly>



<script>
    window.addEventListener("load", init);

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

</script>
