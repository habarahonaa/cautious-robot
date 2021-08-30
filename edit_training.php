<?php 

include('./config/db.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_training WHERE cod=$id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['entrenamiento'];
        $codigo = $row['cod'];
    }
}

if (isset($_POST['update'])) {
    $identificador = $_GET['id'];
    $name = $_POST['entrenamiento'];

    $query = "UPDATE tbl_training set entrenamiento = '$name' WHERE cod=$identificador";

    mysqli_query($con, $query);

    $_SESSION['mensaje'] = 'Entrenamiento actualizado satisfactoriamente';
    $_SESSION['color'] = 'warning';

    header('Location: ./training.php');
}

?>
<?php include('./includes/header.php'); ?>
<div class="container-fluid py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 px-4 mb-4 border-bottom">
                <a href="./public/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Gimnasio</span>
                </a>
                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <a class="nav-link me-3 py-2 text-dark text-decoration-none" href="../horarios.php">Horarios</a>
                    <a class="nav-link active me-3 py-2 text-dark text-decoration-none" href="../training.php">Entrenamiento</a>
                    <a class="nav-link me-3 py-2 text-dark text-decoration-none" href="../clientes.php">Clientes</a>
                </nav>
            </div>
        </header>
</div>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <h3 class="card-title text-center">Editar Entrenamiento</h3>
                <form action="edit_training.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group my-2">
                        <input type="text" name="codigo" class="form-control" value="<?php echo $id; ?>" placeholder="Codigo de entrenamiento" autofocus disabled>
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="entrenamiento" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre del entrenamiento">
                    </div>
                    <a href="training.php" class="btn btn-secondary btn-lg " tabindex="-1" role="button" aria-disabled="true"><i class="fas fa-arrow-left"></i></a>
                    <button class="btn btn-success btn-lg" name="update">
                        Actualizar Entrenamiento
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('./includes/footer.php'); ?>