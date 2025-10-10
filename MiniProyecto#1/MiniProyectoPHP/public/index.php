<?php
// Incluir utilidades y la cabecera de la página
require_once '../src/utils/Utilities.php';
require_once '../views/templates/header.php';

// Enrutador simple
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page === 'home') {
    // Carga la vista de la página de inicio
    require_once '../views/home_view.php';
} else {
    // Construye la ruta al controlador del problema
    $controller_path = '../src/controllers/problems/' . $page . '_controller.php';

    if (file_exists($controller_path)) {
        // Carga el controlador del problema, que a su vez cargará su vista
        require_once $controller_path;
    } else {
        // Si el controlador no existe, muestra un error 404
        http_response_code(404);
        echo '<h1 class="text-center">Error 404: Página no encontrada</h1>';
        echo '<p class="text-center">El problema solicitado aún no ha sido implementado.</p>';
    }
}

// Incluir el pie de página
require_once '../views/templates/footer.php';
?>
