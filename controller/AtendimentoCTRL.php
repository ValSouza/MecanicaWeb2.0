<?php

<<<<<<< Updated upstream
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/MarcaDAO.php';
=======
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/AtendimentoDAO.php';
>>>>>>> Stashed changes
require_once 'UtilCTRL.php';

define('CadastrarAtendimento', 'CadastrarAtendimento');

class AtendimentoCTRL 
{

    public function CadastrarAtendimento( AtendimentoVO $vo)
    {
        if (
            $vo->getData() == '' ||
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