<?php

require_once 'UtilCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dao/AtendimentoDAO.php';


define('CadastrarAtendimento', 'CadastrarAtendimento');

class AtendimentoCTRL 
{

    public function CadastrarAtendimento(AtendimentoVO $vo)
    {

        if (
            $vo->get() == '' ||
            $vo->getDescricao() == '' ||
            $vo->getIdModelo() == '' ||
            $vo->getidTipo() == ''
        ) {
            return 0;
        }
        $dao = new AtendimentoDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(CadastrarAtendimento);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao->CadastrarAtendimento($vo);
    }

    
}