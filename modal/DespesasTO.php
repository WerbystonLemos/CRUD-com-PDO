<?php 

class DespesasTO
{
    private $id;
    private $descricao;
    private $vlrTotal;
    private $vlrMensal;
    private $qtdParcelas;
    private $vencimento;

    public function getId(){
        return $this->id;
    }
    public function setId($vlr){
        $this->id = $vlr;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($vlr){
        $this->descricao = $vlr;
    }

    public function getVlrTotal(){
        return $this->vlrTotal;
    }
    public function setVlrTotal($vlr){
        $this->vlrTotal = $vlr;
    }

    public function getVlrMensal(){
        return $this->vlrMensal;
    }
    public function setVlrMensal($vlr){
        $this->vlrMensal = $vlr;
    }

    public function getQtdParcelas(){
        return $this->qtdParcelas;
    }
    public function setQtdParcelas($vlr){
        $this->qtdParcelas = $vlr;
    }

    public function getVencimento(){
        return $this->vencimento;
    }
    public function setVencimento($vlr){
        $this->vencimento = $vlr;
    }
}

?>