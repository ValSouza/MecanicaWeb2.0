<?php
require_once 'SistemaVO.php';

class UsuarioVO extends SistemaVO
{
    private $idUsuario;
    private $tipoUsuario;
    private $nomeUsuario;
    private $cpfUsuario;
    private $setorUsuario;
    private $senhaUsuario;
    private $statusUsuario;
    private $dataUsuario;



    public function setIdUsuario($id)
    {
        $this->idUsuario = $id;
    }
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setTipoUsuario($tipo)
    {
        $this->tipoUsuario = $tipo;
    }
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    public function setNomeUsuario($nome)
    {
        $this->nomeUsuario = trim($nome);
    }
    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }

    public function setCpfUsuario($cpf)
    {
        $this->cpfUsuario = trim($cpf);
    }
    public function getCpfUsuario()
    {
        return $this->cpfUsuario;
    }

    public function setSetorUsuario($setor)
    {
        $this->setorUsuario = $setor;
    }
    public function getSetorUsuario()
    {
        return $this->setorUsuario;
    }

    public function setSenha($senha)
    {
        $this->senhaUsuario = trim($senha);
    }
    public function getSenha()
    {
        return $this->senhaUsuario;
    }

    public function setStatusUsuario($status)
    {
        $this->statusUsuario = $status;
    }
    public function getStatusUsuario()
    {
        return $this->statusUsuario;
    }

    public function setDataUsuario($dataUsuario)
    {
        $this->dataUsuario = $dataUsuario;
    }
    public function getDataUsuario()
    {
        return $this->dataUsuario;
    }

   

}
