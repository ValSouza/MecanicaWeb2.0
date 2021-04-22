<?php


class SistemaVO
{   
    private $data;
    private $hora;
    private $funcao;
    private $idLogado;
    private $ip;

    public function setData($data)
    {
        $this->data = trim($data);
    }
    public function getData()
    {
        return $this->data;
    }

    public function setHora($hora)
    {
        $this->hora = trim($hora);
    }
    public function getHora()
    {
        return $this->hora;
    }

    public function setFuncao($funcao)
    {
        $this->funcao = trim($funcao);
    }
    public function getFuncao()
    {
        return $this->funcao;
    }

    public function setidLogado($idLogado)
    {
        $this->idLogado = $idLogado;
    }
    public function getidLogado()
    {
        return $this->idLogado;
    }

    public function setiP($ip)
    {
        $this->ip = $ip;
    }
    public function getiP()
    {
        return $this->ip;
    }
    
}