<?php

require_once 'SistemaVO.php';

    class ModeloVO extends SistemaVO{

        private $idUsuario;
        private $idMarca;
        private $nomeModelo;
               
        public function setidUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }

        public function getidUsuario(){
            return $this->idUsuario;
        }

        public function setidMarca($idMarca){
            $this->idMarca = ltrim(trim($idMarca));
        }

        public function getidMarca(){
            return $this->idMarca;
        }

        public function setnomeModelo($nomeModelo){
            $this->nomeModelo = ltrim(trim($nomeModelo));
        }

        public function getnomeModelo(){
            return $this->nomeModelo;
        }
           
    }
?>