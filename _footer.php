<?php

include('templates/_footer.phtml');

/** php.net - mysqli_close()
 * mysqli_close($link) ferme la connexion non persistante au serveur MySQL associée à l'identifiant spécifié. Si $link n'est pas spécifié, cette commande s'applique à la dernière connexion ouverte.
 * L'utilisation de mysqli_close() n'est pas habituellement nécessaire, puisque les connexions non persistantes ouverts sont automatiquement fermées à la fin l'exécution du script.
 */
// Ferme la connexion à la base de donnée (libère de la ram (mémoire vive) sur le serveur). Non obligatoire 90% du temps, mais il faut prendre l'habitude de l'écrire.
//TODO lance la fonction (ou non) pour se déconnecter à la BDD