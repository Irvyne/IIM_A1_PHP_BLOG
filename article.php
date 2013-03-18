<?php

include('_header.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: index.php');
}


/*
$article = array(
    'title'     => 'efzefzef',
    'content'   => 'testContent',
    'enabled'   => false,
);
addArticle($link, $article);
if (mysqli_error($link))
    var_dump('Error : '.mysqli_error($link));
*/

$article = getOneArticle($link, $id);
$article = mysqli_fetch_array($article);

if (!$article) {
    header('Location: index.php');
    die('Aucun article sélectionné');
}

?>

<article class="span12">
    <h1 class="text-center"><?= $article['title']; ?></h1>
    <p><?= $article['content']; ?></p>
    <small class="badge badge-info pull-right"><?= $article['date']; ?></small>
</article>

<?php

include('_footer.php');