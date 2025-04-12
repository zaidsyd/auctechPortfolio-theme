<?php
    $servername = "localhost";
    $username = "u622085619_auct_portfoUz";
    $password = "Auctech@123";
    $database = "u622085619_auct_portfoDb";

    $con =  new mysqli($servername, $username, $password, $database);

    if($con->connect_error){
        die("Connection Failed: " . $con->connect_error);
    }
    // Auctech@123
    // u622085619_auct_portfoDb
     // u622085619_auct_portfoUz
?>

