<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/ModeloDAO.php';
require_once 'UtilCTRL.php';

define('CadastrarModelo', 'CadastrarModelo');
define('ExcluirModelo', 'ExcluirModelo');
define('AlterarModelo', 'AlterarModelo');
class ModeloCTRL
{

    public function CadastrarModelo(ModeloVO $vo)
    {
        if (
            $vo->getNomeModelo() == '' ||
            $vo->getidMarca() == ''
        ) {
            return 0;
        }
        $dao = new ModeloDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(CadastrarModelo);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao->CadastrarModelo($vo);
    }

    public function AlterarModelo(ModeloVO $vo)
    {
        if (
            $vo->getNomeModelo() == '' 
        ) {
            return 0;
        }
        $dao = new ModeloDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(AlterarModelo);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao->AlterarModelo($vo);
    }

    public function ConsultarModelo()
    {
        $dao = new ModeloDAO();
        return $dao->ConsultarModelo();
    }
    public function ExcluirModelo($id)
    {
        $dao = new ModeloDAO();
        $voSistema = new ModeloVO();

        $voSistema->setData(UtilCTRL::DataAtual());
        $voSistema->setHora(UtilCTRL::HoraAtual());
        $voSistema->setFuncao(ExcluirModelo);
        $voSistema->setidLogado(UtilCTRL::CodigoUserLogado());
        return $dao->ExcluirModelo($id, $voSistema);
    }
}
