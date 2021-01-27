<div class="main-content bg-default" id="panel">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-3 ghost">
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-transparent text-center">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="h3 mb-0"><i class="fa fa-plus"></i> Nova Unidade</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <img alt="image-default" width="100%" src="<?= URL ?>/images/default_unity.jpg" />
                        </div>
                        <div class="card-footer">
                            <form method="POST" action="<?= URL ?>/request/addNewUnity">
                                <div class="form-group">
                                    <label>Empreendimento</label>
                                    <select class="form-control text-dark" id="empreendimento-und" name="empreendimento-und" required>
                                        <option value="">Escolha o Empreendimento</option>
                                        <?php foreach ($emp as $option) { ?>
                                            <option value="<?= $option['id_empempreendimento'] ?>"><?= $option['nome_empreendimento'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Numero da Unidade</label>
                                    <input type="number" class="form-control text-dark" id="numero-und" name="numero-und" placeholder="Ex: 270" required>
                                </div>
                                <div class="form-group">
                                    <label>Área Privativa</label>
                                    <input type="number" class="form-control text-dark" id="areapriv-und" name="areapriv-und" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>Área Coberta</label>
                                    <input type="number" class="form-control text-dark" id="areacob-und" name="areacob-und" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>Área Total</label>
                                    <input type="number" class="form-control text-dark" id="areatotal-und" name="areatotal-und" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>Cobertura</label><br>
                                    <label class="custom-toggle">
                                        <input type="checkbox" id="fake-cobertura-und" name="fake-cobertura-und" >
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                    <input type="text" id="cobertura-und" name="cobertura-und" class="hidden">
                                </div>
                                <div class="form-group">
                                    <label>Valor de Venda</label>
                                    <input type="text" class="form-control text-dark money" id="valorvenda-und" name="valorvenda-und" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>Valor de Avaliação do Banco</label>
                                    <input type="text" class="form-control text-dark money" id="valoravalia-und" name="valoravalia-und" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">Cadastrar </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $msg ?>
<script>
    $('.money').mask('000.000.000.000.000,00', {
        reverse: true
    });

    $("#fake-cobertura-und").on("change",function(){
        $("#cobertura-und").val($("#fake-cobertura-und").prop("checked"))
    })
</script>