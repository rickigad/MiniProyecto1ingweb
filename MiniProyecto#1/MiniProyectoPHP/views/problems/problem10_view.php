<?php
// --- VIEW: Muestra la interfaz del Sistema de Ventas ---
?>

<div class="program-window">
    <div class="title-bar">Problema 10: Sistema de Gestión de Ventas</div>
    <div class="program-content">

        <?php if (isset($message_to_show)): ?>
            <div class="alert alert-<?php echo htmlspecialchars($message_to_show['type']); ?> alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($message_to_show['text']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Tabla de Reporte de Ventas -->
        <div class="card mb-4">
            <div class="card-header">📈 Reporte de Ventas</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Producto</th>
                                <?php foreach ($vendedores as $id => $vendedor): ?>
                                    <th><?php echo htmlspecialchars($vendedor['nombre'] . ' ' . $vendedor['apellido']); ?></th>
                                <?php endforeach; ?>
                                <th class="table-primary">Total Producto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < NUM_PRODUCTOS; $i++): ?>
                                <tr>
                                    <td class="fw-bold">Producto <?php echo $i + 1; ?></td>
                                    <?php for ($j = 0; $j < NUM_VENDEDORES; $j++): ?>
                                        <td>$<?php echo number_format($ventas[$i][$j], 2); ?></td>
                                    <?php endfor; ?>
                                    <td class="table-primary fw-bold">$<?php echo number_format($totales_producto[$i], 2); ?></td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                        <tfoot class="table-group-divider">
                            <tr class="fw-bold">
                                <td>Total Vendedor</td>
                                <?php foreach ($totales_vendedor as $total): ?>
                                    <td class="table-secondary">$<?php echo number_format($total, 2); ?></td>
                                <?php endforeach; ?>
                                <td class="table-dark fw-bolder">$<?php echo number_format($total_general, 2); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Formularios de Control -->
        <div class="row">
            <!-- Registrar Venta Manual -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">1. Registrar Venta Manual</div>
                    <div class="card-body">
                        <form action="index.php?page=problem10" method="POST">
                            <input type="hidden" name="action" value="add_sale">
                            <div class="mb-3">
                                <label for="vendedor_id_add" class="form-label">Vendedor:</label>
                                <select id="vendedor_id_add" name="vendedor_id" class="form-select" required>
                                    <?php foreach ($vendedores as $id => $vendedor): ?>
                                        <option value="<?php echo $id; ?>"><?php echo htmlspecialchars($vendedor['nombre'] . ' ' . $vendedor['apellido']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="producto_id_add" class="form-label">Producto:</label>
                                <select id="producto_id_add" name="producto_id" class="form-select" required>
                                    <?php for ($i = 0; $i < NUM_PRODUCTOS; $i++): ?>
                                        <option value="<?php echo $i; ?>">Producto <?php echo $i + 1; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="valor_add" class="form-label">Valor de la Venta:</label>
                                <input type="number" id="valor_add" name="valor" class="form-control" step="0.01" min="0.01" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Venta</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Actualizar Vendedor -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">2. Actualizar Información del Vendedor</div>
                    <div class="card-body">
                        <form action="index.php?page=problem10" method="POST">
                            <input type="hidden" name="action" value="update_vendor">
                            <div class="mb-3">
                                <label for="vendedor_id_update" class="form-label">Vendedor a Actualizar:</label>
                                <select id="vendedor_id_update" name="vendedor_id" class="form-select" required>
                                    <?php foreach ($vendedores as $id => $vendedor): ?>
                                        <option value="<?php echo $id; ?>"><?php echo htmlspecialchars($vendedor['nombre'] . ' ' . $vendedor['apellido']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nombre_update" class="form-label">Nuevo Nombre:</label>
                                <input type="text" id="nombre_update" name="nombre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido_update" class="form-label">Nuevo Apellido:</label>
                                <input type="text" id="apellido_update" name="apellido" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Actualizar Vendedor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Importar CSV -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">3. Subir Archivo CSV de Ventas</div>
                    <div class="card-body">
                        <form action="index.php?page=problem10" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="import_csv">
                            <div class="mb-3">
                                <label for="csv_file_import" class="form-label">Archivo CSV:</label>
                                <input type="file" id="csv_file_import" name="csv_file" class="form-control" accept=".csv" required>
                                <div class="form-text">El formato debe ser: <code>vendedor_id,producto_id,valor</code> (IDs basados en 0).</div>
                            </div>
                            <button type="submit" class="btn btn-info text-white">Importar CSV</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Limpiar Datos -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">4. Limpiar Todos los Datos</div>
                    <div class="card-body">
                        <p>Esta acción eliminará permanentemente todas las ventas y restaurará los nombres de los vendedores.</p>
                        <form action="index.php?page=problem10" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar todos los datos? Esta acción no se puede deshacer.');">
                            <input type="hidden" name="action" value="clear_data">
                            <button type="submit" class="btn btn-danger">Limpiar Todo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
