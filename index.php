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
require('config/config.php');
include('functions/database.fn.php');
include('functions/article.fn.php');

/**** WARNING ****
MySQLi (MySQL Improved) = MySQL Amélioré
MySQLi est une extension PHP qui permet de se connecter à une base de donnée
Les fonctions commencant par "mysql_" vont être obsolètes, il vous faut donc utiliser les fonctions de MySQLi qui commencent par "mysqli_"
Ne jamais utiliser de fonctions "mysql_" : attention aux sites web qui vous mettent du code obsolète !!
 **** WARNING ****/
$link = database_connect($database);

include('templates/_header.phtml');
include('templates/_navbar.phtml');

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

$articles = getAllArticles($link, true, 5);

while($article = mysqli_fetch_array($articles)) {
    echo '<article>';
    echo '<h1>'.$article['title'].'</h1>';
    echo '<p>'.$article['content'].'</p>';
    echo '<small>'.$article['date'].'</small>';
    echo '</article>';
}

include('templates/_footer.phtml');

/** php.net - mysqli_close()
 * mysqli_close($link) ferme la connexion non persistante au serveur MySQL associée à l'identifiant spécifié. Si $link n'est pas spécifié, cette commande s'applique à la dernière connexion ouverte.
 * L'utilisation de mysqli_close() n'est pas habituellement nécessaire, puisque les connexions non persistantes ouverts sont automatiquement fermées à la fin l'exécution du script.
 */
// Ferme la connexion à la base de donnée (libère de la ram (mémoire vive) sur le serveur). Non obligatoire 90% du temps, mais il faut prendre l'habitude de l'écrire.
database_disconnect($link);