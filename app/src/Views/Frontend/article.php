<h1>Article</h1>

<?php

/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Articles[]
 */

foreach ($comments as $comment) :
    ?>
    <div>
        <h2><?= $comment->getId(); ?></h2>
        <p><?= $comment->getContent(); ?></p>
    </div>
<?php endforeach; ?>