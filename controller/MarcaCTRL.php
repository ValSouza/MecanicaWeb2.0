<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/MarcaDAO.php';
require_once 'UtilCTRL.php';

define('CadastrarMarca', 'CadastrarMarca');
define('ExcluirMarca', 'ExcluirMarca');
define('AlterarMarca', 'AlterarMarca');

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

     public function ExcluirMarca($id)
    {
        $dao = new MarcaDAO();
        $voSistema = new MarcaVO();

        $voSistema->setData(UtilCTRL::DataAtual());
        $voSistema->setHora(UtilCTRL::HoraAtual());
        $voSistema->setFuncao(ExcluirMarca);
        $voSistema->setidLogado(UtilCTRL::CodigoUserLogado());
        return $dao->ExcluirMarca($id, $voSistema);
    }   

    public function AlterarMarca(MarcaVO $vo)
    {
        if (
            $vo->getnomeMarca() == '' 
        ) {
            return 0;
        }
        $dao = new MarcaDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(AlterarMarca);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao->AlterarMarca($vo);
    }

    
}