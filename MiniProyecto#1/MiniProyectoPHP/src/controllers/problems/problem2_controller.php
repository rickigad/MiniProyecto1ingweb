<?php
// -----------------------------------------------------------------------------
// --- CONTROLLER: Lógica para la Suma de Números (Versión Eficiente + Historial) ---
// -----------------------------------------------------------------------------

// Iniciar la sesión si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// --- Constantes ---
define('LIMITE_SUMA_P2', 1000);

// --- Inicialización de Datos en Sesión ---
if (!isset($_SESSION['p2_resultado'])) {
    $_SESSION['p2_resultado'] = null;
}
if (!isset($_SESSION['p2_historial'])) {
    $_SESSION['p2_historial'] = [];
}

// --- Manejo de Acciones (POST) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $message = '';
    $message_type = 'success';

    switch ($action) {
        // --- Acción: Calcular la suma y generar el historial ---
        case 'calculate':
            $limite = LIMITE_SUMA_P2;
            
            // 1. Calcular el resultado final usando la fórmula matemática (eficiente)
            $resultado_final = $limite * ($limite + 1) / 2;
            
            // 2. Generar el historial de sumas parciales (paso a paso)
            $historial_parcial = [];
            $suma_parcial = 0;
            for ($i = 1; $i <= $limite; $i++) {
                $suma_parcial += $i;
                $historial_parcial[] = "Suma parcial hasta $i: $suma_parcial";
            }
            
            // Guardar en la sesión
            $_SESSION['p2_resultado'] = $resultado_final;
            $_SESSION['p2_historial'] = $historial_parcial;
            
            $message = "Cálculo completado. El resultado final es $resultado_final.";
            break;

        // --- Acción: Limpiar los datos de la sesión ---
        case 'reset':
            $_SESSION['p2_resultado'] = null;
            $_SESSION['p2_historial'] = [];
            $message = 'Resultados e historial han sido reiniciados.';
            $message_type = 'info';
            break;
    }

    // Guardar mensaje para mostrarlo después de la redirección
    $_SESSION['flash_message_p2'] = ['text' => $message, 'type' => $message_type];
    
    // Redirigir para evitar reenvío de formulario (Patrón PRG)
    header('Location: index.php?page=problem2');
    exit;
}

// --- Preparación de Datos para la Vista ---
$resultado = $_SESSION['p2_resultado'];
$historial = $_SESSION['p2_historial'];

// Recuperar y limpiar mensaje flash
$message_to_show = null;
if (isset($_SESSION['flash_message_p2'])) {
    $message_to_show = $_SESSION['flash_message_p2'];
    unset($_SESSION['flash_message_p2']);
}

// Cargar la vista correspondiente
require_once __DIR__ . '/../../../views/problems/problem2_view.php';
?>
