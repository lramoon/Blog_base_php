<?php require_once 'conexion.php'; ?>
<?php require_once 'helpers.php'; ?>

<article>
    <div class="container my-5">
        <h1>Últimas entradas</h1>
        <?php $entradas = conseguir_entradas($bd,null);
    if (!empty($entradas)):
    while($entrada = mysqli_fetch_assoc($entradas)):?>
        <div class="container px-3 py-2">
            <a href="entrada.php?id=<?=$entrada['id']?>" style="text-decoration: none;">
                <h3 class="text-dark"> <?= $entrada['titulo'] ?> </h3>
            </a>
            <span class="text-muted"> <?= $entrada['categoria'] . ' | ' . $entrada['fecha']  ?> </span>
            <p> <?= substr($entrada['descripcion'],0,150) . "..."  ?> </p>
        </div>
        <?php  endwhile; ?>
        <?php    endif; ?>

        <div id="ver-todas">
            <a href="./entradas.php" class="btn btn-info">Ver todas las entradas</a>
        </div>

    </div>

</article>