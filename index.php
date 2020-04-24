<?php require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php'; ?>

<h1 class="mt-5">Livre d'or</h1>

<form action="" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Votre pseudo">
        <textarea name="message" class="form-control mt-3" rows="3">Votre message</textarea>
    </div>
    <button type="submit" class="btn btn-info">Envoyer</button>
</form>


<h1 class="mt-5">Vos messages</h1>

<?php require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>