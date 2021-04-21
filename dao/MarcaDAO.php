<?php

require_once 'Conexao.php';

class MarcaDAO extends Conexao{

    public function CadastrarMarca(MarcaVO $vo){
        $conexao = parent::retornaConexao();
        $comando_sql= 'insert into tb_marca(nome_marca, id_usuario)values(?,?)';
        $sql=new PDOStatement();
        $sql=$conexao->prepare($comando_sql);
        $sql->bindValue(1,$vo->getnomeMarca());
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

    public function ConsultarMarca(){
        $conexao=parent::retornaConexao();
        $comando_sql='select id_marca,
                             nome_marca
                             from tb_marca
                             order by nome_marca';
        
        $sql=new PDOStatement();
        $sql= $conexao->prepare($comando_sql);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql ->execute();
        return $sql->fetchAll();
    }
}