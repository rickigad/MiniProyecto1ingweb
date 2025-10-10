<div class="container">
    <h2 class="text-center">Problema 5: Clasificador de Edades</h2>

    <form method="post">
        <p>Ingrese 5 edades:</p>
        <div class="row g-3">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <div class="col-sm">
                    <label for="edad<?php echo $i + 1; ?>" class="visually-hidden">Edad <?php echo $i + 1; ?></label>
                    <input type="number" class="form-control" id="edad<?php echo $i + 1; ?>" name="edad<?php echo $i + 1; ?>" placeholder="Edad #<?php echo $i + 1; ?>" min="0" max="120" required value="<?php echo htmlspecialchars($edades_ingresadas[$i] ?? ''); ?>">
                </div>
            <?php endfor; ?>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Clasificar</button>
    </form>

    <?php if (!empty($edades_clasificadas)): ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <h4 class="mt-4">Resultados de la Clasificación:</h4>
                <table class="table table-bordered table-striped mt-2">
                    <thead class="table-dark">
                        <tr>
                            <th>Edad Ingresada</th>
                            <th>Categoría</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($edades_clasificadas as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['edad']); ?></td>
                                <td><?php echo htmlspecialchars($item['categoria']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h4 class="mt-4">Gráfico de Estadísticas:</h4>
                <canvas id="statsChart"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const statsData = <?php echo $estadisticas_json; ?>;
                const ctx = document.getElementById('statsChart').getContext('2d');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Object.keys(statsData),
                        datasets: [{
                            label: '# de Personas por Categoría',
                            data: Object.values(statsData),
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.6)', // Azul
                                'rgba(255, 206, 86, 0.6)', // Amarillo
                                'rgba(75, 192, 192, 0.6)', // Verde
                                'rgba(153, 102, 255, 0.6)' // Morado
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            });
        </script>
    <?php endif; ?>
</div>
