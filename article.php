<?php

include('_header.php');

//TODO récupère la variable 'id' en GET, si elle n'existe pas, rediriger vers 'index.php'

//TODO récupère l'article en BDD associé à l'id récupéré

//TODO si l'id ne correspondait à aucun article, redirigé vers 'index.php'

?>

<article class="span12">
    <h1 class="text-center"><?php //TODO afficher le titre de l'article ?></h1>
    <p><?php //TODO afficher le contenu de l'article ?></p>
    <small class="badge badge-info pull-right"><?php //TODO afficher la date de l'article ?></small>
</article>

<?php

include('_footer.php');