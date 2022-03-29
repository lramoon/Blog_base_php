<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="./sass/custom.css">
</head>

<body>
    <?php require_once 'conexion.php'; ?>
    <?php require_once 'helpers.php'; ?>
    <header id="cabecera">
        <!-- Menu login -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a id="logo" class="navbar-brand" href="index.php">Logo</a>
                <!-- Bienvenida al loguin -->
                <?php if (isset($_SESSION['usuario'])) : ?>
                    <p class="text-light my-auto">Bienvenido <?= $_SESSION['usuario']['nombre'] ?></p>
                <?php endif; ?>
                <!-- Error en el login -->
                <!-- Verificar si existe error en el login -->
                <?php if (isset($_SESSION['error_login'])) : ?>

                    <p class="alert alert-danger" role="alert">!Hey¡ <?= $_SESSION['error_login'] ?></p>

                <?php endif; ?>
                <!-- fin validacion login -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-principal" aria-controls="navbar-principal" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-principal">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contáctanos</a>
                        </li>
                    </ul>

                    <form action="buscar.php" class="d-flex" method="POST">


                        <input name="busqueda" class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success me-2" type="submit" value="busqueda">Search</button>


                        <?php if (isset($_SESSION['usuario'])) : ?>
                            <a class="btn btn-light" href="cerrar.php" role="button">logout</a>
                            <!-- configuracion -->

                            <a href="#config" data-bs-toggle="modal" class="mx-2 my-auto" role="button"> <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 612.013 612.012" fill="white" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M346.758,611.991h-81.58c-12.623,0-22.899-10.271-22.899-22.899v-53.978c-18.608-5.162-36.445-12.59-53.205-22.146
			l-38.23,38.225c-8.67,8.67-23.747,8.664-32.404-0.006l-57.648-57.668c-4.335-4.328-6.726-10.078-6.719-16.199
			c0-6.113,2.391-11.863,6.726-16.186l38.913-38.927c-9.135-16.594-16.186-34.194-21.05-52.516H22.854
			C10.251,369.692,0,359.428,0,346.799v-81.567c0-12.629,10.251-22.905,22.854-22.905H80.49
			c5.208-17.48,12.463-34.297,21.643-50.152L60.798,150.84c-4.31-4.265-6.707-9.996-6.719-16.103
			c-0.013-6.133,2.372-11.896,6.726-16.243l57.642-57.712c8.727-8.625,23.715-8.612,32.366-0.038l42.591,42.591
			c15.517-8.428,31.9-15.058,48.883-19.781v-60.67c-0.008-12.612,10.262-22.862,22.891-22.862h81.58
			c12.629,0,22.905,10.25,22.905,22.86v61.11c16.792,4.807,32.997,11.488,48.335,19.928l43.152-43.146
			c8.611-8.613,23.739-8.619,32.346-0.006l57.713,57.725c8.905,8.963,8.899,23.466-0.007,32.346l-42.399,42.406
			c8.874,15.523,15.912,31.977,21.013,49.074h59.247c12.648,0,22.95,10.27,22.95,22.905v81.574c0,12.623-10.296,22.893-22.95,22.893
			h-57.419c-4.762,17.926-11.62,35.17-20.463,51.4l40.028,40.047c8.893,8.926,8.893,23.44,0.019,32.358l-57.725,57.693
			c-8.568,8.639-23.772,8.664-32.385-0.031l-38.836-38.85c-16.613,9.621-34.259,17.117-52.619,22.357v54.416
			C369.657,601.719,359.387,611.991,346.758,611.991z M186.135,488.872l6.432,3.945c19.062,11.711,39.761,20.324,61.531,25.615
			l7.306,1.771v68.896c0,2.078,1.696,3.772,3.774,3.772h81.58c2.117,0,3.78-1.657,3.78-3.772v-69.213l7.236-1.816
			c21.482-5.395,41.984-14.109,60.938-25.902l6.451-4.016l49.515,49.533c0.963,0.975,2.078,1.115,2.658,1.115
			c0.573,0,1.689-0.136,2.62-1.084l57.737-57.705c1.453-1.461,1.46-3.871-0.02-5.351l-50.368-50.393l3.735-6.375
			c10.92-18.621,18.934-38.779,23.811-59.906l1.722-7.408h72.496c2.109,0,3.824-1.688,3.824-3.768v-81.578
			c0-2.085-1.715-3.78-3.824-3.78H515.19l-1.882-7.121c-5.354-20.298-13.654-39.665-24.671-57.578l-3.959-6.433l52.995-53.001
			c1.46-1.46,1.453-3.844-0.02-5.317l-57.688-57.699c-0.931-0.931-2.064-1.078-2.651-1.078c-0.594,0-1.729,0.14-2.664,1.084
			l-53.551,53.549l-6.388-3.787c-17.805-10.544-36.968-18.449-56.96-23.473l-7.229-1.817v-75.9c0.007-2.091-1.65-3.736-3.769-3.736
			h-81.58c-2.078,0-3.774,1.677-3.774,3.736v75.568l-7.306,1.779c-20.189,4.909-39.531,12.724-57.502,23.243l-6.369,3.729
			l-52.912-52.912c-0.937-0.931-2.084-1.077-2.677-1.077c-0.599,0-1.734,0.146-2.709,1.109L74.31,132.007
			c-0.975,0.976-1.122,2.091-1.122,2.671c0,0.574,0.141,1.664,1.084,2.594l52.02,52.013l-4.016,6.452
			c-11.348,18.226-19.858,37.937-25.309,58.579l-1.875,7.121H22.854c-2.053,0.013-3.729,1.702-3.729,3.793v81.573
			c0,2.078,1.676,3.768,3.729,3.768h70.902l1.715,7.414c4.947,21.49,13.158,41.998,24.39,60.957l3.787,6.389l-49.33,49.343
			c-0.969,0.969-1.116,2.084-1.116,2.663c0,0.58,0.141,1.703,1.109,2.664l57.661,57.683c0.969,0.969,2.091,1.115,2.678,1.115
			c0.58,0,1.708-0.142,2.677-1.115L186.135,488.872z M305.997,446.249c-77.328,0-140.242-62.907-140.242-140.229
			c0-77.328,62.914-140.242,140.242-140.242s140.235,62.914,140.235,140.242C446.232,383.34,383.325,446.249,305.997,446.249z
			 M305.997,184.901c-66.791,0-121.118,54.327-121.118,121.117c0,66.777,54.327,121.104,121.118,121.104
			c66.783,0,121.11-54.327,121.11-121.104C427.107,239.229,372.78,184.901,305.997,184.901z" />
                                        </g>
                                    </g>
                                </svg></a>

                            <!-- configuracion -->
                        <?php endif; ?>
                        <?php if (!isset($_SESSION['usuario'])) : ?>
                            <a class="btn btn-light" data-bs-toggle="modal" href="#login" role="button">login</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Menu Categoria -->

        <nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-secondary bg-gradient">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-segundario" aria-controls="navbar-segundario" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-segundario">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">Inicio</a>
                        </li>
                        <!-- Armar lista de categorias -->
                        <?php $categorias = conseguir_categoria($bd);
                        if (!empty($categorias)) :
                            while ($categoria = mysqli_fetch_assoc($categorias)) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></a>
                                </li>
                            <?php endwhile;
                        else : ?>
                            <li></li>
                        <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>