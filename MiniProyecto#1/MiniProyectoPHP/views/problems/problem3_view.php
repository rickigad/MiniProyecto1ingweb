<div class="container">
    <h2 class="text-center">Problema 3: N primeros múltiplos de 4</h2>

    <form method="post">
        <div class="mb-3">
            <label for="n" class="form-label">¿Cuántos múltiplos de 4 desea generar?</label>
            <input type="number" class="form-control" id="n" name="n" min="1" required value="<?php echo htmlspecialchars($n ?? ''); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Generar</button>
    </form>

    <?php if (!empty($multiplos)): ?>
        <h4 class="mt-4">Los primeros <?php echo htmlspecialchars($n); ?> múltiplos de 4 son:</h4>
        <ul class="list-group mt-2">
            <?php foreach ($multiplos as $linea): ?>
                <li class="list-group-item"><?php echo $linea; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
