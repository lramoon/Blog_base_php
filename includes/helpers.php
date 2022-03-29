<?php
function mostrar_Error($errores, $campos)
{

    $alerta = ' ';

    if (isset($errores[$campos]) && !empty($campos)) {
        $alerta = "<span class='alert alert-warning' role='alert'>" . $errores[$campos] . '<span>';
    }
    return $alerta;
}

function borrar_errores()
{
    $borrado = false;
    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        $borrado = true;
    }

    if (isset($_SESSION['errores'])) {
        // unset($_SESSION['errores']);
        $_SESSION['errores'] = null;
        $borrado = true;

    }

    if (isset($_SESSION['errores_entrada'])) {
        // unset($_SESSION['errores_entrada']);
        $_SESSION['errores'] = null;
        $borrado = true;

    }
    if (isset($_SESSION['errores_datos'])) {
        // unset($_SESSION['errores_entrada']);
        $_SESSION['errores'] = null;
        $borrado = true;

    }
    return $borrado;
}

function conseguir_categoria($conect)
{
    $sql = "SELECT * FROM categorias order by id asc";

    $categoria = mysqli_query($conect, $sql);

    $result = array();
    if ($categoria && mysqli_num_rows($categoria) >= 1) {
        $result = $categoria;
    }
    return $result;

}

function mostrar_categoria($conect,$id){
    $sql = "SELECT * FROM categorias where id = $id";

    $categoria = mysqli_query($conect, $sql);

    $result = array();
    if ($categoria && mysqli_num_rows($categoria) >= 1) {
        $result = mysqli_fetch_assoc($categoria);
    }
    return $result;

}

function conseguir_entradas($conect, $limit = null, $categoria = null, $busqueda = null)
{
    $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ";
    
    if(!empty($busqueda)){
        $sql .= "WHERE e.titulo like '%$busqueda%'";
    }

    if(!empty($categoria)){
        $sql .= "where e.categoria_id = $categoria ";
    }
    // se agrega el order luego del where por sintaxis
    $sql .= "order by e.id desc ";
    
    if(!$limit){
        //concatenamos
        $sql .= "limit 4";
    }

    $categoria = mysqli_query($conect, $sql);
    $result = array();
    if ($categoria && mysqli_num_rows($categoria) >= 1) {
        $result = $categoria;
    }
    return $result;
}

function conseguir_entrada($conect,$id){
    $sql= "SELECT e. * , c.nombre as 'categoria', concat(u.nombre, ' ', u.apellido) as 'usuario' FROM entradas e INNER JOIN categorias c on c.id = e.categoria_id INNER JOIN usuarios u on u.id = e.usuario_id WHERE e.id = $id";
    $entrada = mysqli_query($conect,$sql);

    $result =  array();
    if($entrada && mysqli_num_rows($entrada)>=1){
        $result = mysqli_fetch_assoc($entrada);
    }
    return $result;
}