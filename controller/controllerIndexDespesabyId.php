<?php 
    try
    {
        require_once("../modal/DespesaDAO.php");
        
        $objDespesasCRUD_DAO = new DespesaDAO();
        $objDespesasCRUD_DAO->getDepesa($_REQUEST['id']);
    }
    catch(Exception $e)
    {
        echo "erro na controllerIndexAdd.php: ".$e;
    }
?>