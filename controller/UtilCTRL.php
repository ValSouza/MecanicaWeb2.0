<?php

class UtilCTRL{

    public static function CodigoUserLogado(){
        return 1;
    }
    public static function CaminhoRoot(){
        return $_SERVER['DOCUMENT_ROOT'].'/MecanicaWeb2.0/';
    }

    private static function SetarFusorario(){
        //alterar o fuso horario
        date_default_timezone_set('America/Sao_paulo');
    }

    public static function HoraAtual(){
        self::SetarFusorario();
        return date('H:i');
    }
    public static function DataAtual(){
        self::SetarFusorario();
        return date('d/m/Y');
    }
    
}