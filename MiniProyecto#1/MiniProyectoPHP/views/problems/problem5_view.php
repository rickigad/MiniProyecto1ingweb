
<div class="program-window">
    <div class="title-bar">Problema 5: Clasificador de Edades</div>
    <div class="program-content">
        <form method="post" class="row g-3 align-items-end">
            <div class="col-md-8">
                <label for="edades" class="form-label">Ingrese 5 edades, separadas por comas:</label>
                <input type="text" class="form-control" id="edades" name="edades" placeholder="Ej: 18, 25, 40, 12, 60" required value="<?php echo htmlspecialchars(implode(', ', $edades_ingresadas)); ?>">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Clasificar</button>
            </div>
        </form>

        <?php if (!empty($edades_clasificadas)): ?>
            <div class="result-box mt-4">
                <div class="row">
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
</div>

