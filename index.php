<?php include('./config/db.php')?>
<?php include('./includes/header.php')?>
<div class="container-fluid py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 px-4 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Gimnasio</span>
                </a>
                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <a class="nav-link me-3 py-2 text-dark text-decoration-none" href="../horarios.php">Horarios</a>
                    <a class="nav-link me-3 py-2 text-dark text-decoration-none" href="../training.php">Entrenamiento</a>
                    <a class="nav-link me-3 py-2 text-dark text-decoration-none" href="../clientes.php">Clientes</a>
                </nav>
            </div>
        </header>
</div>
<main class="container-fluid px-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="./public/img/gym.svg" class="d-block mx-lg-auto img-fluid" alt="ilustracion de gimnasio" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-4">No <span style="color: #6c63ff;">DIGAS MAS</span> mañana!</h1>
            <p class="lead w-75 mb-4">Consulta nuestros variados horarios, entrenamientos y ubicaciones e inscribite ahora mismo! No te arrepentiras!</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="../clientes.php" class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true">Inscribirse</a>
                <a href="../horarios.php" class="btn btn-success btn-lg" tabindex="-1" role="button" aria-disabled="true">Horarios</a>
            </div>
        </div>
    </div>
</main>
<?php include('./includes/footer.php')?>