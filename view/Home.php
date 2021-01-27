<!-- Main content -->
<div class="main-content bg-default" id="panel">
    <!-- Header -->

    <!-- Page content -->
    <div class="container-fluid mt-4">
      <div class="row">
        <?php foreach($emp as $card){ ?>
        <div class="col-xl-4 col-md-12">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1 link-attention" onclick="window.location.href = '<?=URL?>'">Ver Localização <i class="fa fa-location-arrow"></i> </h6>
                  <h5 class="h3 mb-0"><?=$card['nome_empreendimento']?> <span class="pull-right"> <?=$to->getQtdeUnity($card['id_empempreendimento'])[0]['qtd'] ?> <i class="fa fa-building-o"></i></span></h5>
                </div>
              </div>
            </div>
            <div class="card-body">
                <img alt="image-default" width="100%" src="<?=URL?>/images/default_emp.jpg" />
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" onclick="window.location.href = '<?=URL?>/Empreendimento/<?=$card['id_empempreendimento']?>'">Ver Empreendimento</button>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?=$msg?>