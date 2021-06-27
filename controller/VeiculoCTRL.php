<?php
require_once 'UtilCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/VeiculoDAO.php';

define('CadastrarVeiculos', 'CadastrarVeiculos');
define('AlterarVeiculos', 'AlterarVeiculos');
define('ExcluirVeiculos', 'ExcluirVeiculos');
class VeiculoCTRL
{

    public function CadastrarVeiculos(VeiculoVO $vo)
    {
        if (
            $vo->getPlaca() == '' ||
            $vo->getCor() == '' ||
            $vo->getIdCliente() == '' ||
            $vo->getIdModelo() == ''
        ) {
            return 0;
        }

        $dao = new VeiculoDAO();
        
        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(CadastrarVeiculos);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());


        return $dao->CadastrarVeiculos($vo);
    }
    
    public function AlterarVeiculo(VeiculoVO $vo){

        if (
            $vo->getPlaca() == '' ||
            $vo->getCor() == '' ||
            $vo->getIdModelo() == ''
        ) {
            return 0;
        }        
        $dao = new VeiculoDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(AlterarVeiculos);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao ->AlterarVeiculo($vo);

    }

    public function ConsultarVeiculo(VeiculoVO $vo)
    {
        $dao = new VeiculoDAO();
        return $dao->ConsultarVeiculo($vo);
    }
    public function ExcluirVeiculo($id){
        $dao=new VeiculoDAO();
        $voSistema= new VeiculoVO();
        
        $voSistema->setData(UtilCTRL::DataAtual());
        $voSistema->setHora(UtilCTRL::HoraAtual());
        $voSistema->setFuncao(ExcluirVeiculos);
        $voSistema->setidLogado(UtilCTRL::CodigoUserLogado());
        return $dao->ExcluirVeiculo($id,$voSistema);
    }
}
