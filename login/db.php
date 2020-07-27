<?php

    session_start();
    $servername = "localhost";
    $username = "grupo4";
    $password = "grupo4";
    
    $conn = mysqli_connect($servername, $username, $password);
    
    if (!$conn) {
        die("Fallo conectarse por: " . mysqli_connect_error());
    }

   
    
    
?>