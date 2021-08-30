<?php

include("./config/db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "DELETE FROM tbl_training WHERE cod = $id";

  $result = mysqli_query($con, $query);
  
  if(!$result) {
    die("Eliminacion Fallida.");
  }

  $_SESSION['mensaje'] = 'Entrenamiento eliminado satisfactoriamente.';
  $_SESSION['color'] = 'danger';
  header('Location: training.php');
}

?>