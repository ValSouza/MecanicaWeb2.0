<?php 
require_once 'SistemaVO.php';
class FuncionarioVO extends SistemaVO{

        private $idStaff;
        private $nomeStaff;
        private $phoneStaff;
        private $addressStaff;
        private $situation;
        private $idUsuario;

        public function setIdStaff($id){
            $this->idStaff = $id;
        }

        public function getIdStaff(){
            return $this->idStaff;
        }

        public function setNomeStaff($nome){
            $this->nomeStaff = ltrim(trim($nome));
        }

        public function getNomeStaff(){
            return $this->nomeStaff;
        }

        public function setPhoneStaff($phone){
            $this->phoneStaff = ltrim(trim($phone));
        }

        public function getPhoneStaff(){
            return $this->phoneStaff;
        }

        public function setAddressStaff($address){
            $this->addressStaff = ltrim(trim($address));
        }

        public function getAddressStaff(){
            return $this->addressStaff;
        }

        public function setSituation($sit){
            $this->situation = $sit;
        }

        public function getSituation(){
            return $this->situation;
        }

        public function setIdUsuario($idU){
            $this->idUsuario = $idU;
        }

        public function getIdUsuario(){
            return $this->idUsuario;
        }
    }


?>