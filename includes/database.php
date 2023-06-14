<?php

$db = mysqli_connect('localhost', 'root', '', 'appsalon', 3306);


if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
