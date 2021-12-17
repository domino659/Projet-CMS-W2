<h1>Register</h1>
<?php if (\App\Fram\Utils\Flash::hasFlash('alert')): ?>
    <div class="alert alert-danger" role="alert">
        <?= \App\Fram\Utils\Flash::getFlash('alert'); ?>
    </div>
<?php endif; ?>

<form action="sendRegister" method="post">
    <div>
        <label for="username">Name :</label>
        <input type="text" id="username" name="username">
    </div>
    <div>
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="isAdmin">Admin ?</label>
        <input type="hidden" class="isAdmin" name="isAdmin" value="0"/>
        <input type="checkbox" class="isAdmin" name="isAdmin" value="1">
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <label for="verification_password">Verifier mot de passe :</label>
        <input type="password" id="verification_password" name="verification_password">
    </div>
    <button>Register</button>
</form>