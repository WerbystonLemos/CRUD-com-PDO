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
                <p>Nome</p>
                    <input type="text" class="form-control" name="edit-despesa-descricao">
                    <p>Valor Total</p>
                    <input type="text" class="form-control" name="edit-despesa-vlrTotal">
                    <p>Valor Mensal</p>
                    <input type="text" class="form-control" name="edit-despesa-vlrMensal">
                    <p>Quantidade de Parcelas</p>
                    <input type="text" class="form-control" name="edit-despesa-qtd_parcelas">
                    <p>Venvimento</p>
                    <input type="text" class="form-control" name="edit-despesa-vcto">
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="editarDespesa()" class="btn btn-primary">Ok</button>
                </div>
            </div>
            </div>
        </div>
        <!-- fim modal editar-->
        
        <!-- Modal Delete -->
            <div class="modal" id="ModalDel" role="dialog">
                <div class="modal-dialog" role="document"></div>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5>Excluir</h5>
                        <span class="id" style="display: none;"></span>
                            <button type="button" class="close" data-dissmiss="modal" aria-hidden="true">&times;</button>
                        
                        </div>
                        <div class="modal-body">
                            <p class="sucess-message">Tem certeza de que quer excluir o registro?</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success delete-confirm" onclick="deleteDespesa()" type="button">Sim</button>
                            <button class="btn btn-default" type="button" data-dismiss="modal">Não</button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- fim modal delete-->
        <!-- FIM MODAIS -->


    <script src="libs/JQuery/jquery-3.4.1.min.js"></script>
    <script src="libs/Bootstrap/bootstrap.min.js"></script> 
    <script src="libs/PopperJS/popper.min.js"></script> 
    
    <!-- bootstrapTable -->
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    
    <!-- api mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

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
                    console.log(ret)
                    carregaDadosTabela()
                    alert("registro feito com sucesso!")
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
            // $.get('http://localhost/crud_basico/controller/controllerIndexDespesabyId.php?id='+id, (result) => {
            // const json = JSON.parse(result);
            // if(json.despesa == null) {
            //     alert('Despesa não encontrada');
            //     return;
            // }
            // const despesa = json.despesa;
            // console.log(despesa)
            // $('input[name=edit-despesa-descricao]').val(despesa.descricao);
            // $('.id-despesa').html(id);
            // $('input[name=edit-despesa-vlrTotal]').val(despesa.vlr_total);
            // $('input[name=edit-despesa-vlrMensal]').val(despesa.vlr_mensal);
            // $('input[name=edit-despesa-qtd_parcelas]').val(despesa.qtd_parcelas);
            // $('input[name=edit-despesa-vcto]').val(despesa.vencimento);
            
            // $('#modalEdit').show();
        // });
        }
        
        function editarDespesa()
        {
            let id = $('.id-despesa').html();
            let descricao           = $("input[name=edit-despesa-descricao]").val()
            let vlrTotal       = $("input[name=edit-despesa-vlrTotal]").val()
            let vlrMensal      = $("input[name=edit-despesa-vlrMensal]").val()
            let qtdParcelas     = $("input[name=edit-despesa-qtd_parcelas]").val()
            let vcto    = $("input[name=edit-despesa-vcto]").val()
            
            $.post('controller/controllerIndexUpdate.php', {
                'edit-despesa-descricao': descricao,
                'edit-despesa-vlrTotal': vlrTotal,
                'edit-despesa-vlrMensal': vlrMensal,
                'edit-despesa-qtd_parcelas': qtdParcelas,
                'edit-despesa-vcto': vcto,
                'id': id
            }, function(r){
                console.log(r);
            });
        
        }

        function modalDel(id){
        
            console.log(id);
            
            $.get('http://localhost/crud_basico/controller/controllerIndexDespesabyId.php?id='+id, (result) => {
            const json = JSON.parse(result);
            if(json.despesa == null) {
                alert('Despesa não encontrada');
                return;
            }
            $('.id').html(id);
            const despesa = json.despesa;
            console.log(despesa)
            $('#ModalDel').show();

        })
        
        }

        function deleteDespesa(){
            let id = $('.id').html();
            $.post('controller/controllerIndexDelete.php', {
                'id': id
            }, function(r){
                console.log(r);
            });

        }
    </script> 
    </body>
    </html>