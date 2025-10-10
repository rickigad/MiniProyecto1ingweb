<div class="container">
    <h2 class="text-center">Problema 9: Potencias de un Número</h2>

    <form method="post">
        <div class="mb-3">
            <label for="numero" class="form-label">Ingrese un número (1-9):</label>
            <input type="number" class="form-control" id="numero" name="numero" min="1" max="9" value="<?php echo htmlspecialchars($numero ?? ''); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Generar Potencias</button>
    </form>

    <?php if (!empty($resultados)): ?>
        <h4 class='mt-4'>Las 15 primeras potencias de <?php echo htmlspecialchars($numero); ?> son:</h4>
        <ul class='list-group mt-2'>
            <?php foreach ($resultados as $potencia): ?>
                <li class='list-group-item'>
                    <?php echo $potencia['base']; ?> ^ <?php echo $potencia['exponente']; ?> = <?php echo $potencia['resultado']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>