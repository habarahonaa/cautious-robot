<?php include('./config/db.php')?>
<?php include('./includes/header.php')?>
<div class="container-fluid py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 px-4 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Gimnasio</span>
                </a>
                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <a class="nav-link active me-3 py-2 text-dark text-decoration-none" href="../horarios.php">Horarios</a>
                    <a class="nav-link me-3 py-2 text-dark text-decoration-none" href="../training.php">Entrenamiento</a>
                    <a class="nav-link me-3 py-2 text-dark text-decoration-none" href="../clientes.php">Clientes</a>
                </nav>
            </div>
        </header>
</div>
<main class="container-fluid p-5">
    <div class="row">
        <div class="col-md-6">
            <!-- Mensaje -->

            <?php if (isset($_SESSION['mensaje'])) { ?>
                <div class="alert alert-<?= $_SESSION['color'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            } ?>

            <!-- Agregar horario -->

            <div class="card card-body">
            <h5 class="card-title text-center">Registrar Horario</h5>
                <form action="save_horario.php" method="POST">
                    <div class="form-group my-2">
                    <select class="form-select" name="idtraining">
                            <?php $query = "SELECT * FROM tbl_training;"; 
                            $result = mysqli_query($con, $query);
                            $row = $result;
                            foreach ($row as $fila) { 
                            ?>
                                <option value="<?php echo $fila['cod'] ?>"><?php echo $fila['entrenamiento'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="horario" class="form-control" placeholder="Nombre del horario">
                    </div>
                    <input type="submit" name="save" class="btn btn-success btn-lg btn-block" value="Registrar Horario">
                </form>
            </div>
        </div>

        <!--Listar clientes-->

        <div class="col-md-6">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Codigo del Horario</th>
                        <th>Nombre del Horario</th>
                        <th>Entrenamiento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * from tbl_horarios;";
                    $result = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row['codhorario'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['codentrenamiento'] ?></td>
                            <td>
                                <a href="edit_horario.php?id=<?php echo $row['cod'] ?>" class="btn btn-warning">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="delete_horario.php?id=<?php echo $row['cod'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include('./includes/footer.php')?>