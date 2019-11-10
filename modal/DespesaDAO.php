<?php 
require("conectionFactory.php");
class DespesaDAO
{
    public function despesaCreate($objTO)
    {   
        $conexao = new conectionFactory();
        $aux = $conexao->Conection();
        $res = $aux->prepare("INSERT INTO despesas(descricao, vlr_total, vlr_mensal, qtd_parcelas, vencimento) VALUES (:descr, :vlr_tot, :vlr_mnsl, :prcls, :vcto)");
        $descr      = $objTO->getDescricao();
        $vlr_tot    = $objTO->getVlrTotal();
        $vlr_mnsl   = $objTO->getVlrMensal();
        $prcls      = $objTO->getQtdParcelas();
        $vcto       = $objTO->getVencimento();

        $res->bindValue(":descr", $descr);
        $res->bindValue(":vlr_tot", $vlr_tot);
        $res->bindValue(":vlr_mnsl", $vlr_mnsl);
        $res->bindValue(":prcls", $prcls);
        $res->bindValue(":vcto", $vcto);
        $res->execute();
    }
    public function despesaReload()
    {
        $conexao = new conectionFactory();
        $aux = $conexao->Conection();
        $query = $aux->prepare("SELECT * FROM despesas");
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }
    public function despesaUpdate($objTO)
    {
        $conexao = new conectionFactory();
        $aux = $conexao->Conection();
        $query = $aux->prepare("UPDATE despesas SET descricao = :descricao, vlr_total = :vlr_total, vlr_mensal=:vlr_mensal, qtd_parcelas=:parcelas, vencimento=:vcto WHERE id = :id");

        $descricao   = $objTO()->getDescricao();
        $vlr_total   = $objTO()->getVlrTotal();
        $vlr_mensal  = $objTO()->getVlrMensal();
        $parcelas    = $objTO()->getQtdParcelas();
        $vencimentos = $objTO()->getVencimento();

        $query->bindValue("descricao", $descricao);
        $query->bindValue("vlr_total", $vlr_total);
        $query->bindValue(":vlr_mensal", $vlr_mensal);
        $query->bindValue(":parcelas", $parcelas);
        $query->bindValue(":vcto", $vencimentos);
        $query->execute();
    }
    public function despesaDelete($objTO)
    {
        $conexao = new conectionFactory();
        $aux = $conexao->Conection();
        $query = $aux->prepare("DELETE FROM despesas WHERE id = :id");
        
        $id = $objTO->getId();
        
        $query->execute();

    }
}
?>