<?php

require_once 'Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/controller/UtilCTRL.php';

class FuncionarioDAO extends Conexao
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

    public function CadastrarFuncionario(FuncionarioVO $vo)
    {

        $comando = 'insert into
                              tb_funcionario 
                                 (nome_funcionario,
                                 telefone_funcionario,
                                 endereco_funcionario,
                                 situacao_funcionario,
                                 id_usuario)
                            values(?,?,?,?,?)';
        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, $vo->getNomeStaff());
        $this->sql->bindValue(2, $vo->getPhoneStaff());
        $this->sql->bindValue(3, $vo->getAddressStaff());
        $this->sql->bindValue(4, $vo->getSituation());
        $this->sql->bindValue(5, $vo->getidLogado());

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

    public function ConsultarFuncionario()
    {

        $comando = 'select 
                            id_funcionario,
                            nome_funcionario,
                            telefone_funcionario,
                            endereco_funcionario,
                            situacao_funcionario
                        from 
                           tb_funcionario 
                        where 
                           id_usuario = ?
                        order by 
                           nome_funcionario';

        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, UtilCTRL::CodigoUserLogado());
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();
        return $this->sql->fetchAll();
    }

    public function ExcluirFuncionario($id, SistemaVO $voSistema)
    {
        $comando = ' delete from tb_funcionario where id_funcionario=?';
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
