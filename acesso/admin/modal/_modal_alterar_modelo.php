<!-- /.modal -->
<div class="modal fade" id="modal-alterar-modelo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Modelo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_modelo" name="id_modelo">

                <div class="form_grup">
                    <label>Nome modelo</label>
                    <div class="input-group-prepend">
                        <input name="nome_modelo" id="nome_modelo" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>Selecione a marca</label>
                    <select class="form-control" name="id_marca" id="id_marca">
                        <option value="">Selecione</option>
                        <?php for ($i = 0; $i < count($marcas); $i++) { ?>
                            <option value="<?= $marcas[$i]['id_marca'] ?>" <?= $marcas == $marcas[$i]['id_marca'] ? 'selected' : '' ?>><?= $marcas[$i]['nome_marca'] ?> </option>
                        <?php } ?>
                    </select>
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