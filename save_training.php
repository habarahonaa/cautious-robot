<?php

include('./config/db.php');


if (isset($_POST['save'])){
    $nombre = $_POST['entrenamiento'];

    $query = "INSERT INTO tbl_training(entrenamiento) VALUES ('$nombre')";
    $result = mysqli_query($con, $query);

    if(!$result) {
        die("Consulta Fallida.");
      }

      $_SESSION['mensaje'] = 'El entrenamiento sido registrado satisfactoriamente.';
      $_SESSION['color'] = 'success';
      header('Location: training.php');

}

?>