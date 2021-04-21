function RetonaMsg(n) {
    var msg = '';

    switch (n) {
        case -1:
            msg="Ocorreu um erro na operação. Tente mais tarde";

            break;

        case 0:
            msg="Preencher todos o(s) campo(s) obrigatórios";

            break;
        case 1:
            msg="Ação realizada com sucesso";

            break;


    }
    return msg;

}