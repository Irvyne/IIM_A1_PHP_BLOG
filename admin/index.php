<?php

include('../_header.php');

/**
 * Empêche l'accès aux personnes non identifiées
 */
if (!isConnected()) {
    header('Location: ../login.php');
    die('Forbidden Area');
}

$articles = getAllArticles($link, false);

if (!$articles) {
    var_dump(mysqli_error($link));
}

?>

<p class="text-center" style="margin: 20px 0;">
    <a class="btn btn-primary" href="<?=WEBDIR;?>admin/add.php">Ajouter un article +</a>
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
while ($article = mysqli_fetch_assoc($articles))
{
?>
        <tr>
            <td><a href="../article.php?id=<?= $article['id']; ?>" target="_blank"><?=$article['id'];?></a></td>
            <td><?=getExcerpt($article['title'], 30);?></td>
            <td><?=getExcerpt($article['content'], 100);?></td>
            <td><?=$article['date'];?></td>
            <?php if ($article['enabled'] == true) { ?>
            <td><span class="label label-success">enabled</span></td>
            <td><a href="<?=WEBDIR;?>admin/activate.php?id=<?=$article['id'];?>">Désactiver</a></td>
            <?php } else { ?>
            <td><span class="label label-important">disabled</span></td>
            <td><a href="<?=WEBDIR;?>admin/activate.php?id=<?=$article['id'];?>">Activer</a></td>
            <?php } ?>
            <td><a href="<?=WEBDIR;?>admin/edit.php?id=<?=$article['id'];?>">Editer</a></td>
            <td><a href="<?=WEBDIR;?>admin/delete.php?id=<?=$article['id'];?>">Supprimer</a></td>
        </tr>
<?php
}
?>

    </tbody>
</table>

<?php

include('../_footer.php');