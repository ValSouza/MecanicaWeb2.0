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
              <h1>Mecanica: Funcionários</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                <li class="breadcrumb-item active">funcionários</li>
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
            <h3 class="card-title">Administre os seus funcionários aqui</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="funcionario.php">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" id="nomeF" placeholder="digite aqui.." name="nomeF">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" class="form-control" id="tel" placeholder="digite aqui.." name="tel">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Endereço</label>
                    <input type="text" class="form-control" id="end" placeholder="digite aqui.." name="end">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="situacao" id="situacao">
                      <label class="form-check-label">Ativo</label>
                    </div>
                  </div>
                </div>
              </div>
              <center>
                <button name="btnCadastrar" class="btn btn-outline-success">Cadastrar</button>
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
                  <h3 class="card-title">Funcionários cadastrados</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 300px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                        <th>Funcionário</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Situação</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td>(nome do modelo)</td>
                      <td>(Telefone)</td>
                      <td>(endereço)</td>
                      <td>(situação)</td>
                        <td>
                          <a href="#" class="btn btn-warning btn-xs">Alterar</a>
                          <a href="#" class="btn btn-danger btn-xs">Excluir</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
    ?>
</body>

</html>