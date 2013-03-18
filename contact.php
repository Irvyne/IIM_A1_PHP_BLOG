<?php

include('_header.php');

/**
 * Process du formulaire de contact
 */
if (isset($_POST['contact_submit'])) {
    //TODO effectuer le process de validation et d'envoi du formulaire de contact. Penser à créer les variables ci-dessous $missing_credential, $send_successfully et $send_error pour afficher les erreurs
}

?>

<h1>Formulaire de contact</h1>

<?php
if (isset($missing_credential)) {
    ?>
    <div class="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Warning!</strong> At least one field is empty, all fields are required.
    </div>
<?php
}
?>

<?php
if (isset($send_successfully)) {
    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Information successfully send to the webmaster.
    </div>
<?php
}
?>

<?php
if (isset($send_error)) {
    ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> Error with mail() function, the website is probably on localhost.
    </div>
<?php
}
?>

<form id="contact_form" method="post">
    <label for="name">Nom* :</label>
        <input id="name" name="name" type="text" placeholder="Your name" value="<?php //TODO si le champ à déjà été envoyé en POST, afficher son contenu ici ?>" required="required" autofocus="on">
    <br>
    <label for="email">Email* :</label>
        <input id="email" name="email" type="email" placeholder="Your email" value="<?php //TODO si le champ à déjà été envoyé en POST, afficher son contenu ici ?>" required="required">
    <br>
    <label for="message">Message* :</label>
        <textarea id="message" name="message" placeholder="Your message" required="required"><?php //TODO si le champ à déjà été envoyé en POST, afficher son contenu ici ?></textarea>
    <br>
    <input class="btn btn-primary" name="contact_submit" type="submit" value="Send">
</form>

<?php

include('_footer.php');