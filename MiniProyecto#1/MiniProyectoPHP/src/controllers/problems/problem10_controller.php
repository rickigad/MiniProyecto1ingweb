<?php
// Iniciar la sesión para mantener los datos de ventas
session_start();

// Inicializar la matriz de ventas en la sesión si no existe
if (!isset($_SESSION['sales_data'])) {
    // 5 productos (filas), 4 vendedores (columnas)
    $_SESSION['sales_data'] = array_fill(0, 5, array_fill(0, 4, 0));
}

// Manejar el envío de datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Si se presiona el botón de reseteo
    if (isset($_POST['reset'])) {
        unset($_SESSION['sales_data']);
        // Redirigir para limpiar el formulario
        header("Location: " . $_SERVER['PHP_SELF'] . '?page=problem10');
        exit;
    }

    // Si se agrega una venta
    if (isset($_POST['vendedor'], $_POST['producto'], $_POST['valor'])) {
        $vendedor = intval($_POST['vendedor']) - 1; // Ajustar a índice 0
        $producto = intval($_POST['producto']) - 1; // Ajustar a índice 0
        $valor = floatval($_POST['valor']);

        // Validar índices y agregar el valor
        if ($vendedor >= 0 && $vendedor < 4 && $producto >= 0 && $producto < 5 && $valor > 0) {
            $_SESSION['sales_data'][$producto][$vendedor] += $valor;
        }
    }
}

$sales_data = $_SESSION['sales_data'];

// Calcular totales
$totales_producto = array_map('array_sum', $sales_data);
$totales_vendedor = array_fill(0, 4, 0);
foreach ($sales_data as $product_sales) {
    foreach ($product_sales as $v_index => $sale) {
        $totales_vendedor[$v_index] += $sale;
    }
}

$gran_total = array_sum($totales_producto);

require_once __DIR__ . '/../../../views/problems/problem10_view.php';
