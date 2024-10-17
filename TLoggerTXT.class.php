<?php

/* Classe TLoggerTXT
 * implementa o aloritmo de LOG em TXT
 */

class TLoggerTXT extends TLogger
{
    /* Método write
     * escreve uma mensagem no arquivo de log
     * @param $message = mensagem a ser escrita
     */

    public function write($message)
    {
        date_default_timezone_get("America/Sao_Paulo");
        $time = date("Y-m-d H:i:s");

        //Monta a string
        $text = "$time::$message\n";

        //Adiciona ao final do arquivo
        $handler = fopen($this->filename, "a");
        fwrite($handler, $text);
        fclose($handler);
    }
}
?>