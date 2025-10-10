
<div class="program-window">
    <div class="title-bar">Problema 10: Reporte de Ventas</div>
    <div class="program-content">
        <div class="row">
            <!-- Formulario de Entrada -->
            <div class="col-md-4">
                <div class="result-box">
                    <h4>Registrar Venta</h4>
                    <form method="post">
                        <div class="mb-3">
                            <label for="vendedor" class="form-label">Vendedor:</label>
                            <select class="form-select" name="vendedor" id="vendedor" required>
                                <?php for ($i = 1; $i <= 4; $i++): ?>
                                    <option value="<?php echo $i; ?>">Vendedor <?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="producto" class="form-label">Producto:</label>
                            <select class="form-select" name="producto" id="producto" required>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <option value="<?php echo $i; ?>">Producto <?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor de la Venta:</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" name="valor" id="valor" class="form-control" min="0.01" step="any" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar Venta</button>
                    </form>
                    <hr>
                    <form method="post">
                        <button type="submit" name="reset" class="btn btn-danger w-100">Reiniciar Todo</button>
                    </form>
                </div>
            </div>

            <!-- Tabla de Resultados -->
            <div class="col-md-8">
                <div class="result-box">
                    <h4 class="mt-4">Tabla de Ventas Acumuladas</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Producto</th>
                                    <th>Vendedor 1</th>
                                    <th>Vendedor 2</th>
                                    <th>Vendedor 3</th>
                                    <th>Vendedor 4</th>
                                    <th class="table-info">Total por Producto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sales_data as $p_index => $product_sales): ?>
                                    <tr>
                                        <td class="fw-bold">Producto <?php echo $p_index + 1; ?></td>
                                        <?php foreach ($product_sales as $sale): ?>
                                            <td>$<?php echo number_format($sale, 2); ?></td>
                                        <?php endforeach; ?>
                                        <td class="table-info fw-bold">$<?php echo number_format($totales_producto[$p_index], 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot class="table-light">
                                <tr class="fw-bold">
                                    <td>Total por Vendedor</td>
                                    <?php foreach ($totales_vendedor as $total): ?>
                                        <td>$<?php echo number_format($total, 2); ?></td>
                                    <?php endforeach; ?>
                                    <td class="table-dark fw-bolder">$<?php echo number_format($gran_total, 2); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

