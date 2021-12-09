<h1>Register</h1>
<form action="sendRegister" method="post">
    <div>
        <label for="name">Name :</label>
        <input type="text" id="name" name="username">
    </div>
    <div>
        <label for="mail">E-mail :</label>
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
        <label for="verif_password">Verifier mot de passe :</label>
        <input type="password" id="verif_password" name="verif_password">
    </div>
    <button>Register</button>
</form>