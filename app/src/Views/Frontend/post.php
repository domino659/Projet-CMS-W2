<h1>Create post</h1>
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
    <div>
        <label for="postImage">Choose an image</label>
        <input type="file" id="postImage" name="postImage" accept="image/png, image/jpeg">
    </div>
    <button>Create Post</button>
</form>