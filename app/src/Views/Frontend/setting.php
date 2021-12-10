<h1>Update you're information</h1>
<?php if (\App\Fram\Utils\Flash::hasFlash('alert')): ?>
    <div class="alert alert-danger" role="alert">
        <?= \App\Fram\Utils\Flash::getFlash('alert'); ?>
    </div>
<?php endif; ?>

<?php
$username = $_SESSION['user_token']['username'];
$email = $_SESSION['user_token']['email'];
?>
<form action="modifyuser" method="post">
    <div>
        <label for="username">Name :</label>
        <input type="text" id="username" name="username" template="<?= $username ?>" value="<?= $username ?>">
    </div>
    <div>
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" template="<?= $email ?>" value="<?= $email ?>">
    </div>
    <div>
        <label for="password">Nouveau mot de passe :</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <label for="verification_password">Verifier mot de passe :</label>
        <input type="password" id="verification_password" name="verification_password">
    </div>
    <button>Update</button>
</form>