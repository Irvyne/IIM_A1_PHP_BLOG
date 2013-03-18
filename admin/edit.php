<?php

include('../_header.php');

/**
 * Empêche l'accès aux personnes non identifiées
 */
if (!isConnected()) {
    header('Location: ../login.php');
    die('Forbidden Area');
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: index.php');
}

$article = getOneArticle($link, $id);
$article = mysqli_fetch_array($article);

?>

<form id="article_form" method="post">
    <label for="title">Titre :</label>
        <input id="title" name="title" type="text" value="<?=$article['title'];?>" placeholder="Titre de l'article" required="required">
    <br>
    <label for="content">Contenu :</label>
        <textarea id="content" name="content" placeholder="Contenu de l'article" required="required"><?=$article['content'];?></textarea>
    <br>
    <input class="btn btn-primary" name="article_submit" type="submit" value="Add">
</form>

<?php

include('../_footer.php');