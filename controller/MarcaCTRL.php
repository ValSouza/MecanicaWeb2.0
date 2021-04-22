<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/MarcaDAO.php';
require_once 'UtilCTRL.php';

define('CadastrarMarca', 'CadastrarMarca');

class MarcaCTRL{

    public function CadastrarMarca(MarcaVO $vo){

        if($vo->getnomeMarca()==''){
            return 0;
        }
        
        $dao = new MarcaDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(CadastrarMarca);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao ->CadastrarMarca($vo);

    }

    public function ConsultarMarca(){
        $dao=new MarcaDAO();
       return $dao->ConsultarMarca();
 
     }  
     

   
    
}