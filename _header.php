<?php

/** php.net - header()
 * Permet de spécifier l'en-tête HTTP 'string' lors de l'envoi des fichiers HTML
 */
// Header PHP pour forcer l'encodage des caractères en "utf-8" : résoud les problèmes de caractères qui ne sont pas affichés correctement
header('Content-Type: text/html; charset=utf-8');

/** php.net - session_start()
 * Démarre une nouvelle session ou reprend une session existante
 */
//TODO démarrer la session

/** php.net - require()
 * L'instruction de langage require inclut et exécute le fichier spécifié en argument.
 */
// On récupère les informations de connection à notre base de donnée dans le tableau (array) $database
//TODO on fait des require/include sur 4 fichiers (les 3 fichiers de fonctions et le fichier de configuration)

/**** WARNING ****
MySQLi (MySQL Improved) = MySQL Amélioré
MySQLi est une extension PHP qui permet de se connecter à une base de donnée
Les fonctions commencant par "mysql_" vont être obsolètes, il vous faut donc utiliser les fonctions de MySQLi qui commencent par "mysqli_"
Ne jamais utiliser de fonctions "mysql_" : attention aux sites web qui vous mettent du code obsolète !!
 **** WARNING ****/
//TODO lance la fonction (obligatoire) pour se connecter à la BDD

include('templates/_header.phtml');
include('templates/_navbar.phtml');