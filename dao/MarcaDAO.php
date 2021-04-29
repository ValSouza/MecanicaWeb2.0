<?php

require_once 'Conexao.php';

class MarcaDAO extends Conexao
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

    public function CadastrarMarca(MarcaVO $vo)
    {

        $comando = 'insert into
                          tb_marca(
                              nome_marca,
                              id_usuario)
                          values(?,?)';

        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, $vo->getnomeMarca());
        $this->sql->bindValue(2, $vo->getidLogado());

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

    public function ConsultarMarca()
    {
        $comando = 'select id_marca,
                             nome_marca
                             from tb_marca
                             order by nome_marca';

        $this->sql =  $this->conexao->prepare($comando);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();
        return  $this->sql->fetchAll();
    }

    public function ExcluirMarca($id, SistemaVO $voSistema)
    {
        $comando = ' delete from tb_marca where id_marca=?';
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
