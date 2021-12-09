<h1>Je suis la page auteur</h1>

<?php

/**
 * @var $user \App\Entity\Author
 * @var $authors \App\Entity\Author[]
 */

foreach ($authors as $user) :
    ?>
    <div>
        <h2><?= $user->getUsername(); ?></h2>
        <p><?= $user->getId(); ?></p>
        <p><?= $user->getEmail(); ?></p>
        <div>
            <input type="checkbox" id="isAdmin" name="isAdmin" <?php echo $user->isAdmin() ? "checked" : ""; ?>>
            <label for="isAdmin">Is Admin</label>
        </div>
    </div>
<?php endforeach; ?>