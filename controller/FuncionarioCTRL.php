<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/FuncionarioDAO.php';
require_once 'UtilCTRL.php';

define('CadastrarFuncionario', 'CadastrarFuncionario');
define('ExcluirFuncionario', 'ExcluirFuncionario');

class FuncionarioCTRL{

    public function CadastrarFuncionario(FuncionarioVO $vo){

        if($vo->getNomeStaff()==''||
        $vo->getPhoneStaff()==''||
        $vo->getAddressStaff()==''){
            return 0;
        }        
        $dao = new FuncionarioDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(CadastrarFuncionario);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao ->CadastrarFuncionario($vo);

    }

    public function ConsultarFuncionario(){
        $dao=new FuncionarioDAO();
       return $dao->ConsultarFuncionario();
 
     }  
     
     public function ExcluirFuncionario($id)
     {
         $dao = new FuncionarioDAO();
         $voSistema = new FuncionarioVO();
 
         $voSistema->setData(UtilCTRL::DataAtual());
         $voSistema->setHora(UtilCTRL::HoraAtual());
         $voSistema->setFuncao(ExcluirFuncionario);
         $voSistema->setidLogado(UtilCTRL::CodigoUserLogado());
         return $dao->ExcluirFuncionario($id, $voSistema);
     }  

   
    
}