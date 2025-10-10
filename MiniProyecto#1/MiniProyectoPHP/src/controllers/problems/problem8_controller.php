<?php

$estacion = '';
$fecha_seleccionada = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fecha = $_POST['fecha'];
    $fecha_seleccionada = $fecha; // Guardar la fecha para mostrarla en la vista
    $mes = date("m", strtotime($fecha));
    $dia = date("d", strtotime($fecha));

    if (($mes == 3 && $dia >= 21) || ($mes == 4) || ($mes == 5) || ($mes == 6 && $dia <= 20)) {
        $estacion = "Primavera";
    } elseif (($mes == 6 && $dia >= 21) || ($mes == 7) || ($mes == 8) || ($mes == 9 && $dia <= 20)) {
        $estacion = "Verano";
    } elseif (($mes == 9 && $dia >= 21) || ($mes == 10) || ($mes == 11) || ($mes == 12 && $dia <= 20)) {
        $estacion = "Otoño";
    } else {
        $estacion = "Invierno";
    }
}

// Incluir la vista para mostrar el formulario y el resultado
require_once __DIR__ . '/../../../views/problems/problem8_view.php';

?>