<?php

/* Classe TLogger
Classe que prove uma interface para definição do algorit
mo de log
*/

abstract class TLogger
{
    protected $filename; // Local do arquivo de LOG

    /* Método Construtor ()
     * instancia um logger
     * @param $filename - local do arquivo de log
     */
    
    public function __construct($filename)
    {
       $this->filename = $filename;
       //Reseta o conteúdo do arquivo
       file_put_contents($filename, '');
    }

    //Define o método write como obrigatório
    abstract function write($message);
}

?>