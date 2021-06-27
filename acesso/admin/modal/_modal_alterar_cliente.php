<!-- /.modal -->
<div class="modal fade" id="modal-alterar-cliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_cliente" name="id_cliente">

                <div class="form_grup">
                    <label>Nome Cliente</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input name="nome_cliente" id="nome_cliente" class="form-control">
                    </div>
                </div>

                <div class="form_grup">
                    <label>Telefone</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input name="tel_cliente" id="tel_cliente" class="form-control">
                    </div>
                </div>

                <div class="form_grup">
                    <label>Endereço</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                        <input name="end_cliente" id="end_cliente" class="form-control">
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