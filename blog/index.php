<?php
$pdo = new PDO('sqlite:../data.db');
$query = $pdo->query('SELECT * FROM posts');
if ($query ===  false){
    var_dump($pdo->errorInfo());
    die('Erreur SQL');
}
$posts = $query->fetchAll(PDO::FETCH_OBJ);
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<ul>
    <?php foreach($posts as $post): ?>
        <li><?= $post->name ?></li>
    <?php endforeach ?>
</ul>


<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>