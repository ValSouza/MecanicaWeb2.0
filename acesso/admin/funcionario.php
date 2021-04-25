<?php
require_once '../../controller/FuncionarioCTRL.php';
require_once '../../vo/FuncionarioVO.php';

$ctrl = new FuncionarioCTRL;
$situacao = '0';
if (isset($_POST['btnCadastrar'])) {
  $vo = new FuncionarioVO();
  $vo->setNomeStaff($_POST['nomeF']);
  $vo->setPhoneStaff($_POST['tel']);
  $vo->setSddressStaff($_POST['end']);
  $situacao = isset($_POST['situacao']);
  $vo->setSituation($situacao)? '1' : '0';  

  $ret = $ctrl->CadastrarFuncionario($vo);
}

$funcionarios = $ctrl->ConsultarFuncionario();
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
              <h1>Mecânica: Funcionários</h1>
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
                <div class="col-sm-8">
                  <div class="form-group">
                    <label>Endereço</label>
                    <input type="text" class="form-control" id="end" placeholder="digite aqui.." name="end">
                  </div>
                </div>
                <center>
                <br>   
                <div class="row">
                  <div class="offset-sm-2 col-sm-10">
                    <div class="form-check">
                    <div class="custom-control custom-checkbox">
                      <label>
                        <input type="checkbox" name="situacao" <?= $situacao == '1' ? 'checked' : '' ?> />Ativo
                      </label>
                    </div>
                  </div>
                </div>
                </center>
              </div>
              <center>
                <button name="btnCadastrar" class="btn btn-outline-success" onclick="return ValidarTela(5)">Cadastrar</button>
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
                  <h3 class="card-title"> Funcionários cadastrados</h3>

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
                        <th>Funcionário</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Situação</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $ativos = 0;
                      $inativos = 0;
                      for ($i = 0; $i < count($funcionarios); $i++) 
                      {
                        if ($funcionarios[$i]['situacao_funcionario'] == 1) {
                          $ativos += 1;
                        } else {
                          $inativos += 1;
                        }
                      ?>
                        <tr>
                          <td><?= $funcionarios[$i]['nome_funcionario'] ?></td>
                          <td><?= $funcionarios[$i]['telefone_funcionario'] ?></td>
                          <td><?= $funcionarios[$i]['endereco_funcionario'] ?></td>
                          <td><?= $funcionarios[$i]['situacao_funcionario'] == 1 ? 'Ativo' : 'Inativo' ?></td>
                          <td>
                            <a href="#" class="btn btn-warning btn-xs">Alterar</a>
                            <a href="#" class="btn btn-danger btn-xs">Excluir</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>                  
                </div>                
                <!-- /.card-body -->
              </div>
              <center>
              <?php if ($ativos > 0) { ?>   
                                        <label style="color: green">TOTAL DE ATIVOS: <?= $ativos ?></label>
                                    <?php } ?>
                                    <?php if ($inativos > 0) { ?>   
                                        </br><label style="color: darkgoldenrod">TOTAL DE INATIVOS: <?= $inativos ?></label>
                                    <?php } ?>
                                    </center>
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
    include_once '../../template/_msg.php';// Validação de campo DAO
    ?>
</body>

</html>