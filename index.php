<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php'; 
require __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Message.php'; 
require __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'GuestBook.php'; 
?>

<h1 class="mt-5">Livre d'or</h1>

<form action="" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Votre pseudo">
        <textarea name="message" class="form-control mt-3" rows="3" placeholder="Votre message"></textarea>
    </div>
    <button type="submit" class="btn btn-info">Envoyer</button>
</form>


<h1 class="mt-5">Vos messages</h1>

<pre>
    <?php 
    $message = new Message($_POST['username'], $_POST['message']);
    var_dump($message->isValid()); 
    ?>
</pre>

<?php require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>