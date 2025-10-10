<?php

$suma_pares = 0;
$suma_impares = 0;
$pares_array = [];
$impares_array = [];

for ($i = 1; $i <= 200; $i++) {
    if ($i % 2 == 0) {
        $suma_pares += $i;
        $pares_array[] = $i;
    } else {
        $suma_impares += $i;
        $impares_array[] = $i;
    }
}

// Generar la expresión de las sumas (de forma abreviada)
$pares_expression = implode(' + ', array_slice($pares_array, 0, 3)) . ' + ... + ' . implode(' + ', array_slice($pares_array, -3));
$impares_expression = implode(' + ', array_slice($impares_array, 0, 3)) . ' + ... + ' . implode(' + ', array_slice($impares_array, -3));

require_once __DIR__ . '/../../../views/problems/problem4_view.php';
