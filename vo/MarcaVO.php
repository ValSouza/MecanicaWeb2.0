<?php

require_once 'SistemaVO.php';

    class MarcaVO extends SistemaVO{

        private $idUsuario;
        private $nomeMarca;
               
        public function setidUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }

        public function getidUsuario(){
            return $this->idUsuario;
        }

        public function setnomeMarca($nomeMarca){
            $this->nomeMarca = ltrim(trim($nomeMarca));
        }

        public function getnomeMarca(){
            return $this->nomeMarca;
        }
           
    }
?>