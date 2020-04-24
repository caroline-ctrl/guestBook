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
    public $username;
    public $message;
    public $date;

    public function __construct(string $username, string $message, DateTime $date = null)
    {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date;
    }
    

    // verifie si le pseudo et le message est valide (nbr de caractère)
    public function isValid(): bool
    {
        if ((strlen($this->username) < 3) && (strlen($this->message < 10))){
            return false;
        } else {
            return true;
        }
    }
    
    
    // renvoie un tableau comprenant les erreurs (indexé par le nom du champs)
    public function getErrors(): array
    {
        return $arrayError[] = [
            'username' => 'Ce pseudo est trop court',
            'message' => 'Ce message est trop court'
        ];
    }


    // convertit le message en html
    public function toHTML(): string
    {

    }


    // convertit en json en utilisant la fonction json_encode
    public function toJSON(): string
    {

    }


    // methode static (on passe le json et renvoie un message)
    public static function fromJSON(): Message
    {

    }
}