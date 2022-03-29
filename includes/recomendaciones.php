<?php require_once 'conexion.php'; ?>
<?php require_once 'helpers.php'; ?>

<!-- Armar lista de categorias -->
<?php $categorias = conseguir_categoria($bd);
                        if (!empty($categorias)):          
?>
<div class="col-lg-12 my-3">
    <?php while($categoria = mysqli_fetch_assoc($categorias)):?>
    <a href="categoria.php?id=<?=$categoria['id']?>" class="btn btn-secondary"><?= $categoria['nombre']?></a>
    <?php endwhile; else:?>
</div>
<?php endif; ?>