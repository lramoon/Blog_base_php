    <?php include_once './includes/conexion.php' ?>
    <?php include_once './includes/helpers.php' ?>
    <?php
 
    $entrada_actual = conseguir_entrada($bd,$_GET['id']);
if(!isset($entrada_actual['id'])){
    
    header('location: index.php');

}


?>


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

                <article>
                    <div class="container my-5">
                        <h1><?= $entrada_actual['titulo'] ?></h1>
                        <a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>" style="text-decoration: none;">
                            <span class="text-muted"><?= $entrada_actual['categoria'] ?> |
                                <?= $entrada_actual['fecha'] ?> | <?= $entrada_actual['usuario'] ?> </span>
                        </a>
                        <p><?= $entrada_actual['descripcion'] ?></p>
                    </div>

                </article>

                <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']): ?>

                <a href="#editar_entrada" data-bs-toggle="modal" class="btn btn-warning" role="button">Editar
                    entrada</a>
                <a href="borrar_entrada.php?id=<?= $entrada_actual['id'] ?>" class="btn btn-danger">Borrar entrada</a>

                <?php endif; ?>


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

                    </div>
                </div>
            </div>

        </div>



    </div>






    <!-- Modales -->
    <?php require_once './includes/modales.php' ?>

    <!-- Footer -->
    <?php require_once './includes/footer.php' ?>