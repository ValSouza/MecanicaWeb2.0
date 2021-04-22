<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/MarcaDAO.php';
require_once 'UtilCTRL.php';

define('CadastrarModelo', 'CadastrarModelo');

class ModeloCTRL{

    public function CadastrarModelo(ModeloVO $vo){

        if($vo->getNomeModelo()==''){
            return 0;
        }
        
        $dao = new ModeloDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(CadastrarModelo);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao ->CadastrarModelo($vo);
    }

    public function ConsultarModelo(){
       $dao=new ModeloDAO();
       return $dao->ConsultarModelo(); 
     }
}