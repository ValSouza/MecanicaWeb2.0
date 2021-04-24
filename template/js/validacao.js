function ValidarTela(n_tela) {

    var retorno = true;

    switch (n_tela) {
        case 1: //tela veiculo
            if ($("#nome").val().trim() == '') {
                retorno = false;
                toastr.warning(RetonaMsg(0));
            }
            break;
        case 2: //tela serviços
            if ($("#nome").val().trim() == '') {
                retorno = false;
                toastr.warning(RetonaMsg(0));
            }
            break;
        case 3: //tela marca
            if ($("#nome").val().trim() == '') {
                retorno = false;
                toastr.warning(RetonaMsg(0));
            }
            break;
        case 4: //tela  modelos
            if ($("#nome").val() == '' ||
                $("#marca").val() == '') {
                retorno = false;
                toastr.warning(RetonaMsg(0));
            }
            break;
        case 5: //Funcionario
            if ($("#nomeF").val().trim() == '' ||
                $("#tel").val().trim() == '' ||
                $("#end").val().trim() == '') {
                retorno = false;
                toastr.warning(RetonaMsg(0));
            }
            break;
        case 6: //cliente
            if ($("#nome").val().trim() == '' ||
                $("#tel").val().trim() == '' ||
                $("#end").val().trim() == '') {
                retorno = false;
                toastr.warning(RetonaMsg(0));
            }
            break;

    }

    return retorno;

}