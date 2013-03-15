<?php

/**** WARNING ****
MySQLi (MySQL Improved) = MySQL Amélioré
MySQLi est une extension PHP qui permet de se connecter à une base de donnée
Les fonctions commencant par "mysql_" vont être obsolètes, il vous faut donc utiliser les fonctions de MySQLi qui commencent par "mysqli_"
Ne jamais utiliser de fonctions "mysql_" : attention aux sites web qui vous mettent du code obsolète !!
 **** WARNING ****/

/**
 * Stocke les informations de connexion à la base de donnée sous forme de tableau (array)
 */
$database = array(
	'host'      => 'localhost',
	'username'  => 'root',
	'passwd'    => null,
	'dbname'    => 'php1_iim',
);
/**
 * Si le serveur mysql n'est pas sur la même machine (si le site passe en production ou préproduction)
 */
if ($_SERVER['SERVER_NAME'] != 'localhost') {
    $database = array(
        'host'      => 'xxxxxx',
        'username'  => 'xxxxxx',
        'passwd'    => 'xxxxxx',
        'dbname'    => 'xxxxxx',
    );
}

/** array()
 * Un array est un tableau qui permet de stocker des informations sous la forme "clé"/"key" => "valeur"/"value"
 * Une "valeur"/"value" peut être un array, dans ce cas, on parle de récursivité
 * Exemple :
 $array = array(
 	'key1' => 'value1',
 	'key2' => 'value2',
 	'key3' => array(
 		'key3.1' => 'value3.1',
 		'key3.2' => array(
 			'key3.2.1' => 'value3.2.1',
 			'key3.2.2' => array(
 				...
 			)
 		)
 	),
 );
 */

define('WEBDIR', '/IIM_A1_PHP_BLOGNEWS/');