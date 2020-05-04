<?php
/**
  * gére la récupération des messages et pseudo laissé sur le livre d'or.
  *
  * @author  Grafikart
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
    

    /**
     * isValid: verifie si le pseudo et le message sont valides grace a une autre methode 
     *
     * @return bool
     */
    public function isValid(): bool
    {
        // return strlen($this->username) >= 3 && strlen($this->message) >= 10;
        // si le tableau est vide c'est qu'il n'y a pas d'erreur et donc retourne true
        return empty($this->getErrors());
    }
    
    
    
    /**
     * getErrors: renvoie un tableau comprenant les erreurs
     *
     * @return array
     */
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


   
    /**
     * toJSON: convertit et retourne en json
     *
     * @return string
     */
    public function toJSON(): string
    {
        return json_encode([
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->date->getTimestamp()
        ]);
    }
    
    
    
    /**
     * toHTML: convertit et retourne le message en html
     *
     * @return string
     */
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

}