<?php 
try
{
    require_once("../modal/DespesasTO.php");
    require_once("../modal/DespesaDAO.php");

    $descricao   = $_REQUEST['form_descricao'];
    $vlrTotal    = $_REQUEST['form_vlrTotal'];
    $vlrMensal   = $_REQUEST['form_vlrMensal'];
    $qtdParcelas = $_REQUEST['form_qtdParcelas'];
    $vcto        = $_REQUEST['form_vencimento'];

    $arrayDeVAlores = ['descricao' => $descricao, 'vlrTotal' => $vlrTotal, 'vlrMensal' => $vlrMensal, 'qtdParcelas' => $qtdParcelas, 'vcto' => $vcto];

    $objDespesa = new DespesasTO();
    $objDespesa->setDescricao($arrayDeVAlores['descricao']);
    $objDespesa->setVlrTotal($arrayDeVAlores['vlrTotal']);
    $objDespesa->setVlrMensal($arrayDeVAlores['vlrMensal']);
    $objDespesa->setQtdParcelas($arrayDeVAlores['qtdParcelas']);
    $objDespesa->setVencimento($arrayDeVAlores['vcto']);

    $objDespesasCRUD_DAO = new DespesaDAO();
    $objDespesasCRUD_DAO->despesaCreate($objDespesa);


}
catch(Exception $e)
{
    echo "erro na controllerIndexAdd.php: ".$e;
}
       
?>