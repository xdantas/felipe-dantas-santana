<div class="jumbotron card card-image" style="background-image: linear-gradient(to left, #dddddd, #c9c9c9); margin-bottom: 0px;">
  <div class="text-dark text-end py-5">
    <div class="row">
      <div class="col-md-7">
        <div class="wow fadeInDown text-left">
          <img id="home-img" src="<?php echo base_url(); ?>/public/assets/home-img.png">
        </div>
      </div>
      <div class="col-md-5 wow fadeInDown home-text">
        <h2 id="home-title" class="card-title h1-responsive pt-5 mb-4 font-bold text-center"><strong>Lorem Ipsum Dolor</strong></h2>
        <p class="mb-5 mr-2" style="color: #606060">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
          optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos. Odit sed qui, dolorum!
        </p>
      </div>
    </div>
  </div>


  <div class="jumbotron card card-image text-dark green-table">
    <div class="container-fluid text-center">
      <h2 class="text-center"><strong>Gerenciar Categorias</strong></h2>
      <a id="btn_add_categorias" class="btn nav-green mt-3 mb-5">Adicionar Categorias</a>

      <div class="table-responsive text-nowrap">
        <table id="dt_categorias" class="table table-striped table-bordered table-hover text-dark">
          <thead>
            <tr class="tableheader">
              <th class="dt-center">id_categoria</th>
              <th class="dt-center no-sort">categoria</th>
              <th class="dt-center">categoria_pai</th>
              <th class="no-sort">status</th>
              <th class="dt-center no-sort">Ações</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>


<div class="jumbotron card card-image text-dark green-table">
  <div class="container-fluid text-center">
      <h2 class="text-center"><strong>Gerenciar Detalhes</strong></h2>
    <a id="btn_add_detalhes" class="btn nav-green mb-5 mt-3">Adicionar Detalhe do Produto</a>
    <div class="table-responsive text-nowrap">
      <table id="dt_detalhes" class="table table-striped table-bordered table-hover text-dark">
        <thead>
          <tr class="tableheader">
            <th class="dt-center">id_detalhe</th>
            <th class="dt-center no-sort">id_item</th>
            <th class="no-sort">nome</th>
            <th class="dt-center no-sort">valor</th>
            <th class="dt-center no-sort">status</th>
            <th class="dt-center">Ações</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>

<div class="whatsapp-button">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <a href="https://wa.me/5513997597182" style="position:fixed;width:60px;height:60px;bottom:40px;right:25px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
  z-index:1000;" target="_blank">
    <i style="margin-top:16px" class="fa fa-whatsapp"></i>
  </a>
</div>


<div id="modal_categorias" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Categorias</h4>
        <button type="button" class="close" data-dismiss="modal">x</button>

      </div>

      <div class="modal-body">
        <form id="form_categorias">

          <input id="id_categoria" name="id_categoria" hidden>

          <div class="form-group">
            <label class="col-lg-2 control-label">Categoria</label>
            <div class="col-lg-10">
              <input id="categoria" name="categoria" class="form-control" maxlength="100">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Categoria_pai</label>
            <div class="col-lg-10">
              <input type="number" id="categoria_pai" name="categoria_pai" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Status</label>
            <div class="col-lg-10">
              <input type="number" id="status" name="status" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group text-center">
            <button type="submit" id="btn_save_categorias" class="btn nav-green text-white btn_save_categorias">
              <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
            </button>
            <span class="help-block"></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="modal_detalhes" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Produtos Detalhes</h4>
        <button type="button" class="close" data-dismiss="modal">x</button>

      </div>

      <div class="modal-body">
        <form id="form_detalhes">

          <input id="id_detalhe" name="id_detalhe" hidden>

          <div class="form-group">
            <label class="col-lg-2 control-label">id_item</label>
            <div class="col-lg-10">
              <input type="number" id="id_item" name="id_item" class="form-control" maxlength="100">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">nome</label>
            <div class="col-lg-10">
              <input type="text" id="nome" name="nome" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">valor</label>
            <div class="col-lg-10">
              <input type="number" id="valor" name="valor" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Status</label>
            <div class="col-lg-10">
              <input type="number" id="status_detalhe" name="status_detalhe" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group text-center">
            <button type="submit" id="btn_save_detalhes" class="btn nav-green text-white btn_save_detalhes">
              <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
            </button>
            <span class="help-block"></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>