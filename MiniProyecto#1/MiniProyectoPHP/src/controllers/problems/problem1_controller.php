<?php

$numeros = [];
$media = null;
$desviacion_estandar = null;
$min = null;
$max = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recoger y validar los números
    $numeros_str = [$_POST['num1'], $_POST['num2'], $_POST['num3'], $_POST['num4'], $_POST['num5']];
    $numeros = array_map('floatval', $numeros_str);

    // Calcular la media
    $count = count($numeros);
    if ($count > 0) {
        $media = array_sum($numeros) / $count;

        // Calcular la desviación estándar (para una muestra, N-1)
        if ($count > 1) {
            $sum_of_squares = array_sum(array_map(function($x) use ($media) {
                return pow($x - $media, 2);
            }, $numeros));
            $desviacion_estandar = sqrt($sum_of_squares / ($count - 1));
        } else {
            $desviacion_estandar = 0; // No se puede calcular con un solo número
        }

        // Calcular mínimo y máximo
        $min = min($numeros);
        $max = max($numeros);
    }
}

require_once __DIR__ . '/../../../views/problems/problem1_view.php';
