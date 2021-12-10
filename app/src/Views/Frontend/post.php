<h1>Create post</h1>

<?php
if (\App\Fram\Utils\Flash::hasFlash('alert')): ?>
    <div class="alert alert-danger" role="alert">
        <?= \App\Fram\Utils\Flash::getFlash('alert'); ?>
    </div>
<?php endif; ?>

<form action="CreatePost" method="post">
    <div>
        <label for="title">Title</label>
        <input id="title" name="title">
    </div>
    <div>
        <textarea id="content" name="content" rows="10" cols="50">
            Type you new post here...
        </textarea>
    </div>
    <!-- <div>
        <label for="postImage">Choose an image</label>
        <input type="file" id="postImage" name="postImage" accept="image/png, image/jpeg">
    </div> -->
    <button>Create Post</button>
</form>