<h1>Create post</h1>

<?php if (\App\Fram\Utils\Flash::hasFlash('alert')): ?>
    <div class="alert alert-danger" role="alert">
        <?= \App\Fram\Utils\Flash::getFlash('alert'); ?>
    </div>
<?php endif; ?>

<form action="CreatePost" method="post" enctype="multipart/form-data">
    <div>
        <label for="title">Title</label>
        <input id="title" name="title">
    </div>
    <div>
        <textarea id="content" name="content" rows="3" cols="50"></textarea>
    </div>
    <div>
        <label for="image">Choose an image file (JPEG, GIF ou PNG)</label>
        <input type="file" id="image" name="image"><br>
    </div>
<button>Create Post</button>
</form>