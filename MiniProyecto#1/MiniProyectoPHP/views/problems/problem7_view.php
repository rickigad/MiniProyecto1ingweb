
<div class="program-window">
    <div class="title-bar">Problema 7: Calculadora de Datos Estadísticos</div>
    <div class="program-content">
        <?php if ($step === 'initial'): ?>
            <div class="result-box">
                <h4>Paso 1: Definir cantidad</h4>

                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <form method="post">
                    <input type="hidden" name="step" value="show_grades_form">
                    <div class="mb-3">
                        <label for="cantidad_notas" class="form-label">¿Cuántas notas desea ingresar? (Máximo <?php echo MAX_NOTAS; ?>)</label>
                        <input type="number" class="form-control" id="cantidad_notas" name="cantidad_notas" min="1" max="<?php echo MAX_NOTAS; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Siguiente →</button>
                </form>
            </div>

        <?php elseif ($step === 'show_grades_form' && $cantidad_notas > 0): ?>
            <div class="result-box">
                <h4>Paso 2: Ingresar notas</h4>
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

        <?php elseif ($step === 'calculate_stats' && $resultados): ?>
            <div class="result-box">
                <h4>Paso 3: Resultados</h4>
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
        <?php else: ?>
            <div class="alert alert-warning mt-4">
                Hubo un error o no se ingresaron datos. 
                <a href="" class="alert-link">Por favor, vuelva a empezar</a>.
            </div>
        <?php endif; ?>
    </div>
</div>

