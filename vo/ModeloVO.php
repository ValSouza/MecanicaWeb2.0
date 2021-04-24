<?php

require_once 'SistemaVO.php';

    class ModeloVO extends SistemaVO{

        private $idMarca;
        private $nomeModelo;
        private $idModelo;
               
        public function setIdModelo($id){
            $this->idModelo = $id;
        }

        public function getIdModelo(){
            return $this->idModelo;
        }

        public function setidMarca($idMarca){
            $this->idMarca = $idMarca;
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