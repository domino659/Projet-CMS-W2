    <h1>Users</h1>

<?php
if (\App\Fram\Utils\Flash::hasFlash('alert')): ?>
    <div class="alert alert-danger" role="alert">
        <?= \App\Fram\Utils\Flash::getFlash('alert'); ?>
    </div>
<?php endif; ?>

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
            <form action="modifyuseradmin" method="post">
                <input type="checkbox" id="isAdmin" name="<?php echo $user->getId(); ?>" <?php echo $user->isAdmin() ? "checked" : ""; ?>>
                <label for="isAdmin">Is Admin</label>
                <input type="hidden" name="target_user_id" value="<?= $user->getId(); ?>">
                <input type="hidden" name="target_user_situation" value="<?= $user->isAdmin(); ?>">
                <input name="update" type="submit" value="Update" onclick="return confirm('Are you sure?')">
            </form>
        </div>
        <form action="deleteUser" method="post">
                <input type="hidden" name="target_user_id" value="<?= $user->getId(); ?>">
                <input name="delete" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
        </form>
    </div>
<?php endforeach;?>