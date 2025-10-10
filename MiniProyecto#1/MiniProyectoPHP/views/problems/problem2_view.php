<div class="container">
    <h2 class="text-center">Problema 2: Suma de los números del 1 al 1,000</h2>
    <div class="card text-center mt-4 shadow-sm">
        <div class="card-header">
            Resultado del Cálculo
        </div>
        <div class="card-body">
            <h5 class="card-title">La suma total de los números del 1 al 1,000 es:</h5>
            <p class="display-4 fw-bold text-primary"><?php echo number_format($suma); ?></p>
            <?php if ($suma === $resultado_esperado): ?>
                <p class="text-success"><small>(El resultado coincide con el valor de verificación del PDF)</small></p>
            <?php else: ?>
                <p class="text-danger"><small>(El resultado NO coincide con el valor de verificación del PDF)</small></p>
            <?php endif; ?>

            <div class="accordion mt-3" id="accordionSum">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Ver desglose de la suma
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionSum">
                        <div class="accordion-body text-muted" style="font-size: 0.9rem;">
                            <?php echo $sum_expression; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer text-muted">
            <small>Cálculo realizado con la fórmula de Gauss: n * (n + 1) / 2</small>
        </div>
    </div>
</div>
