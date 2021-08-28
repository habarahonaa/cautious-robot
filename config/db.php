<?php

// Conexion a base de datos local
$con = mysqli_connect(
    'localhost',
    'root',
    'root',
    'gimnasio'
);

if (isset($con)) {
    echo "Conectado a la base de datos";
}

?>