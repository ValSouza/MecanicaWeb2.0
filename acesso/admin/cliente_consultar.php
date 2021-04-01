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
              <h1>Mecanica: Consultar Clientes</h1>
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
          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Clientes cadastrados</h3>

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
                        <th>Cliente</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td>(cliente)</td>
                      <td>(telefone)</td>
                      <td>(endereço)</td>
                        <td>
                          <a href="#" class="btn btn-outline-warning btn-xs">Alterar</a>
                          <a href="#" class="btn btn-outline-info btn-xs">Veiculos</a>
                          <a href="#" class="btn btn-outline-primary btn-xs">Atender</a>
                          <a href="#" class="btn btn-outline-success btn-xs">Ver atendimento</a>
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