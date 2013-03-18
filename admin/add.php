<?php

include('../_header.php');

/**
 * Empêche l'accès aux personnes non identifiées
 */
if (!isConnected()) {
    header('Location: ../login.php');
    die('Forbidden Area');
}

if (isset($_POST['article_submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (isset($_POST['enabled'])) {
        $enabled = true;
    } else {
        $enabled = false;
    }

    if (empty($title) || empty($content)) {
        $missing_field = true;
    } else {
        $article = array(
            'title'     => $title,
            'content'   => $content,
            'enabled'   => $enabled,
        );
        addArticle($link, $article);

        header('Location: index.php');
    }
}

if (isset($missing_field)) {
?>
    <div class="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Warning!</strong> At least one field is empty, all fields are required.
    </div>
<?php
}

?>

<form id="article_form" method="post">
    <label for="title">Titre :</label>
    <input id="title" name="title" type="text" placeholder="Titre de l'article" required="required">
    <br>
    <label for="content">Contenu :</label>
    <textarea id="content" name="content" placeholder="Contenu de l'article" required="required"></textarea>
    <br>
    <label for="enabled">Activer :
        <input id="enabled" name="enabled" type="checkbox">
    </label>
    <br>
    <input class="btn btn-primary" name="article_submit" type="submit" value="Add">
</form>

<?php

include('../_footer.php');