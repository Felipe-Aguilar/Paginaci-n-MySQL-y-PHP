<?php

    try {

        $conexion = new PDO('mysql:host=162.241.61.205; dbname=yalogics_portafolio', 'yalogics_usuario', '5879396658747323');

    } catch (PDOException $e) {
        echo "Error $e";
        die();
    }

    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $postPorPagina = 5;

    $inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

    $articulos = $conexion -> prepare("SELECT SQL_CALC_FOUND_ROWS *FROM creando_una_paginacion_php LIMIT $inicio, $postPorPagina");

    $articulos -> execute();
    // Traemos todos los artículos y los estamos guardando dentro de los artículos
    $articulos = $articulos -> fetchAll();

    // Comprobando si hay artículos. 
    if (!$articulos) {
        header('Location: index.php');
    }

    // Saber cuantas paginaciones vamos a tener.
    $totalArticulos = $conexion -> query('SELECT FOUND_ROWS() as Total');
    $totalArticulos = $totalArticulos -> fetch()['Total'];

    $numeroPaginas = ceil($totalArticulos / $postPorPagina);

    require 'index.view.php';
?>