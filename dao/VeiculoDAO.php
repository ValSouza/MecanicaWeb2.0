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
    private function ColetarErro(SistemaVO $vo, $ex)
    {
        parent::GravarErro(
            $ex->getMessage(), //getmessage é o erro apresentado
            $vo->getidLogado(),
            $vo->getFuncao(),
            $vo->getHora(),
            $vo->getData(),
            $vo->getiP()
        );
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
                               $vo->getidLogado(),
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
                                 id_modelo=?,
                                 id_usuario=?
                            where     
                                  id_veiculo=?';
        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, $vo->getPlaca());
        $this->sql->bindValue(2, $vo->getCor());
        $this->sql->bindValue(3, $vo->getidModelo());
        $this->sql->bindValue(4, $vo->getidLogado());
        $this->sql->bindValue(5, $vo->getIdVeiculo());
     

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

    public function ConsultarVeiculo(VeiculoVO $vo)
    {
        $comando = 'select                            
                           tb_veiculo.id_veiculo,
                           tb_modelo.nome_modelo,
                           tb_modelo.id_modelo,
                           tb_marca.nome_marca,
                           tb_veiculo.cor_veiculo,
                           tb_veiculo.placa_veiculo,
                           tb_cliente.id_cliente,
                           tb_cliente.nome_cliente
                      from 
                           tb_veiculo
                inner join
                           tb_modelo 
                        on tb_modelo.id_modelo = tb_veiculo.id_modelo
                inner join
                        tb_cliente 
                        on tb_veiculo.id_cliente = tb_cliente.id_cliente
                inner join 
                           tb_marca
                        on tb_modelo.id_marca = tb_marca.id_marca
                     where 
                           tb_veiculo.id_cliente = ?
                       and 
                           tb_veiculo.id_usuario = ?';  
        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1 , $vo->getIdCliente());
        $this->sql->bindValue(2, UtilCTRL::CodigoUserLogado());
        
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();
        return $this->sql->fetchAll();
    }
    public function ExcluirVeiculo($id, SistemaVO $voSistema)
    {
        $comando = ' delete from tb_veiculo where id_veiculo=?';
        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, $id);
        $this->sql->execute();
        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            //chamando pelo parent a função gravar erro da VO
            $this->ColetarErro($voSistema,$ex);
            return -2;
        }
    }
}
