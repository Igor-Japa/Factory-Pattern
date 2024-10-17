<?php
spl_autoload_register(function ($classe) {
    $filename = "{$classe}.class.php";
    if (file_exists($filename)) {
        include_once $filename;
    } else {
        throw new Exception("Classe {$classe} não encontrada.");
    }
});

try{
    //abre uma transação 
    TTransation::open('my_livro');
    //cria uma instrução de insert
    $sql=new TSqlInsert;
    //define o nome da entidade
    $sql->setEntity('famosos');
    //atribui o vlaor de cada coluna
    $sql->setRowData('codigo',8);
    $sql->setRowData('name','Galileu');

    //obtem a conexão ativa
    $conn->TTransaction::get();
    //executa a instrução sql
    $result = $conn->Query($sql->getInstruction());
    //cria uma instrução UPDATE
    $sql = new TSqlUpdate;
    //define o valor da entidade
    $sql->setEntity('famosos');
    //atribui o valor de cada coluna
    $sql->setRowData('nome','Galileu Galilei');
    //cria um critério de seeção de dados
    $criteria = new TCriteria;
    //obtem a pessoa de codigo "8"
    $criteria->add(new TFilter('codigo','=','8'));
    //atribui o criteruo de seleção
    $sql=setCriteria($criteria);
    //obtem a conexão ativa
    $conn = TTransation::get();
    //executa ainstrução SQL
    $result = $conn->Query($sql->getInstruction());
    //fecha a tranação aplicando todas as operações
    TTransation::close();
}
catch(Exception $e)
{
    //exibe a mesnagem de erro
    echo $e->getMessage();
    //desfaz operaçõse realizadas durante a transação
    TTransaction::rollback();
}
?>