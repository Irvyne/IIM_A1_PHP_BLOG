<?php

include('_header.php');

//TODO si on est connecté, rediriger ver 'index.php'

/**
 * Process du formulaire de connexion
 */
if (isset($_POST['login_submit'])) {
    //TODO récupérer en POST 'username' et 'password'

    //TODO tester si une des variable récupérée du POST est vide, si c'est le cas, créez la variable $missing_credential
    //TODO si aucune variable récupérée du POST n'est vide, lancez la tentative de login avec les informations récupérées
        //TODO si la connexion réussie, redirigez vers 'index.php'
        //TODO si la connexion échoue, créez la variable $credential_error
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
    <input id="username" name="username" type="text" placeholder="please enter your username" value="<?php //TODO si le champ à déjà été envoyé en POST, afficher son contenu ici ?>" required="required" autocomplete="off" autofocus>
    <br>
    <label for="password">Password* :</label>
    <input id="password" name="password" type="password" placeholder="please enter your password" required="required">
    <br>
    <input class="btn btn-primary" name="login_submit" type="submit" value="Connexion">
</form>

<?php

include('_footer.php');