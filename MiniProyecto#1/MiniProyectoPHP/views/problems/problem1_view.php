<div class="container">
    <h2 class="text-center">Problema 1: Calculadora de Estadísticas</h2>

    <form method="post">
        <p>Ingrese 5 números positivos:</p>
        <div class="row g-3 align-items-center">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <div class="col">
                    <label for="num<?php echo $i + 1; ?>" class="visually-hidden">Número <?php echo $i + 1; ?></label>
                    <input type="number" class="form-control" id="num<?php echo $i + 1; ?>" name="num<?php echo $i + 1; ?>" placeholder="Número <?php echo $i + 1; ?>" step="any" min="0" required value="<?php echo htmlspecialchars($numeros[$i] ?? ''); ?>">
                </div>
            <?php endfor; ?>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Calcular</button>
    </form>

    <?php if ($media !== null): ?>
        <div class="alert alert-success mt-4">
            <h4 class="alert-heading">Resultados</h4>
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
