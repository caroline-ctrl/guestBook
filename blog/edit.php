<?php
require_once '../class/Connect.php';
$connection = new Connect('data.db');
$pdo = $connection->connexion();

$error = null;
$success = null;
try{
    if (isset($_POST['name'], $_POST['content'])){
        $query = $pdo->prepare('UPDATE posts SET name = :name, content = :content WHERE id = :id');
        $query->execute([
            'name' => $_POST['name'],
            'content' => $_POST['content'],
            'id' => $_GET['id']
        ]);
        $success = "Votre article a bien été modifier";
    }
    $query = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
    $query->execute([
        'id' => $_GET['id']
    ]);
    $posts = $query->fetch();
} catch(PDOException $e){
    $error = $e->getMessage();
}
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>


<p><a href="/blog">Retour au listing</a></p>
<?php if($success): ?>
    <div class="alert alert-success"><?= $success ?></div>
<?php endif ?>
<?php if($error): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php else: ?>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="<?= htmlentities($posts->name) ?>">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="content" value=""><?= htmlentities($posts->content) ?></textarea>
        </div>
        <button class="btn btn-info">Sauvegarder</button>
    </form>
<?php endif ?>

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>