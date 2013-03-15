<?php

/** php.net - header()
 * Permet de spécifier l'en-tête HTTP 'string' lors de l'envoi des fichiers HTML
 */
// Header PHP pour forcer l'encodage des caractères en "utf-8" : résoud les problèmes de caractères qui ne sont pas affichés correctement 
header('Content-Type: text/html; charset=utf-8');

/** php.net - require()
 * L'instruction de langage require inclut et exécute le fichier spécifié en argument.
 */
// On récupère les informations de connection à notre base de donnée dans le tableau (array) $database
require('../config/config.php');
include('../functions/database.fn.php');
include('../functions/article.fn.php');

/**** WARNING ****
MySQLi (MySQL Improved) = MySQL Amélioré
MySQLi est une extension PHP qui permet de se connecter à une base de donnée
Les fonctions commencant par "mysql_" vont être obsolètes, il vous faut donc utiliser les fonctions de MySQLi qui commencent par "mysqli_"
Ne jamais utiliser de fonctions "mysql_" : attention aux sites web qui vous mettent du code obsolète !!
 **** WARNING ****/
$link = database_connect($database);

include('../templates/_header.phtml');
include('../templates/_navbar.phtml');

echo '<button class="add"><a href="'.WEBDIR.'admin/add.php">Ajouter un article +</a></button>';

$articles = getAllArticles($link, false);

if (!$articles) {
    var_dump(mysqli_error($link));
}

echo '<table>';
echo    '<thead>';
echo        '<tr>';
echo            '<th>Id</th>';
echo            '<th>Titre</th>';
echo            '<th>Contenu</th>';
echo            '<th>Date</th>';
echo            '<th>Enabled</th>';
echo            '<th>Activer</th>';
echo            '<th>Editer</th>';
echo            '<th>Supprimer</th>';
echo        '</tr>';
echo    '</thead>';
echo    '<tbody>';
while ($article = mysqli_fetch_assoc($articles))
{
    echo '<tr>';
    echo    '<td>'.$article['id'].'</td>';
    echo    '<td>'.$article['title'].'</td>';
    echo    '<td>'.$article['content'].'</td>';
    echo    '<td>'.$article['date'].'</td>';
    echo    '<td>'.$article['enabled'].'</td>';
    $article['enabled'] == true ? $activate = 'Désactiver' : $activate = 'Activer';
    echo    '<td><a href="'.WEBDIR.'admin/activate.php?id='.$article['id'].'">'.$activate.'</a></td>';
    echo    '<td><a href="'.WEBDIR.'admin/edit.php?id='.$article['id'].'">Editer</a></td>';
    echo    '<td><a href="'.WEBDIR.'admin/delete.php?id='.$article['id'].'">Supprimer</a></td>';
    echo '</tr>';
}
echo    '</tbody>';
echo '</table>';

include('../templates/_footer.phtml');

/** php.net - mysqli_close()
 * mysqli_close($link) ferme la connexion non persistante au serveur MySQL associée à l'identifiant spécifié. Si $link n'est pas spécifié, cette commande s'applique à la dernière connexion ouverte.
 * L'utilisation de mysqli_close() n'est pas habituellement nécessaire, puisque les connexions non persistantes ouverts sont automatiquement fermées à la fin l'exécution du script.
 */
// Ferme la connexion à la base de donnée (libère de la ram (mémoire vive) sur le serveur). Non obligatoire 90% du temps, mais il faut prendre l'habitude de l'écrire.
database_disconnect($link);