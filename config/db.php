<?php

session_start();

// Conexion a base de datos local
$con = mysqli_connect(
    'localhost',
    'root',
    'root',
    'gimnasio'
) or die(mysqli_erro($mysqli));

?>