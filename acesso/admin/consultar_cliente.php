<?php
require_once '../../controller/ClienteCTRL.php';
require_once '../../vo/ClienteVO.php';
$nome_pesquisa = '';
$ctrl = new ClienteCTRL;
$vo = new ClienteVO();


if (isset($_POST['btnBuscar'])) {
  $nome_pesquisa = $_POST['nome_pesquisa'];
}

if (isset($_POST['btnExcluir'])) {
  $id = $_POST['id_item'];
  $ret = $ctrl->ExcluirCliente($id);
} else if (isset($_POST['btnAlterar'])) {
  $vo = new ClienteVO();
  $vo->setNomeCliente($_POST['nome_cliente']);
  $vo->setPhoneCliente($_POST['tel_cliente']);
  $vo->setAddressCliente($_POST['end_cliente']);
  $vo->setIdCliente($_POST['id_cliente']);
  $ret = $ctrl->AlterarCliente($vo);
}

$clientes = $ctrl->ConsultarCliente($nome_pesquisa);


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
              <h1>Mecânica: Consultar Clientes</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                <li class="breadcrumb-item active">consultar clientes</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <form method="POST" action="consultar_cliente.php">
            <!-- /.row -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Clientes cadastrados</h3>

                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 300px;">
                        <input type="text" name="nome_pesquisa" value="<?= $nome_pesquisa ?>" class="form-control float-right" placeholder="digite o nome do cliente...">

                        <div class="input-group-append">
                          <button type="submit" name="btnBuscar" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
          </form>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Cliente</th>
                  <th>Telefone</th>
                  <th>Endereço</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < count($clientes); $i++) { ?>
                  <tr>
                    <td><?= $clientes[$i]['nome_cliente'] ?></td>
                    <td><?= $clientes[$i]['telefone_cliente'] ?></td>
                    <td><?= $clientes[$i]['endereco_cliente'] ?></td>
                    <td>
                      <a href="#" class="btn btn-outline-warning btn-xs" data-toggle="modal" data-target="#modal-alterar-cliente" onclick="CarregarModalAlterarCliente('<?= $clientes[$i]['id_cliente'] ?>','<?= $clientes[$i]['nome_cliente'] ?>','<?= $clientes[$i]['telefone_cliente'] ?>','<?= $clientes[$i]['endereco_cliente'] ?>')">Alterar</a>
                      <a href="#" class="btn btn-outline-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarModalExcluir('<?= $clientes[$i]['id_cliente'] ?>','<?= $clientes[$i]['nome_cliente'] ?>')">Excluir</a>
                      <a href="cliente_veiculos.php?nome=<?= $clientes[$i]['nome_cliente'] ?>&cod=<?= $clientes[$i]['id_cliente'] ?>" class="btn btn-outline-info btn-xs">Veiculos</a>
                      <a href="atendimento.php?nome=<?= $clientes[$i]['nome_cliente'] ?>&cod=<?= $clientes[$i]['id_cliente'] ?>" class="btn btn-outline-primary btn-xs">Atender</a>
                      <a href="#" class="btn btn-outline-success btn-xs">Ver atendimento</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <form method="POST" action="consultar_cliente.php">
              <?php
              include_once '../../template/_modal_excluir.php';
              include_once 'modal/_modal_alterar_cliente.php';
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