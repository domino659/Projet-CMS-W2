
<h1>Article</h1>

<?php
if (\App\Fram\Utils\Flash::hasFlash('alert')): ?>
    <div class="alert alert-danger" role="alert">
        <?= \App\Fram\Utils\Flash::getFlash('alert'); ?>
    </div>
<?php endif; ?>

<h2><?= $post->getTitle(); ?></h2>
<p><?= $post->getContent(); ?></p>
<img src="<?php echo $post->getPostImage(); ?>" alt="No Image">

<form action="deletePost" method="post">
    <input type="hidden" name="target_author_id" value="<?= $post->getAuthorId(); ?>">
    <input name="delete" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
</form>

<form action="/editPost" method="post">
    <input type="hidden" name="target_post_id" value="<?= $post->getId(); ?>">
    <input name="edit" type="submit" value="edit">
</form>

<?php

foreach ($comments as $comment) :
    ?>
    <div>
        <h2><?= $comment->getId(); ?></h2>
        <p><?= $comment->getContent(); ?></p>
    </div>

<?php endforeach; ?>

<h1>Add comment</h1>
<form action="createComment" method="post">
    <div>
            <textarea id="content" name="content" rows="10" cols="50">
                Type your new comment here...
            </textarea>
    </div>
    <button>Create comment</button>
</form>