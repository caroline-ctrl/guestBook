<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php'; 
require __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Message.php'; 
require __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'GuestBook.php'; 
$message = new Message($_POST['username'], $_POST['message']);

$errorUsername = null;
$errorMessage = null;
if (!empty($_POST['username'])){
    if (!$message->isValid()){
        $errorUsername = $message->getErrors()['username'];
        $errorMessage = $message->getErrors()['message'];
    }
}
?>

<h1 class="mt-5">Livre d'or</h1>

<form action="" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Votre pseudo">
            <?php if ($errorUsername): ?>
                <?= $errorUsername ?>
            <?php endif ?>

        <textarea name="message" class="form-control mt-3" rows="3" placeholder="Votre message"></textarea>
            <?php if ($errorMessage): ?>
                <?= $errorMessage ?>
            <?php endif ?>

            <pre>
                <?php var_dump($message->isValid()) ?>
            </pre>

    </div>
    <button type="submit" class="btn btn-info">Envoyer</button>
</form>


<h1 class="mt-5">Vos messages</h1>

<?php require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>