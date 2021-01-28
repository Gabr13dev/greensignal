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
                                    <h5 class="h3 mb-0"><i class="fa fa-plus"></i> Cadastrar Vendedor</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php foreach($sells as $list){ ?>
                                <p><?=$list['nome_vendedor']?> <span class="ctl" onclick="deleteConfirm(<?=$list['id_vendedor']?>)"><i class="fa fa-trash"></i></span></p>
                            <?php } ?>
                        </div>
                        <div class="card-footer">
                            <form method="POST" action="<?= URL ?>/request/addNewSells">
                                <div class="form-group">
                                    <label> Nome do Vendedor</label>
                                    <input type="text" class="form-control text-dark" id="nome-vend" name="nome-vend" required>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal-delete">
        <div class="modal-dialog" role="document" style="margin-top: 80px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h2>Deseja excluir este cadastro?</h2>
                </div>
                <div class="modal-footer text-left">
                <form method="POST" action="<?=URL?>/request/deleteSells">
                    <input type="text" class="hidden" id="id-input" name="id-input" />
                    <button type="submit" class="btn btn-danger" >Excluir</button>
                </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
<script>
function deleteConfirm(id){
    $("#id-input").val(id);
    $('#modal-delete').modal('show');
}
</script>