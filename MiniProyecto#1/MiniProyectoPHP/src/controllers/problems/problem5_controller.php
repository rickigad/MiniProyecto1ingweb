<?php

$edades_clasificadas = [];
$edades_ingresadas = [];
$estadisticas_json = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['edades'])) {
        $edades_ingresadas = array_map('intval', explode(',', $_POST['edades']));

    // Clasificación de edades
    foreach ($edades_ingresadas as $edad_str) {
        $edad = intval($edad_str);
        $categoria = '';

        if ($edad >= 0 && $edad <= 12) {
            $categoria = 'Niño';
        } elseif ($edad >= 13 && $edad <= 17) {
            $categoria = 'Adolescente';
        } elseif ($edad >= 18 && $edad <= 64) {
            $categoria = 'Adulto';
        } elseif ($edad >= 65) {
            $categoria = 'Adulto Mayor';
        } else {
            $categoria = 'Edad no válida';
        }
        
        $edades_clasificadas[] = ['edad' => $edad, 'categoria' => $categoria];
    }

    // Generación de estadísticas
    $estadisticas = [
        'Niño' => 0,
        'Adolescente' => 0,
        'Adulto' => 0,
        'Adulto Mayor' => 0,
    ];

    foreach ($edades_clasificadas as $item) {
        if (array_key_exists($item['categoria'], $estadisticas)) {
            $estadisticas[$item['categoria']]++;
        }
    }

    // Preparar datos para el gráfico (JSON)
    $estadisticas_json = json_encode($estadisticas);
}

require_once __DIR__ . '/../../../views/problems/problem5_view.php';
