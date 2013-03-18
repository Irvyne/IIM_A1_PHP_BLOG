<?php

include('../_header.php');

/**
 * Empêche l'accès aux personnes non identifiées
 */
if (!isConnected()) {
    header('Location: ../login.php');
    die('Forbidden Area');
}

if (isset($_GET['id']) && !is_null($_GET['id'])) {
    $id = $_GET['id'];
    activateArticle($link, $id);
}

header('Location: index.php');