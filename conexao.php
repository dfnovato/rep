<?php
$servidor = "localhost";
$usuario =  "programador";
$banco = "db_trab";
$cn = new PDO("mysql:host=$servidor; dbname=$banco", $usuario);
?>