<?php

include('../_header.php');

/**
 * Empêche l'accès aux personnes non identifiées
 */
//TODO si on est n'est pas connecté, rediriger ver '../login.php'

//TODO récupérer tous les articles (y compris ceux désactivés)

?>

<p class="text-center" style="margin: 20px 0;">
    <a class="btn btn-primary" href="add.php">Ajouter un article +</a>
</p>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Date</th>
            <th>Enabled</th>
            <th>Activer</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>

<?php
//TODO effectuer une boucle pour afficher les articles un par un
?>
        <tr>
            <?php //TODO on innove ici en créant les td et leur contenu (pour connaitre le contenu, s'aider des <th> ci-dessus) ?>
        </tr>
<?php
//TODO ferme la boucle
?>

    </tbody>
</table>

<?php

include('../_footer.php');