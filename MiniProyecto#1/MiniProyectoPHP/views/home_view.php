<div class="container">
    <h1 class="text-center my-4">Problemas</h1>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
        $problems = [
            [
                'page' => 'problem1',
                'title' => 'Calculadora de Estadísticas',
                'description' => 'Calcula la media, desviación estándar, mínimo y máximo de 5 números.'
            ],
            [
                'page' => 'problem2',
                'title' => 'Suma del 1 al 1000',
                'description' => 'Calcula la suma de los números del 1 al 1000 usando la fórmula de Gauss.'
            ],
            [
                'page' => 'problem3',
                'title' => 'N primeros múltiplos de 4',
                'description' => 'Genera los N primeros múltiplos de 4.'
            ],
            [
                'page' => 'problem4',
                'title' => 'Suma de Pares e Impares',
                'description' => 'Calcula la suma de los números pares e impares del 1 al 200.'
            ],
            [
                'page' => 'problem5',
                'title' => 'Clasificador de Edades',
                'description' => 'Clasifica 5 edades en categorías: niño, adolescente, adulto, adulto mayor.'
            ],
            [
                'page' => 'problem6',
                'title' => 'Presupuesto Hospitalario',
                'description' => 'Distribuye un presupuesto anual entre las áreas de un hospital.'
            ],
            [
                'page' => 'problem7',
                'title' => 'Calculadora de Notas',
                'description' => 'Calcula estadísticas de un conjunto de notas.'
            ],
            [
                'page' => 'problem8',
                'title' => 'Estación del Año',
                'description' => 'Determina la estación del año para una fecha dada.'
            ],
            [
                'page' => 'problem9',
                'title' => 'Potencias de un Número',
                'description' => 'Genera las 15 primeras potencias de un número.'
            ],
            [
                'page' => 'problem10',
                'title' => 'Reporte de Ventas',
                'description' => 'Genera un reporte de ventas por vendedor y producto.'
            ],
        ];

        foreach ($problems as $problem) {
            echo '<div class="col">';
            echo '    <div class="card h-100">';
            echo '        <div class="card-body">';
            echo '            <h5 class="card-title">' . $problem['title'] . '</h5>';
            echo '            <p class="card-text">' . $problem['description'] . '</p>';
            echo '            <a href="index.php?page=' . $problem['page'] . '" class="btn btn-primary">Ver Problema</a>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
        ?>
    </div>
</div>