<?php

session_start();

if(isset($_SESSION['usuario'])){
    echo'sesion cerrada';
    session_destroy();
}

header('location: index.php');

?>