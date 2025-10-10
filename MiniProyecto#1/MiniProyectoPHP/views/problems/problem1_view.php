
<div class="program-window">
    <div class="title-bar">Problema 1: Calculadora de Estadísticas</div>
    <div class="program-content">
        <form method="post" class="row g-3 align-items-end">
            <div class="col-md-8">
                <label for="numeros" class="form-label">Ingrese 5 números positivos, separados por comas:</label>
                <input type="text" class="form-control" id="numeros" name="numeros" placeholder="Ej: 10, 20, 30, 40, 50" required value="<?php echo htmlspecialchars(implode(', ', $numeros)); ?>">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Calcular</button>
            </div>
        </form>

        <?php if ($media !== null): ?>
            <div class="result-box mt-4">
                <h4>Resultados</h4>
                <ul class="list-unstyled mb-0">
                    <li><strong>Números ingresados:</strong> <?php echo implode(', ', $numeros); ?></li>
                    <hr>
                    <li><strong>Media:</strong> <?php echo number_format($media, 2); ?></li>
                    <li><strong>Desviación Estándar (muestra):</strong> <?php echo number_format($desviacion_estandar, 2); ?></li>
                    <li><strong>Número Mínimo:</strong> <?php echo $min; ?></li>
                    <li><strong>Número Máximo:</strong> <?php echo $max; ?></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>

