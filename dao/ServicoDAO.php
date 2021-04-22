<?php

require_once 'Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/controller/UtilCTRL.php';

class ServicoDAO extends Conexao{

    public function CadastrarServico(ServicoVO $vo){
        $conexao = parent::retornaConexao();
        $comando_sql= 'insert into tb_servico (nome_servico, id_usuario) values (?,?)';
        $sql=new PDOStatement();
        $sql=$conexao->prepare($comando_sql);
        $sql->bindValue(1,$vo->getnomeServico());
        $sql->bindValue(2,$vo->getidLogado());

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

    public function ConsultarServico(){
        $conexao=parent::retornaConexao();
        $comando_sql='select id_servico,
                              nome_servico
                              from tb_servico 
                              where id_usuario = ? 
                              order by nome_servico';
        
        $sql=new PDOStatement();
        $sql= $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilCTRL::CodigoUserLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);       
        $sql ->execute();
        return $sql->fetchAll();
    }
}