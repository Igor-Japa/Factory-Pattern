<?php

spl_autoload_register(function ($classe) 
{
    if (file_exists("{$classe}.class.php")) 
    {
        include_once $filename;
    }
    else
    {
        throw new Exception("Classe {$classe} não encontrada.");
    }
});

try
{
    //Abre uma conxão 
    TTransation::open('pg_livro');

    //Define a estratégia de LOG
    TTransation::setLogger(new LoggerHTML('/tmp/arquivo.html'));

    //Escreve a mensagem de LOG
    TTransation::log("Inserindo registro Willian Wallace");

    //Cria uma intrução SQl
    $sql = new TSqlInsert;

    //Define o nome da entidade
    $sql->setEntity('famosos');

    //Atribui o valor da coluna
    $sql->setRowData('codigo', 9);
    $sql->setRowData('nome', 'William Wallace');

    //Obtém a conexão ativa
    $conn = TTransation::get();

    //Executa a instrução sql
    $result = $conn->query($sql->getInstruction());

    //Escreve a mensagem de log
    TTransation::log($sql->getInstructuin());
}

?>