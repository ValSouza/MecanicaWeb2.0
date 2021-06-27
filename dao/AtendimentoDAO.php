<?php

require_once 'Conexao.php';

class AtendimentoDAO extends Conexao
{

    public function CadastrarAtendimento(AtendimentoVO $vo)
    {
        $conexao = parent::retornaConexao();

        $comando_sql = 'insert into tb_venda (data_venda,
                                             obs_valor,
                                             id_usuario,
                                             id_veiculo,
                                             id_cliente) 
                                             values(?,?,?,?,?)';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $vo->getData()); //erro
        $sql->bindValue(2, $vo->getObs()); //erro
        $sql->bindValue(3, $vo->getidLogado()); //erro
        $sql->bindValue(4, $vo->getIdVeiculo()); //erro
        $sql->bindValue(5, $vo->getIdCliente());

        $conexao->beginTransaction();

        try {
            $sql->execute();
            $id_venda = $conexao->lastInsertId();
            $comando = 'insert into tb_item_venda (valor_item, id_venda, id_funcionario, id_servico) values (?,?,?,?)';
            $sql = $conexao->prepare($comando);
            $sql->bindValue(1, $vo->getValor());
            $sql->bindValue(2, $vo->getIdVenda());
            $sql->bindValue(3, $vo->getidFuncionario());
            $sql->bindValue(4, $vo->getidServico());

            $sql->execute();

            $conexao->commit();
            return $id_venda;
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

    public function AlterarAtendimento(AtendimentoVO $vo)
    {
        $conexao = parent::retornaConexao();

        $comando_sql = 'update
                             tb_venda 
                         set 
                             data_venda=?,
                            obs_valor=?,
                            id_usuario=?,
                            id_veiculo=?,
                            id_cliente=?
                           where
                           id_venda=?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $vo->getData()); //erro
        $sql->bindValue(2, $vo->getObs()); //erro
        $sql->bindValue(3, $vo->getidLogado()); //erro
        $sql->bindValue(4, $vo->getIdVeiculo()); //erro
        $sql->bindValue(5, $vo->getIdCliente());
        $sql->bindValue(6, $vo->getIdVenda());

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

    public function CarregarDadosVenda($idVenda)
    {
        $conexao = parent::retornaConexao();
        $comando = 'select 
                    i.id_item,
                    i.valor_item, 
                    f.nome_funcionario,
                    s.nome_servico
                from tb_item_venda as i 
                inner join 
                        tb_funcionario as f on f.id_funcionario = i.id_funcionario
                inner join
                        tb_servico as s on s.id_servico = i.id_servico
                    where
                         i.id_venda = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idVenda);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function VerificarItemAdd(AtendimentoVO $vo)
    {
        $conexao = parent::retornaConexao();
        $comando = 'select count(*) as contar 
                           from tb_item_venda
                            where id_venda = ? 
                            and 
                            id_servico = ? 
                            and 
                            id_funcionario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $vo->getIdVenda());
        $sql->bindValue(2, $vo->getidServico());
        $sql->bindValue(3, $vo->getidFuncionario());

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        $res = $sql->fetchAll();
        return $res[0]['contar'];
    }

    public function InserirItem(AtendimentoVO $vo)
    {

        $conexao = parent::retornaConexao();
        $comando = 'update 
                        tb_venda 
                        set 
                        data_venda = ?,
                        obs_venda = ?
                    where
                        id_venda = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $vo->getData());
        $sql->bindValue(2, $vo->getObs());
        $sql->bindValue(3, $vo->getidAtendimento());

        $conexao->beginTransaction();

        try {
            $sql->execute();

            $comando = 'insert 
                           into 
                           tb_item_venda 
                           (id_venda, 
                           id_funcionario,
                           id_servico, 
                           valor_item)
                           values(?,?,?,?)';
            $sql = $conexao->prepare($comando);
            $sql->bindValue(1, $vo->getidAtendimento());
            $sql->bindValue(2, $vo->getidFuncionario());
            $sql->bindValue(3, $vo->getidServico());
            $sql->bindValue(4, $vo->getValor());

            $sql->execute();
            $conexao->commit();
            return 1;
        } catch (Exception $ex) {
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
}
