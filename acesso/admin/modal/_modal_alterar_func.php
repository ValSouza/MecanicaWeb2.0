<!-- /.modal -->
<div class="modal fade" id="modal-alterar-func">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Funcionário</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_func" name="id_func">

                <div class="form_grup">
                    <label>Nome</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input name="nome_func" id="nome_func" class="form-control">
                    </div>
                </div>

                <div class="form_grup">
                    <label>Telefone</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input name="tel_func" id="tel_func" class="form-control">
                    </div>
                </div>

                <div class="form_grup">
                    <label>Endereço</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                        <input name="end_func" id="end_func" class="form-control">
                    </div>
                </div>

              <div class="offset-sm-2 col-sm-10">
                    <div class="form-check">
                        <div class="custom-control custom-checkbox">
                            <label>
                                <input type="checkbox" id="situacao_func" name="situacao_func" />Ativo
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-success btn-lg" name="btnAlterar">Alterar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->