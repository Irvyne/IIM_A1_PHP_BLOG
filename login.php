<?php

include('_header.php');

if (isConnected()) {
    header('Location: index.php');
}
/**
 * Process
 */
if (isset($_POST['login_submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $missing_credential = true;
    } else {
        $connection = connection($link, $username, $password);
        if ($connection) {
            header('Location: index.php');
        } else {
            $credential_error = true;
        }
    }
}

?>

<h1>Formulaire de connexion</h1>

<?php
if (isset($missing_credential)) {
?>
<div class="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Warning!</strong> At least one field is empty, please enter a <i>username</i> AND a <i>password</i>.
</div>
<?php
}
?>

<?php
if (isset($credential_error)) {
?>
<div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong> Credentials are not correct, please enter a new <i>password</i> or change <i>username</i>.
</div>
<?php
}
?>

<form id="login_form" method="post">
    <label for="username">Username* :</label>
    <input id="username" name="username" type="text" placeholder="please enter your username" value="<?php if (isset($_POST['username'])) { echo $_POST['username']; }?>" required="required" autocomplete="off" autofocus>
    <br>
    <label for="password">Password* :</label>
    <input id="password" name="password" type="password" placeholder="please enter your password" required="required">
    <br>
    <input class="btn btn-primary" name="login_submit" type="submit" value="Connexion">
</form>

<?php

include('_footer.php');