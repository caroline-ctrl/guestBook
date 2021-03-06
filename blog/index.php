<?php
require_once '../class/Post.php';
require_once '../class/Connect.php';
$connection = new Connect('data.db');
$pdo = $connection->connexion();

$error = null;
try {
    if (isset($_POST['name'], $_POST['content'])) {
        $query = $pdo->prepare('INSERT INTO posts (name, content, created_at) VALUES (:name, :content, :created)');
        $query->execute([
            'name' => $_POST['name'],
            'content' => $_POST['content'],
            'created' => time()
        ]);
        header('Location: /blog/edit.php?id=' . $pdo->lastInsertId());
        exit();
    }
    $query = $pdo->query('SELECT * FROM posts');
    $posts = $query->fetchAll(PDO::FETCH_CLASS, 'Post');
} catch (PDOException $e) {
    $error = $e->getMessage();
}
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php else : ?>
    <ul>
        <?php foreach ($posts as $post) : ?>
            <h2><a href="/blog/edit.php?id=<?= $post->id ?>"><?= htmlentities($post->name) ?></a></h2>
            <p class="small text-muted">Ecrit le : <?= $post->created_at->format('d/m/Y à H:i') ?></p>
            <p><?= nl2br(htmlentities($post->getExcerpt())) ?></p>
        <?php endforeach ?>
    </ul>

    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="content" value=""></textarea>
        </div>
        <button class="btn btn-info">Sauvegarder</button>
    </form>

<?php endif ?>


<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>