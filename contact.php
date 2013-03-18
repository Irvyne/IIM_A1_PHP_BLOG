<?php

include('_header.php');

/**
 * Process du formulaire de contact
 */
if (isset($_POST['contact_submit'])) {
    // Récupération des valeurs des champs du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Test si les champs sont remplis
    if (empty($name) || empty($email) || empty($message)) {
        $missing_credential = true;
    } else {
        if (@mail('webmaster@contact.fr', 'Blog A1 - Send by '.$email, $message)) {
            $send_successfully = true;
        } else {
            $send_error = true;
        }
    }
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
        <input id="name" name="name" type="text" placeholder="Your name" value="<?php if (isset($_POST['name'])) { echo $_POST['name']; }?>" required="required" autofocus="on">
    <br>
    <label for="email">Email* :</label>
        <input id="email" name="email" type="email" placeholder="Your email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; }?>" required="required">
    <br>
    <label for="message">Message* :</label>
        <textarea id="message" name="message" placeholder="Your message" required="required"><?php if (isset($_POST['message'])) { echo $_POST['message']; }?></textarea>
    <br>
    <input class="btn btn-primary" name="contact_submit" type="submit" value="Send">
</form>

<?php

include('_footer.php');