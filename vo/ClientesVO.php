<?php

require_once 'SistemaVO.php';

    class ClientesVO extends SistemaVO{

        private $idCliente;
        private $nomeCliente;
        private $phoneCliente;
        private $addressCliente;
        private $idUsuario;

        public function setIdCliente($id){
            $this->idCliente = $id;
        }

        public function getIdCliente(){
            return $this->idCliente;
        }

        public function setNomeCliente($nome){
            $this->nomeCliente = ltrim(trim($nome));
        }

        public function getNomeCliente(){
            return $this->nomeCliente;
        }

        public function setPhoneCliente($phone){
            $this->phoneCliente = ltrim(trim($phone));
        }
        
        public function getPhoneCliente(){
            return $this->phoneCliente;
        }

        public function setAddressCliente($address){
            $this->addressCliente = ltrim(trim($address));
        }

        public function getAddressCliente(){
            return $this->addressCliente;
        }

        public function setIdUsuario($usuario){
            $this->idUsuario = $usuario;
        }

        public function getIdUsuario(){
            return $this->idUsuario;
        }
        
    }
?>