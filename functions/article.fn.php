<?php

/**
 * @param $link
 * @param bool $enabled
 * @param bool $limit
 * @return bool|mysqli_result
 */
//TODO créer une fonction qui retourne tous les articles : possibilité de ne sélectionner que les articles activés + possibilité d'activer une limitation du nombre d'article (SELECT)

/**
 * @param $link
 * @param $id
 * @return bool|mysqli_result
 */
//TODO créer une fonction qui retourne un seul article d'après son id (SELECT)

/**
 * @param $link
 * @param array $article
 * @return bool|mysqli_result
 */
//TODO créer une fonction qui ajoute un article en BDD (INSERT)

/**
 * @param $link
 * @param array $article
 * @return bool|mysqli_result
 */
//TODO créer une fonction qui met à jour un article en BDD d'après son id (UPDATE) : ne pas mettre à jour le champ `enabled` ici

/**
 * @param $link
 * @param $id
 * @return bool|mysqli_result
 */
//TODO créer une fonction qui supprime un article en BDD d'après son id (DELETE)

/**
 * @param $link
 * @param $id
 * @return bool|mysqli_result
 */
//TODO créer une fonction qui active/désactive un article en BDD d'après son id (UPDATE) : champ `enabled`

/**
 * @param $link
 * @param $sql
 * @return bool|mysqli_result
 */
//TODO créer une fonction qui nous permet d'éxecuter une requete sql déjà écrite

/**
 * @param $string
 * @param int $length
 * @return string
 */
//TODO créer une fonction qui retourne un résumé (d'une "length" modifiable) d'une chaîne de caractère (string)