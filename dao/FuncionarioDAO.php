<?php

require_once 'Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/controller/UtilCTRL.php';

class FuncionarioDAO extends Conexao{

    public function CadastrarFuncionario(FuncionarioVO $vo){
        $conexao = parent::retornaConexao();
        $comando_sql= 'insert into
                              tb_funcionario 
                                 (nome_funcionario,
                                 telefone_funcionario,
                                 endereco_funcionario,
                                 situacao_funcionario,
                                 id_usuario)
                            values(?,?,?,?,?)';
        $sql=new PDOStatement();
        $sql=$conexao->prepare($comando_sql);
        $sql->bindValue(1,$vo->getNomeStaff());
        $sql->bindValue(2,$vo->getPhoneStaff());
        $sql->bindValue(3,$vo->getAddressStaff());
        $sql->bindValue(4,$vo->getSituation());
        $sql->bindValue(5,$vo->getidLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            //chamando pelo parent a função gravar erro da VO
            parent::GravarErro(
                $ex->getMessage(),//getmessage é o erro apresentado
                $vo->getidLogado(),
                $vo->getFuncao(),
                $vo->getHora(),
                $vo->getData(),
                $vo->getiP()                 
           );
           return -1;
       }
    }

    public function ConsultarFuncionario(){
        $conexao=parent::retornaConexao();
        $comando_sql='select 
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
        
        $sql=new PDOStatement();
        $sql= $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilCTRL::CodigoUserLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);       
        $sql ->execute();
        return $sql->fetchAll();
    }
}