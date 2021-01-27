<div class="main-content bg-default" id="panel">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-transparent text-center">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h1 class="mb-0"> <?= $emp['nome_empreendimento'] ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6">
                                <img alt="image-default" class="img-showroom" width="100%" src="<?= URL ?>/images/default_emp.jpg" />
                            </div>
                            <div class="col-md-6">
                                <p></p>
                                <p><span class="strong"> Cidade: </span><?= $emp['cidade_empreendimento'] ?> - <?= $emp['estado_empreendimento'] ?></p>
                                <p><span class="strong"> Bairro: </span><?= $emp['bairro_empreendimento'] ?></p>
                                <p><span class="strong"> Endereço: </span><?= $emp['endereco_empreendimento'] ?>, <?= $emp['numero_empreendimento'] ?></p>
                                <p><span class="strong"> CEP: </span><?= $emp['cep_empreendimento'] ?></p>
                                <p><span class="strong"> Responsável Técnico: </span><?= $resp ?></p>
                                <p><span class="strong"> Período da Obra: </span><?= $ctl->transformDataBr($emp['datainicioobra_empreendimento']) ?> á <?= $ctl->transformDataBr($emp['datafimobra_empreendimento']) ?></p>
                                <p><span class="strong"> Unidades: </span><?= $numberUnity[0]['qtd'] ?> </p>
                                <p><a href="<?= $mapslink ?>" target="_blank">Ver no Mapa <i class="fa fa-map-marker"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 flex">
                <?php
                if (count($unity) > 0) {
                    foreach ($unity as $card) {
                ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="h3 mb-0">Unidade <?= $card['numero_unidade'] ?> <span class="pull-right"> </span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="overlay">
                                        <img alt="image-default" class="img-overlay" width="100%" src="<?= URL ?>/images/default_unity.jpg" />
                                        <div class="middle">
                                            <button class="btn btn-default" onclick="showModal(<?= $card['id_unidade'] ?>)">Ver Detalhes</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <?= $ctl->formatMoneyBR($card['valorvenda_unidade']) ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="col-md-3 ghost">
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="col-md-12">
                            <h1 class="text-primary-custom">Nenhum unidade cadastrado</h1>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php foreach ($unity as $modal) { ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-unity-<?= $modal['id_unidade'] ?>">
        <div class="modal-dialog" role="document" style="margin-top: 80px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Unidade <?= $modal['numero_unidade'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img alt="image-default" width="80%" src="<?= URL ?>/images/default_unity.jpg" />
                </div>
                <div class="modal-body text-center">
                    <p><span class="text-detail"><span class="strong"> Area Privativa: </span> <?= $modal['areaprivativa_unidade'] ?> m²</span> <span class="text-detail"><span class="strong"> Area Coberta: </span> <?= $modal['areacoberta_unidade'] ?> m²</span></p>
                    <p><span class="text-detail"><span class="strong"> Cobertura: </span> <?= $modal['cobertura_unidade'] == 0 ? "Não" : "Sim" ?></span> <span class="text-detail"><span class="strong"> Area Total: </span> <?= $modal['areatotal_unidade'] ?> m²</span></p>
                </div>
                <div class="modal-footer text-left">
                    <h2 class="ml-0" style="left: 0;margin-right: 45%;"><?= $ctl->formatMoneyBR($modal['valorvenda_unidade']) ?></h2>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    function showModal(id) {
        $('#modal-unity-' + id).modal('show');
    }
</script>