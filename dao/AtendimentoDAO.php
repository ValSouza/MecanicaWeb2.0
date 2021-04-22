<?php

require_once 'Conexao.php';

class AtendimentoDAO extends Conexao{
 
    public function CadastrarAtendimento(AtendimentoVO $vo){
        $conexao = parent::retornaConexao();

        $comando_sql= 'insert into tb_venda (data_venda,
                                             obs_valor,
                                             id_usuario,
                                             id_veiculo,
                                             id_cliente) 
                                             values(?,?,?,?,?)';
        $sql=new PDOStatement();
        $sql=$conexao->prepare($comando_sql); 
        $sql->bindValue(1,$vo->getData()); //erro
        $sql->bindValue(2,$vo->getObs());//erro
        $sql->bindValue(3,$vo->getIdUsuario());//erro
        $sql->bindValue(4,$vo->getIdVeiculo());//erro
        $sql->bindValue(5,$vo->getIdCliente();

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