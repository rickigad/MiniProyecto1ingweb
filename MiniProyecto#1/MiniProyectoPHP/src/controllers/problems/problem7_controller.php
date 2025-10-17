<?php

define('MAX_NOTAS', 20);

$step = $_POST['step'] ?? 'initial';
$cantidad_notas = null;
$resultados = null;
$notas = [];
$error_message = null;

if ($step === 'show_grades_form') {
    $cantidad_notas = intval($_POST['cantidad_notas']);
    if ($cantidad_notas > MAX_NOTAS) {
        $error_message = 'El número máximo de notas permitido es ' . MAX_NOTAS . '.';
        $step = 'initial'; // Volver al paso inicial si hay error
    }
}

if ($step === 'calculate_stats') {
    $cantidad_notas = intval($_POST['cantidad_notas']);
    $notas = array_map('floatval', $_POST['notas']);

    if ($cantidad_notas > 0 && count($notas) === $cantidad_notas) {
        $media = array_sum($notas) / $cantidad_notas;
        
        $desviacion_estandar = 0;
        if ($cantidad_notas > 1) {
            $sum_of_squares = array_sum(array_map(function($x) use ($media) {
                return pow($x - $media, 2);
            }, $notas));
            $desviacion_estandar = sqrt($sum_of_squares / ($cantidad_notas - 1));
        }

        $resultados = [
            'media' => $media,
            'desviacion_estandar' => $desviacion_estandar,
            'min' => min($notas),
            'max' => max($notas)
        ];
    }
}

require_once __DIR__ . '/../../../views/problems/problem7_view.php';
