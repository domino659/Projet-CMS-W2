
<h1>Article</h1>

<?php
if (\App\Fram\Utils\Flash::hasFlash('alert')): ?>
    <div class="alert alert-danger" role="alert">
        <?= \App\Fram\Utils\Flash::getFlash('alert'); ?>
    </div>
<?php endif; ?>

<?php
$id = $post->getAuthorId();
$author = $post->getAuthor($id);
?>

<h2><?= $post->getTitle(); ?></h2>
<p><?= $author['username'] ?></p>
<p><?= $post->getContent(); ?></p>
<?php

?>


<?php if ( isset($_SESSION['user_token']) && $_SESSION['user_token'] == true) { ?>
<form action="deletePost" method="post">
    <input type="hidden" name="target_author_id" value="<?= $post->getAuthorId(); ?>">
    <input name="delete" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
</form>

<form action="/editPost" method="post">
    <input type="hidden" name="target_post_id" value="<?= $post->getId(); ?>">
    <input name="edit" type="submit" value="edit">
</form>
<?php } ?>

<h2>Comments</h2>
<?php
foreach ($comments as $comment) :
    $id = $comment->getAuthorId();
    $author = $comment->getAuthor($id);
    ?>
    <div>
        <p><?= $comment->getContent(); ?></p>
        <p><?= $author['username'] ?></p>
    </div>
    <form action="/deleteComment" method="post">
        <input type="hidden" name="id" value="<?= $post->getId(); ?>">
        <input type="hidden" name="target_comment_id" value="<?= $comment->getId(); ?>">
        <input type="hidden" name="target_author_id" value="<?= $post->getAuthorId(); ?>">
        <input name="delete" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
    </form>

<?php endforeach; ?>

<?php if ( isset($_SESSION['user_token']) && $_SESSION['user_token'] == true) { ?>
<h3>Add comment</h3>
<form action="/createComment" method="post">
    <div>
            <textarea id="content" name="content" rows="3" cols="50"></textarea>
    </div>
    <input type="hidden" name="id" value="<?= $post->getId(); ?>">
    <button>Create comment</button>
</form>
<?php } ?>