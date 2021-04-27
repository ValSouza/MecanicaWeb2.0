<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/ServicoDAO.php';
require_once 'UtilCTRL.php';

define('CadastrarServico', 'CadastrarServico');
define('ExcluirServico', 'ExcluirServico');

class ServicoCTRL{

    public function CadastrarServico(ServicoVO $vo){

        if($vo->getnomeServico()==''){
            return 0;
        }        
        $dao = new ServicoDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(CadastrarServico);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao ->CadastrarServico($vo);

    }

    public function ConsultarServico(){
        $dao=new ServicoDAO();
       return $dao->ConsultarServico();
 
     }  
     
     public function ExcluirServico($id){
        $dao=new ServicoDAO();
        $voSistema= new SistemaVO();
        
        $voSistema->setData(UtilCTRL::DataAtual());
        $voSistema->setHora(UtilCTRL::HoraAtual());
        $voSistema->setFuncao(ExcluirServico);
        $voSistema->setidLogado(UtilCTRL::CodigoUserLogado());
        return $dao->ExcluirServico($id,$voSistema);
    }

   
    
}