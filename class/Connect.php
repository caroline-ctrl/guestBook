<?php
class Connect
{
    public $pdo;

    public function __construct(string $name)
    {
        $this->pdo = new PDO('sqlite:../' . $name, null, null, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }


    public function connexion()
    {
        return $this->pdo;
    }
}