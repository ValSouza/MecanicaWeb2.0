<?php
require_once 'SistemaVO.php';

class AtendimentoVO extends SistemaVO
{
    private $idCliente;
    private $DataAtendimento;
    private $Obs;
    private $Valor;
    private $idServico;
    private $IdVeiculo;
    private $idFuncionario;

    private function setidClienter($idCliente)
    {
        $this->idCliente = $idCliente;
    }
    private function getidCliente()
    {
        return $this->idCliente;
    }

    private function setDataAtendimento($DataAtendimento)
    {
        $this->DataAtendimento = trim($DataAtendimento);
    }
    private function geDataAtendimento()
    {
        return $this->DataAtendimento;
    }

    private function setObs($Obs)
    {
        $this->Obs = trim($Obs);
    }
    private function getObs()
    {
        return $this->Obs;
    }

    private function setValor($Valor)
    {
        $this->Valor = $Valor;
    }
    private function getValor()
    {
        return $this->Valor;
    }

    private function setidServico($idServico)
    {
        $this->idServico = trim($idServico);
    }
    private function getidServico()
    {
        return $this->idServico;
    }

    private function setIdVeiculo($IdVeiculo)
    {
        $this->IdVeiculo = trim($IdVeiculo);
    }
    private function getIdVeiculo()
    {
        return $this->IdVeiculo;
    }

    private function setidFuncionario($idFuncionario)
    {
        $this->idFuncionario = trim($idFuncionario);
    }
    private function getidFuncionario()
    {
        return $this->idFuncionario;
    }
    
}
