<?php

require_once 'SistemaVO.php';

    class MarcaVO extends SistemaVO{

        private $idMarca;
        private $nomeMarca;
               
        public function setidMarca($idMarca){
            $this->idMarca = $idMarca;
        }

        public function getidMarca(){
            return $this->idMarca;
        }

        public function setnomeMarca($nomeMarca){
            $this->nomeMarca = ltrim(trim($nomeMarca));
        }

        public function getnomeMarca(){
            return $this->nomeMarca;
        }
           
    }
?>