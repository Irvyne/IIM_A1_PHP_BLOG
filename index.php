<?php

include('_header.php');

$articles = getAllArticles($link, true, 6);

while($article = mysqli_fetch_array($articles)) {
?>

<article class="span4">
    <h2><a href="article.php?id=<?=$article['id'];?>"><?= $article['title']; ?></a></h2>
    <p><?= getExcerpt($article['content']); ?></p>
    <small class="badge badge-info pull-right"><?= $article['date']; ?></small>
</article>

<?php
}

include('_footer.php');