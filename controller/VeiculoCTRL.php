<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/VeiculoDAO.php';
require_once 'UtilCTRL.php';

define('CadastrarVeiculos', 'CadastrarVeiculos');

class VeiculoCTRL{

    public function CadastrarVeiculos(VeiculoVO $vo){

        if($vo->getPlaca() == '' ||
           $vo->getCor() == '' ||
           $vo->getIdCliente() == '' ||
           $vo->getIdModelo() == ''){
            
            $dao = new VeiculoDAO();

            $vo->setData(UtilCTRL::DataAtual());
            $vo->setHora(UtilCTRL::HoraAtual());
            $vo->setFuncao(CadastrarVeiculos);
            $vo->setidLogado(UtilCTRL::CodigoUserLogado());
           

            return $dao->CadastrarVeiculos($vo);
        }
 
    }

    public function ConsultarVeiculo(VeiculoVO $vo){
           $dao = new VeiculoDAO();
           return $dao->ConsultarVeiculo($vo); 
    }
}