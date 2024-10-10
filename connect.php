<?php

spl_autoload_register(function ($classe) {
    $filename = "{$classe}.class.php";
    if (file_exists($filename)) {
        include_once $filename;
    } else {
        throw new Exception("Classe {$classe} não encontrada.");
    }
});

//cria a instrução de SELECT
$sql = new TSqlSelect;

//define o nome da entidade
$sql->setEntity('famosos');

//acrescenta colunas a consulta
$sql->addColumn('codigo');
$sql->addColumn('nome');

//crio o criteriode seleção
$criteria= new Tcriteria;

//obtem a pessoa código '1'
$criteria->add(new TFilter('codigo ', '=',' 1'));

//atribui o criterio de seleção
$sql->setCriteria($criteria);

try
{
    //Abre conexão com o banco de dados my_livro(mysql)
    $conn = TConnection::open('my_livro');

    //Executa a instrução sql
    $result = $conn->query($sql->getInstruction());

    if($result)
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);

        //Exibe os resultados
        echo $row['codigo'].'-'.$row['nome']."<br>\n";

        //fecha a conexão
        $conn = NULL;
    }
}

catch(PDOException $e)
{
    //exbe mesnsagem de erro
    print "ERRO!: ".$e->getMessage()."<br>\n";
    die();
}
/*
try
{
    //abre conexão com a base pg_livro
    $conn = TConnection::open('pg_livro');

    //Executa a instrução SQL
    $result = $conn->query($sql->getInstruction());
    if($result)	
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);

        //Exibe os resultados
        echo $row['nome'].'-'.$row['nome']."<br>\n";
    }
    //Fecho conexão
    $conn = null;
}
*/
catch(PDOException $e)
{
    //Exibe a mensagem de erro
    print "ERRO!: ".$e->getMessage()."<br>\n";
    die();
}
?>