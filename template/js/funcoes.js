function CarregarModalExcluir(id,nome) {
    $("#id_item").val(id);
    $("#nome_item").html(nome);
}

function CarregarModalAlterarCliente(id,nome,telefone,endereco) {
    $("#id_cliente").val(id);
    $("#nome_cliente").val(nome);
    $("#tel_cliente").val(telefone);
    $("#end_cliente").val(endereco);    
}

function CarregarModalAlterarServico(id,nome) {
    $("#id_servico").val(id);
    $("#nome_servico").val(nome);    
}

function CarregarModalAlterarMarca(id,nome) {
    $("#id_marca").val(id);
    $("#nome_marca").val(nome);    
}
function CarregarModalAlterarModelo(id,nome,idmarca) {
    $("#id_modelo").val(id);
    $("#nome_modelo").val(nome); 
    $("#id_marca").val(idmarca);       
}
function CarregarModalAlterarFuncionario(id,nome,tel,end,sit) {
    $("#id_func").val(id);
    $("#nome_func").val(nome); 
    $("#tel_func").val(tel);
    $("#end_func").val(end);        
    $("#situacao_func").val(sit);        
}
function CarregarModalAlterarVeiculo(id,cor,placa,modelo,idcli) {
    $("#id_veic").val(id);
    $("#cor_veic").val(cor);    
    $("#placa_veic").val(placa);
    $("#modelo_veic").val(modelo);
    $("#id_clie").val(idcli);         
}