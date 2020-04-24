<?php
// classe qui represente les message
// si date null mettre la date du jour
/**
 *   - isValid(): bool => verifie si le pseudo et le pswd est valide (nbr de caractère)
  *  - getErrors(): array =>  renvoie un tableau comprenant les erreurs (indexé par le nom du champs)
  *  - toHTML(): string => convertit le message en html
  *  - toJSON(): string => convertit en json en utilisant la fonction json_encode
  *  - Message::fromJSON(string): Message => methode static (on passe le json et renvoie un message)
 */

class Message
{

    // public $username;
    // public $message;
    // public $date;

    public function __construct(string $username, string $message, DateTime $date = null)
    {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date;
    }


    public function isValid(): bool
    {

    }


    public function getErrors(): array
    {

    }


    public function toHTML(): string
    {

    }


    public function toJSON(): string
    {

    }


    public static function fromJSON(): Message
    {
        
    }
}