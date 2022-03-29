<?php
            if(!isset($_POST['busqueda'])){    
                $buscar_entrada = conseguir_entradas($bd,null, null, $_POST['busqueda']);
                    if(!isset($buscar_entrada['id'])){ 
                        header('location: index.php');
                    }
            }
    ?>
<!-- Cabecera -->

<?php include_once './includes/cabecera.php' ?>

<!-- seccion principal -->

<div id="principal" class="container-fluid h-100">
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
                    <h1>Busqueda: <?= $_POST['busqueda'] ?></h1>
                    <?php $entradas = conseguir_entradas($bd, null, null, $_POST['busqueda']);
                            if (!empty($entradas) && mysqli_num_rows($entradas) >= 1):
                                while($entrada = mysqli_fetch_assoc($entradas)):?>
                    <div class="container px-3 py-2">
                        <a href="entrada.php?id=<?=$entrada['id']?>" style="text-decoration: none;">
                            <h3 class="text-dark"> <?= $entrada['titulo'] ?> </h3>
                        </a>
                        <span class="text-muted"> <?= $entrada['categoria'] . ' | ' . $entrada['fecha']  ?> </span>
                        <p> <?= substr($entrada['descripcion'],0,150) . "..."  ?> </p>
                    </div>
                    <?php  endwhile; ?>
                    <?php    else: ?>
                    <div class="container">
                        <h3 class="alert alert-warning">No hay entradas disponibles :(</h3>
                    </div>
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

                </div>
            </div>
        </div>

    </div>



</div>
</div>


<!-- TERMINADO -->

<!-- Modales -->
<?php require_once './includes/modales.php' ?>

<!-- Footer -->
<?php require_once './includes/footer.php' ?>