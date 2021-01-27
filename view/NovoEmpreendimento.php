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
                                    <h5 class="h3 mb-0"><i class="fa fa-plus"></i> Novo Empreendimento</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <img alt="image-default" width="100%" src="<?= URL ?>/images/default_emp.jpg" />
                        </div>
                        <div class="card-footer">
                            <form method="POST" action="<?=URL?>/request/addNewBuild">
                                <div class="form-group">
                                    <label>Nome do Empreendimento</label>
                                    <input type="text" class="form-control text-dark" id="nome-emp" name="nome-emp" placeholder="Ex: Vila das Pedras" required>
                                </div>
                                <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control text-dark"  id="cep-emp" name="cep-emp" placeholder="CEP" required>
                                        <input type="text" class="form-control text-dark mt-1" id="rua-emp" name="rua-emp" placeholder="Insira o CEP" readonly="true" required>
                                        <input type="text" class="form-control text-dark mt-1" id="bairro-emp" name="bairro-emp" placeholder="Insira o CEP" readonly="true" required>
                                        <input type="text" class="form-control text-dark mt-1" id="cidade-emp" name="cidade-emp" placeholder="Insira o CEP" readonly="true" required>
                                        <input type="text" class="form-control text-dark mt-1" id="uf-emp" name="uf-emp" placeholder="Insira o CEP" readonly="true" required>
                                        <input type="number" class="form-control text-dark mt-1" id="numero-emp" name="numero-emp" placeholder="Numero" required>
                                </div>
                                <div class="form-group">
                                    <label>Valor da Obra</label>
                                    <input type="text" class="form-control text-dark money" id="valototalobra-emp" name="valototalobra-emp" placeholder="800.000,00" required>
                                </div>
                                <div class="form-group">
                                    <label>Data Inicio</label>
                                    <input type="date" class="form-control text-dark" id="datainicio-emp" name="datainicio-emp" required>
                                </div>
                                <div class="form-group">
                                    <label>Data Fim</label>
                                    <input type="date" class="form-control text-dark" id="datafim-emp" name="datafim-emp" required>
                                </div>
                                <div class="form-group">
                                    <label>Responsável Técnico </label>
                                    <select class="form-control text-dark" id="resptec-emp" name="resptec-emp" required>
                                        <option value="">Escolha o Responsável</option>
                                        <?php foreach($respTec as $option){ ?>
                                            <option value="<?=$option['id_responsaveltecnico']?>"><?=$option['nome_responsaveltecnico']?></option>
                                        <?php } ?>
                                    </select>
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
<?=$msg?>
<script>
    $('#cep-emp').mask('00000-000');
    $('.money').mask('000.000.000.000.000,00', {
        reverse: true
    });

    var typingTimer; //timer identifier
    var doneTypingInterval = 1500; //time in ms, 5 second for example
    var $input = $('#cep-emp');

    //on keyup, start the countdown
    $input.on('keyup', function() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown 
    $input.on('keydown', function() {
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTyping() {
        $.getJSON("https://viacep.com.br/ws/" + $('#cep-emp').val() + "/json/?callback=?", function(dados) {

            if (!("erro" in dados)) {
                //Atualiza os campos com os valores da consulta.
                $("#rua-emp").val(dados.logradouro);
                $("#bairro-emp").val(dados.bairro);
                $("#cidade-emp").val(dados.localidade);
                $("#uf-emp").val(dados.uf);
                //$("#ibge").val(dados.ibge);
            } //end if.
            else {
                alert("CEP não encontrado.");
            }
        });
    }
</script>