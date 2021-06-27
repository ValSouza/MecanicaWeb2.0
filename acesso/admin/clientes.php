<?php
require_once '../../controller/ClienteCTRL.php';
require_once '../../vo/ClienteVO.php';
$codCli = '';
$nome = '';
$tel = '';
$end = '';
$ctrl = new ClienteCTRL;

if (isset($_GET['cod']) && isset($_GET['nome']) && isset($_GET['tel']) && isset($_GET['endereco'])) {
    $codCli = $_GET['cod'];
    $nome = $_GET['nome'];
    $tel = $_GET['tel'];
    $end = $_GET['endereco'];
}

if (isset($_POST['btnCadastrar'])) {
    $vo = new ClienteVO();
    $vo->setNomeCliente($_POST['nome']);
    $vo->setPhoneCliente($_POST['tel']);
    $vo->setAddressCliente($_POST['end']);

    if ($codCli == '') {
        $ret = $ctrl->CadastrarCliente($vo);
        header('location: consultar_cliente.php?ret=' . $ret);
        exit;
    } else {
        $vo = new ClienteVO();
        $vo->setIdCliente($codCli);
        $vo->setNomeCliente($nome);
        $vo->setPhoneCliente($tel);
        $vo->setAddressCliente($end);

        $ret = $ctrl->AlterarCliente($vo);

        header('location: consultar_cliente.php?ret=' . $ret);
        exit;
    }
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
                            <h1>Mecânica: Clientes</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">clientes</li>
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
                        <h3 class="card-title"><?= $codCli == '' ? 'Cadastrar' : 'Alterar ' ?>cliente aqui</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="clientes.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="hidden" class="form-control" value="<?= $codCli ?>" name="codCli" id="codCli">
                                        <input type="text" class="form-control" value="<?= $nome ?>" id="nome" placeholder="digite o nome aqui.." name="nome">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" value="<?= $tel ?>" id="tel" placeholder="digite o telefone aqui.." name="tel">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" value="<?= $end ?>" id="end" placeholder="digite o endereço aqui.." name="end">
                                    </div>
                                </div>
                            </div>
                            <center>
                                <button name="btnCadastrar" class="btn btn-outline-success" onclick="return ValidarTela(6)">Cadastrar</button>
                                <button name="btnCancelar" class="btn btn-outline-warning">Cancelar</button>
                             
                            </center>
                            
                        </form>
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