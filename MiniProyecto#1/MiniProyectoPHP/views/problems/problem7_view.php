<div class="container">
    <h2 class="text-center">Problema 7: Calculadora de Datos Estadísticos</h2>

    <?php if ($step === 'initial'): ?>
        <div class="card mt-4">
            <div class="card-header">Paso 1: Definir cantidad</div>
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="step" value="show_grades_form">
                    <div class="mb-3">
                        <label for="cantidad_notas" class="form-label">¿Cuántas notas desea ingresar?</label>
                        <input type="number" class="form-control" id="cantidad_notas" name="cantidad_notas" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Siguiente →</button>
                </form>
            </div>
        </div>

    <?php elseif ($step === 'show_grades_form' && $cantidad_notas > 0): ?>
        <div class="card mt-4">
            <div class="card-header">Paso 2: Ingresar notas</div>
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="step" value="calculate_stats">
                    <input type="hidden" name="cantidad_notas" value="<?php echo $cantidad_notas; ?>">
                    <p>Ingrese las <strong><?php echo $cantidad_notas; ?></strong> notas:</p>
                    <?php for ($i = 0; $i < $cantidad_notas; $i++): ?>
                        <div class="mb-2">
                            <label for="nota_<?php echo $i; ?>" class="form-label">Nota <?php echo $i + 1; ?>:</label>
                            <input type="number" name="notas[]" id="nota_<?php echo $i; ?>" class="form-control" step="any" required>
                        </div>
                    <?php endfor; ?>
                    <button type="submit" class="btn btn-success mt-3">Calcular Estadísticas</button>
                </form>
            </div>
        </div>

    <?php elseif ($step === 'calculate_stats' && $resultados): ?>
        <div class="card mt-4">
            <div class="card-header">Paso 3: Resultados</div>
            <div class="card-body">
                <div class="alert alert-success">
                    <h4 class="alert-heading">Resultados Finales</h4>
                    <ul class="list-unstyled mb-0">
                        <li><strong>Notas ingresadas:</strong> <?php echo implode(', ', $notas); ?></li>
                        <hr>
                        <li><strong>Promedio:</strong> <?php echo number_format($resultados['media'], 2); ?></li>
                        <li><strong>Desviación Estándar:</strong> <?php echo number_format($resultados['desviacion_estandar'], 2); ?></li>
                        <li><strong>Nota Mínima:</strong> <?php echo $resultados['min']; ?></li>
                        <li><strong>Nota Máxima:</strong> <?php echo $resultados['max']; ?></li>
                    </ul>
                </div>
                <a href="" class="btn btn-secondary">← Volver a empezar</a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning mt-4">
            Hubo un error o no se ingresaron datos. 
            <a href="" class="alert-link">Por favor, vuelva a empezar</a>.
        </div>
    <?php endif; ?>
</div>
