    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Controle de despesas</title>

        <!-- CSS Bootstrap -->  
        <link rel="stylesheet" href="libs/Bootstrap/bootstrap.min.css"> 

        <!-- CSS BootstrapTable -->
        <link rel="stylesheet" href="libs/BootstrapTable/bootstrap-table.min.css">

        <!-- jquery -->
        <script src="libs/JQuery/jquery-3.4.1.min.js"></script>
        <!--Bootstrap Js --> 
        <script src="libs/Bootstrap/bootstrap.min.js"></script>
        <!--Bootstrap Popper Js -->
        <script> src="libs/PopperJS/popper.min.js"</script>

        <!-- mask -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

        <!-- bootbox -->
        <!-- <script scr="libs/Bootbox/bootbox.locales.min.js"></script>
        <script src="libs/Bootbox/bootbox.locales.min.js"></script> -->

        <style>
            h5
            {
                background: #eaeaea;
                text-align: center;
                text-transform: uppercase;
                padding: 10px 0;
                margin: 0;
            }
            #sidebar
            {
                background: #eaeaea;
                height: 93.5vh;
                padding: 10px;
                margin: 0;
            }
            #formCadastroDespesa
            {
                border-radius: 10px;
            }
            #tableDespesas
            {
                margin-top: 10px;
            }
        </style>
    </head>
    <!-- <body class="container-fluid"> -->
    <body>
        <h5>Cadastre suas despesas</h5>
        <div class="">
           
            <div id="sidebar" class="col-lg-3" style="float:left">
                    
                <form id="formCadastroDespesa">
                    <div class="form-group">
                        <label for="form_descricao">Descrição</label>
                        <input type="text" id="form_descricao" name="form_descricao" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="form_vlrTotal">Valor Total</label>
                        <input type="text" id="form_vlrTotal" name="form_vlrTotal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="form_vlrMensal">Valor Mensal</label>
                        <input type="text" id="form_vlrMensal" name="form_vlrMensal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="form_qtdParcelas">QTD Parcelas</label>
                        <input type="text" min="0" id="form_qtdParcelas" name="form_qtdParcelas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="form_vencimento">Vencimento</label>
                        <input type="text" id="form_vencimento" name="form_vencimento" class="form-control" >
                    </div>

                </form>
                <button id="btn_formulario" class="btn btn-success" onclick="cadastraDespesa()">Cadastrar</button>

            </div>
            <div class="col-lg-9" style="float:right">
            <table id="tableDespesas" data-toggle="table">
                <thead>
                    <tr>
                        <!-- <th data-field="chkbx" data-checkbox="true"></th> -->
                        <th data-field="descricao">Descrição</th>
                        <th data-field="vlr_total">Valor Total</th>
                        <th data-field="vlr_mensal">Valor Mensal</th>
                        <th data-field="qtd_parcelas">QTD Parcelas</th>
                        <th data-field="vencimento">Vencimento</th>
                        <th data-formatter="functionAcao">AÇÃO</th>
                    </tr>
                </thead>
            </table>
            </div>
        
        </div>


        <!-- modla editar -->
        <div id="modalEdit" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5>Editar</h5>
                <span class="id-despesa" style="display: none;"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="" id="formEdit">
                    <input type="hidden" id="formEdit_id" name="formEdit_id">
                    <p>Nome</p>
                    <input type="text" class="form-control" id="edit-despesa-descricao" name="edit-despesa-descricao">
                    <p>Valor Total</p>
                    <input type="text" class="form-control" id="edit-despesa-vlrTotal" name="edit-despesa-vlrTotal">
                    <p>Valor Mensal</p>
                    <input type="text" class="form-control" id="edit-despesa-vlrMensal" name="edit-despesa-vlrMensal">
                    <p>Quantidade de Parcelas</p>
                    <input type="text" class="form-control" id="edit-despesa-qtd_parcelas" name="edit-despesa-qtd_parcelas">
                    <p>Vencimento</p>
                    <input type="text" class="form-control" id="edit-despesa-vcto" name="edit-despesa-vcto">
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="btn_editaDespesa()" class="btn btn-primary">Ok</button>
                </div>
            </div>
            </div>
        </div>
        <!-- fim modal editar-->
        <!-- FIM MODAIS -->


    <script src="libs/JQuery/jquery-3.4.1.min.js"></script>
    <script src="libs/PopperJS/popper.min.js"></script> 
    <script src="libs/Bootstrap/bootstrap.min.js"></script> 
    
    <!-- bootstrapTable -->
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    
    <!-- api mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <!-- bootbox -->
    <script scr="libs/Bootbox/bootbox.locales.min.js"></script>
    <script src="libs/Bootbox/bootbox.min.js"></script>

    <script>
        // $("#tableDespesas").bootstrapTable();
        // inicio de setagens padrao
        function carregaDadosTabela()
        {
            $("#tableDespesas").bootstrapTable();
            $("#tableDespesas").bootstrapTable("refresh",{ url:'controller/controllerIndexReload.php' });
        }
        carregaDadosTabela();

        // $("#form_vlrTotal").mask('0,00')
        // $("#form_vlrMensal").mask('999,99')
        $("#form_vencimento").mask('9999/99/99')
        // fim de setagens padrao

        //a funcao a baixo carrega os botoes de acoes para dentro da celula da tablea
        function functionAcao(campo, obj, indice)
        {
            return `<button onclick="modalEditar(${obj.id})" class="btn">EDITAR</button> <button onclick="modalDel(${obj.id})" class="btn">EXCLUIR</button>`;
        }
        
        function cadastraDespesa()
        {
            let formulario = $("#formCadastroDespesa")[0];
            let formData = new FormData(formulario);
            $.ajax({
                url: "controller/controllerIndexCreate.php",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                // dataType: 'JSON', a gente especificava que a resp vinha em JSON mas o PHP devolviaa um array
                success: function(ret){
                    console.log(ret);
                    carregaDadosTabela();
                    alert("registro feito com sucesso!");
                    $("#formCadastroDespesa")[0].reset();
                },
                error: function(err)
                {
                    alert("Erro na comunicação com o BD!")
                    console.log(err)
                }
            })
        }
        
        function modalEditar(id)
        {
            $("#modalEdit").modal("show");
            //carrega dados para cara input do form do modal
            $.ajax({
                url: "controller/controllerIndexDespesabyId.php?id="+id,
                success: function(ret){
                    let retorno = JSON.parse(ret);
                    $("#formEdit_id").val(id);
                    $("#edit-despesa-descricao").val(retorno["despesa"]["descricao"]);
                    $("#edit-despesa-vlrTotal").val(retorno["despesa"]["vlr_total"]);
                    $("#edit-despesa-vlrMensal").val(retorno["despesa"]["vlr_mensal"]);
                    $("#edit-despesa-qtd_parcelas").val(retorno["despesa"]["qtd_parcelas"]);
                    $("#edit-despesa-vcto").val(retorno["despesa"]["vencimento"]);
                },
                error: function(err){
                    bootbox.alert("Erro na comunicação com o Banco de Dados. Contate os desenvolvedores.")
                }
            })
        }
        
        function btn_editaDespesa()
        {
            let formData = new FormData($("#formEdit")[0]);

            $.ajax({
                url: "controller/controllerIndexUpdate.php",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(ret){
                    console.log(ret);
                    carregaDadosTabela();
                    $("#formEdit")[0].reset();
                    $("#modalEdit").modal("hide");
                },
                error: function(err){
                    console.log(err);
                }
            })
        }

        function modalDel(id)
        {
            bootbox.confirm("Deseja mesmo apagar o registro dessa conta?", function(resposta){
                if(resposta == true)
                {
                    $.ajax({
                        url: "controller/controllerIndexDelete.php?id="+id,
                        success: function(ret){
                            console.log(ret);
                            carregaDadosTabela();
                        },
                        error: function(err){
                            console.log(err);
                            bootbox.alert("Erro na comunicação com o Banco de Dados. Contate os desenvolvedores.")
                        }
                    })
                }
            });        
        }
    </script> 
    </body>
    </html>