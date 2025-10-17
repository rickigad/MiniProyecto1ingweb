<?php
// -----------------------------------------------------------------------------
// --- CONTROLLER: Lógica para Suma de Pares e Impares ---
// -----------------------------------------------------------------------------

// --- Clase de Lógica ---
if (!class_exists('CalculadoraParesImpares')) {
    class CalculadoraParesImpares {
        public static function validarNumero($valor, $min = 1, $max = 200) {
            if (!is_numeric($valor)) return false;
            $numero = filter_var($valor, FILTER_VALIDATE_INT, [
                "options" => ["min_range" => $min, "max_range" => $max]
            ]);
            return $numero;
        }

        public static function calcularSumaPares($inicio, $fin) {
            $suma = 0;
            $numeros = [];
            for ($i = $inicio; $i <= $fin; $i++) {
                if ($i % 2 == 0) {
                    $suma += $i;
                    $numeros[] = $i;
                }
            }
            return ['suma' => $suma, 'numeros' => $numeros, 'cantidad' => count($numeros)];
        }

        public static function calcularSumaImpares($inicio, $fin) {
            $suma = 0;
            $numeros = [];
            $i = $inicio;
            while ($i <= $fin) {
                if ($i % 2 != 0) {
                    $suma += $i;
                    $numeros[] = $i;
                }
                $i++;
            }
            return ['suma' => $suma, 'numeros' => $numeros, 'cantidad' => count($numeros)];
        }
    }
}

// --- Inicialización de Variables ---
$errores = [];
$resultadoPares = null;
$resultadoImpares = null;
$inicio_form = 1;
$fin_form = 200;

// --- Procesamiento del Formulario ---
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['calcular'])) {
    $inicio_form = $_POST['inicio'] ?? $inicio_form;
    $fin_form = $_POST['fin'] ?? $fin_form;

    $inicio = CalculadoraParesImpares::validarNumero($inicio_form);
    if ($inicio === false) {
        $errores[] = "El número inicial debe ser un entero válido entre 1 y 200.";
    }

    $fin = CalculadoraParesImpares::validarNumero($fin_form);
    if ($fin === false) {
        $errores[] = "El número final debe ser un entero válido entre 1 y 200.";
    }

    if ($inicio !== false && $fin !== false && $inicio > $fin) {
        $errores[] = "El número inicial no puede ser mayor que el número final.";
    }

    if (empty($errores)) {
        $resultadoPares = CalculadoraParesImpares::calcularSumaPares($inicio, $fin);
        $resultadoImpares = CalculadoraParesImpares::calcularSumaImpares($inicio, $fin);
    }
}

// Cargar la vista correspondiente
require_once __DIR__ . '/../../../views/problems/problem4_view.php';
?>