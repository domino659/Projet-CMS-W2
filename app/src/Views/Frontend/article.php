<h1>Article</h1>

<?php

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
                Type your new comment here...
            </textarea>
    </div>
    <button>Create comment</button>
</form>