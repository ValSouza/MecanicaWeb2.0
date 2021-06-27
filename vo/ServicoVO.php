<?php
require_once 'SistemaVO.php';
    class ServicoVO extends SistemaVO{

        private $idServico;
        private $nomeServico;
               
        public function setidServico($idServico){
            $this->idServico = $idServico;
        }

        public function getidServico(){
            return $this->idServico;
        }

        public function setnomeServico($nomeServico){
            $this->nomeServico = ltrim(trim($nomeServico));
        }

        public function getnomeServico(){
            return $this->nomeServico;
        }
           
    }
?>