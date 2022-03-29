<?php require_once 'conexion.php'; ?>
<!-- Modal login -->
<div class="modal fade" id="login" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Inicia sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto">
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="email_login" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email_login" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password_login" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password_login">
                    </div>
                    <div class="mb-3">
                        <span class="text-muted">¿No tienes usuario?</span> <a data-bs-toggle="modal" href="#register"
                            role="button">Crear usuario.</a>
                    </div>
                    <button type="submit" class="btn btn-primary" value="entrar">Iniciar sesión</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal" aria-label="Close">cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal register -->
<div class="modal fade" id="register" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Crear una cuenta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto">

                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">First name</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                        <?php echo isset($_SESSION['errores']) ? mostrar_Error($_SESSION['errores'], 'nombre') : '' ;?>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="apellido" name="apellido">
                        <?php echo isset($_SESSION['errores']) ? mostrar_Error($_SESSION['errores'], 'apellido') : '' ;?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        <?php echo isset($_SESSION['errores']) ? mostrar_Error($_SESSION['errores'], 'email') : '' ;?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <?php echo isset($_SESSION['errores']) ? mostrar_Error($_SESSION['errores'], 'password') : '' ;?>
                    </div>

                    <button type="submit" class="btn btn-primary" name='submit' value="entrar">Crear cuenta</button>
                </form>
                <?php borrar_errores(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal" aria-label="Close">cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Config -->
<div class="modal fade" id="config" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Configuración</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto">

                <div class="my-3 ">
                    <a href="#crear_entrada" data-bs-toggle="modal" class="btn btn-outline-secondary my-auto"
                        role="button">-Crear entrada</a>
                </div>
                <div class="my-3 ">
                    <a href="#crear_categoria" data-bs-toggle="modal" class="btn btn-outline-secondary my-auto"
                        role="button">-Nombre categoría</a>
                </div>
                <div class="my-3 ">
                    <a href="#mis_datos" data-bs-toggle="modal" class="btn btn-outline-secondary my-auto"
                        role="button">-Mis datos</a>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal" aria-label="Close">cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Crear entradas -->
<div class="modal fade" id="crear_entrada" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Crear entrada</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto">

                <form action="crear_entrada.php" method="POST">

                    <div class="mb-3">
                        <label>Seleccione categoria</label>

                        <select name="categoria" class="form-select">
                            <?php 
                            $categoria = conseguir_categoria($bd); 
                            if(isset($categoria)):                                
                                while($categorias = mysqli_fetch_assoc($categoria)):     
                            ?>
                            <option value="<?= $categorias['id'] ?>"><?= $categorias['nombre'] ?>
                            </option>
                            <?php
                            endwhile;
                                endif;
                            ?>
                        </select>
                        <?php echo isset($_SESSION['errores_entrada']) ? mostrar_Error($_SESSION['errores_entrada'], 'categoria') : '' ;?>
                    </div>

                    <div class="mb-3">
                        <label for="titulo_entrada" class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="titulo_entrada" id="titulo_entrada">
                        <?php echo isset($_SESSION['errores_entrada']) ? mostrar_Error($_SESSION['errores_entrada'], 'titulo_entrada') : '' ;?>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion_entrada" class="form-label">Descripcion</label>
                        <textarea type="text" class="form-control" name="descripcion_entrada"
                            id="descripcion_entrada"> </textarea>
                        <?php echo isset($_SESSION['errores_entrada']) ? mostrar_Error($_SESSION['errores_entrada'], 'descripcion_entrada') : '' ;?>
                    </div>

                    <button type="submit" class="btn btn-primary" name='submit' value="Crear Cuenta">Crear
                        cuenta</button>
                </form>
                <?php borrar_errores(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal" aria-label="Close">cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Crear categoria -->
<div class="modal fade" id="crear_categoria" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Crear categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto">

                <form action="crear_categoria.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre_categoria" class="form-label">Nombre de la categoria</label>
                        <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria">

                    </div>
                    <button type="submit" class="btn btn-primary" name='submit' value="Crear categoria">Crear
                        categoria</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal" aria-label="Close">cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Configurar datos -->

<div class="modal fade" id="mis_datos" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Actualizar datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto">

                <form action="mis_datos.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre_datos" class="form-label">First name</label>
                        <input type="text" class="form-control mb-2" name="nombre_datos" id="nombre_datos"
                            value="<?= $_SESSION['usuario']['nombre']?>">
                        <?php echo isset($_SESSION['errores_datos']) ? mostrar_Error($_SESSION['errores_datos'], 'nombre_datos') : '' ;?>
                    </div>
                    <div class="mb-3">
                        <label for="apellido_datos" class="form-label">Last name</label>
                        <input type="text" class="form-control mb-2" id="apellido_datos" name="apellido_datos"
                            value="<?= $_SESSION['usuario']['apellido']?>">
                        <?php echo isset($_SESSION['errores_datos']) ? mostrar_Error($_SESSION['errores_datos'], 'apellido_datos') : '' ;?>
                    </div>
                    <div class="mb-3">
                        <label for="email_datos" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email_datos" name="email_datos"
                            aria-describedby="emailHelp" value="<?= $_SESSION['usuario']['email']?>">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        <?php echo isset($_SESSION['errores_datos']) ? mostrar_Error($_SESSION['errores_datos'], 'email_datos') : '' ;?>
                    </div>

                    <button type="submit" class="btn btn-primary" name='submit' value="actualizar">Actualizar
                        datos</button>
                </form>
                <?php borrar_errores(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal" aria-label="Close">cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal actualizar entrada -->

<div class="modal fade" id="editar_entrada" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Actualizar Entrada <?= $entrada_actual['titulo']?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto">

                <form action="crear_entrada.php?editar=<?=$entrada_actual['id']?>" method="POST">

                    <div class="mb-3">
                        <label>Seleccione categoria</label>

                        <select name="categoria" class="form-select">
                            <?php 
                            $categoria = conseguir_categoria($bd); 
                            if(isset($categoria)):                                
                                while($categorias = mysqli_fetch_assoc($categoria)):     
                            ?>
                            <option value="<?= $categorias['id'] ?>"
                                <?= ($categorias['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"': '' ?>>
                                <?= $categorias['nombre'] ?>
                            </option>
                            <?php
                            endwhile;
                                endif;
                            ?>
                        </select>
                        <?php echo isset($_SESSION['errores_entrada']) ? mostrar_Error($_SESSION['errores_entrada'], 'categoria') : '' ;?>
                    </div>
                    <div class="mb-3">
                        <label for="titulo_busqueda" class="form-label">Titulo de la entrada</label>
                        <input type="text" class="form-control mb-2" name="titulo_busqueda" id="titulo_busqueda"
                            value="<?= $entrada_actual['titulo']?>">
                        <?php echo isset($_SESSION['errores_datos']) ? mostrar_Error($_SESSION['errores_datos'], 'titulo_busqueda') : '' ;?>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_busqueda" class="form-label">Descripcion</label>
                        <textarea type="text" class="form-control mb-2" id="descripcion_busqueda"
                            name="descripcion_busqueda"><?= $entrada_actual['descripcion']?></textarea>
                        <?php echo isset($_SESSION['errores_datos']) ? mostrar_Error($_SESSION['errores_datos'], 'descripcion_busqueda') : '' ;?>
                    </div>

                    <button type="submit" class="btn btn-primary" name='submit' value="actualizar">Actualizar
                        entrada</button>
                </form>
                <?php borrar_errores(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal" aria-label="Close">cerrar</button>
            </div>
        </div>
    </div>
</div>