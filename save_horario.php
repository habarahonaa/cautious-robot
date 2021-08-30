<?php

include('./config/db.php');

if (isset($_POST['save'])){
    $codentrenamiento = $_POST['idtraining'];
    $nombre = $_POST['horario'];

    $query = "INSERT INTO tbl_horarios(codentrenamiento, nombre) VALUES ('$codentrenamiento', '$nombre')";
    $result = mysqli_query($con, $query);

    if(!$result) {
        die("Consulta Fallida.");
      }

      $_SESSION['mensaje'] = 'La renta ha sido registrado satisfactoriamente.';
      $_SESSION['color'] = 'success';
      header('Location: ./horarios.php');
 
}

?>