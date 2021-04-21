<?php

require_once 'Conexao.php';

class AtendimentoDAO extends Conexao{
 
    public function CadastrarAtendimento(AtendimentoVO $vo){
        $conexao = parent::retornaConexao();

        $comando_sql= 'insert into tb_venda (data_venda,
                                             obs_venda,
                                             id_cliente,
                                             id_veiculo,
                                             id_usuario) 
                                             values(?,?,?,?,?)';
        $sql=new PDOStatement();
        $sql=$conexao->prepare($comando_sql); 
        $sql->bindValue(1,$vo->g()); //erro
        $sql->bindValue(2,$vo->getDescricao());//erro
        $sql->bindValue(3,$vo->getIdModelo());//erro
        $sql->bindValue(4,$vo->getidTipo());//erro
        $sql->bindValue(5,$vo->getidLogado());//erro

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

}