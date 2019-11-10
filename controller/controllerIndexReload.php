<?php 
    try
    {
        require_once("../modal/DespesaDAO.php");

        $objDespesasCRUD_DAO = new DespesaDAO();
        $objDespesasCRUD_DAO->despesaReload();
    }
    catch(Exception $e)
    {
        echo "erro na controllerIndexAdd.php: ".$e;
    }
?>