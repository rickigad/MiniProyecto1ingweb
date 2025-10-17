<?php

$estacion = '';
$imagen = '';
$fecha_seleccionada = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fecha = $_POST['fecha'];
    $fecha_seleccionada = $fecha; // Guardar la fecha para mostrarla en la vista
    $mes = date("m", strtotime($fecha));
    $dia = date("d", strtotime($fecha));

    if (($mes == 12 && $dia >= 21) || $mes == 1 || $mes == 2 || ($mes == 3 && $dia <= 20)) {
        $estacion = "Verano";
        $imagen = "verano.jpg";
    } elseif (($mes == 3 && $dia >= 21) || $mes == 4 || $mes == 5 || ($mes == 6 && $dia <= 21)) {
        $estacion = "Otoño";
        $imagen = "otono.jpg";
    } elseif (($mes == 6 && $dia >= 22) || $mes == 7 || $mes == 8 || ($mes == 9 && $dia <= 22)) {
        $estacion = "Invierno";
        $imagen = "invierno.jpg";
    } else {
        $estacion = "Primavera";
        $imagen = "Primavera.jpg";
    }
}

// Incluir la vista para mostrar el formulario y el resultado
require_once __DIR__ . '/../../../views/problems/problem8_view.php';

?>
