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

        <!-- <script> src="libs/JQuery/jquery-3.3.1.slim.min.js"</script> -->
        <script src="libs/JQuery/jquery-3.4.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script><!-- mask -->
        <link href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css" rel="stylesheet">

        
        <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>

        <script> src="libs/BootstrapTable/bootstrap-table.min.js"</script><!-- bootstraptable -->

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
        <h5>Cadastre sua despesas</h5>
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
                <button id="btn_formulario" class="btn btn-success" onclick="cadastrtaDespesa()">Cadastrar</button>

            </div>
            <div class="col-lg-9" style="float:right">
            <div class="col-12">
                <button onclick="editarDespesa()" class="btn">EDIT</button>
                <button onclick="deleteDespesa()" class="btn">DEL</button>
            </div>
            <table id="tableDespesas" data-toggle="table">
                <thead>
                    <tr>
                        <th data-field="chkbx" data-checkbox="true"></th>
                        <th data-field="descricao">Descrição</th>
                        <th data-field="vlr_total">Valor Total</th>
                        <th data-field="vlr_mensal">Valor Mensal</th>
                        <th data-field="qtd_parcelas">QTD Parcelas</th>
                        <th data-field="vencimento">Vencimento</th>
                        <th data-formatter="returnAcao">Ação</th>
                    </tr>
                </thead>
            </table>
            </div>
        
        </div>

        <script>
            // inicio de setagens padrao
            $("#tableDespesas").bootstrapTable();
            $("#tableDespesas").bootstrapTable("refresh",{ url:'controller/controllerIndexReload.php' });

            // $("#form_vlrTotal").mask('0,00')
            // $("#form_vlrMensal").mask('999,99')
            $("#form_vencimento").mask('99/99/9999')
            // fim de setagens padrao

            // redenrizacao da coluna acao
            function returnAcao(a, b, c)
            {
                // console.log(a+" | "+b.id+" | "+c)
                return "<button class='btn btn-xs'>EXCLUIR</button>";
            }

            function cadastrtaDespesa()
            {
                let formulario = $("#formCadastroDespesa")[0];
                let formData = new FormData(formulario);
                let desc           = $("#form_descricao").val()
                let vlrTotal       = $("#form_vlrTotal").val()
                let vlrMensal      = $("#form_vlrMensal").val()
                let qtdParcelas    = $("#form_qtdParcelas").val()
                let vencimento     = $("#form_vencimento").val()
                $.ajax({
                    url: "controller/controllerIndexCreate.php",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'post',
                    dataType: 'JSON',
                    success: function(ret){
                        console.log(ret)
                    },
                    error: function(er)
                    {
                        console.log(er)
                    }
                })
            }

            function editarDespesa()
            {
                let selecionado = $("#tableDespesas").bootstrapTable("getSelections")[0]["id"];

                
                // $.ajax({
                //     url: "controller/controllerIndexUpdate.php",
                //     data
                // })
            }

            function deleteDespesa(){}
        </script>
        <!-- JQuery 3.3.1 e o recomendado pela versao Boostrap 4.1 -->
        <!-- <script> src="libs/JQuery/jquery-3.3.1.slim.min.js"</script> -->
        <script> src="libs/JQuery/jquery-3.4.1.min.js"</script>
        <script> src="libs/PopperJS/popper.min.js"</script> <!--Bootstrap Popper Js -->
        <script> src="libs/Bootstrap/bootstrap.min.js"</script> <!--Bootstrap Js -->  
    </body>
    </html>