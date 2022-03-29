<?php

$servidor = '';
$username = '';
$password = '';
$database = '';
$bd = mysqli_connect($servidor, $username, $password, $database);
$query = mysqli_query($bd, "SET NAMES 'utf8'");

//iniciar sension
if (!isset($_SESSION)) {
    session_start();
}
