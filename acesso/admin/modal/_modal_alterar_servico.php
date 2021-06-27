<!-- /.modal -->
<div class="modal fade" id="modal-alterar-servico">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Serviços</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_servico" name="id_servico">

                <div class="form_grup">
                    <label>Nome/Tipo do Serviço</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-hammer"></i></span>
                        <input name="nome_servico" id="nome_servico" class="form-control">
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