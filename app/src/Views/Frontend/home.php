<?php error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE); ?>
<h1>Home Page</h1>

<?php if (\App\Fram\Utils\Flash::hasFlash('alert')): ?>
    <div class="alert alert-danger" role="alert">
        <?= \App\Fram\Utils\Flash::getFlash('alert'); ?>
    </div>
<?php endif; ?>

<?php

/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

foreach ($posts as $post) :
    $id = $post->getAuthorId();
    $author = $post->getAuthor($id);
    ?>
    <div>
        <h3><?= $post->getTitle(); ?></h3>
        <?php if ($author['username'] == true )
        { ?>
            <p>by <?= $author['username'] ?></p><?php
        }
        else {
            ?><p>Deleted User</p>
        <?php } ?>
        <p><?= substr($post->getContent(), 0, 200); ?></p>
        <a href="/article/<?= $post->getId(); ?>">Read more</a>
    </div>
    <br>
<?php endforeach; ?>