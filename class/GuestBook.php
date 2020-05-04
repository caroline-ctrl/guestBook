<?php
require_once 'Message.php';
/**
  * gére l'enregistrement et la récupération des info présent le fichier.
  *
  * @author  Grafikart
  */
class GuestBook
{
    private $file;

    public function __construct(string $file)
    {
        $directory = dirname($file);
        if (!is_dir($directory)){
            mkdir($directory, 0777, true);
        }
        if (file_exists($file)){
            touch($file);
        }
        $this->file = $file;
    }


    
    /**
     * addMessage: sauvegarde les messages dans le fichier "messages"
     *
     * @param  array $message
     * @return void
     */
    public function addMessage(Message $message)
    {
        file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
    }

   
    /**
     * getMessage: permet de les récupèrer  dans le fichier "messages"
     *
     * @return array
     */
    public function getMessage(): array
    {
        $content = trim(file_get_contents($this->file));
        $lines = explode(PHP_EOL, $content);
        $messages = [];
        foreach($lines as $line){
            $data = json_decode($line, true);
            $messages[] = new Message($data['username'], $data['message'], new DateTime("@" . $data['date']));
        }
        return array_reverse($messages);
    }
}