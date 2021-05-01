<?php
include_once '../../vo/VeiculoVO.php';
include_once '../../dao/ModeloDAO.php';
include_once  '../../controller/ClienteCTRL.php';
include_once  '../../controller/ModeloCTRL.php';
include_once '../../controller/VeiculoCTRL.php';
include_once '../../dao/VeiculoDAO.php';

$dao = new VeiculoDAO();

$ctrlModelo = new ModeloCTRL();
$veic  ='';
$nome = '';
$codCli = '';

if (isset($_GET['cod']) && isset($_GET['nome'])) {

    $codCli = $_GET['cod'];
    $nome = $_GET['nome'];
    
}
elseif(isset($_POST['btnCadastrar'])){
    $vo = new VeiculoVO();
    $ctrlVeiculo = new VeiculoCTRL();
    
   $vo->setIdCliente($_POST['codCli']);
   $vo->setCor($_POST['cor']);
   $vo->setidModelo($_POST['modelo']);
   $vo->setPlaca($_POST['placa']);  

    $ctrlVeiculo->CadastrarVeiculos($vo);

}
$veic = $dao->ConsultarVeiculo($codCli);
$modelos = $ctrlModelo->ConsultarModelo();
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
                            <h1>Mecânica: Veículos do cliente.</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Veículos do cliente</li>
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
                        <h3 class="card-title">Gerenciar veículos do cliente.</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="cliente_veiculos.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="hidden" class="form-control" value="<?= $codCli ?>" name="codCli" id="codCli">
                                        <input type="text" readonly class="form-control" value="<?= $nome ?>" id="nome" name="nome">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Marca/Modelo</label>
                                        <select class="form-control" name="modelo" id="modelo">
                                            <option value="">Selecione</option>
                                            <?php for ($i = 0; $i < count($modelos); $i++) { ?>
                                                <option value="<?= $modelos[$i]['id_modelo'] ?>"><?= $modelos[$i]['nome_marca'] . ' / '. $modelos[$i]['nome_modelo'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Placa</label>
                                        <input type="text" class="form-control" id="placa" placeholder="digite aqui.." name="placa">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Cor</label>
                                        <input type="text" class="form-control" id="cor" placeholder="digite aqui.." name="cor">
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
                                    <h3 class="card-title">Veículos cadastrados do cliente</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Marca/Modelo</th>
                                                <th>Placa</th>
                                                <th>Cor</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i =0; $i < count($veic); $i++){  ?>    
                                            <tr>
                                                <td><?= $veic[$i]['nome_marca'] . '/ ' . $veic[$i]['nome_modelo'] ?></td>
                                                <td><?= $veic[$i]['placa_veiculo']?></td>
                                                <td><?= $veic[$i]['cor_veiculo']?></td>
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