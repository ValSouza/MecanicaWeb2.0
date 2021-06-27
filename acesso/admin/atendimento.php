<?php
include_once  '../../controller/ModeloCTRL.php';
include_once '../../controller/VeiculoCTRL.php';
include_once '../../controller/ServicoCTRL.php';
include_once '../../controller/FuncionarioCTRL.php';
include_once '../../controller/AtendimentoCTRL.php';
include_once '../../vo/VeiculoVO.php';
$ctrl = new VeiculoCTRL();
$ctrlServico = new ServicoCTRL();
$ctrlFunc = new FuncionarioCTRL();
$ctrlAtend = new AtendimentoCTRL();

$codVenda = '';
$cod = '';
$nome = '';
$data = date('Y-m-d');
$veiculo = '';
$valor = '';
$obs = '';
$servico = '';
$funcionario = '';
$total = 0;

if (isset($_GET['cod']) && isset($_GET['nome'])) {
    $vo = new VeiculoVO();
    $cod = $_GET['cod'];
    $nome = $_GET['nome'];
    $vo->setIdCliente($cod);
    $veic = $ctrl->ConsultarVeiculo($vo);
    $servicos = $ctrlServico->ConsultarServico();
    $funcionarios = $ctrlFunc->ConsultarFuncionario();
} elseif (isset($_POST['btnCadastrar'])) {
    $cod = $_POST['cod'];
    $nome = $_POST['nome'];
    $modelo = $_POST['modelo'];
    

    $vo = new VeiculoVO();
    
    $vo->setIdCliente($cod);
    $vo->setidModelo($modelo);
    $ret = $ctrl->CadastrarVeiculos($vo);

    $veic = $ctrl->ConsultarVeiculo($vo);
} else if (isset($_POST['btnAlterar'])) {
    $nome = ($_POST['nome_cli']);
    $cod = ($_POST['id_cli']);

    $vo = new VeiculoVO();
    $vo->setIdCliente($cod);
   
    $vo->setidVeiculo($_POST['id_veic']);
    $vo->setidModelo($_POST['modelo_veic']);

    $ret = $ctrl->AlterarVeiculo($vo);

    $veic = $ctrl->ConsultarVeiculo($vo);
} else if (isset($_POST['btnExcluir'])) {

    $id = $_POST['id_item'];
    $ret = $ctrl->ExcluirVeiculo($id);
    header('location: consultar_cliente.php?ret=' . $ret);
    exit;
}


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
                            <h1>Mecânica: Atendimento ao cliente.</h1>
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
                        <h3 class="card-title">Atendimento ao cliente.</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="atendimento.php">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="hidden" id="cod" name="cod" value="<?= $cod ?>">
                                        <input type="hidden" id="nome" name="nome" value="<?= $nome ?>">
                                        <input type="text" readonly class="form-control" value="<?= $nome ?>" id="nome" name="nome">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input name="data" type="date" id="data" value="<?php echo $data; ?>">
                                    </div>
                                </div>


                                <div class="col-sm-11">
                                    <div class="form-group">
                                        <label>Carro do cliente</label>
                                        <select class="form-control" name="modelo" id="modelo">
                                            <option value="">Selecione</option>
                                            <?php for ($i = 0; $i < count($veic); $i++) { ?>
                                                <option value="<?= $veic[$i]['id_modelo'] ?>"><?= $veic[$i]['nome_marca'] . ' / ' . $veic[$i]['nome_modelo'] . ' / ' . $veic[$i]['cor_veiculo'] . ' / ' . $veic[$i]['placa_veiculo'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-11">
                                    <div class="form-group">
                                        <label>Observação</label>
                                        <textarea class="form-control" maxlength="200" placeholder="Digite aqui..." name="obs"><?= $obs ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header">
                                <h3 class="card-title"> Dados do Atendimento</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Serviço</label>
                                        <select class="form-control" name="servico" id="servico" />
                                        <option value="">Selecione </option>
                                        <?php for ($i = 0; $i < count($servicos); $i++) { ?>
                                            <option value="<?= $servicos[$i]['id_servico'] ?>"><?= $servicos[$i]['nome_servico'] ?> </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input class="form-control" maxlength="10" placeholder="Exemplo: 100.50" name="valor" id="valor" value="<?= $valor ?>" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Funcionário</label>
                                        <select class="form-control" name="funcionario" id="funcionario" />
                                        <option value="">Selecione </option>
                                        <?php for ($i = 0; $i < count($funcionarios); $i++) { ?>
                                            <option value="<?= $funcionarios[$i]['id_funcionario'] ?>"><?= $funcionarios[$i]['nome_funcionario'] ?> </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <center>
                                <button name="btnCadastrar" class="btn btn-outline-success" onclick="return ValidarTela(7)">Cadastrar</button>
                                <button name="btnCancelar" class="btn btn-outline-warning">Cancelar</button>
                            </center>
                        </form>
                    </div>
                </div>
        </div>
        <?php if (isset($itens) && count($itens) > 0) { ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Serviço realizados</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Funcionário</th>
                                            <th>Serviço</th>
                                            <th>Valor</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($itens); $i++) {
                                            $total += $itens[$i]['valor_item']
                                        ?>
                                            <tr class="odd gradeX">
                                                <td><?= $itens[$i]['nome_funcionario'] ?></td>
                                                <td><?= $itens[$i]['nome_servico'] ?></td>
                                                <td><?= $itens[$i]['valor_item'] ?></td>
                                                <td>
                                                    <a href="atendimento.php?id_item=<?= $itens[$i]['id_item'] ?>&codVenda=<?= $codVenda ?>&cod=<?= $cod ?>&nome=<?= $nome ?>&data=<?= $data ?>&veiculos=<?= $veiculo ?>&obs=<?= $obs ?>&servico=<?= $servico ?>&funcionario=<?= $funcionario ?>" class="btn btn-danger btn-xs">Excluir</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <form method="POST" action="atendimento.php">
                                    <?php
                                    include_once '../../template/_modal_excluir.php';
                                    include_once '/modal/_modal_alterar_veiculo.php';
                                    ?>
                                </form>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <?php } ?>
        <!-- /.content-wrapper -->
        <?php
        include_once '../../template/_footer.php';
        ?>

    </div>
    <!-- /.content-wrapper -->

    <!-- jQuery -->
    <?php
    include_once '../../template/_scripts.php';
    include_once '../../template/_msg.php';
    ?>
</body>

</html>