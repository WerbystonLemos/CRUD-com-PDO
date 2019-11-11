<?php 

class conectionFactory
{
    
    public function Conection()
    {
        try
        {
            $pdo = new PDO("mysql:dbname=siscontrole; host:localhost", "root", "");
            //echo "Conexão estabelecida com sucesso!";
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch(PDOException $e)
        {
            echo "Erro com o banco de dados. <br />".$e;
        }
        catch(Exception $e)
        {
            echo "Erro genérico: ".$e;
        }
    }
}


?>