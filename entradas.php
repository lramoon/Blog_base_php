<!-- Cabecera -->

<?php include_once './includes/cabecera.php' ?>

<!-- seccion principal -->

<div id="principal" class="container-fluid">
    <!-- Bienvenido -->

    <!-- Registro completado -->
    <?php if (isset($_SESSION['completado'])) : ?>
        <div class="container time">
            <?= $_SESSION['completado'] ?>
        </div>
        <!-- Error en registro -->
    <?php elseif (isset($_SESSION['errores']['general'])) : ?>
        <div class="container">
            <?= $_SESSION['errores']['general'] ?>
        </div>
    <?php endif; ?>


    <div class="row">

        <!-- entradas -->
        <div class="col-lg-6 col-sm-12">

            <?php require_once './includes/conexion.php'; ?>
            <?php require_once './includes/helpers.php'; ?>

            <article>
                <div class="container my-5">
                    <h1>Todas las entradas</h1>
                    <?php $entradas = conseguir_entradas($bd, true);
                    if (!empty($entradas)) :
                        while ($entrada = mysqli_fetch_assoc($entradas)) : ?>
                            <div class="container px-3 py-2">
                                <h3> <?= $entrada['titulo'] ?> </h3>
                                <span class="text-muted"> <?= $entrada['categoria'] . ' | ' . $entrada['fecha']  ?> </span>
                                <p> <?= substr($entrada['descripcion'], 0, 150) . "..."  ?> </p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>

            </article>



        </div>

        <!-- Recomendaciones -->
        <div class="col-lg-6 col-sm-12">
            <div class="container my-5 position-fixed">
                <h1>Recomendaciones</h1>
                <div class="container">

                    <?php include_once './includes/recomendaciones.php'; ?>

                    <!-- <div class="col-lg-12 my-3">
                            <a href="#" class="btn btn-secondary">Journey</a>
                            <a href="#" class="btn btn-secondary">Work</a>
                            <a href="#" class="btn btn-secondary">Lifestyle</a>
                        </div>
                        <div class="col-lg-12 my-3">
                            <a href="#" class="btn btn-secondary">Foods</a>
                            <a href="#" class="btn btn-secondary">Drinks</a>
                            <a href="#" class="btn btn-secondary">Travels</a>
                        </div> -->

                    <div class="col-lg-12 my-3">
                        <div id="ver-todas">
                            <a href="index.php" class="btn btn-info">Ver menos</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>



</div>






<!-- Modales -->
<?php require_once './includes/modales.php' ?>

<!-- Footer -->
<?php require_once './includes/footer.php' ?>