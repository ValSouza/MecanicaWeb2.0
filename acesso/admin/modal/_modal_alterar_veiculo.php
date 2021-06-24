<!-- /.modal -->
<div class="modal fade" id="modal-alterar-veiculo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Veículo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_veic" name="id_veic">

                <div class="form_grup">
                    <label>Nome</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input value="<?= $nome ?>" id="nome_veic" name="nome_veic" readonly class="form-control">
                    </div>
                </div>
                
     

                <div class="form_grup">
                    <label>Placa</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-car"></i></span>
                        <input name="placa_veic" id="placa_veic" class="form-control">
                    </div>
                </div>

                <div class="form_grup">
                    <label>Cor</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-car"></i></span>
                        <input name="cor_veic" id="cor_veic" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>Modelo</label>

                    <select class="form-control" id="modelo_veic" name="modelo_veic">
                        <option value="Selecione"></option>
                        <?php for ($i = 0; $i < count($modelos); $i++) { ?>
                            <option value="<?= $modelos[$i]['id_modelo'] ?>"><?= $modelos[$i]['nome_modelo'] ?>
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