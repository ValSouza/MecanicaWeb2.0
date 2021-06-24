<?php

require_once 'Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/controller/UtilCTRL.php';

class VeiculoDAO extends Conexao{

    /** @var PDO */
    private $conexao;
    /** @var PDOStatement */
    private $sql;

    public function __construct()
    {   
        $this->conexao = parent::retornaConexao();
        $this->sql = new PDOStatement();
    }
    public function CadastrarVeiculos(VeiculoVO $vo){
        $comando = 'insert into 
                                tb_veiculo 
                                           (placa_veiculo, 
                                           cor_veiculo, 
                                           id_cliente, 
                                           id_modelo, 
                                           id_usuario) 
                                    values
                                           (?,?,?,?,?)';
        $this->sql = $this->conexao->prepare($comando);
        $i=1;
        $this->sql->bindValue($i++ , $vo->getPlaca());
        $this->sql->bindValue($i++ , $vo->getCor());
        $this->sql->bindValue($i++ , $vo->getIdCliente());
        $this->sql->bindValue($i++ , $vo->getidModelo());
        $this->sql->bindValue($i++ , $vo->getidLogado());

        try {
            $this->sql->execute();
            return 1;

        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(),
                               $vo->getidLogado(UtilCTRL::CodigoUserLogado()),
                               $vo->getFuncao(),
                               $vo->getHora(),
                               $vo->getData(),
                               $vo->getiP());
                               return -1;
        }


    }

    public function AlterarVeiculo(VeiculoVO $vo)
    {

        $comando = 'update
                            tb_veiculo 
                           set
                                 placa_veiculo=?,
                                 cor_veiculo=?,
                                 id_modelo=?
                            where     
                                  id_veiculo=?';
        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, $vo->getPlaca());
        $this->sql->bindValue(2, $vo->getCor());
        $this->sql->bindValue(3, $vo->getidModelo());
        $this->sql->bindValue(4, $vo->getIdVeiculo());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            //chamando pelo parent a função gravar erro da VO
            parent::GravarErro(
                $ex->getMessage(), //getmessage é o erro apresentado
                $vo->getidLogado(),
                $vo->getFuncao(),
                $vo->getHora(),
                $vo->getData(),
                $vo->getiP()
            );
            return -1;
        }
    }

    public function ConsultarVeiculo($idCliente){
        $comando = 'select 
                           tb_veiculo.id_modelo,
                           tb_veiculo.id_veiculo,
                           nome_modelo,
                           nome_marca,
                           cor_veiculo,
                           placa_veiculo
                      from 
                           tb_veiculo
                inner join
                           tb_modelo 
                        on tb_modelo.id_modelo = tb_veiculo.id_modelo
                inner join 
                           tb_marca
                        on tb_modelo.id_marca = tb_marca.id_marca
                     where 
                           tb_veiculo.id_cliente = ?
                       and 
                           tb_veiculo.id_usuario = ?';  
        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1 , $idCliente);
        $this->sql->bindValue(2, UtilCTRL::CodigoUserLogado());
        
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();
        return $this->sql->fetchAll();
    }
}