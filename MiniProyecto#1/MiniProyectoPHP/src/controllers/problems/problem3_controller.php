<?php

$n = null;
$multiplos = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recoger y validar N
    $n = intval($_POST['n']);

    if ($n > 0) {
        for ($i = 1; $i <= $n; $i++) {
            $multiplos[] = "4 x $i = " . (4 * $i);
        }
    }
}

require_once __DIR__ . '/../../../views/problems/problem3_view.php';
