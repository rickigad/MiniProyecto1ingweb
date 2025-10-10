<?php

$numero = null;
$resultados = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numero = intval($_POST['numero']);
    for ($i = 1; $i <= 15; $i++) {
        $resultados[] = [
            'base' => $numero,
            'exponente' => $i,
            'resultado' => pow($numero, $i)
        ];
    }
}

require_once __DIR__ . '/../../../views/problems/problem9_view.php';