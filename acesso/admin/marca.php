<?php
require_once '../../controller/MarcaCTRL.php';
require_once '../../vo/MarcaVO.php';
$ctrl = new MarcaCTRL();

if (isset($_POST['btnCadastrar'])) {
  $vo = new MarcaVO();
  $ctrl = new MarcaCTRL();
  $vo->setnomeMarca($_POST['nome']);

  $ret = $ctrl->CadastrarMarca($vo);
} else if (isset($_POST['btnExcluir'])) {
  $id = $_POST['id_item'];
  $ret = $ctrl->ExcluirMarca($id);
}
$marcas = $ctrl->ConsultarMarca();

?>


<!DOCTYPE html>
<html>

<head>
  <?php
  include_once '../../template/_head.php';
  ?>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include_once '../../template/_topo.php';
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    include_once '../../template/_menu.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Mecânica: Marcas</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                <li class="breadcrumb-item active">Marcas</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Cadastre os suas marcas aqui.</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="marca.php">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Nome da marca</label>
                    <input type="text" class="form-control" id="nome" placeholder="digite aqui.." name="nome">
                  </div>
                </div>
              </div>
              <center>
                <button name="btnCadastrar" onclick=" return ValidarTela(3)" class="btn btn-outline-success">Cadastrar</button>
                <button name="btnCancelar" class="btn btn-outline-warning">Cancelar</button>
              </center>
            </form>
          </div>

          <hr>
          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Marcas cadastradas</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 300px;">
                      <input type="text" name="buscarMarcas" class="form-control float-right" placeholder="digite nome da marca...">

                      <div class="input-group-append">
                        <button type="submit" name="btnBuscar" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nome da marca</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for ($i = 0; $i < count($marcas); $i++) { ?>
                        <tr>
                          <td><?= $marcas[$i]['nome_marca'] ?></td>
                          <td>
                            <a href="#" class="btn btn-warning btn-xs">Alterar</a>
                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarModalExcluir('<?= $marcas[$i]['id_marca'] ?>','<?= $marcas[$i]['nome_marca'] ?>')">Excluir</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <form method="POST" action="marca.php">
                    <?php
                    include_once '../../template/_modal_excluir.php';
                    ?>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    include_once '../../template/_footer.php';
    ?>

    <!-- jQuery -->
    <?php
    include_once '../../template/_scripts.php';
    include_once '../../template/_msg.php';
    ?>

</body>

</html>