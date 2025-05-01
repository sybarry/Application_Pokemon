<?php ob_start(); ?>
<div id="home">
    <h1>Bienvenue dans l'application</h1>
    <img src="public/img/logo.png" alt="Logo de la franchise pokémon">
</div>
<?php
$content = ob_get_clean();
$title_part = "Accueil";
require("template.php");
?>