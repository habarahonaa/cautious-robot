<?php
include("./config/db.php");

$nombre = '';
$cedula = '';
$telefono = '';
$correo = '';
$entrenamiento = '';

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_clientes WHERE idcliente=$id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $cedula = $row['cedula'];
        $telefono = $row['telefono'];
        $correo = $row['correo'];
        $entrenamiento = $row['codentrenamiento'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $entrenamiento = $_POST['codentrenamiento'];

    $query = "UPDATE tbl_clientes set 
                                nombre = '$nombre', 
                                cedula = '$cedula', 
                                telefono='$telefono', 
                                correo='$correo', 
                                codentrenamiento='$entrenamiento' 
            WHERE idcliente=$id";

    mysqli_query($con, $query);

    $_SESSION['mensaje'] = 'Miembro actualizado satisfactoriamente';
    $_SESSION['color'] = 'warning';

    header('Location: clientes.php');
}

?>
<?php include('includes/header.php'); ?>

<div class="container-fluid py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 px-4 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Gimnasio</span>
                </a>
                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <a class="nav-link me-3 py-2 text-dark text-decoration-none" href="../horarios.php">Horarios</a>
                    <a class="nav-link me-3 py-2 text-dark text-decoration-none" href="../training.php">Entrenamiento</a>
                    <a class="nav-link active me-3 py-2 text-dark text-decoration-none" href="../clientes.php">Clientes</a>
                </nav>
            </div>
        </header>
</div>


<div class="container-fluid p-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <h5 class="card-title text-center">Editar Clientes</h5>
                <form action="edit_miembro.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group my-2">
                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre del cliente" autofocus>
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="cedula" class="form-control" value="<?php echo $cedula; ?>" placeholder="Cedula del cliente">
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="telefono" class="form-control" value="<?php echo $telefono; ?>" placeholder="Telefono del cliente">
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="correo" class="form-control" value="<?php echo $correo; ?>" placeholder="Correo del cliente">
                    </div>
                    <div class="form-group my-2">
                    <select class="form-select" name="codentrenamiento">
                            <option selected disabled>Cambiar entrenamiento</option>
                            <?php $query = "SELECT * FROM tbl_training;"; 
                            $result = mysqli_query($con, $query);
                            $row = $result;
                            foreach ($row as $fila) { 
                            ?>
                                <option value="<?php echo $fila['cod'] ?>"><?php echo $fila['entrenamiento'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <a href="clientes.php" class="btn btn-secondary btn-lg " tabindex="-1" role="button" aria-disabled="true"><i class="fas fa-arrow-left"></i></a>
                    <button class="btn btn-success btn-lg" name="update">
                        Actualizar Cliente
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>