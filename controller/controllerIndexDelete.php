<?php 
try
{
    require_once("../modal/DespesasTO.php");
    require_once("../modal/DespesaDAO.php");

    // $descricao   = $_REQUEST['form_descricao'];
    // $vlrTotal    = $_REQUEST['form_vlrTotal'];
    // $vlrMensal   = $_REQUEST['form_vlrMensal'];
    // $qtdParcelas = $_REQUEST['form_qtdParcelas'];
    // $vcto        = $_REQUEST['form_vencimento'];
    
    $id = $_POST['id'];

    $arrayDeVAlores = ['id' => $id];
   
    $objDespesa = new DespesasTO();
    $objDespesa->setId($id);
  
    $objDespesasCRUD_DAO = new DespesaDAO();
    $objDespesasCRUD_DAO->despesaDelete($objDespesa);


}
catch(Exception $e)
{
    echo "erro na controllerIndexAdd.php: ".$e;
}
       
?>