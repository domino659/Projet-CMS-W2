<?php error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE); ?>
<h1>Article</h1>

<?php
if (\App\Fram\Utils\Flash::hasFlash('alert')): ?>
    <div class="alert alert-danger" role="alert">
        <?= \App\Fram\Utils\Flash::getFlash('alert'); ?>
    </div>
<?php endif;
$postAuthorId = $post->getAuthorId();
$author = $post->getAuthor($postAuthorId);
?>

<h3><?= $post->getTitle(); ?></h3>
<?php if ($author['username'] == true ) { ?>
    <p>by <?= $author['username'] ?></p>
    <?php
}
else {
    ?><p>Deleted User</p>
<?php } ?>
<p><?= $post->getContent(); ?></p>
<?php var_dump($post->getPostImage()); ?>
    <img src="<?php $post->getPostImage() ?>" alt="">
<!--<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';-->

<?php if ( isset($_SESSION['user_token']) && $_SESSION['user_token'] == true) {
    if ($_SESSION['user_token']['id'] == $postAuthorId OR $_SESSION['user_token']['isAdmin'] == true ){ ?>
        <form action="/editPost" method="post">
            <input type="hidden" name="target_post_id" value="<?= $post->getId(); ?>">
            <input name="edit" type="submit" value="Edit">
        </form>
        <form action="/deletePost" method="post">
            <input type="hidden" name="target_author_id" value="<?= $post->getAuthorId(); ?>">
            <input name="delete" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
        </form>
    <?php }
} ?>

<h4>Comments</h4>
<?php
foreach ($comments as $comment) :
    $postCommentId = $comment->getAuthorId();
    $author = $comment->getAuthor($postCommentId);
    ?>
    <div>
        <p><?= $comment->getContent(); ?></p>
        <?php if ($author['username'] == true ) { ?>
            <p>by <?= $author['username'] ?></p>
            <?php
        }
        else {
            ?><p>Deleted User</p>
        <?php } ?>
    </div>
<?php if ( isset($_SESSION['user_token']) && $_SESSION['user_token'] == true) {
    if ($_SESSION['user_token']['id'] == $postAuthorId OR $_SESSION['user_token']['isAdmin'] == true ){ ?>
        <form action="/deletecomment" method="post">
            <input type="hidden" name="id" value="<?= $post->getId(); ?>">
            <input type="hidden" name="target_comment_id" value="<?= $comment->getId(); ?>">
            <input type="hidden" name="target_author_id" value="<?= $post->getAuthorId(); ?>">
            <input type="hidden" name="target_post_id" value="<?= $post->getId(); ?>">
            <input name="delete" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
        </form>
    </form>
    <?php }
} ?>
<br>
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