<?php

$presupuesto_total = null;
$distribucion = [];
$distribucion_json = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $presupuesto_total = floatval($_POST['presupuesto']);

    if ($presupuesto_total > 0) {
        $distribucion = [
            'Ginecología' => $presupuesto_total * 0.40,
            'Traumatología' => $presupuesto_total * 0.35,
            'Pediatría' => $presupuesto_total * 0.25,
        ];

        $distribucion_json = json_encode($distribucion);
    }
}

require_once __DIR__ . '/../../../views/problems/problem6_view.php';
