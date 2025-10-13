<div class="program-window">
    <div class="title-bar">Problema 8: Estación del Año</div>
    <div class="program-content">
        <form method="post" class="row g-3 align-items-end">
            <div class="col-md-8">
                <label for="fecha" class="form-label">Ingrese una fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo htmlspecialchars($fecha_seleccionada); ?>" required>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Calcular Estación</button>
            </div>
        </form>

        <?php if (!empty($estacion)): ?>
            <div class="result-box mt-4">
                <h4>Estación del Año</h4>
                <p>La estación para la fecha seleccionada es: <strong><?php echo $estacion; ?></strong></p>
                <img src="images/<?php echo $imagen; ?>" alt="<?php echo $estacion; ?>" class="img-fluid mt-3">
            </div>
        <?php endif; ?>
    </div>
</div>
