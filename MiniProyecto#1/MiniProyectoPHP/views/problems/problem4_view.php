<?php
// --- VIEW: Suma de Números Pares e Impares ---
?>

<div class="program-window">
    <div class="title-bar">Problema 4: Suma de Pares e Impares</div>
    <div class="program-content">

        <form method="POST" action="index.php?page=problem4" class="row g-3 align-items-end mb-4">
            <div class="col-md-5">
                <label for="inicio" class="form-label">Número Inicial:</label>
                <input type="number" id="inicio" name="inicio" value="<?php echo htmlspecialchars($inicio_form); ?>" class="form-control">
            </div>
            
            <div class="col-md-5">
                <label for="fin" class="form-label">Número Final:</label>
                <input type="number" id="fin" name="fin" value="<?php echo htmlspecialchars($fin_form); ?>" class="form-control">
            </div>
            
            <div class="col-md-2">
                <button type="submit" name="calcular" class="btn btn-primary w-100">Calcular</button>
            </div>
        </form>

        <?php if (!empty($errores)): ?>
            <div class="alert alert-danger">
                <h4 class="alert-heading">Errores de Validación</h4>
                <ul class="mb-0">
                    <?php foreach ($errores as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif (isset($resultadoPares)): ?>
            <div class="alert alert-success">
                <h4 class="alert-heading">Resultados del Rango [<?php echo htmlspecialchars($inicio_form); ?> - <?php echo htmlspecialchars($fin_form); ?>]</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Números Pares</h5>
                        <p><strong>Suma Total:</strong> <?php echo number_format($resultadoPares['suma']); ?></p>
                        <p><strong>Cantidad:</strong> <?php echo number_format($resultadoPares['cantidad']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5>Números Impares</h5>
                        <p><strong>Suma Total:</strong> <?php echo number_format($resultadoImpares['suma']); ?></p>
                        <p><strong>Cantidad:</strong> <?php echo number_format($resultadoImpares['cantidad']); ?></p>
                    </div>
                </div>
                <hr>
                <p class="mb-0"><strong>Suma Total (Pares + Impares): <?php echo number_format($resultadoPares['suma'] + $resultadoImpares['suma']); ?></strong></p>
            </div>
        <?php endif; ?>

    </div>
</div>