<?php 
try
{
    require_once("../modal/DespesasTO.php");
    require_once("../modal/DespesaDAO.php");
   
    $descricao = $_POST['edit-despesa-descricao'];
    $vlrTotal = $_POST['edit-despesa-vlrTotal'];
    $vlrMensal = $_POST['edit-despesa-vlrMensal'];
    $qtdParcelas = $_POST['edit-despesa-qtd_parcelas'];
    $vcto = $_POST['edit-despesa-vcto'];
    $id = $_POST['formEdit_id'];

    $arrayDeVAlores = ['id' => $id, 'descricao' => $descricao, 'vlrTotal' => $vlrTotal, 'vlrMensal' => $vlrMensal, 'qtdParcelas' => $qtdParcelas, 'vcto' => $vcto];

    $objDespesa = new DespesasTO();
    $objDespesa->setDescricao($arrayDeVAlores['descricao']);
    $objDespesa->setVlrTotal($arrayDeVAlores['vlrTotal']);
    $objDespesa->setVlrMensal($arrayDeVAlores['vlrMensal']);
    $objDespesa->setQtdParcelas($arrayDeVAlores['qtdParcelas']);
    $objDespesa->setVencimento($arrayDeVAlores['vcto']);
    $objDespesa->setId($arrayDeVAlores['id']);

    $objDespesasCRUD_DAO = new DespesaDAO();
    $objDespesasCRUD_DAO->despesaUpdate($objDespesa);

}
catch(Exception $e)
{
    echo "erro na controllerIndexAdd.php: ".$e;
}
       
?>