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

<h1>Add comment</h1>
<form action="CreateComment" method="post">
    <div>
            <textarea id="content" name="content" rows="10" cols="50">
                Type you new comment here...
            </textarea>
    </div>
    <button>Create comment</button>
</form>