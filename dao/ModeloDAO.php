<?php

require_once 'Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/controller/UtilCTRL.php';


class ModeloDAO extends Conexao
{

    public function CadastrarModelo(ModeloVO $vo)
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'insert into tb_modelo (nome_modelo,
                                              id_marca,
                                              id_usuario)
                                              values(?,?,?)';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $vo->getNomeModelo());
        $sql->bindValue(2, $vo->getidMarca());
        $sql->bindValue(3, $vo->getidLogado());

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

    public function ConsultarModelo()
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'select id_modelo,
                             nome_modelo,
                             tb_modelo.id_marca,
                             nome_marca from tb_modelo 
                             inner join tb_marca on tb_modelo.id_marca = tb_marca.id_marca 
                             where tb_modelo.id_usuario = ? order by nome_marca, nome_modelo';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilCTRL::CodigoUserLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }
}
