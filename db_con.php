<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "auctech-portfolio_db";

    $con =  new mysqli($servername, $username, $password, $database);

    if($con->connect_error){
        die("Connection Failed: " . $con->connect_error);
    }
    // Auctech@123
    // u622085619_auct_portfoDb
     // u622085619_auct_portfoUz
?>

