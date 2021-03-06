<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/ClienteDAO.php';
require_once 'UtilCTRL.php';

define('CadastrarCliente', 'CadastrarCliente');
define('AlterarCliente', 'AlterarCliente');
define('ExcluirCliente', 'ExcluirCliente');
class ClienteCTRL
{
    public function CadastrarCliente(ClienteVO $vo)
    {

        if (
            $vo->getNomeCliente() == '' ||
            $vo->getPhoneCliente() == '' ||
            $vo->getAddressCliente() == ''
        ) {
            return 0;
        }
        $dao = new ClienteDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(CadastrarCliente);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao->CadastrarCliente($vo);
    }

    public function ConsultarCliente($nome_pesquisa)
    {
        $dao = new ClienteDAO();
        //$vo->getNomeCliente(); Tem que retornar o nome pesquisado
        return $dao->ConsultarCliente($nome_pesquisa);
    }

    public function AlterarCliente(ClienteVO $vo)
    {
        if (
            $vo->getNomeCliente() == '' ||
            $vo->getPhoneCliente() == '' ||
            $vo->getAddressCliente() == '' ||
            $vo->getIdCliente() == ''
        ) {
            return 0;
        }
        $dao = new ClienteDAO();
        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(AlterarCliente);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());
        return $dao->AlterarCliente($vo);
    }

    public function ExcluirCliente($id)
    {
        $dao = new ClienteDAO();
        $vo = new ClienteVO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(ExcluirCliente);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());
        return $dao->ExcluirCliente($id, $vo);
    }
}
