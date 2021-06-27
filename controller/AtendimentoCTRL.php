<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/AtendimentoDAO.php';
require_once 'UtilCTRL.php';

define('CadastrarAtendimento', 'CadastrarAtendimento');
define('AlterarAtendimento', 'AlterarAtendimento');
define('InserirItem', 'InserirItem');

class AtendimentoCTRL 
{

    public function CadastrarAtendimento(AtendimentoVO $vo)
    {
        if (
            $vo->getData() == '' ||
            $vo->getObs() == '' ||
            $vo->getIdUsuario() == '' ||
            $vo->getIdVeiculo() == '' ||
            $vo->getIdCliente()
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

    public function AlterarAtendimento(AtendimentoVO $vo)
    {
        if (
            $vo->getData() == '' ||
            $vo->getObs() == '' ||
            $vo->getIdUsuario() == '' ||
            $vo->getIdVeiculo() == '' ||
            $vo->getIdCliente()
        ) {
            return 0;
        }
        $dao = new AtendimentoDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(AlterarAtendimento);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao->AlterarAtendimento($vo);
    }

    public function CarregarDadosVenda($idVenda)
    {
        $dao = new AtendimentoDAO();
        //$vo->getNomeCliente(); Tem que retornar o nome pesquisado
        return $dao->CarregarDadosVenda($idVenda);
    }

    public function VerificarItemAdd(AtendimentoVO $vo)
    {
        if (
            $vo->getIdVenda() == '' ||
            $vo->getidServico() == '' ||
            $vo->getidFuncionario() == '' 
        ) {
            return 0;
        }
        $dao = new AtendimentoDAO();  
        return $dao->VerificarItemAdd($vo);
    }

    public function InserirItem(AtendimentoVO $vo)
    {
        if (
            $vo->getData() == '' ||
            $vo->getObs() == '' ||
            $vo->getidAtendimento() == '' ||
            $vo->getidFuncionario() == '' ||
            $vo->getidServico() == '' ||
            $vo->getValor()
        ) {
            return 0;
        }
        $dao = new AtendimentoDAO();

        $vo->setData(UtilCTRL::DataAtual());
        $vo->setHora(UtilCTRL::HoraAtual());
        $vo->setFuncao(InserirItem);
        $vo->setidLogado(UtilCTRL::CodigoUserLogado());

        return $dao->InserirItem($vo);
    }

    
}