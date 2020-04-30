<?php
require_once 'Message.php';

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


    // sauvegarde les message
    public function addMessage(Message $message)
    {
        file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
    }


    // permet de les récupèrer
    public function getMessage(): array
    {
        // $content = trim(file_get_contents($this->file)); 
        // if(!empty($content)){ 
        //     $lines = explode(PHP_EOL , $content); 
        //     $messages = [];
        //     foreach ($lines as $line){ 
        //         $data = json_decode($line, true);
        //         $message[] = new Message($data['username'], $data['message'], new DateTime("@" . $data['date']));
        //     } 
        // }else{ 
        //     $messages[]=''; 
        // } 
        // return array_reverse($messages) ;
        $content = trim(file_get_contents($this->file));
        $lines = explode(PHP_EOL, $content);
        $messages = [];
        foreach($lines as $line){
            $data = json_decode($line, true);
            $message[] = new Message($data['username'], $data['message'], new DateTime("@" . $data['date']));
        }
        return array_reverse($messages);
    }
}