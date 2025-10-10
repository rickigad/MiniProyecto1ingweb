
<div class="program-window">
    <div class="title-bar">Problema 9: Potencias de un Número</div>
    <div class="program-content">
        <form method="post" class="row g-3 align-items-end">
            <div class="col-md-8">
                <label for="numero" class="form-label">Ingrese un número (1-9):</label>
                <input type="number" class="form-control" id="numero" name="numero" min="1" max="9" value="<?php echo htmlspecialchars($numero ?? ''); ?>" required>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Generar Potencias</button>
            </div>
        </form>

        <?php if (!empty($resultados)): ?>
            <div class="result-box mt-4">
                <h4>Las 15 primeras potencias de <?php echo htmlspecialchars($numero); ?> son:</h4>
                <ul class="list-group mt-2">
                    <?php foreach ($resultados as $potencia): ?>
                        <li class="list-group-item">
                            <?php echo $potencia['base']; ?> ^ <?php echo $potencia['exponente']; ?> = <?php echo $potencia['resultado']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>