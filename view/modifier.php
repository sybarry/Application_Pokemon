<?php
require_once("gen_form.inc.php");
ob_start(); ?>
<h1>Modifier Pokémon</h1>
<?php
echo start_form("POST");
echo "<p id=\"pokemon\">".gen_select("Pokémon : ", array("name"=>"idPokemon", "id"=>"selectPokemon"), $optionsPokemon)."</p>";
echo "<p>".gen_input("number", "Taille : ", array("name"=>"taillePokemon", "id"=>"taillePokemon", "required"=>true))."</p>";
echo "<p>".gen_input("number", "Poids : ", array("name"=>"poidsPokemon", "id"=>"poidsPokemon", "required"=>true))."</p>";
echo "<p>".gen_input("submit")."</p>";
echo end_form(false);

$content = ob_get_clean();
$title_part = "Modifier Pokémon";
require("template.php");
?>