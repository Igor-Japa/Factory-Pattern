?<?php
/* Esta classe provê métodos necessários para mannipular transações
*/
final class TTransation
{
    private static $conn; //conexão ativa
    private static $logger; 

    /* Método Construtor
     * Está declarando como private para impedir que se crie instância de TTransation
     */
    private function __construct(){}

    /* Método open()
     * abre uma transaçõa e conexão com o BD
     * @param $database = nome do banco de dados
     */
    public  static function open($database)
    { 
       // abre uma conexão com o banco de dadose armazena na propriedade estática $conn
        if(empty(self::$conn)) 
        {
            self::$conn = TConnection::open($database);

            //Desliga o log de SQL
            self::$logger = NULL;
        }
    }
 
    /* Método get()
    * retorna a conexão ativa da transação
    */
    public static function get()
    {
        //retorna a conexão ativa
        return self::$conn;
    }

    /* Método RollBack()
     * desfaz as operações realizadas na transação
     */
    public static function rollback()
    {
        if(self::$conn)
        {
            //desfaz as operações realizadas durante a transação
            self::$conn->rollback();
            self::$conn=null;
        }
    }

    /* Método setLogger()
     * define a estratégia (algoritmo de log a ser utilizado)
     */
    public static function setLogger(TLogger $logger)
    {
       self::$logger = $logger;
    }

    /* Método Log()
     * armazena uma mensagem no arquivo de LOG
     * baseada na estratégia ($logger) atual
     */ 
    public static function log($message)
    {
        //Verifica se existe um logger
        if(self::$logger)
        {
            self::$logger->write($message);
        }
    }

    /* Método Close()
     * aplica todas as operaçõsea e fecha transação
     */
    public static function close()
    {
        if(self::$conn)
        {
            //aplica as operações realizadasd durante a operação
            self::$conn->commit();
            self::$conn=null;  
        }
    }

}

?>