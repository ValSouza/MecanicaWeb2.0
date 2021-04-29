<?php

require_once 'Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/controller/UtilCTRL.php';


class ClienteDAO extends Conexao
{

    public function CadastrarCliente(ClienteVO $vo)
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'insert 
                             into 
                               tb_cliente 
                                (nome_cliente,
                                telefone_cliente,
                                endereco_cliente,
                                id_usuario)
                                values(?,?,?,?)';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $vo->getNomeCliente());
        $sql->bindValue(2, $vo->getPhoneCliente());
        $sql->bindValue(3, $vo->getAddressCliente());
        $sql->bindValue(4, $vo->getidLogado());

        try {
            $sql->execute();
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
        $conexao = parent::retornaConexao();
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

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilCTRL::CodigoUserLogado());
        if (trim($nome_pesquisa) != '') {
            $sql->bindValue(2, '%' . $nome_pesquisa . '%');
        }


        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }
}
