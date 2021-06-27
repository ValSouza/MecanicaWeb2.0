<?php

require_once 'Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/controller/UtilCTRL.php';


class ClienteDAO extends Conexao
{
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

    public function CadastrarCliente(ClienteVO $vo)
    {
        $comando_sql = 'insert 
                             into 
                               tb_cliente 
                                (nome_cliente,
                                telefone_cliente,
                                endereco_cliente,
                                id_usuario)
                                values(?,?,?,?)';

        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->bindValue(1, $vo->getNomeCliente());
        $this->sql->bindValue(2, $vo->getPhoneCliente());
        $this->sql->bindValue(3, $vo->getAddressCliente());
        $this->sql->bindValue(4, $vo->getidLogado());

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

    public function ConsultarCliente($nome_pesquisa)
    {
        $comando_sql = 'select 
                            id_cliente,
                            nome_cliente, 
                            telefone_cliente, 
                            endereco_cliente 
                       from 
                            tb_cliente 
                       where 
                            id_usuario = ?';
        // order bynome_cliente';

        if (trim($nome_pesquisa) != '') {
            $comando_sql .= ' and nome_cliente like ?';
        }

        $ordenacao = ' order by nome_cliente ';
        $comando_sql .= $ordenacao;

        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->bindValue(1, UtilCTRL::CodigoUserLogado());
        if (trim($nome_pesquisa) != '') {
            $this->sql->bindValue(2, '%' . $nome_pesquisa . '%');
        }


        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();
        return $this->sql->fetchAll();
    }

    public function AlterarCliente(ClienteVO $vo){

        $comando_sql = 'update 
                               tb_cliente
                           set  
                               nome_cliente = ?,
                               telefone_cliente = ?, 
                               endereco_cliente = ?
                         where 
                               id_cliente = ?';

        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->bindValue(1, $vo->getNomeCliente());
        $this->sql->bindValue(2, $vo->getPhoneCliente());
        $this->sql->bindValue(3, $vo->getAddressCliente());
        $this->sql->bindValue(4, $vo->getIdCliente());

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
            
            return - 1;
        }
        

        return $this->sql->fetchAll();

    }

    public function ExcluirCliente($id, SistemaVO $vo)
    {
        $comando = ' delete from tb_cliente where id_cliente=?';
        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, $id);
        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            //chamando pelo parent a função gravar erro da VO
            $this->ColetarErro($vo, $ex);
            return -2;
        }
    }


}
