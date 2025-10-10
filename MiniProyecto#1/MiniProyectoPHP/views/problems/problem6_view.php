
<div class="program-window">
    <div class="title-bar">Problema 6: Presupuesto Hospitalario</div>
    <div class="program-content">
        <form method="post" class="row g-3 align-items-end">
            <div class="col-md-8">
                <label for="presupuesto" class="form-label">Ingrese el presupuesto anual total:</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" id="presupuesto" name="presupuesto" min="1" step="any" required value="<?php echo htmlspecialchars($presupuesto_total ?? ''); ?>">
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Calcular Distribución</button>
            </div>
        </form>

        <?php if (!empty($distribucion)): ?>
            <div class="result-box mt-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mt-4">Distribución del Presupuesto:</h4>
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Área</th>
                                    <th>Monto Asignado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($distribucion as $area => $monto): ?>
                                    <tr>
                                        <td><?php echo $area; ?></td>
                                        <td>$<?php echo number_format($monto, 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                 <tr class="table-dark">
                                    <td><strong>Total</strong></td>
                                    <td><strong>$<?php echo number_format($presupuesto_total, 2); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6" style="max-height: 400px;">
                        <h4 class="mt-4 text-center">Gráfico de Distribución:</h4>
                        <canvas id="budgetChart"></canvas>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const budgetData = <?php echo $distribucion_json; ?>;
                    const ctx = document.getElementById('budgetChart').getContext('2d');

                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: Object.keys(budgetData),
                            datasets: [{
                                label: 'Distribución del Presupuesto',
                                data: Object.values(budgetData),
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.7)', // Ginecología
                                    'rgba(54, 162, 235, 0.7)', // Traumatología
                                    'rgba(255, 206, 86, 0.7)'  // Pediatría
                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false
                        }
                    });
                });
            </script>
        <?php endif; ?>
    </div>
</div>

