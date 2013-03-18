<?php

include('../_header.php');

/**
 * Empêche l'accès aux personnes non identifiées
 */
//TODO si on est n'est pas connecté, rediriger ver '../login.php'

//TODO récupérer en GET l'id, s'il n'existe pas, rediriger vers 'index.php'

//TODO récupérer l'article en BDD en utilisant l'id précédement récupéré

?>

<form id="article_form" method="post">
    <label for="title">Titre :</label>
        <input id="title" name="title" type="text" value="<?php //TODO afficher le titre de l'article ?>" placeholder="Titre de l'article" required="required">
    <br>
    <label for="content">Contenu :</label>
        <textarea id="content" name="content" placeholder="Contenu de l'article" required="required"><?php //TODO afficher le contenu de l'article ?></textarea>
    <br>
    <input class="btn btn-primary" name="article_submit" type="submit" value="Add">
</form>

<?php

include('../_footer.php');