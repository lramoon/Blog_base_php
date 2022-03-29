<!-- Cabecera -->

<?php include_once './includes/cabecera.php' ?>

<!-- seccion principal -->

<div id="principal" class="container-fluid">
    <!-- Bienvenido -->

    <!-- Registro completado -->
    <?php if(isset($_SESSION['completado'])):?>
    <div class="container time">
        <?= $_SESSION['completado'] ?>
    </div>
    <!-- Error en registro -->
    <?php elseif(isset($_SESSION['errores']['general'])): ?>
    <div class="container">
        <?= $_SESSION['errores']['general'] ?>
    </div>
    <?php endif; ?>


    <div class="row">

        <!-- entradas -->
        <div class="col-lg-6 col-sm-12">

            <?php include_once './includes/entradas.php'; ?>

            <!-- <article>
                    <div class="container my-5">
                        <h1>Últimas entradas</h1>
                        <div class="container px-3">
                            <h3>Titulo Entrada</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ipsam animi reiciendis
                                fugit
                                debitis
                                laborum, nemo eius fugiat nostrum placeat, tempore eum! Tempora harum, illum sed odio
                                atque
                                expedita
                                facilis.</p>
                        </div>
                    </div>
                </article> -->
            <!-- <article>
                    <div class="container my-5">
                        <h1>Últimas entradas</h1>
                        <div class="container px-3">
                            <h3>Titulo Entrada</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ipsam animi reiciendis
                                fugit
                                debitis
                                laborum, nemo eius fugiat nostrum placeat, tempore eum! Tempora harum, illum sed odio
                                atque
                                expedita
                                facilis.</p>
                        </div>
                    </div>
                </article> -->

        </div>

        <!-- Recomendaciones -->
        <div class="col-lg-6 col-sm-12">
            <div class="container my-5">
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



                </div>
            </div>
        </div>

    </div>



</div>






<!-- Modales -->
<?php require_once './includes/modales.php' ?>

<!-- Footer -->
<?php require_once './includes/footer.php' ?>