<?php 
/*Classe TConnection
*Gerencia conexões com banco de dados através de arquivos de configuração
*/

final class TConnection
{
    /*Método __construct()
    *não existirão isntâncias de TConnection, por isto estamos marcando-o como private
    */
    private function __construct(){}

    /*Método Open()
    *recebe o nome do banco de dados e instancia o objeto PDO correspondente
    */
    public static function open($name)
    {
        //verifica se existe arquivos de configuração para este banco de dados

        if(file_exists("app.config/{$name}.ini"))
        {
            // Lê o INI e retorna um Array
        }
    }

}

?>