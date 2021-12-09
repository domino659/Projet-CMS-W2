<h1>Un titre de home page</h1>

<?php

/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

foreach ($posts as $article) :
    ?>
    <div>
        <h2><?= $article->getTitle(); ?></h2>
        <p><?= substr($article->getContent(), 0, 200); ?></p>
        <a href="/article?id=<?php echo $article->getId(); ?>">Lire plus</a>
    </div>
<?php endforeach; ?>