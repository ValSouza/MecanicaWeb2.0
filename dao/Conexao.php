<?php

// Configurações do site
define('HOST', 'localhost'); //IP
define('USER', 'root'); //usuario
define('PASS', null); //Senha
define('DB', 'db_mecanica'); //Banco
/**
 * Conexao.class TIPO [Conexão]
 * Descricao: Estabelece conexões com o banco usando SingleTon
 * @copyright (c) year, Wladimir M. Barros
 */

class Conexao
{

    /** @var PDO */
    private static $Connect;

    private static function Conectar()
    {
        try {

            //Verifica se a conexão não existe
            if (self::$Connect == null) :

                $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;
                self::$Connect = new PDO($dsn, USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            endif;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        //Seta os atributos para que seja retornado as excessões do banco
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$Connect;
    }

    public function retornaConexao()
    {
        return self::Conectar();
    }

    public static function GravarErro($msg, $IdLogado, $funcao, $hora, $data,$ip)
    {
        //pega o ip do clietne
        $ip= $_SERVER['REMOTE_ADDR'].' - Nome da máquina: '.getenv('COMPUTERNAME'); 
        
        //cria uma variavel que quebra linha
        $quebra_linha = chr(13) . chr(10);
        //verifica se o arquivo existe
        $arquivo = $_SERVER['DOCUMENT_ROOT'] . '/MecanicaWeb2.0/dao/erro/erro.txt';
        if (!file_exists($arquivo)) {
            //cria arquivo
            $arquivo = fopen($arquivo, 'w');
        } else {
            //abrir arquivo existente
            $arquivo = fopen($arquivo, 'a+');
        }

        $texto_msg = '************************************' . $quebra_linha;
        $texto_msg .= 'Erro: ' . $msg . $quebra_linha;
        $texto_msg .= 'Data: ' . $data . ' às ' . $hora . $quebra_linha;
        $texto_msg .= 'Id do usuario logado: ' . $IdLogado . $quebra_linha;
        $texto_msg .= 'Função chamada: ' . $funcao . $quebra_linha;
        $texto_msg.= 'Ip do Cliente: '.$ip. $quebra_linha;

        //escreve no aquivo
        fwrite($arquivo, $texto_msg);
        //apos a escreta, fecha o arquivo
        fclose($arquivo);
    }
}
