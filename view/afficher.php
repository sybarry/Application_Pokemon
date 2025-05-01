<?php
require_once("gen_form.inc.php");
ob_start(); ?>
<h1>Afficher Pokémon</h1>
<?php
echo "<p id=\"pokemon\">".gen_select("Types : ", array("name"=>"idType", "id"=>"selectType"), $optionsTypes)."</p>";
?>
<div id="divPokemon"></div>
<script src="public/js/pokemon.js"></script>
<?php
$content = ob_get_clean();
$title_part = "Afficher Pokémon";
require("template.php");
?>