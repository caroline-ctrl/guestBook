# EXERCICE PHP LIVRE D'OR

## Livre d'or

- on aura une page avec un formulaire
    - un champs pour le nom d'utilisateur
    - un champs message
    - un bouton
    (le formulaire devra être validé et on n'acceptera pas les pseudo de moins de 3 caracrères ni les messages de moins de 10 caractères)
- On créera un fichier "messages" qui contiendra un message par ligne
(on utilisera serialize et un tableau ['username' => '......', 'message' => '......', 'date' => .....])
    - Pour "serializer" les messages on utilisera les fonction json_encode(tableau) et json_decode(tableau, true)
- La page devra afficher tous les messages sous le formuaire formaté de la manière suivante
<p>
    <strong>Pseudo</strong> <em>le 24/04/2020 à 12h00</em><br>
    Le message
</p>
(les sauts de lignes devront être conservés n12br)

## Restriction

- Utiliser une classe pour présenter un Message :
    - new Message(string $username, string $message, DateTime $date = null),
    - isValid(): bool
    - getErrors(): array
    - toHTML(): string
    - toJSON(): string
    - Message::fromJSON(string): Message
- Utiliser une classe pour représenter le livre d'or
    - new GuestBook($fichier)
    - addMessage(Message $message)
    - getMessage(): array