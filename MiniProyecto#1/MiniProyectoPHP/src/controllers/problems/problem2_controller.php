<?php

// Calcular la suma de los números del 1 al 1000 usando la fórmula de Gauss
$n = 1000;
$suma = $n * ($n + 1) / 2;

// El resultado esperado según el PDF para verificación
$resultado_esperado = 500500;

// Generar la expresión de la suma (de forma abreviada)
$sum_expression = implode(' + ', range(1, 3)) . ' + ... + ' . implode(' + ', range($n - 2, $n));

// Cargar la vista para mostrar el resultado
require_once __DIR__ . '/../../../views/problems/problem2_view.php';
