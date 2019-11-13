<?php 
try
{
    require_once("../modal/DespesasTO.php");
    require_once("../modal/DespesaDAO.php");

    
    $descricao   = $_REQUEST['descricao'];
    $vlrTotal    = $_REQUEST['vlrTotal'];
    $vlrMensal   = $_REQUEST['vlrMensal'];
    $qtdParcelas = $_REQUEST['qtdParcelas'];
    $vcto        = $_REQUEST['vencimento'];

    $arrayDeVAlores = ['descricao' => $descricao, 'vlrTotal' => $vlrTotal, 'vlrMensal' => $vlrMensal, 'qtdParcelas' => $qtdParcelas, 'vcto' => $vcto];

    $objDespesa = new DespesasTO();
    $objDespesa->setDescricao($arrayDeVAlores['descricao']);
    $objDespesa->setVlrTotal($arrayDeVAlores['vlrTotal']);
    $objDespesa->setVlrMensal($arrayDeVAlores['vlrMensal']);
    $objDespesa->setQtdParcelas($arrayDeVAlores['qtdParcelas']);
    $objDespesa->setVencimento($arrayDeVAlores['vcto']);
    

    $objDespesasCRUD_DAO = new DespesaDAO();
    $objDespesasCRUD_DAO->despesaUpdate($objDespesa);

}
catch(Exception $e)
{
    echo "erro na controllerIndexAdd.php: ".$e;
}
       
?>