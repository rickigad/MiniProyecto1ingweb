
<div class="program-window">
    <div class="title-bar">Problema 4: Suma de Pares e Impares (1-200)</div>
    <div class="program-content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="result-box text-center">
                    <h4 class="text-primary">Suma de Números Pares</h4>
                    <p class="display-5 fw-bold"><?php echo number_format($suma_pares); ?></p>
                    <div class="accordion" id="accordionPares">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePares">
                                    Ver desglose
                                </button>
                            </h2>
                            <div id="collapsePares" class="accordion-collapse collapse" data-bs-parent="#accordionPares">
                                <div class="accordion-body text-muted" style="font-size: 0.9rem;">
                                    <?php echo $pares_expression; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="result-box text-center">
                    <h4 class="text-info">Suma de Números Impares</h4>
                    <p class="display-5 fw-bold"><?php echo number_format($suma_impares); ?></p>
                    <div class="accordion" id="accordionImpares">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseImpares">
                                    Ver desglose
                                </button>
                            </h2>
                            <div id="collapseImpares" class="accordion-collapse collapse" data-bs-parent="#accordionImpares">
                                <div class="accordion-body text-muted" style="font-size: 0.9rem;">
                                    <?php echo $impares_expression; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

