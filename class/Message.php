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
    const LIMIT_USERNAME = 3;
    const LIMIT_MESSAGE = 10;
    private $username;
    private $message;
    private $date;

    public function __construct(string $username, string $message, ?DateTime $date = null)
    {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date ?: new DateTime();
    }
    

    // verifie si le pseudo et le message est valide (nbr de caractère)
    public function isValid(): bool
    {
        // return strlen($this->username) >= 3 && strlen($this->message) >= 10;
        // si le tableau est vide c'est qu'il n'y a pas d'erreur et donc retourne true
        return empty($this->getErrors());
    }
    
    
    // renvoie un tableau comprenant les erreurs (indexé par le nom du champs)
    public function getErrors(): array
    {
        $errors = [];
        if (strlen($this->username) < self::LIMIT_USERNAME){
            $errors['username'] = 'Ce pseudo est trop court';
        }
        if (strlen($this->message) < self::LIMIT_MESSAGE){
            $errors['message'] = 'Ce message est trop court';
        }
        return $errors;
    }


    // convertit en json en utilisant la fonction json_encode
    public function toJSON(): string
    {
        return json_encode([
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->date->getTimestamp()
        ]);
    }
    
    
    // convertit le message en html
    public function toHTML(): string
    {
        $username = htmlentities($this->username);
        $this->date->setTimezone(new DateTimeZone('Europe/Paris'));
        $date = $this->date->format('d/m/Y à H:i');
        $message = htmlentities($this->message);
        return <<<HTML
    <p>
        <strong>{$username}</strong> <em>le {$date}</em><br>
        {$message}
    </p>
HTML;
    }


    // methode static (on passe le json et renvoie un message)
    public static function fromJSON()
    {

    }
}