<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Message.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'GuestBook.php';

$errors = null;
$success = false;
$guestBook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages');
if (isset($_POST['username'], $_POST['message'])) {
    $message = new Message($_POST['username'], $_POST['message']);
    if ($message->isValid()) {
        $guestBook->addMessage($message);
        $success = true;
        $_POST = [];
    } else {
        $errors = $message->getErrors();
    }
}

$messages = $guestBook->getMessage();
$title = "Livre d'or";
require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<h1 class="mt-5">Livre d'or</h1>

<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        <p>Formulaire invalide</p>
    </div>
<?php endif ?>

<?php if ($success) : ?>
    <div class="alert alert-success">
        <p>Merci pour votre message</p>
    </div>
<?php endif ?>


<form action="" method="POST">
    <div class="form-group">
        <input value="<?= htmlentities($_POST['username'] ?? '') ?>" type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" name="username" placeholder="Votre pseudo">
        <?php if (!isset($errors['username'])) : ?>
            <div class="invalid-feedback">
                <?= $errors['username'] ?>
            </div>
        <?php endif ?>

        <textarea name="message" class="form-control mt-3 <?= isset($errors['message']) ? 'is-invalid' : '' ?>" rows="3" placeholder="Votre message"><?= htmlentities($_POST['message'] ?? '') ?></textarea>
        <?php if (!isset($errors['message'])) : ?>
            <div class="invalid-feedback">
                <?= $errors['message'] ?>
            </div>
        <?php endif ?>
    </div>
    <button type="submit" class="btn btn-info">Envoyer</button>
</form>



<?php if (!empty($messages)): ?>
<h1 class="mt-5">Vos messages</h1>

<?php foreach ($messages as $message): ?>
    <?= $message->toHTML() ?>
<?php endforeach ?>

<?php endif ?>


<?php require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>