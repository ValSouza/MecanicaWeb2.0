<?php
require_once 'SistemaVO.php';

class AtendimentoVO extends SistemaVO
{
    private $idVenda;
    private $DataAtendimento;
    private $Obs;
    private $idUsuario;
    private $IdVeiculo;
    private $idCliente;
    private $Valor;
    private $idFuncionario;
    private $idServico;
    private $idAtemdimento;


    public function setidVenda($id)
    {
        $this->idVenda = $id;
    }
    public function getIdVenda()
    {
        return $this->idVenda;
    }

    public function setDataAtendimento($DataAtendimento)
    {
        $this->DataAtendimento = trim($DataAtendimento);
    }
    public function geDataAtendimento()
    {
        return $this->DataAtendimento;
    }

    public function setObs($Obs)
    {
        $this->Obs = ltrim(trim($Obs));
    }
    public function getObs()
    {
        return $this->Obs;
    }

    public function setIdUsuario($id){
        $this->idUsuario = $id;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdVeiculo($IdVeiculo)
    {
        $this->IdVeiculo = trim($IdVeiculo);
    }
    public function getIdVeiculo()
    {
        return $this->IdVeiculo;
    }

    public function setidCliente($id)
    {
        $this->idCliente = trim($id);
    }
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setValore($Valor)
    {
        $this->Valor = trim($Valor);
    }
    public function getValor()
    {
        return $this->Valor;
    }
    
    public function setidFuncionario($idFuncionario)
    {
        $this->idFuncionario = trim($idFuncionario);
    }
    public function getidFuncionario()
    {
        return $this->idFuncionario;
    }

    public function setidServico($idServico)
    {
        $this->idServico = trim($idServico);
    }
    public function getidServico()
    {
        return $this->idServico;
    }

    public function setidAtendimento($idAtendimento)
    {
        $this->idAtendimento = trim($idAtendimento);
    }
    public function getidAtendimento()
    {
        return $this->idAtendimento;
    }


 
    
}
