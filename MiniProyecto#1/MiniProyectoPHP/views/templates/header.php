<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Proyecto PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Mini Proyecto PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menú de Problemas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $problems_list = [
                                ['page' => 'problem1', 'title' => 'Problema 1: Calculadora de Estadísticas'],
                                ['page' => 'problem2', 'title' => 'Problema 2: Suma del 1 al 1000'],
                                ['page' => 'problem3', 'title' => 'Problema 3: Múltiplos de 4'],
                                ['page' => 'problem4', 'title' => 'Problema 4: Suma de Pares e Impares'],
                                ['page' => 'problem5', 'title' => 'Problema 5: Clasificador de Edades'],
                                ['page' => 'problem6', 'title' => 'Problema 6: Presupuesto Hospitalario'],
                                ['page' => 'problem7', 'title' => 'Problema 7: Calculadora de Notas'],
                                ['page' => 'problem8', 'title' => 'Problema 8: Estación del Año'],
                                ['page' => 'problem9', 'title' => 'Problema 9: Potencias de un Número'],
                                ['page' => 'problem10', 'title' => 'Problema 10: Reporte de Ventas'],
                            ];
                            foreach ($problems_list as $problem): ?>
                                <li><a class="dropdown-item" href="index.php?page=<?php echo $problem['page']; ?>"><?php echo $problem['title']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container mt-4