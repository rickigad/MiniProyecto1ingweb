
<div class="program-window">
    <div class="title-bar">Problema 3: N primeros múltiplos de 4</div>
    <div class="program-content">
        <form method="post" class="row g-3 align-items-end">
            <div class="col-md-8">
                <label for="n" class="form-label">¿Cuántos múltiplos de 4 desea generar?</label>
                <input type="number" class="form-control" id="n" name="n" min="1" required value="<?php echo htmlspecialchars($n ?? ''); ?>">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Generar</button>
            </div>
        </form>

        <?php if (!empty($multiplos)): ?>
            <div class="result-box mt-4">
                <h4>Los primeros <?php echo htmlspecialchars($n); ?> múltiplos de 4 son:</h4>
                <ul class="list-group mt-2">
                    <?php foreach ($multiplos as $linea): ?>
                        <li class="list-group-item"><?php echo $linea; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>

