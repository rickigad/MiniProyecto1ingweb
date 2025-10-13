<?php
// --- VIEW: Muestra la interfaz para la Suma de Números (Versión Eficiente) ---
?>

<div class="program-window">
    <div class="title-bar">Problema 2: Suma Eficiente con Historial</div>
    <div class="program-content">

        <!-- Mensaje de Alerta -->
        <?php if (isset($message_to_show)): ?>
            <div class="alert alert-<?php echo htmlspecialchars($message_to_show['type']); ?> alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($message_to_show['text']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Panel de Control -->
        <div class="card mb-4">
            <div class="card-header">Panel de Control</div>
            <div class="card-body d-flex justify-content-center gap-3">
                <form action="index.php?page=problem2" method="POST">
                    <input type="hidden" name="action" value="calculate">
                    <button type="submit" class="btn btn-primary">Calcular Suma (1 a <?php echo LIMITE_SUMA_P2; ?>)</button>
                </form>
                <form action="index.php?page=problem2" method="POST" onsubmit="return confirm('¿Está seguro de que desea reiniciar el resultado y el historial?');">
                     <input type="hidden" name="action" value="reset">
                     <button type="submit" class="btn btn-danger">Reiniciar</button>
                </form>
            </div>
        </div>

        <!-- Área de Resultados -->
        <div class="card">
            <div class="card-header">Resultados</div>
            <div class="card-body">
                <?php if ($resultado === null): ?>
                    <p class="text-center text-muted">Presione "Calcular Suma" para ver el resultado y el historial.</p>
                <?php else: ?>
                    <!-- Resultado Total -->
                    <div class="alert alert-success">
                        <h4 class="alert-heading">Suma Total Calculada</h4>
                        <p class="lead mb-0">El resultado de la suma de los números del 1 al <?php echo LIMITE_SUMA_P2; ?> es: <strong><?php echo number_format($resultado); ?></strong></p>
                    </div>

                    <!-- Historial de Sumas Parciales -->
                    <div class="alert alert-info mt-4">
                        <h4 class="alert-heading">Historial de Sumas Parciales</h4>
                        <div style="height: 300px; overflow-y: scroll; background-color: white; padding: 10px; border-radius: 5px; font-family: monospace;">
                            <?php foreach ($historial as $linea): ?>
                                <div><?php echo htmlspecialchars($linea); ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
