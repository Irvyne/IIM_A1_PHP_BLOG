<?php

/**
 * @param array $database
 * @return bool|mysqli
 */
function database_connect(array $database)
{
    /** php.net - mysqli_connect()
     * Ouvre une connexion à un serveur MySQL
     */
    // On essaye de se connecter à la base de donnée avec les informations de $database issues de notre fichier "config.php"
    $link = mysqli_connect(
        $database['host'], // Hôte du serveur MySQL
        $database['username'], // Nom d'utilisateur pour la connexion MySQL
        $database['passwd'], // Mot de passe de l'utilisateur pour la connexion MySQL
        $database['dbname'] // Nom de la base de donnée du serveur MySQL
    );

    // Si la connexion avec mysqli_connect() échoue, la fonction retournera (bool)false donc si la connection $link échoue, $link sera égal à false et le code entre accolades s'éxecutera
    if (! $link) {
        // Stop le processus (le code après ne s'éxectueras ) et affiche l'erreur de connexion
        //die('Erreur de connexion (' . mysqli_connect_errno() . ') ' . mysqli_connect_error()); // Décommenter la ligne pour l'exemple et faire une erreur dans la connection
        return false;
    } else {
        //Stop le processus (le code après ne s'éxectueras ) et affiche les informations relatives à la connection MySQL
        //die('Connection établie sur : ' . mysqli_get_host_info($link)); // Décommenter la ligne pour l'exemple et ne pas faire d'erreur dans la connection
        return $link;
    }
}

/**
 * @param bool $link
 * @return true|false
 */
function database_disconnect($link = false)
{
    /** php.net - mysqli_close()
     * mysqli_close($link) ferme la connexion non persistante au serveur MySQL associée à l'identifiant spécifié. Si $link n'est pas spécifié, cette commande s'applique à la dernière connexion ouverte.
     * L'utilisation de mysqli_close() n'est pas habituellement nécessaire, puisque les connexions non persistantes ouverts sont automatiquement fermées à la fin l'exécution du script.
     */
    // Ferme la connexion à la base de donnée (libère de la ram (mémoire vive) sur le serveur). Non obligatoire 90% du temps, mais il faut prendre l'habitude de l'écrire.
    return mysqli_close($link);
}

