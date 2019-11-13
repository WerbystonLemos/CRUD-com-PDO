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
                <button type="button" class="close" data-dissmiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">
                <p class="sucess-message">Tem certeza de que quer excluir o registro?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success delete-confirm" onclick="deleteDespesa(id)" type="button">Sim</button>
                <button class="btn btn-default" type="button" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>

<!-- fim modal delete-->

 <!-- FIM MODAIS -->
  
        <!-- JQuery 3.3.1 e o recomendado pela versao Boostrap 4.1 -->
        <script> src="libs/JQuery/jquery-3.3.1.slim.min.js"</script>
        <script> src="libs/JQuery/jquery-3.4.1.min.js"</script>
        <script> src="libs/PopperJS/popper.min.js"</script> <!--Bootstrap Popper Js -->
        <script> src="libs/Bootstrap/bootstrap.min.js"</script> <!--Bootstrap Js --> 
        <script>
            // inicio de setagens padrao
            $("#tableDespesas").bootstrapTable();
            $("#tableDespesas").bootstrapTable("refresh",{ url:'controller/controllerIndexReload.php' });

            // $("#form_vlrTotal").mask('0,00')
            // $("#form_vlrMensal").mask('999,99')
            // $("#form_vencimento").mask('9999/99/99')
            // fim de setagens padrao

            function functionAcao(campo, obj, indice)
    {
      return `<button onclick="modalEditar(${obj.id})" class="btn">EDIT</button> <button onclick="modalDel(${obj.id})" class="btn">DEL</button>`;
    }
            
            function cadastraDespesa()
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
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(ret){
                        // console.log(ret)
                        console.log("registro feito com sucesso!")
                    },
                    error: function(xhr, desc, err)
                    {
                        console.log(xhr)
                        console.log("tem alguma coisa errada"+desc + "nErro:" + err);
                    }
                })
            }

            function modalEditar(id){
              

            $.get('http://localhost/crud_basico/controller/controllerIndexDespesabyId.php?id='+id, (result) => {
                const json = JSON.parse(result);
                if(json.despesa == null) {
                    alert('Despesa não encontrada');
                    return;
                }
                const despesa = json.despesa;
                console.log(despesa)
                $('input[name=edit-despesa-descricao]').val(despesa.descricao);
                $('input[name=edit-despesa-vlrTotal]').val(despesa.vlr_total);
                $('input[name=edit-despesa-vlrMensal]').val(despesa.vlr_mensal);
                $('input[name=edit-despesa-vcto]').val(despesa.vencimento);
                $('input[name=edit-despesa-qtd_parcelas]').val(despesa.qtd_parcelas);
                $('#modalEdit').show();
            });
        }
            
            function editarDespesa(id)
            {
                     $.ajax({
                    url: "controller/controllerIndexUpdate.php",
                    data: id,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(ret){
                        // console.log(ret)
                        console.log("registro atualizado com sucesso!")
                    },
                    error: function(xhr, desc, err)
                    {
                        console.log(xhr)
                        console.log("tem alguma coisa errada"+desc + "nErro:" + err);
                    }
                })
            
            }

            function modalDel(id){
           
                console.log(id);
                
                $.get('http://localhost/crud_basico/controller/controllerIndexDespesabyId.php?id='+id, (result) => {
                const json = JSON.parse(result);
                if(json.despesa == null) {
                    alert('Despesa não encontrada');
                    return;
                }
                const despesa = json.despesa;
                console.log(despesa)
                $('#ModalDel').show();

            })
            }

            function deleteDespesa(id){
                $.ajax({
                    url: "controller/controllerIndexDelete.php",
                    data: id,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(ret){
                       
                        console.log("registro atualizado com sucesso!")
                    },
                    error: function(xhr, desc, err)
                    {
                        console.log(xhr)
                        console.log("tem alguma coisa errada"+desc + "nErro:" + err);
                    }
                })

            }
        </script> 
    </body>
    </html>