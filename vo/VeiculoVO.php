<?php

    class ModeloVO{

       
        private $idCliente;
        private $idModelo;
        private $Placa;
        private $Cor;
               
        public function setIdCliente($idCliente){
            $this->idCliente = $idCliente;
        }

        public function getIdCliente(){
            return $this->idCliente;
        }

        public function setidModelo($idModelo){
            $this->idModelo = ltrim(trim($idModelo));
        }

        public function getidModelo(){
            return $this->idModelo;
        }

        public function setPlaca($Placa){
            $this->Placa = ltrim(trim($Placa));
        }

        public function getPlaca(){
            return $this->Placa;
        }

        public function setCor($Cor){
            $this->Cor = ltrim(trim($Cor));
        }

        public function getCor(){
            return $this->Cor;
        }
           
    }
?>