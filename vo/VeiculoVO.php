<?php
require_once 'SistemaVO.php';

    class VeiculoVO extends SistemaVO{

       
        private $idVeiculo;
        private $placa;
        private $cor;
        private $idCliente;
        private $idModelo;
        
        public function setidVeiculo($id){
            $this->idVeiculo = $id;
        }

        public function getIdVeiculo(){
            return $this->idVeiculo;
        }

        public function setPlaca($placa){
            $this->placa = ltrim(trim($placa));
        }

        public function getPlaca(){
            return $this->placa;
        }

        public function setCor($cor){
            $this->cor = ltrim(trim($cor));
        }

        public function getCor(){
            return $this->cor;
        }
        
        public function setIdCliente($idCliente){
            $this->idCliente = $idCliente;
        }

        public function getIdCliente(){
            return $this->idCliente;
        }

        public function setidModelo($idModelo){
            $this->idModelo = $idModelo;
        }

        public function getidModelo(){
            return $this->idModelo;
        }
        
    }
?>