<?php include('./config/db.php');

if (isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $codigoentrenamiento = $_POST['codentrenamiento'];
    
    $query = "INSERT INTO tbl_clientes(cedula,nombre,telefono,correo,codentrenamiento) 
    VALUES ('$cedula','$nombre','$telefono','$correo','$codigoentrenamiento')";


    $result = mysqli_query($con, $query);

    if(!$result) {
        die("Consulta Fallida.");
      }

      $_SESSION['mensaje'] = 'Tu inscripcion ha sido exitosa.';
      $_SESSION['color'] = 'success';
      header('Location: clientes.php');

}

?>