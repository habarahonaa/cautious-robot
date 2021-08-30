<?php

include("./config/db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM tbl_clientes WHERE idcliente = $id";
  $result = mysqli_query($con, $query);
  
  if(!$result) {
    die("Eliminacion Fallida.");
  }

  $_SESSION['mensaje'] = 'Cliente eliminado satisfactoriamente.';
  $_SESSION['color'] = 'danger';
  header('Location: clientes.php');
}

?>
