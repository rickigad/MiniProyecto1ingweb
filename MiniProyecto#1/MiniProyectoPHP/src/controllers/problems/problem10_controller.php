<?php
// -----------------------------------------------------------------------------
// --- CONTROLLER: Lógica para el Sistema de Ventas ---
// -----------------------------------------------------------------------------

// Iniciar la sesión para mantener los datos.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// --- Constantes ---
define('NUM_VENDEDORES', 4);
define('NUM_PRODUCTOS', 5);

// --- Inicialización de Datos ---
// Inicializa el array de vendedores si no existe en la sesión.
if (!isset($_SESSION['vendedores_p10'])) {
    $_SESSION['vendedores_p10'] = [];
    for ($i = 0; $i < NUM_VENDEDORES; $i++) {
        $_SESSION['vendedores_p10'][$i] = ['nombre' => 'Vendedor', 'apellido' => ($i + 1)];
    }
}

// Inicializa la matriz de ventas con ceros si no existe.
if (!isset($_SESSION['ventas_p10'])) {
    $_SESSION['ventas_p10'] = array_fill(0, NUM_PRODUCTOS, array_fill(0, NUM_VENDEDORES, 0));
}

// --- Manejo de Acciones (POST) ---
$message = '';
$message_type = 'success'; // 'success' o 'danger'

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    try {
        switch ($action) {
            // --- Acción: Agregar una venta manual ---
            case 'add_sale':
                $vendedor_id = filter_input(INPUT_POST, 'vendedor_id', FILTER_VALIDATE_INT);
                $producto_id = filter_input(INPUT_POST, 'producto_id', FILTER_VALIDATE_INT);
                $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);

                if ($vendedor_id === false || $vendedor_id < 0 || $vendedor_id >= NUM_VENDEDORES) throw new Exception("ID de vendedor no válido.");
                if ($producto_id === false || $producto_id < 0 || $producto_id >= NUM_PRODUCTOS) throw new Exception("ID de producto no válido.");
                if ($valor === false || $valor <= 0) throw new Exception("El valor de la venta debe ser un número positivo.");

                $_SESSION['ventas_p10'][$producto_id][$vendedor_id] += $valor;
                $message = "Venta agregada correctamente.";
                break;

            // --- Acción: Actualizar datos de un vendedor ---
            case 'update_vendor':
                $vendedor_id = filter_input(INPUT_POST, 'vendedor_id', FILTER_VALIDATE_INT);
                $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
                $apellido = trim(filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING));

                if ($vendedor_id === false || $vendedor_id < 0 || $vendedor_id >= NUM_VENDEDORES) throw new Exception("ID de vendedor no válido.");
                if (empty($nombre) || empty($apellido)) throw new Exception("El nombre y el apellido no pueden estar vacíos.");

                $_SESSION['vendedores_p10'][$vendedor_id] = ['nombre' => $nombre, 'apellido' => $apellido];
                $message = "Vendedor actualizado correctamente.";
                break;

            // --- Acción: Importar datos desde un archivo CSV ---
            case 'import_csv':
                if (empty($_FILES['csv_file']) || $_FILES['csv_file']['error'] !== UPLOAD_ERR_OK) throw new Exception("Error al subir el archivo CSV.");
                
                $file_path = $_FILES['csv_file']['tmp_name'];
                if (($handle = fopen($file_path, "r")) === false) throw new Exception("No se pudo abrir el archivo CSV.");

                $imported_count = 0;
                $error_count = 0;
                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    if (count($data) === 3 && is_numeric($data[0]) && is_numeric($data[1]) && is_numeric($data[2])) {
                        $vendedor_id = (int)$data[0];
                        $producto_id = (int)$data[1];
                        $valor = (float)$data[2];

                        if ($vendedor_id >= 0 && $vendedor_id < NUM_VENDEDORES && $producto_id >= 0 && $producto_id < NUM_PRODUCTOS && $valor > 0) {
                            $_SESSION['ventas_p10'][$producto_id][$vendedor_id] += $valor;
                            $imported_count++;
                        } else { $error_count++; }
                    } else { $error_count++; }
                }
                fclose($handle);
                $message = "Importación completada. Registros correctos: $imported_count. Errores: $error_count.";
                break;

            // --- Acción: Limpiar todos los datos ---
            case 'clear_data':
                unset($_SESSION['ventas_p10']);
                unset($_SESSION['vendedores_p10']);
                $message = "Todos los datos han sido eliminados y restaurados a sus valores por defecto.";
                break;
        }
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
        $message_type = 'danger';
    }

    // Guardar mensaje en sesión para mostrarlo después de redirigir
    $_SESSION['flash_message'] = ['text' => $message, 'type' => $message_type];
    
    // Redirigir para evitar reenvío de formulario (Patrón PRG)
    header('Location: index.php?page=problem10');
    exit;
}

// --- Preparación de Datos para la Vista ---
$vendedores = $_SESSION['vendedores_p10'];
$ventas = $_SESSION['ventas_p10'];

// Calcular totales por producto (filas)
$totales_producto = array_map('array_sum', $ventas);

// Calcular totales por vendedor (columnas)
$totales_vendedor = array_fill(0, NUM_VENDEDORES, 0);
foreach ($ventas as $venta_producto) {
    foreach ($venta_producto as $vendedor_id => $valor) {
        $totales_vendedor[$vendedor_id] += $valor;
    }
}

// Calcular el total general
$total_general = array_sum($totales_vendedor);

// Recuperar y limpiar mensaje flash para mostrarlo en la vista
if (isset($_SESSION['flash_message'])) {
    $message_to_show = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}

// Cargar la vista correspondiente
require_once __DIR__ . '/../../../views/problems/problem10_view.php';
?>
