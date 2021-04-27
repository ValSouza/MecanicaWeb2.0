<?php

require_once 'Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/controller/UtilCTRL.php';


class ModeloDAO extends Conexao
{

    /** @var PDO */
    private $conexao;
    /** @var PDOStatement */
    private $sql;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
        $this->sql = new PDOException();
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

    public function CadastrarModelo(ModeloVO $vo)
    {
        $comando = 'insert into tb_modelo (nome_modelo,
                                              id_marca,
                                              id_usuario)
                                              values(?,?,?)';
        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, $vo->getNomeModelo());
        $this->sql->bindValue(2, $vo->getidMarca());
        $this->sql->bindValue(3, $vo->getidLogado());

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

    public function ConsultarModelo()
    {

        $comando = 'select 
                               id_modelo,
                               nome_modelo,
                               tb_modelo.id_marca,
                               nome_marca 
                          from 
                               tb_modelo 
                    inner join 
                               tb_marca on tb_modelo.id_marca = tb_marca.id_marca 
                         where 
                               tb_modelo.id_usuario = ? order by nome_marca, nome_modelo';

        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, UtilCTRL::CodigoUserLogado());
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();
        return $this->sql->fetchAll();
    }

    public function ExcluirModelo($id, SistemaVO $voSistema)
    {
        $comando = ' delete from tb_modelo where id_modelo=?';
        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, $id);
        $this->sql->execute();
        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            //chamando pelo parent a função gravar erro da VO
            $this->ColetarErro($voSistema, $ex);
            return -2;
        }
    }
}
