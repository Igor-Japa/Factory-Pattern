<?php
  
/* Classe TLoggerHTML
 * implementa o aloritmo de LOG em HTML
 */
  
class TLoggerHTML extends TLogger
{ 
    /* Método write
     * escreve uma mensagem no arquivo de LOG
     * @param $message = mensagem a ser escrita
     */

    public function write($message)
    {
        date_default_timezone_get('America/Sao_Paulo');
        $time = date('Y-m-d H:i:s');
  
        //Monta a string
        $text = "<p>\n";
        $text.= "<b>$time</b>:\n";
        $text.= "<i>$message</i><br>\n";
        $text.= "</p>\n";
  
        //Adiciono ao final do arquivo
        $handler = fopen($this->filename, "a");
        fwrite($handler, $text);
        fclose($handler);
    }
} 
?>