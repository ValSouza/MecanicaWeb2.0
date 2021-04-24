<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/ServicoDAO.php';
require_once 'UtilCTRL.php';

define('CadastrarServico', 'CadastrarServico');

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
     

   
    
}