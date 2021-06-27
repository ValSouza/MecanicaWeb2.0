<?php

require_once 'Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/controller/UtilCTRL.php';

class ServicoDAO extends Conexao
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

    public function CadastrarServico(ServicoVO $vo)
    {

        $comando = 'insert 
                         into tb_servico (
                             nome_servico,
                              id_usuario) 
                         values (?,?)';
        $this->sql = new PDOStatement();
        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, $vo->getnomeServico());
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
    public function AlterarServico(ServicoVO $vo)
    {

        $comando = 'update
                       tb_servico 
                    set  
                       nome_servico=?      
                    where
                       id_servico=?';
        $this->sql = new PDOStatement();
        $this->sql = $this->conexao->prepare($comando);
        $this->sql->bindValue(1, $vo->getnomeServico());
        $this->sql->bindValue(2, $vo->getidServico());

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

    public function ConsultarServico()
    {
        $comando = 'select id_servico,
                              nome_servico
                              from tb_servico 
                              where id_usuario = ? 
                              order by nome_servico';

        $this->sql = new PDOStatement();
        $this->sql =  $this->conexao->prepare($comando);
        $this->sql->bindValue(1, UtilCTRL::CodigoUserLogado());
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();
        return  $this->sql->fetchAll();
    }
    public function ExcluirServico($id, SistemaVO $voSistema)
    {
        $comando = ' delete from tb_servico where id_servico=?';
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
