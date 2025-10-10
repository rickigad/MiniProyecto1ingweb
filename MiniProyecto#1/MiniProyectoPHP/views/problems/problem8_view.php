<div class="container">
    <h2 class="text-center">Problema 8: Estación del Año</h2>

    <form method="post">
        <div class="mb-3">
            <label for="fecha" class="form-label">Ingrese una fecha:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo htmlspecialchars($fecha_seleccionada); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Calcular Estación</button>
    </form>

    <?php if (!empty($estacion)): ?>
        <div class='alert alert-info mt-3'>
            La estación para la fecha seleccionada es: <b><?php echo $estacion; ?></b>
        </div>
    <?php endif; ?>
</div>