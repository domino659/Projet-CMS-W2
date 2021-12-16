<h1>Edit post</h1>

<?php
if (\App\Fram\Utils\Flash::hasFlash('alert')): ?>
    <div class="alert alert-danger" role="alert">
        <?= \App\Fram\Utils\Flash::getFlash('alert'); ?>
    </div>
<?php endif; ?>

<form action="EditPostConfirm" method="post">
    <div>
        <label for="title">Title</label>
        <input id="title" name="title">
    </div>
    <div>
        <textarea id="content" name="content" rows="3" cols="50">
            <?php echo $post->getContent(); ?>
        </textarea>
    </div>
    <div>
        <label for="postImage">Choose an image</label>
        <input type="file" id="postImage" name="postImage" accept="image/png, image/jpeg">
    </div>
    <div>
        <input type="hidden" name="postid" value="<?= $post->getId(); ?>">
        <input type="hidden" name="target_author_id" value="<?= $post->getAuthorId(); ?>">
    </div>
    <button>Edit Post</button>
</form>