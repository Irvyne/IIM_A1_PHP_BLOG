<?php

/**
 * @param $link
 * @param $username
 * @param $password
 * @return bool
 */
function connection($link, $username, $password) {
    $username = mysqli_real_escape_string($link, $username);
    $password = sha1(mysqli_real_escape_string($link, $password));

    $sql = "SELECT COUNT(*) FROM user WHERE `username`='$username' AND `password`='$password'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_fetch_array($result);

    if($count[0] >= 1) {
        addSession($username);

        return true;
    } else {
        return false;
    }
}

/**
 * @param $username
 * @return bool
 */
function addSession($username) {
    $_SESSION['status'] = 'connected';
    $_SESSION['username'] = $username;

    return true;
}

/**
 * @return bool
 */
function isConnected() {
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'connected') {
        return true;
    } else {
        return false;
    }
}